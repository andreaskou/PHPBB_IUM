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

class reminder
{
	protected $inactive_users = [];
	protected $config;
	protected $db;
	protected $user;
	protected $user_loader;
	protected $log;
	protected $top_topics;
	protected $ignore_user;
	protected $request;
	protected $table_prefix;
	protected $phpbb_root_path;
	protected $php_ext;
	protected $table_name;
	protected $routing_helper;

	/**
	*
	* @param \phpbb\config\config 										$config				PhpBB Config
	* @param \phpbb\db\driver\driver_interface                        	$db					PhpBB Database
	* @param \phpbb\user                                              	$user				PhpBB User
	* @param \phpbb\log\log                                           	$log				PhpBB Log
	* @param \phpbb\request\request										$request			PhpBB request
	* @param                                                          	$table_prefix		PhpBB table prefix
	* @param                                                          	$phpbb_root_path	PhpBB root path
	* @param                                                          	$php_ext			Php file extension
	*/

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\user_loader $user_loader, \phpbb\log\log $log, \andreask\ium\classes\top_topics $top_topics, \andreask\ium\classes\ignore_user $ignore_user,\phpbb\request\request $request, \phpbb\routing\helper $routing_helper, $table_prefix, $phpbb_root_path, $php_ext)
	{
		$this->config           =	$config;
		$this->db				=	$db;
		$this->user				=	$user;
		$this->user_loader		=	$user_loader;
		$this->log              =	$log;
		$this->top_topics		=	$top_topics;
		$this->ignore_user		=	$ignore_user;
		$this->request			=	$request;
		$this->table_prefix		=	$table_prefix;
		$this->routing_helper	=	$routing_helper;
		$this->php_ext          =	$php_ext;
		$this->phpbb_root_path	=	$phpbb_root_path;
	}

	/**
	 * Send email to users in the list of stored $inactive_users (need to be populated by the set_users() function)
	 * @param $limit ammount of email (users) to sent to
	 */

	public function send($limit, $single = false)
	{
		if ($single)
		{
			$user = array_shift($this->inactive_users);
			$this->get_users($limit, $user['user_id']);
		}

		if (!$this->has_users())
		{
			$this->get_users($limit);
		}

		if ( $this->has_users() )
		{
			if ( !class_exists('messenger') )
			{
				include( $this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext );
			}

			foreach ($this->inactive_users as $sleeper)
			{
				if (phpbb_version_compare($this->config['version'], '3.2', '>='))
				{
					$lang_file_loader = new \phpbb\language\language_file_loader($this->phpbb_root_path, $this->php_ext);
					$user_instance = new \phpbb\language\language($lang_file_loader);
					$user_instance->set_user_language($sleeper['user_lang']);
				}
				else
				{
					$user_row = $this->user_loader->get_user($sleeper['user_id']);
					$user_instance = new \phpbb\user('\phpbb\datetime');
					$user_instance->lang_name = $user_instance->data['user_lang'] = $sleeper['user_lang'];
					$user_instance->timezone = $user_instance->data['user_timezone'] = $sleeper['user_timezone'];
				}

				// Set the user topic links first.
				$topic_links = null;

				// If there are topics then prepare them for the e-mail.
				if ($top_user_topics = $this->top_topics->get_user_top_topics($sleeper['user_id'], $sleeper['user_lastvisit']))
				{
					$topic_links = $this->make_topics($top_user_topics);
				}

				// Set the forum topic links first.
				$forum_links = null;

				// If there are topics then prepare them for the e-mail.
				if ($top_forum_topics = $this->top_topics->get_forum_top_topics($sleeper['user_id'], $sleeper['user_lastvisit']))
				{
					$forum_links = $this->make_topics($top_forum_topics);
				}

				// dirty fix for now, need to find a way for the templates.
				if (phpbb_version_compare($this->config['version'], '3.2', '>='))
				{
					$lang = ( $this->lang_exists($sleeper['user_lang']) ) ? $sleeper['user_lang'] : $this->config['default_lang'];
				}
				else
				{
					$lang = ( $this->lang_exists( $user_instance->lang_name ) ) ? $user_instance->lang_name : $this->config['default_lang'];
				}

				// add template variables
				$template_ary	=	array(
					'FORGOT_PASS'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=sendpassword",
					'SEND_ACT_AG'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=resend_act",
					'SITE_NAME'		=>	htmlspecialchars_decode($this->config['sitename']),
					'USERNAME'		=>	htmlspecialchars_decode($sleeper['username']),
					'LAST_VISIT'	=>	date('d-m-Y', $sleeper['user_lastvisit']),
					'REG_DATE'		=>	date('d-m-Y', $sleeper['user_regdate']),
					'SIGNATURE'		=>	$this->config['board_email_sig'],
					'ADMIN_MAIL'	=>	$this->config['board_contact'],
					'URL'			=>	generate_board_url(),
				);

				$messenger = new \messenger(false);

				if (!is_null($topic_links))
				{
					$messenger->assign_vars(['USR_TPC_LIST' => $topic_links,]);
				}
				if (!is_null($forum_links))
				{
					$messenger->assign_vars(['USR_FRM_LIST' => $forum_links,]);
				}
				if ( $this->config['andreask_ium_self_delete'] == 1 && $sleeper['ium_random'] )
				{
					$link = $this->routing_helper->route('andreask_ium_controller', array('random' => $sleeper['ium_random']), true, null, \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
					$template_ary = array_merge($template_ary, array('SELF_DELETE_LINK' => $link));
				}

				$messenger->anti_abuse_headers($this->config, $this->user);

				// mail content...
				$messenger->from($this->config['board_contact']);
				$messenger->to($sleeper['user_email'], htmlspecialchars_decode($sleeper['username']));

				// Load email template depending on the user
				if ($sleeper['user_lastvisit'] != 0)
				{
					// User never came back after registration...
					$messenger->template('@andreask_ium/sleeper', $lang);
					$messenger->assign_vars($template_ary);
				}
				else
				{
					// User has forsaken us! :(
					$messenger->template('@andreask_ium/inactive', $lang);
					$messenger->assign_vars($template_ary);
				}

				// Send mail...
				$messenger->send();

				// Update ext's table...
				$this->update_user($sleeper);
				unset($topics);
			}
		}

		// Log it and release the user list.
		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_SENT_REMINDERS', time(), array(sizeof($this->inactive_users)));
		unset( $this->inactive_users );
	}

	/**
	 * Gets the users from database and loades them to inactive_users
	 * @param int $limit amount of results. Default is null
	 */

	private function get_users($limit = null, $user = false)
	{
		// if limit is not set use limit from configuration.
		$limit = ($limit) ? $limit : $this->config['andreask_ium_email_limit'];
		$sql_opt = '';

		if ($user)
		{
			$sql_opt .= ' AND user_id = ' . (int) $user;
		}

		if (!$user)
		{
			// Current date
			$present = new DateTime();

			// Set interval
			$back = 'P' . $this->config['andreask_ium_interval'] . 'D';
			$interval = new DateInterval($back);

			// Substract the interval of Days/Months/Years from present
			$present->sub($interval);

			// Convert past to timestamp
			$past = strtotime($present->format("y-m-d h:i:s"));

			$sql_opt .= ' AND ium_dont_send < 1
			AND ium_reminder_sent_date < '. $past . '
			AND user_lastvisit < ' . $past . '
			AND user_regdate < ' . $past;
		}

		$ignore_groups = $this->ignore_user;
		$must_ignore = $ignore_groups->ignore_groups();

		$sql = 'SELECT user_id, username, user_email, user_lang, user_dateformat, user_regdate, user_timezone, user_posts, user_lastvisit, user_inactive_time, user_inactive_reason, ium_remind_counter, ium_previous_sent_date, ium_reminder_sent_date, ium_dont_send, ium_request_date, ium_random, ium_type, ium_request_type
								FROM '. USERS_TABLE . '
								WHERE '. $this->db->sql_in_set('user_id', '(SELECT ban_userid FROM '. BANLIST_TABLE .')', true) . $sql_opt . ' ' . $must_ignore .'
								ORDER BY user_regdate ASC';

		$result = $this->db->sql_query_limit($sql, $limit);

		$inactive_users = [];

		// Store results to rows
		while ($row = $this->db->sql_fetchrow($result))
		{
			$inactive_users[] = $row;
		};

		// Be sure to free the result after a SELECT query
		$this->db->sql_freeresult($result);

		// Store user so we can use them.
		$this->set_users($inactive_users);
		}

	/**
	 * Setter for $inactive_users
	 * @param $inactive_users
	 */

	private function set_users($users)
	{
		$this->inactive_users = $users;
	}

	/**
	 * Set user to send to a single user.
	 * @param string $user user_id
	 */
	public function set_single($user)
	{
		$this->inactive_users = $user;
	}

	/**
	 * Checks if inactive_users is populated
	 * @return bool returns false if empty.
	 */

	public function has_users()
	{
		return (bool) sizeof($this->inactive_users);
	}

	/**
	 * Updates/inserts users to ium_reminder
	 * @param $user single user
	 */

	private function update_user($user)
	{
		// Update user ium info for the reminder

		$update_arr = array('ium_reminder_sent_date' => time());
		$counter = ($user['ium_remind_counter'] + 1);

		if ( $user['ium_remind_counter'] == 0 )
		{
			$merge = array('ium_remind_counter' => $counter);
			$update_arr = array_merge($update_arr, $merge);
		}
		else if ( $user['ium_remind_counter'] == 1 )
		{
			$random_md5	= md5(uniqid($user['user_email'], true));
			$merge = array('ium_previous_sent_date'	=>	$user['ium_reminder_sent_date'],
				'ium_remind_counter'	=>	$counter,
				'ium_random'			=>	$random_md5,
				);
			$update_arr = array_merge($update_arr, $merge);
		}
		else if ( $user['ium_remind_counter'] >= 2 )
		{
			$merge = array('ium_previous_sent_date' =>	$user['ium_reminder_sent_date'],
				'ium_remind_counter'	=>	$counter,
				'ium_request_date'		=>	time(),
				'ium_type'				=>	'auto',
				'ium_dont_send'			=>	1,
				);
			$update_arr = array_merge($update_arr, $merge);
		}

		$sql = 'UPDATE ' . USERS_TABLE . ' SET ' . $this->db->sql_build_array('UPDATE', $update_arr) . '
						WHERE user_id = ' . (int) $user['user_id'];

		$this->db->sql_query($sql);
	}

	/**
	 * Check if language file exist
	 * @param  string $user_lang user language preference
	 * @return bool		true or false
	 */

	public function lang_exists($user_lang)
	{
		if (!$user_lang)
		{
			return false;
		}

		$ext_path = $this->phpbb_root_path . 'ext/andreask/ium';
		return (bool) file_exists($ext_path . '/language/' . $user_lang);
	}

	/**
	 * Sends selected reminder template to admin.
	 * @param  string $id       id of admin that requests the template
	 * @param  string $template requested template type
	 * @return void
	 */

	public function send_to_admin($id, $template)
	{

		$sql = 'SELECT user_id, username, user_email, user_lang, user_dateformat, user_regdate, user_timezone, user_posts, user_lastvisit, user_inactive_time, user_inactive_reason
				FROM ' . USERS_TABLE . ' WHERE user_id = '. (int) $id ;

		// Run the query
		$result = $this->db->sql_query($sql);

		// Store results to rows
		$sleeper = $this->db->sql_fetchrow($result);

		// Be sure to free the result after a SELECT query
		$this->db->sql_freeresult($result);

		if ($sleeper)
		{
			if ( !class_exists('messenger') )
			{
				include( $this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext );
			}

			// Load top_topics class
			$topics = $this->top_topics;

			// Set the user topic links first.
			$topic_links = null;

			$admin_fake_last_visit = strtotime('-356 days');
			// If there are topics then prepare them for the e-mail.
			if ($top_user_topics = $topics->get_user_top_topics( $sleeper['user_id'], $admin_fake_last_visit ))
			{
				$topic_links = $this->make_topics($top_user_topics);
			}

			// Set the forum topic links first.
			$forum_links = null;

			// If there are topics then prepare the for the mail.
			if ( $top_forum_topics = $topics->get_forum_top_topics( $sleeper['user_id'], $admin_fake_last_visit ))
			{
				$forum_links = $this->make_topics($top_forum_topics);
			}

			// dirty fix for now, need to find a way for the templates.
			$lang = ( $this->lang_exists($this->user->data['user_lang']) ) ? $this->user->data['user_lang'] : $this->config['default_lang'];

			// add template variables
			$template_ary	=	array(
				'FORGOT_PASS'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=sendpassword",
				'SEND_ACT_AG'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=resend_act",
				'SITE_NAME'		=>	htmlspecialchars_decode($this->config['sitename']),
				'USERNAME'		=>	htmlspecialchars_decode($sleeper['username']),
				'LAST_VISIT'	=>	date('d-m-Y', $sleeper['user_lastvisit']),
				'REG_DATE'		=>	date('d-m-Y', $sleeper['user_regdate']),
				'SIGNATURE'		=>	$this->config['board_email_sig'],
				'ADMIN_MAIL'	=>	$this->config['board_contact'],
				'URL'			=>	generate_board_url(),
			);

			$messenger = new \messenger(false);

			// If there are topics for user merge them with the template_ary
			if (!is_null($topic_links))
			{
				$messenger->assign_vars(['USR_TPC_LIST' => $topic_links,]);
			}

			// If there are forum topics merge them with the template_ary
			if (!is_null($forum_links))
			{
				$messenger->assign_vars(['USR_FRM_LIST' => $forum_links,]);
			}

			// If self delete is set and 'random' has been generated for the user merge it with the template_ary
			if ( $this->config['andreask_ium_self_delete'] == 1 && isset($sleeper['ium_random']))
			{
				$link = $this->routing_helper->route('andreask_ium_controller', array('random' => $sleeper['ium_random']), true, null, \Symfony\Component\Routing\Generator\UrlGeneratorInterface::ABSOLUTE_URL);
				$template_ary = array_merge($template_ary, array('SELF_DELETE_LINK' => $link));
			}

			// mail headers
			$messenger->anti_abuse_headers($this->config, $this->user);

			// mail content...
			$messenger->from($this->config['board_contact']);
			$messenger->to($sleeper['user_email'], $sleeper['username']);

			// Load template depending on the user
			switch ($template)
			{
				case 'send_sleeper':
					// Load sleeper template...
					$messenger->template('@andreask_ium/sleeper', $lang);
				break;
				case 'send_inactive':
					$messenger->template('@andreask_ium/inactive', $lang);
				break;
				default :
				break;
			}

			// Add template_ary to mail.
			$messenger->assign_vars($template_ary);

			// Send mail...
			$messenger->send();
			unset($topics);
		}

		// Log it and release the user list.

		$template = explode('_', $template);
		$this->log->add('admin', $this->user->data['user_id'], $this->user->ip, 'LOG_SENT_REMINDER_TO_ADMIN', time(), array($template[1], $sleeper['user_email']));
		unset( $this->inactive_users );
	}

	/**
	 * Resets the counter of reminders this function is called by the listener.
	 * @param string $id user_id of loged in user.
	 * @return void
	 */

	public function reset_counter($id)
	{
		$ids = (!is_array($id)) ? $ids[] = $id : $ids = $id;

		// reset counter(s)!
		$sql = "UPDATE " . USERS_TABLE . " SET ium_remind_counter = 0, ium_request_date = 0, ium_type ='' WHERE ". $this->db->sql_in_set('user_id', $ids);
		$this->db->sql_query($sql);
	}

	/**
	 * Generates a formated string of topic title and link to topic.
	 * @param  array $topics Must contain forum_id, topic_id
	 * @return string
	 */

	public function make_topics($topics)
	{
		$url = generate_board_url();
		$topic_links = [];
		foreach ($topics as $key=>$item)
		{
			$topic_links[$key]['title'] = $item['topic_title'];
			$topic_links[$key]['url'] = $url . "/viewtopic." . $this->php_ext . "?f=" . $item['forum_id'] . "?&t=" . $item['topic_id'];
		}
		return $topic_links;
	}
}
