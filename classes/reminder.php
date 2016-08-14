<?php

namespace andreask\ium\classes;

use phpbb\log\null;

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

	public function get_users($limit = null){

		$limit = ($limit) ? 'limit '.(int) $limit : '';


		$table_name = $this->table_prefix . 'ium_reminder';

		$sql = 'SELECT p.username, p.user_email, p.user_lang, p.user_dateformat, p.user_regdate, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.remind_counter, r.previous_sent_date, r.reminder_sent_date, r.dont_send
			FROM ' . USERS_TABLE . ' p
			LEFT OUTER JOIN ' . $table_name . ' r
			ON (p.user_id = r.user_id) 
			WHERE p.user_id not in (SELECT ban_userid FROM ' . BANLIST_TABLE . ') 
			AND p.group_id NOT IN (1,4,5,6) 
			AND from_unixtime(p.user_regdate) < DATE_SUB(NOW(), INTERVAL '.$this->config['andreask_ium_interval'] .' DAY) order by p.user_regdate asc '.$limit;

		var_export($sql);

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
        return (bool) sizeof($this->inactive_users);
    }

	/**
	 * Setter for $inactive_users
	 * @param $inactive_users
	 */

    public function set_users($inactive_users)
    {
    	$this->inactive_users = $inactive_users;
    }


	/**
	 *
	 * Send email depending on the list of $inactive_users
	 *
	 */
    public function send()
    {
    	$this->get_users(10);
    	if ($this->has_users())
	    {
		    if (!class_exists('messenger'))
		    {
			    include($this->phpbb_root_path . 'includes/functions_messenger.' . $this->php_ext);
		    }

		    echo date("H:i:s")."<br/>";
		    foreach ($this->inactive_users as $sleeper)
			{
				$lang = ($sleeper['user_lang'] == 'en') ? $sleeper['user_lang'] : 'en';
				$server_url = generate_board_url();
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

				if ($sleeper['user_lastvisit'] != 0)
				{
					$messenger->template('@andreask_ium/sleeper', $lang);
					$messenger->subject('We\'ve missed you!');
					$messenger->assign_vars($template_ary);
				}
				else
				{
					$messenger->template('@andreask_ium/inactive', $lang);
					$messenger->subject('Hello!');
					$messenger->assign_vars($template_ary);
				}
				$messenger->send();
//				$messenger->save_queue();
			}
		}
    }
}
