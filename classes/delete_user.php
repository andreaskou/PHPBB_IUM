<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* @license   GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the CREDITS.txt file.
*/

namespace andreask\ium\classes;

use \DateTime;
use \DateInterval;

class delete_user
{

	protected $inactive_users = [];
	protected $config;
	protected $db;
	protected $user;
	protected $user_loader;
	protected $log;
	protected $table_name;
	protected $phpbb_root_path;
	protected $php_ext;

	/**
	 * Constructor
	 *
	 * @param \phpbb\config\config                                      $config             PhpBB Config
	 * @param \phpbb\db\driver\driver_interface                         $db                 PhpBB Database
	 * @param \phpbb\log\log                                            $log								PhpBB Log
	 * @param                                                           $phpbb_root_path    PhpBB root path
	 * @param                                                           $php_ext						Php extension
	 */

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\log\log $log, $ium_reminder_table, $phpbb_root_path, $php_ext)
	{
		$this->config			=	$config;
		$this->db				=	$db;
		$this->user				=	$user;
		$this->log				=	$log;
		$this->php_ext			=	$php_ext;
		$this->phpbb_root_path	=	$phpbb_root_path;
		$this->table_name		=	$ium_reminder_table;
	}

	private function user_exist($id)
	{
		if (!$id)
		{
			return false;
		}
		if ( !is_array($id) )
		{
			// we need id(s) in array
			$id = (array) $id;
		}

		$users_to_delete = sizeof($id);

		// check user if exist if so return true
		$sql = 'SELECT count(user_id) AS user_count
				FROM ' . USERS_TABLE . ' WHERE ' . $this->db->sql_in_set('user_id', $id);
		$result = $this->db->sql_query($sql);
		$user_count = (int) $this->db->sql_fetchfield('user_count');
		$this->db->sql_freeresult($result);

		if ( !$user_count == $users_to_delete )
		{
			$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'SOMETHING_WRONG', time());
			return false;
		}

		return true;
	}

	public function delete($ids, $request = 'auto', $posts = null)
	{

		if (!$this->user_exist($ids))
		{
			return false;
		}

		// Determin where the request is comming from and act acordingly
		switch ( $request )
		{
			case 'auto':
				$this->update_and_log($ids, $request);
			break;
			case 'admin':
				$this->update_and_log($ids, $request, $posts);
			break;
			case 'user':
				$this->update_and_log($ids, $request);
			break;

			default:
			break;
		}
	}

	 /**
		* Updates ext's table and runs the delete_user to delete the user for board.
		* @param  int  $id     Array of user ids
		* @param  String $type   Can be only AUTO|ADMIN|USER AUTO for scheduler, ADMIN for admins approvals, USER for user request
		* @param  String $action retain|remove this is a parameter for delete_user to retain or delete user posts
		* @return null
		*/

	private function update_and_log($id, $type, $action = null)
	{
		$req_to_del = sizeof($id);

		// Lets just keep the usernames for logging and have a count to verify later the delete later.
		$sql = 'SELECT username FROM ' . $this->table_name . ' WHERE ' . $this->db->sql_in_set('user_id', $id);
		$result = $this->db->sql_query($sql);

		$users = [];

		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[] = $row['username'];
		}

		// Never forget to free the results!
		$this->db->sql_freeresult($result);

		// Include functions_user for the user_delete function
		include_once( $this->phpbb_root_path . 'includes/functions_user.' . $this->php_ext );

		// Use config to determin if posts shuld be kept or deleted. or perhaps admin want's them specifically deleted.
		$posts = ( $this->config['andreask_ium_keep_posts'] ) ? 'retain' : 'remove';

		if ( $type == 'auto')
		{
			$this->email_for_delition($id, $type);
			user_delete($posts, $id);

			if ( $req_to_del > 1 )
			{
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'USERS_DELETED', time(), array($req_to_del, implode(', ', $users), $type));
			}
			else
			{
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'USER_DELETED', time(), array($users[0], $type));
			}
		}

		if ( $type == 'admin')
		{
			$act = ($action != null) ? $action : $posts;
			$this->email_for_delition($id, $type);
			user_delete($act, $id);

			if ( $req_to_del > 1 )
			{
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'USERS_DELETED', time(), array($req_to_del, implode(', ', $users), $type));
			}
			else
			{
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'USER_DELETED', time(), array($users[0], $type));
			}
		}

		if ( $type == 'user' )
		{
			if ( $this->config['andreask_ium_approve_del'] )
			{
				// store for approval and add user to the list.
				$sql_array = array(
								'request_date'	=>	time(),
								'type'			=>	'user',
							);
				$sql = 'UPDATE ' . $this->table_name . '
						SET '. $this->db->sql_build_array('UPDATE', $sql_array) .'
						WHERE username="' . $users['username'] . '"';
				$this->db->sql_query($sql);
			}
			// Else delete the user...
			else
			{
				user_delete($posts, $id);
				$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'USER_SELF_DELETED', time(), array($posts));
			}
		}
	}

	/**
	 * This runs from the scheduler and it's for deleting the users automatically.
	 * @return null
	 */

	public function	auto_delete()
	{
		// Current date
		$present = new DateTime();

		// Set interval
		$back = 'P' . $this->config['andreask_ium_auto_del_days'] . 'D';
		$interval = new DateInterval($back);

		// Substract the interval of Days/Months/Years from present
		$present->sub($interval);

		// Convert past to timestamp
		$past = strtotime($present->format("y-m-d h:i:s"));

		$sql = 'SELECT user_id FROM ' . $this->table_name . '
				WHERE type="auto" AND request_date < ' . $past;
		$result = $this->db->sql_query($sql);

		$users = [];

		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[] = $row['user_id'];
		}

		$this->db->sql_freeresult($result);
		$this->delete($users);
	}

	/**
	 * This cleans up users on ext's table after a/some user(s) has been requested for deletion.
	 * It's mainly used by the listener.
	 * @param  int $id array of user ids
	 * @return null
	 */

	public function clean_ium_table($id)
	{
		if (!is_array($id))
		{
			$id = (array) $id;
		}

		$sql_in_array = $id;
		$sql = 'DELETE FROM ' . $this->table_name .' WHERE ' . $this->db->sql_in_set('user_id', $sql_in_array);
		$this->db->sql_query($sql);
		$this->db->sql_affectedrows();
	}

/**
 * This is a feature function, will send e-mails to users that is being deleted.
 * Need to make a new branch!
 * @param  int		$user_ids	User ids of users
 * @param  str		$request	String value of requested type for deletion (user, auto, admin).
 * @return void
 */
	public function email_for_delition($user_ids, $request)
	{
		if (!$this->user_exist($user_ids))
		{
			// Log the error!
			return false;
		}

		$sql = 'SELECT username, user_email, user_lang FROM '. USERS_TABLE .'
						WHERE '. $this->db->sql_in_set('user_id', $user_ids);
		$result = $this->db->sql_query($sql);

		$users = [];

		while ($row = $this->db->sql_fetchrow($result))
		{
			$users[] = $row;
		}

		$this->db->sql_freeresult($result);

		if ( !class_exists('messenger') )
		{
			include( $this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext );
		}

		$this->user->add_lang('common');
		$interval_days_sum = $this->config['andreask_ium_interval'] * 3;

		$messenger = new \messenger(false);
		$xhead_username = ($this->config['board_contact_name']) ? $this->config['board_contact_name'] : $this->user->lang('ADMINISTRATOR');

		// mail headers
		$messenger->headers('X-AntiAbuse: Board servername - ' . $this->config['server_name']);
		$messenger->headers('X-AntiAbuse: Username - ' . $xhead_username);
		$messenger->headers('X-AntiAbuse: User_id - 2');
		// $messenger->headers('X-AntiAbuse: User IP - ' . $this->request->server('SERVER_ADDR'));

		// mail content...
		$messenger->from($this->config['board_contact']);

		foreach ($users as $user)
		{
			$lang = ( $this->lang_exists($user['user_lang']) ) ? $user['user_lang'] : $this->config['default_lang'];
			$messenger->to($user['user_email'], $user['username']);

			// Load email template depending on the request
			$messenger->template('@andreask_ium/' . $request, $lang);
			$template_ary = array(
												'USER_NAME' => htmlspecialchars_decode($user['username']),
												'INTERVAL_DAYS_SUM' => $interval_days_sum,
											);
			$messenger->assign_vars($template_ary);

			// Send mail...
			$messenger->send();
		}
	}

	public function lang_exists($user_lang)
	{
		if (!$user_lang)
		{
			return false;
		}

		$ext_path = $this->phpbb_root_path . 'ext/andreask/ium';
		return (bool) file_exists($ext_path . '/language/' . $user_lang);
	}

}
