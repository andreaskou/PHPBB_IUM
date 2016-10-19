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
	protected $log;				/** Log class for logging informatin */
	protected $table_name;		/** Custome table for ease of use */

	public function __construct(\phpbb\db\driver\driver_interface $db, \phpbb\log\log $log, $ium_reminder_table)
	{
		$this->db				=	$db;
		$this->log				=	$log;
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
			$sql = 'SELECT user_id from ' . USERS_TABLE . ' where username ="' . $this->db->sql_escape($user) . '"';
			$result = $this->db->sql_query($sql);

			// For any user that was not found, store them.
			if (!$id = $this->db->sql_fetchrow($result))
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
		// Group ids that should be always ignored by the ext
		$group_ids = [1,4,5,6];

		/**
		*	We have to check if the given users exist or not in custome table 'ium_reminder'
		*	This is done by doing left join USERS_TABLE and ium_reminder. and selecting users
		*	that are null (don't exist) on ium_reminder.
		*/
		$sql_array = array(
			'SELECT'	=> 'u.user_id, u.username',
			'FROM'		=> array(
				USERS_TABLE =>	'u',
				),
			'LEFT_JOIN' => array(
				array(
					'FROM'	=> array($this->table_name	=>	'r'),
					'ON'	=>	'u.user_id = r.user_id',
					)
				),
			'WHERE'	=> $this->db->sql_in_set('u.username', $username ) .
			' AND ' . $this->db->sql_in_set('u.group_id', $group_ids, true) .
			' AND r.username is null');

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
	 *
	 *	Function insert_user Inserts "new" users to table ium_reminder
	 *	@param array of user(s) with id and username
	 *	@return null
	 *
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
	 *
	 *	Function update_user Updates existing users to table ium_reminder
	 *	@param $user array of user(s) username
	 *	@param $action bool true for ignore false for don't ignore.
	 *	@return null
	 *
	 */

	public function update_user($user, $action, $user_id = false)
	{
		// NOTE is this redundant???
		$username = ($user_id === true) ? array_shift($this->get_user_username($user)) : $user;
		$dont_send = $action ? 1 : 0;

		$data = array ('dont_send' => $dont_send);
		$sql = 'UPDATE ' . $this->table_name . '
				SET ' . $this->db->sql_build_array('UPDATE', $data) . '
				WHERE username = "' . $username . '"';
		$this->db->sql_query($sql);
	}

	/**
	 *
	 * Getter for username
	 * @param user_id
	 * @return username
	 *
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
}
