<?php

namespace andreask\ium\classes;

use Symfony\Component\DependencyInjection\ContainerInterface;

class reminder
{

	/**
	 *
	 * This file is part of the phpBB Forum Software package.
	 *
	 * @copyright (c) phpBB Limited <https://www.phpbb.com>
	 * @license GNU General Public License, version 2 (GPL-2.0)
	 *
	 * For full copyright and license information, please see
	 * the docs/CREDITS.txt file.
	 *
	 */
	protected $inactive_users = [];
	protected $config;
	protected $db;
	protected $user;
	protected $user_loader;
	protected $log;
	protected $container;
	protected $table_prefix;
	protected $phpbb_root_path;
	protected $php_ext;
	protected $table_name;
	protected $lang;

	/**
	 * reminder constructor.
	 *
	 * @param \phpbb\config\config                                      $config                     PhpBB Config
	 * @param \phpbb\db\driver\driver_interface                         $db                         PhpBB Database
	 * @param \phpbb\user                                               $user			PhpBB User
	 * @param \phpbb\log\log                                            $log			PhpBB Log
	 * @param \Symfony\Component\DependencyInjection\ContainerInterface $container			PhpBB container loader
	 * @param                                                           $table_prefix               PhpBB table prefix
	 * @param                                                           $phpbb_root_path            PhpBB root path
	 * @param                                                           $php_ext			Php extension
	 */

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\user_loader $user_loader, \phpbb\log\log $log, ContainerInterface $container, $table_prefix, $phpbb_root_path, $php_ext)
	{
		$this->config           =	$config;
		$this->db		=	$db;
		$this->user		=	$user;
		$this->user_loader	=	$user_loader;
		$this->log              =	$log;
		$this->container	=	$container;
		$this->table_prefix	=	$table_prefix;
		$this->php_ext          =	$php_ext;
		$this->phpbb_root_path	=	$phpbb_root_path;
		$this->table_name       =       'ium_reminder';
	}

	/**
	 * Send email to users in the list of stored $inactive_users (need to be populated by the set_users() function)
	 * @param $limit ammount of email (users) to sent to
	 */
	public function send($limit)
	{
		$this->get_users( $limit );
		if ( $this->has_users() )
		{
			if ( !class_exists('messenger') )
			{
				include( $this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext );
			}

			$this->user->add_lang_ext('andreask/ium', 'body');
			foreach ($this->inactive_users as $sleeper)
			{
				$user_row = $this->user_loader->get_user($sleeper['user_id']);
				$user_instance = new \phpbb\user('\phpbb\datetime');
				$user_instance->lang_name = $user_instance->data['user_lang'] = $user_row['user_lang'];
				$user_instance->timezone = $user_instance->data['user_timezone'] = $sleeper['user_timezone'];
				$user_instance->add_lang_ext('andreask/ium', 'body');

				// Load top_topics class
				$topics = $this->container->get('andreask.ium.classes.top_topics');

				// Set the user topic links first.
				$topic_links = null;

				// If there are topics then prepare the for the mail.
				if ( $top_user_topics = $topics->get_user_top_topics( $sleeper['user_id'] ) )
				{
					$topic_links = PHP_EOL;
					foreach ($top_user_topics as $item)
					{
						$topic_links .= PHP_EOL;
						$topic_links .= '"' . $item['topic_title'] . '"' . PHP_EOL;
						$topic_links .= generate_board_url() . "/viewtopic." . $this->php_ext . "?f=" . $item['forum_id'] . "?&t=" . $item['topic_id'] . PHP_EOL;
						$topic_links .= PHP_EOL;
					}
				}

				// Set the forum topic links first.
				$forum_links = null;

				// If there are topics then prepare the for the mail.
				if ( $top_forum_topics = $topics->get_forum_top_topics( $sleeper['user_id'] ) )
				{
					$forum_links = PHP_EOL;
					foreach ($top_forum_topics as $item)
					{
						$forum_links .= PHP_EOL;
						$forum_links .= '"' . $item['topic_title'] . '"' . PHP_EOL;
						$forum_links .= generate_board_url() . "/viewtopic." . $this->php_ext . "?f=" . $item['forum_id'] . "?&t=" . $item['topic_id'] . PHP_EOL;
						$forum_links .= PHP_EOL;
					}
				}

				// dirty fix for now, need to find a way for the templates.
				$lang = ( $this->lang_exists( $user_instance->lang_name ) ) ? $user_instance->lang_name : $this->config['default_lang'];

				// add template variables
				$template_ary	=	array(
					'USERNAME'	=>	htmlspecialchars_decode($sleeper['username']),
					'REG_DATE'	=>	date('d-m-Y', $sleeper['user_regdate']),
					'LAST_VISIT'	=>	date('d-m-Y', $sleeper['user_lastvisit']),
					'ADMIN_MAIL'	=>	$this->config['board_contact'],
					'FORGOT_PASS'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=sendpassword",
					'SEND_ACT_AG'	=>	generate_board_url() . "/ucp." . $this->php_ext . "?mode=resend_act",
					'SITE_NAME'	=>	htmlspecialchars_decode($this->config['sitename']),
					'SIGNATURE'	=>	$this->config['board_email_sig'],
					'URL'	=>	generate_board_url(),
				);

				if (!is_null($topic_links))
				{
					$template_ary = array_merge( $template_ary, array('USR_TPC_LIST' => sprintf( $user_instance->lang('INCLUDE_USER_TOPICS'), $topic_links ) ) );
				}
				if (!is_null($forum_links))
				{
					$template_ary = array_merge($template_ary, array('USR_FRM_LIST' => $user_instance->lang('INCLUDE_FORUM_TOPICS', $forum_links) ) );
					// $template_ary = array_merge($template_ary, array('USR_FRM_LIST' => sprintf( $user_instance->lang('INCLUDE_FORUM_TOPICS'), $forum_links ) ) );
				}
				if ( $this->config['andreask_ium_self_delete'] == 1 && $sleeper['random'] != 0 )
				{
					$link = PHP_EOL;
					$link .= generate_board_url() . "/ium/" . $sleeper['random'];
					$template_ary = array_merge($template_ary, array('SELF_DELETE_LINK' => $user_instance->lang('FOLOW_TO_DELETE', $link)));
				}

				$messenger = new \messenger(false);
				// mail headers
				$messenger->headers('X-AntiAbuse: Board servername - ' . $this->config['server_name']);
				$messenger->headers('X-AntiAbuse: User_id - ' . $this->user->data['user_id']);
				$messenger->headers('X-AntiAbuse: Username - ' . $this->user->data['username']);
				$messenger->headers('X-AntiAbuse: User IP - ' . $this->user->ip);

				// mail content...
				$messenger->to($sleeper['user_email'], $sleeper['username']);
				$messenger->from($this->config['board_contact']);

				// Load template depending on the user

				if ($sleeper['user_lastvisit'] != 0)
				{
					// User never came back after registration...
					$messenger->template('@andreask_ium/sleeper', $lang);
					$messenger->assign_vars($template_ary);
				}
				// User has forsaken us! :(
				else
				{
					$messenger->template('@andreask_ium/inactive', $lang);
					$messenger->assign_vars($template_ary);
				}

				// Send mail...
				$messenger->send();
//				$messenger->save_queue();

				// Update ext's table...
				$this->update_ium_reminder($sleeper);
				unset($topics);
			}
		}
		// Log it and release the user list.

		if (phpbb_version_compare($this->config['version'], '3.2.0-dev', '>='))
		{
			// For phpBB 3.2.x
			$lang = $this->container->get('language');
			$lang->add_lang('log', 'andreask/ium');
		}
		else
		{
			// For phpBB 3.1.x
			$lang = $this->container->get('user');
			$lang->add_lang_ext('andreask/ium', 'log');
		}
		$this->log->add('admin', 54, $this->user->ip, $lang->lang('SENT_REMINDERS', sizeof($this->inactive_users)), time());
		unset( $this->inactive_users );
	}

	/**
	 * Gets the users from database
	 * @param null $limit limit the amount of results. (need to fix this)
	 */
	private function get_users($limit = null)
	{
		// if limit is not set use limit from configuration.
		$limit = ($limit) ? 'limit ' . $limit : 'limit ' . $this->config['andreask_ium_email_limit'];
		$table_name = $this->table_prefix . $this->table_name;

		// $sql = 'SELECT p.user_id, p.username, p.user_email, p.user_lang, p.user_dateformat, p.user_regdate,p.user_timezone, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.remind_counter, r.previous_sent_date, r.reminder_sent_date, r.dont_send
		$sql = 'SELECT p.user_id, p.username, p.user_email, p.user_lang, p.user_dateformat, p.user_regdate,p.user_timezone, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.*
			FROM ' . USERS_TABLE . ' p
			LEFT OUTER JOIN ' . $table_name . ' r
			ON (p.user_id = r.user_id)
			WHERE p.user_id not in (SELECT ban_userid FROM ' . BANLIST_TABLE . ')
			AND p.group_id NOT IN (1,4,5,6)
			AND r.dont_send <> 1
			AND from_unixtime(r.reminder_sent_date) < DATE_SUB(NOW(), INTERVAL ' . $this->config['andreask_ium_interval'] . ' DAY)
			ORDER BY p.user_regdate ASC ' . $limit;

		// Run the query
		$result = $this->db->sql_query($sql);

		// $row should hold the data you selected
		$inactive_users = array();

		// Store results to rows
		while ($row = $this->db->sql_fetchrow($result))
		{
			$inactive_users[] = $row;
		};

		// Be sure to free the result after a SELECT query
		$this->db->sql_freeresult($result);

		// Store user sho we can use them.
		$this->set_users($inactive_users);
	}

	/**
	 * Sets users for $inactive_users
	 * @param $inactive_users
	 */

	private function set_users($users)
	{
		$this->inactive_users = $users;
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

	private function update_ium_reminder($user)
	{
		// Does the user exists in ium_reminder?
		// If he does update the row?
		if ( $this->user_exist($user['user_id']) )
		{
			$update_arr = array('reminder_sent_date' => time());
			$counter = ($user['remind_counter'] + 1);

			if ( $user['remind_counter'] == 0 )
			{
				$merge = array('remind_counter' => $counter);
				$update_arr = array_merge($update_arr, $merge);
			}
			else if ( $user['remind_counter'] == 1 )
			{
				$random_md5	= md5(uniqid($user['user_email'], true));
				$merge = array('previous_sent_date'	=>	$user['reminder_sent_date'],
					'remind_counter'	=>	$counter,
					'random'			=>	$random_md5,
					);
				$update_arr = array_merge($update_arr, $merge);
			}
			else if ( $user['remind_counter'] == 2 )
			{
				$merge = array('previous_sent_date' =>	$user['reminder_sent_date'],
					'remind_counter'	=>	$counter,
					'dont_send'			=>	1,
					);
				$update_arr = array_merge($update_arr, $merge);
			}

			$sql = 'UPDATE ' . $this->table_prefix . $this->table_name . ' SET ' . $this->db->sql_build_array('UPDATE', $update_arr) .
					' WHERE user_id = ' . $user['user_id'];
			$this->db->sql_query($sql);
		}

		// User does not exist in the table let's add him.
		else
		{

			$insert_arr = array(
				'user_id' => $user['user_id'],
				'username' => $user['username'],
				'remind_counter' => 1,
				'previous_sent_date' => 0,
				'reminder_sent_date' => time(),
			);

			$sql = 'INSERT INTO ' . $this->table_prefix . $this->table_name . $this->db->sql_build_array('INSERT', $insert_arr);
			$this->db->sql_query($sql);
		}
	}

	/**
	 * Check if user exist in ium_reminder
	 * @param $user_id	User id to search.
	 * @return bool
	 */

	private function user_exist($user_id)
	{
		$sql = 'SELECT COUNT(user_id) as user_count
		FROM ' . $this->table_prefix . $this->table_name . '
		WHERE user_id = ' . $user_id;

		$result = $this->db->sql_query($sql);
		$give_back = (bool) $this->db->sql_fetchfield('user_count');
		$this->db->sql_freeresult($result);

		// Return true if user found:
		return $give_back;
	}

	private function get_from_ium_reminder($user_id)
	{
		$select_array = array(
			'user_id' => $user_id,
		);

		// Create the SQL statement
		$sql = 'SELECT username, remind_counter, previous_sent_date, reminder_sent_date, dont_send
		FROM ' . $this->table_prefix . $this->table_name . '
		WHERE ' . $this->db->sql_build_array('SELECT', $select_array);

		// Run the query
		$result = $this->db->sql_query($sql);

		// $row should hold the data you selected
		$row = $this->db->sql_fetchrow($result);

		// Be sure to free the result after a SELECT query
		$this->db->sql_freeresult($result);

		// Show we got the result we were looking for
		return $row;
	}

	private function get_board_lang()
	{
		$sql = 'SELECT lang_iso
				FROM ' . LANG_TABLE;
		$result = $this->db->sql_query($sql);

		while ($row = $this->db->sql_fetchrow($result))
		{
			$lang = $row;
		}
		$this->db->sql_freeresult($result);

		return $lang;
	}

	public function lang_exists($user_lang)
	{
		$ext_path = $this->phpbb_root_path . 'ext/andreask/ium';
		return (bool) file_exists($ext_path . '/language/' . $user_lang);
	}
}
