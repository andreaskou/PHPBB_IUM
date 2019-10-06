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

		$sql = 'SELECT user_id, username FROM '. USERS_TABLE .' WHERE '. $this->db->sql_in_set('username', $users);
		$result = $this->db->sql_query($sql);
		$users_found = $this->db->sql_fetchrowset($result);

		foreach ($users_found as $key => $user)
		{
			if (($key = array_search($user['username'], $users )) !== null)
			{
				unset($users[$key]);
			}
		}

		if ($users)
		{
			return $users;
		}
		return true;
	}

	/**
	 *  function ignore_user updates Custome table with existing or new users (in table).
	 *	with the dont_send flag so they will be ignored by the reminder.
	 *	@param	$username, array of username(s)
	 *	@param	$mode, 1 (default) auto 2 admin
	 *	@return	null
	 */

	public function ignore_user($username, $mode = 1)
	{
		/**
		*	We have to check if the given users exist or not
		*	This is done by looking USERS_TABLE. And selecting users
		*/

		$sql_query = 'SELECT user_id, username
						FROM ' . USERS_TABLE . ' WHERE ' .
						$this->db->sql_in_set('username', $username ) . $this->ignore_groups();

		$result = $this->db->sql_query($sql_query);

		$user = $this->db->sql_fetchrowset($result);
		// Always free the results
		$this->db->sql_freeresult($result);

		$this->update_user($user, $mode);
	}

	 /**
	  * Function Updates dont_sent field on users table
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
		else
		{
			$username = array_column($user, 'username');
		}

		$dont_send = $action;
		$data = array ('ium_dont_send' => $action);
		$sql = 'UPDATE ' . USERS_TABLE . '
				SET ' . $this->db->sql_build_array('UPDATE', $data) . '
				WHERE '. $this->db->sql_in_set('username', $username);

		$this->db->sql_query($sql);
	}

	/**
	 * Getter for username
	 * @param int user_id
	 * @return string username
	 */
	private function get_user_username($id)
	{

		$sql = 'SELECT username
							FROM ' . USERS_TABLE . '
							WHERE ' . $this->db->sql_in_set('user_id', $id);
		$result = $this->db->sql_query($sql);

		$usernames = [];
		while ($row = $this->db->sql_fetchrow($result))
		{
			$usernames[] = $row['username'];
		}
		$this->db->sql_freeresult($result);

		return $usernames;
	}

	/**
	 * Returns a complete string of user_type and user_id that should be ignored by the queries.
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
			$ignore = ' AND ' . $this->db->sql_in_set('group_id', $ignore, true);
		}
		else
		{
			$ignore = '';
		}

		// Make an array of user_types to ignore
		$ignore_users_extra = array(USER_FOUNDER, USER_IGNORE);

		$text = ' AND '	. $this->db->sql_in_set('user_type', $ignore_users_extra, true) .'
				  AND '	. $this->db->sql_in_set('user_id', $admin_mod_array, true) .'
				  AND ' . $this->db->sql_in_set('user_inactive_reason', INACTIVE_MANUAL, true) .' AND user_id > ' . ANONYMOUS . $ignore;

		return $text;
	}

	public function get_groups($user_id)
	{
		$sql = 'SELECT group_id FROM ' . USER_GROUP_TABLE . '
				WHERE user_id = ' . (int) $user_id;

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
