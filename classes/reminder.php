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
	protected   $table_prefix;
	protected   $phpbb_root_path;
	protected   $php_ext;

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user_loader $user, $table_prefix, $phpbb_root_path, $php_ext)
	{
		$this->config = $config;
		$this->db = $db;
		$this->user = $user;
		$this->table_prefix = $table_prefix;
		$this->php_ext = $php_ext;
		$this->phpbb_root_path = $phpbb_root_path;
	}

	public function get_users(){

		$table_name = $this->table_prefix . 'ium_reminder';

		$sql = 'SELECT p.username, p.user_regdate, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.remind_counter, r.previous_sent_date, r.reminder_sent_date, r.dont_send
           FROM ' . USERS_TABLE . ' p 
           LEFT OUTER JOIN ' . $table_name . ' r 
           ON (p.user_id = r.user_id)
           WHERE p.user_id not in 
            (SELECT ban_userid FROM ' . BANLIST_TABLE . ')
           AND p.group_id 
           NOT IN (1,4,5,6)' . ' 
           AND from_unixtime(p.user_lastvisit) < DATE_SUB(NOW(), INTERVAL '. $this->config['andreask_ium_interval'] . ' day) 
           ORDER BY p.user_lastvisit DESC';

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

		$this->set_users($inactive_users);
	}

	/**
	 * Check if inactive_users is populated
	 * @return bool returns false if empty.
	 */

    public function has_users()
    {
        return $result = (sizeof($this->inactive_users) > 0) ? $this->inactive_users : false;
    }

	/**
	 * Setter for $inactive_users
	 * @param $inactive_users
	 */

    public function set_users($inactive_users)
    {
    	$this->inactive_users = $inactive_users;
    }


    public function send()
    {
    	$this->get_users();
    	if ($this->has_users())
	    {
		    if (!class_exists('messenger'))
		    {
			    include($this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext);
		    }

		    foreach ($this->inactive_users as $user)
		    {

//                $messenger = new \messenger(false);
//                $server_url = generate_board_url();
//                $messenger->template('@andreask_ium/template', 'en');
//                $messenger->to($user['user_email'], $user['username']);
//                $messenger->assign_vars(array(
//                    'USERNAME' => htmlspecialchars_decode($user['username']),
//                    'LAST_VISIT' => $user['last_visit'],
//                    'ADMIN_MAIL' => 'admin@mail.bla',
//                    'SITE_NAME' => 'This is the signr name!!!',
//                    'URL' => $server_url
//                ));
//                $messenger->send(NOTIFY_EMAIL);
		    }
	    }
    }
}
