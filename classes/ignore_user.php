<?php

namespace andreask\ium\classes;

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

class ignore_user
{
	protected $db; 				/** DBAL driver for database use */
	protected $config_text;		/** Db config text	*/
	protected $log;				/** Log class for logging informatin */
	protected $auth;			/** Auth class to get admins and mods */
	protected $table_name;		/** Custome table for ease of use */

	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\config\db_text $config_text, \phpbb\auth\auth $auth, \phpbb\log\log $log, $ium_reminder_table)
	{
		$this->db				=	$db;
		$this->log				=	$log;
		$this->auth				=	$auth;
		$this->config_text		=	$config_text;
		$this->table_name		=	$ium_reminder_table;
	}

	/**
	 *	Check if user exist in phpbb users table
	 *	@return mixed true if all users found or array of users that was not found.
	 */

	public function exist($users)
	{
		$user_list = [];
		$not_exist = [];
		$user_count = 0;
		$not_exist_count = 0;

		foreach ($users as $user)
		{
			$sql = 'SELECT user_id, username FROM ' . USERS_TABLE . " WHERE username = '" . $this->db->sql_escape($user) . "'";
			$result = $this->db->sql_query($sql);
			$user_fetch = $this->db->sql_fetchrow($result);

			// For any user that was not found, store them.
			if (!$user_fetch)
			{
				$not_exist[$not_exist_count]['username'] = $user;
				$not_exist_count++;
			}
			else if ($user !== $user_fetch['username'])
			{
				$not_exist[$not_exist_count]['username'] = $user;
				$not_exist_count++;
			}

			$this->db->sql_freeresult($result);
		}
		if ($not_exist)
		{
			return $not_exist;
		}
		return true;
	}

	/**
	 *  function ignore_user updates Custome table with existing or new users (in table).
	 *	with the dont_send flag so they will be ignored by the reminder.
	 *	@param	$username, array of username(s)
	 *	@return	null
	 */

	public function ignore_user($username)
	{
		/**
		*	We have to check if the given users exist or not in custome table 'ium_reminder'
		*	This is done by doing left join USERS_TABLE and ium_reminder. and selecting users
		*	that are null (don't exist) on ium_reminder.
		*/
		$sql_array = array(
			'SELECT'	=> 'p.user_id, p.username',
			'FROM'		=> array(
				USERS_TABLE =>	'p',
				),
			'LEFT_JOIN' => array(
				array(
					'FROM'	=> array($this->table_name	=>	'r'),
					'ON'	=>	'p.user_id = r.user_id',
					)
				),
			'WHERE'	=> $this->db->sql_in_set('p.username', $username ) . $this->ignore_groups()
			. ' AND r.username is null');

		$sql = $this->db->sql_build_query('SELECT', $sql_array);
		$result = $this->db->sql_query($sql);
		$rows = [];

		// Store in an array.
		while ($row = $this->db->sql_fetchrow($result))
		{
			$rows[] = $row;
		}

		// Always free the results
		$this->db->sql_freeresult($result);
		$clean = '';

		// If there are users that do not exist insert them.
		if ($rows)
		{
			foreach ($rows as $key => $user)
			{
				// Also store them for later.
				$clean[] = $user['username'];
				$this->insert_user($user);
			}
			// Remove the users that we just inserted to the table from the users array.
			$clean = array_diff($username, $clean);
		}

		// If there are any users left and since they already exist, update them
		if (!empty($clean))
		{
			foreach ($clean as $user)
			{
				$this->update_user($user, true);
			}
		}
		// if the above situation did not ocured just update, since all the users exist already.
		else
		{
			foreach ($username as $user)
			{
				$this->update_user($user, true);
			}
		}
	}

	/**
	*	Inserts "new" users to table ium_reminder
	*	@param	array		User(s) with id and username
	*	@return void
	*/
	private function insert_user($user)
	{
		$insert_arr = array(
				'user_id' => $user['user_id'],
				'username' => $this->db->sql_escape($user['username']),
				'dont_send' => 1,
			);

		$sql = 'INSERT INTO ' . $this->table_name . ' ' .$this->db->sql_build_array('INSERT', $insert_arr);
		$this->db->sql_query($sql);
	}

	 /**
	  * Function Updates dont_sent field on existing users on table ium_reminder
	  *
	  * @param  array  		$user	Usernames
	  * @param  boolean		$action  true for set user to ignore false for unset ignore
	  * @param  boolean 	$user_id use user_id instead of username
	  * @return void
	  */
	public function update_user($user, $action, $user_id = false)
	{
		if ($user_id)
		{
			$username = $this->get_user_username($user);
		}
		$username = ($user_id) ? array_shift($username) : $user;
		$dont_send = $action ? 1 : 0;

		$data = array ('dont_send' => $dont_send);
		$sql = 'UPDATE ' . $this->table_name . '
				SET ' . $this->db->sql_build_array('UPDATE', $data) . '
				WHERE username = "' . $username . '"';
		$this->db->sql_query($sql);
	}

	/**
	 * Getter for username
	 * @param string user_id
	 * @return string username
	 */
	private function get_user_username($id)
	{
		$sql_array = array('user_id' => $id);
		$sql = 'SELECT USERNAME FROM ' . $this->table_name . ' WHERE user_id = ' . (int) $id;
		$result = $this->db->sql_query($sql);
		$row = $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $row;
	}

	/**
	 * Returns a comlete string of user_type and user_id that should be ignored by the queries.
	 * @return string Complete ignore statement for sql
	 */
	public function ignore_groups()
	{
		// Get administrator user_ids
		$administrators = $this->auth->acl_get_list(false, 'a_', false);
		$admin_ary = (!empty($administrators[0]['a_'])) ? $administrators[0]['a_'] : array();

		// Get moderator user_ids
		$moderators = $this->auth->acl_get_list(false, 'm_', false);
		$mod_ary = (!empty($moderators[0]['m_'])) ? $moderators[0]['m_'] : array();

		// Merge them together
		$admin_mod_array = array_unique(array_merge($admin_ary, $mod_ary));

		// Ignored group_ids
		$ignore = $this->config_text->get('andreask_ium_ignored_groups', '');
		$ignore = json_decode($ignore);
		if (!empty($ignore))
		{
			$ignore = ' AND ' . $this->db->sql_in_set('p.group_id', $ignore, true);
		}
		else
		{
			$ignore = '';
		}

		// Make an array of user_types to ignore
		$ignore_users_extra = array(USER_FOUNDER, USER_IGNORE);

		$text = ' AND '				. $this->db->sql_in_set('p.user_type', $ignore_users_extra, true) .'
				  AND '				. $this->db->sql_in_set('p.user_id', $admin_mod_array, true) . '
				  AND p.user_id > ' . ANONYMOUS . $ignore;

		return $text;
	}

	public function get_groups($user_id)
	{
		$sql = 'SELECT group_id FROM ' . USER_GROUP_TABLE . '
				WHERE user_id = ' . $user_id;

		$result = $this->db->sql_query($sql);

		$group_ids = [];
		while ($row = $this->db->sql_fetchrow($result))
		{
			$group_ids[] = $row['group_id'];
		}

		$this->db->sql_freeresult($result);

		return $group_ids;
	}
}
