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

namespace andreask\ium\migrations;

use phpbb\db\migration\migration;

/**
 * Add needed data to database of phpbb
 */

class add_data extends migration
{

	private $schema_name='ium_reminder';

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	// public function effectively_installed()
	// {
	// 	return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.0', '>=');
	// }

	public function update_data()
	{
		return array(
			array('config.add', array('andreask_ium_enable', 0)),
			array('config.add', array('andreask_ium_interval', 30)),
			array('config.add', array('andreask_ium_top_user_threads', 0)),
			array('config.add', array('andreask_ium_top_user_threads_count', 5)),
			array('config.add', array('andreask_ium_top_forum_threads', 0)),
			array('config.add', array('andreask_ium_top_forum_threads_count', 5)),
			array('config.add', array('andreask_ium_email_limit', 250)),
			array('config.add', array('andreask_ium_self_delete', 0)),
			// 0.9.0
			array('config.add', array('andreask_ium_version',   '1.1.0')),
			array('config.add', array('andreask_ium_keep_posts',    1)),
			array('config.add', array('andreask_ium_approve_del',   1)),
			// 0.9.1
			array('config.add', array('andreask_ium_auto_del',		0)),
			array('config.add', array('andreask_ium_auto_del_days', 7)),
			// 0.9.6
			array('config_text.add', array('andreask_ium_ignore_forum',	'[]')),
			// 0.9.9
			array('config_text.add', array('andreask_ium_ignored_groups', '[]')),

			// cron config
			array('config.add', array('send_reminder_last_gc', 0, true)),
			array('config.add', array('send_reminder_gc', (60 * 60 * 24))),
			array('config.add', array('reminder_limit', 250)),
			// Initial table population.
			// array('custom',
			// 	array(
			// 		array(
			// 			$this, 'first_time_install'))),
			);
	}

	public function update_schema()
  {
    return array(
      'add_columns' => array(
				$this->table_prefix . PHPBB_USERS => array(
          'ium_remind_counter' => array('UINT', 0),
          'ium_previous_sent_date' => array('TIMESTAMP', 0),
          'ium_reminder_sent_date' => array('TIMESTAMP', 0),
          'ium_dont_send' => array('UINT', 0),
					'ium_request_date'	=> array('TIMESTAMP', 0),
					'ium_random'	=> array('VCHAR:255', 0),
          'ium_type'	=> array('VCHAR:10', ''),
					'ium_request_date'	=> array('TIMESTAMP', 0),
					'ium_request_type'	=> array('VCHAR:10', ''),
					'ium_random'	=> array('VCHAR:255', 0),

				),
			),
    );
  }

	public function revert_schema()
	{
		return array(
			'drop_columns' => array(
				$this->table_prefix . PHPBB_USERS => array(
					'ium_remind_counter',
					'ium_previous_sent_date',
					'ium_reminder_sent_date',
					'ium_dont_send',
					'ium_request_date',
					'ium_random',
					'ium_type',
					'ium_request_date',
					'ium_request_type',
					'ium_random',
				),
			),
		);
	}

	// public function first_time_install()
	// {
	// 	global $phpbb_container;
	//
	// 	if ( !$this->has_users() )
	// 	{
	// 		if ( $this->db_tools->sql_table_exists( $this->table_prefix . $this->schema_name ) )
	// 		{
	// 			// Current date
	//
	// 			$ignore_groups = $phpbb_container->get('auth');
	//
	// 			// Get administrator user_ids
	// 			$administrators = $ignore_groups->acl_get_list(false, 'a_', false);
	// 			$admin_ary = (!empty($administrators[0]['a_'])) ? $administrators[0]['a_'] : array();
	//
	// 			// Get moderator user_ids
	// 			$moderators = $ignore_groups->acl_get_list(false, 'm_', false);
	// 			$mod_ary = (!empty($moderators[0]['m_'])) ? $moderators[0]['m_'] : array();
	//
	// 			// Merge them together
	// 			$admin_mod_array = array_unique(array_merge($admin_ary, $mod_ary));
	//
	// 			// Make an array of user_types to ignore
	// 			$ignore_users_extra = array(USER_FOUNDER, USER_IGNORE);
	//
	// 			$sql = 'INSERT INTO ' . $this->table_prefix . $this->schema_name . ' (user_id, username)
	// 			SELECT user_id, username FROM ' . USERS_TABLE . ' p
	// 			WHERE '. $this->db->sql_in_set('p.user_type', $ignore_users_extra, true) .'
	// 			AND '. $this->db->sql_in_set('p.user_id', $admin_mod_array, true) . '
	// 			AND p.user_id > ' . ANONYMOUS;
	//
	// 			$result = $this->sql_query($sql);
	// 		}
	// 	}
	// }

	// private function has_users()
	// {
	// 	$result = $this->db->get_row_count($this->table_prefix . $this->schema_name);
	// 	return (bool) $result;
	// }
}
