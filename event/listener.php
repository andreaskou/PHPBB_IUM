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

namespace andreask\ium\event;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class listener implements EventSubscriberInterface
{

	protected $log;
	protected $config;
	protected $config_text;
	protected $auth;
	protected $user;

	public function __construct($reminder, $ignore_user, \phpbb\user $user, \phpbb\config\config $config, \phpbb\config\db_text $config_text, \phpbb\auth\auth $auth, \phpbb\log\log $log)
	{
		$this->reminder			= $reminder;
		$this->ignore_user	= $ignore_user;
		$this->user 				=	$user;
		$this->config 			=	$config;
		$this->config_text	=	$config_text;
		$this->auth					=	$auth;
		$this->log					=	$log;
	}

	/**
	 * Subscribe to phpbb events and execute the appropriate scripts.
	 * @return array List of events to subsribe with their represented methods.
	 */
	static public function getSubscribedEvents()
	{
		return array(
			'core.login_box_redirect'				=>	'update_ium_reminder_counter',
			'core.acp_users_display_overview'		=>	'add_remind_user_option',
			'core.acp_users_overview_run_quicktool'	=>	'remind_single_user',
			// 'core.add_log'							=>	'overwrite_log',
		);
	}

	/**
	 * Reset reminder counter if users has returned!
	 * @param  array $event user_id of user to reset the counter for.
	 * @return void
	 */
	public function update_ium_reminder_counter($event)
	{
		// XXX replace container!!!!
		// $update = $this->container->get('andreask.ium.classes.reminder');
		$this->reminder->reset_counter($this->user->data['user_id']);
	}

	/**
	 * Appends new option in quick tools on ACP user overview page.
	 * @param array $event 'option' => 'langugage'.
	 * @return void
	 */
	public function add_remind_user_option($event)
	{
		$user = $event['user_row'];
		$admin = $this->auth->acl_get_list($user['user_id'], 'a_');
		$admin = (!empty($admin[0]['a_'])) ? $admin[0]['a_'] : array();

		$mod = $this->auth->acl_get_list($user['user_id'], 'm_');
		$mod = (!empty($mod[0]['m_'])) ? $mod[0]['m_'] : array();

		$array_merge = array_unique(array_merge($admin, $mod));
		$ignored_groups = $this->config_text->get('andreask_ium_ignored_groups', '[]' );
		$ignored_groups = json_decode($ignored_groups);

		// $ignore = $this->container->get('andreask.ium.classes.ignore_user');
		$group_ids = $this->ignore_user->get_groups($user['user_id']);

		if ($this->config['andreask_ium_enable'] && (empty($array_merge)) && (!array_intersect($group_ids, $ignored_groups)))
		{
			$option = $event['quick_tool_ary'];
			$option['andreask_ium_remind'] = 'ANDREASK_IUM_USERS_OVERVIEW_OPTION';
			$event['quick_tool_ary'] = $option;
		}
	}

	public function remind_single_user($event)
	{
		$action = $event['action'];
		$user[] = $event['user_row'];

		if ($action == 'andreask_ium_remind')
		{
			// $remind = $this->container->get('andreask.ium.classes.reminder');
			$this->reminder->set_single($user);
			$this->reminder->send(1, true);
		}
	}

	public function overwrite_log($event)
	{
		$sql_ary =  $event['sql_ary'];
		// Make sure we are getting the correct log...
		$username = unserialize($sql_ary['log_data']);

		if (!empty($username))
		{
			$username = array_shift($username);
		}
		if ($sql_ary['log_operation'] == 'SENT_REMINDERS' && (is_int($username)) && $username <= 1)
		{
			// unset($sql_ary['log_type']);
			// $event['sql_ary'] = $sql_ary;
			$sql_ary['log_operation'] = 'SENT_REMINDER_TO';
			$event['sql_ary'] = $sql_ary;
		}
	}
}
