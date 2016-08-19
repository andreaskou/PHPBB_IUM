<?php

namespace andreask\ium\classes;

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

    protected   $inactive_users = [];
	protected   $config;
	protected   $db;
	protected   $user;
	protected 	$log;
	protected   $table_prefix;
	protected   $phpbb_root_path;
	protected   $php_ext;
	protected	$table_name;

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user_loader $user,\phpbb\log\log $log ,$table_prefix, $phpbb_root_path, $php_ext)
	{
		$this->config = $config;
		$this->db = $db;
		$this->user = $user;
		$this->log	= $log;
		$this->table_prefix = $table_prefix;
		$this->php_ext = $php_ext;
		$this->phpbb_root_path = $phpbb_root_path;
		$this->table_name = 'ium_reminder';
	}

	/**
	 *
	 * Send email depending on the list of $inactive_users
	 *
	 */
    public function send($limit)
    {
		$this->log->add('admin', 54 , '127.0.0.1', 'Preparing to send reminders to users...', time());
		$this->get_users($limit);
    	if ($this->has_users())
	    {
			if (!class_exists('messenger'))
		    {
			    include($this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext);
		    }

		    foreach ($this->inactive_users as $sleeper)
			{
				$this->log->add('admin', 54 , '127.0.0.1', '-------------- START ----------------------', time());
				$this->log->add('admin', 54 , '127.0.0.1', 'Sending to '. $sleeper['username'], time());

				// dirty fix for now, need to find a way for the templates.
				$lang = ($sleeper['user_lang'] == 'en') ? $sleeper['user_lang'] : 'en';

				// add template variablies
				$template_ary = array(
					'USERNAME'   	=> htmlspecialchars_decode($sleeper['username']),
					'REG_DATE'		=> date($sleeper['user_dateformat'], $sleeper['user_regdate']),
					'LAST_VISIT' 	=> date($sleeper['user_dateformat'], $sleeper['user_lastvisit']),
					'ADMIN_MAIL' 	=> $this->config['board_contact'],
					'SITE_NAME'  	=> htmlspecialchars_decode($this->config['sitename']),
					'SIGNATURE'	 	=> $this->config['board_email_sig'],
					'URL'        	=> generate_board_url(),
				);
				$messenger = new \messenger(false);
				$messenger->to($sleeper['user_email'], $sleeper['username']);
				$messenger->from($this->config['board_contact']);

				// Load template depending on the user

				if ($sleeper['user_lastvisit'] != 0)
				{
					// User never came back after registration...
					$this->log->add('admin', 54 , '127.0.0.1', 'User has visited us before' , time());
					$messenger->template('@andreask_ium/sleeper', $lang);
					$messenger->subject('We\'ve missed you!');
					$messenger->assign_vars($template_ary);
				}
				else
				{
					// User has forsaken us! :(
					$this->log->add('admin', 54 , '127.0.0.1', 'Users has never visited us before' , time());
					$messenger->template('@andreask_ium/inactive', $lang);
					$messenger->subject('Hello!');
					$messenger->assign_vars($template_ary);
				}

				// Send mail...
				$messenger->send();
//				$messenger->save_queue();
				// Update ext's table...
				$this->update_ium_reminder($sleeper);

				$this->log->add('admin', 54 , '127.0.0.1', '-------------- END ----------------------', time());
			}
		}
		// release the user list.
		unset($this->inactive_users);
    }

	/**
	 * @param null $limit optional parameter to limit the amount of results. (need to fix this)
	 */

	private function get_users($limit = null){

		// if limit is not set use limit from configuration.
		$limit = ($limit) ? 'limit '. $limit : 'limit '.$this->config['andreask_ium_email_limit'];
		$table_name = $this->table_prefix . $this->table_name;

		$this->log->add('admin', 54 , '127.0.0.1', 'Getting users...', time());

		// prepare the sql statement.
		$sql = 'SELECT p.user_id, p.username, p.user_email, p.user_lang, p.user_dateformat, p.user_regdate, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.remind_counter, r.previous_sent_date, r.reminder_sent_date, r.dont_send
			FROM ' . USERS_TABLE . ' p
			LEFT OUTER JOIN ' . $table_name . ' r
			ON (p.user_id = r.user_id) 
			WHERE p.user_id not in (SELECT ban_userid FROM ' . BANLIST_TABLE . ') 
			AND p.group_id NOT IN (1,4,5,6) 
			AND from_unixtime(r.reminder_sent_date) < DATE_SUB(NOW(), INTERVAL '.$this->config['andreask_ium_interval'] .' MINUTE) 
			ORDER BY p.user_regdate ASC '.$limit;

//			AND from_unixtime(p.user_regdate) < DATE_SUB(NOW(), INTERVAL '.$this->config['andreask_ium_interval'] .' DAY)

		// Run the query
		$result = $this->db->sql_query($sql);

		// $row should hold the data you selected
		$inactive_users = array();

		// Store results to rows
		while ($row = $this->db->sql_fetchrow($result)) {
			$inactive_users[] = $row;
		};

		// Be sure to free the result after a SELECT query
		$this->db->sql_freeresult($result);

		// Store user sho we can use them.
		$this->set_users($inactive_users);
		$this->log->add('admin', 54 , '127.0.0.1', 'got '. sizeof($this->inactive_users).' users.', time());

	}

	/**
	 * Setter for $inactive_users
	 * @param $inactive_users
	 */

    private function set_users($inactive_users)
    {
    	$this->inactive_users = $inactive_users;
		$this->log->add('admin', 54 , '127.0.0.1', 'Users are stored...', time());
	}

	/**
	 * Check if inactive_users is populated
	 * @return bool returns false if empty.
	 */

    public function has_users()
    {
		$this->log->add('admin', 54 , '127.0.0.1', 'Checking if users exist', time());
		return (bool) sizeof($this->inactive_users);
    }

	/**
	 * @param $user, used to updates/populate ext's table ium_reminder
	 */

    private function update_ium_reminder($user)
	{

		// Does the user exists in ium_reminder?
		// If he does update the row?
		if ($this->user_exist($user['user_id']))
		{
			$this->log->add('admin', 54 , '127.0.0.1', 'User exist!' , time());

			$update_arr = array('reminder_sent_date' => time());
			$counter = ($user['remind_counter'] + 1);

			if ($user['remind_counter']  == 0 ){
				$this->log->add('admin', 54 , '127.0.0.1', 'First reminder' , time());
				$merge = array('remind_counter' => $counter);
				$update_arr = array_merge($update_arr, $merge);
			}
			elseif ($user['remind_counter']  == 1 ){
				$this->log->add('admin', 54 , '127.0.0.1', 'Second reminder' , time());
				$merge = array('previous_sent_date' => $user['reminder_sent_date'],
							   'remind_counter' => $counter );
				$update_arr = array_merge($update_arr, $merge);
			}
			elseif ($user['remind_counter'] == 2 )
			{
				$this->log->add('admin', 54 , '127.0.0.1', 'Last reminder...' , time());

				$merge = array('previous_sent_date' => $user['reminder_sent_date'],
							   'remind_counter'		=> $counter,
							   'dont_send'			=> 1);
				$update_arr = array_merge($update_arr, $merge);
			}

			$sql = 'UPDATE ' . $this->table_prefix.$this->table_name . ' SET ' . $this->db->sql_build_array('UPDATE', $update_arr) .
			' WHERE user_id = '.$user['user_id'];
			$this->log->add('admin', 54 , '127.0.0.1', "$sql" , time());

			$this->db->sql_query($sql);

		}
		// User does not exist in the table let's add him.
		else
		{
			$this->log->add('admin', 54 , '127.0.0.1', 'new user... inserting' , time());

			$insert_arr = array(
				'user_id'            => $user['user_id'],
				'username'           => $user['username'],
				'remind_counter'     => 1,
				'previous_sent_date' => 0,
				'reminder_sent_date' => time(),
			);

			$sql = 'INSERT INTO ' . $this->table_prefix . $this->table_name . $this->db->sql_build_array('INSERT', $insert_arr);
			$this->log->add('admin', 54 , '127.0.0.1', "$sql" , time());
			$this->db->sql_query($sql);
		}
	}

	/**
	 * @param $user_id, used to search in ium_reminder if exist
	 * @return bool
	 */

	private function user_exist($user_id){

		$this->log->add('admin', 54 , '127.0.0.1', 'Checking if user exist in custome table...' , time());

		$sql = 'SELECT COUNT(user_id) as user_count
        FROM ' . $this->table_prefix.$this->table_name . '
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
			'user_id'    => $user_id,
		);

		// Create the SQL statement
		$sql = 'SELECT username, remind_counter, previous_sent_date, reminder_sent_date, dont_send 
        FROM ' . $this->table_prefix.$this->table_name . ' 
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
}
