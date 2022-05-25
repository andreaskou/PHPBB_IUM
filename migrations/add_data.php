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
			);
	}

  static public function depends_on()
  {
	  return array('\phpbb\db\migration\data\v310\gold');
  }

  public function update_schema()
  {
	  return array(
		  'add_columns' => array(
			  $this->table_prefix . 'users' => array(
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
				$this->table_prefix . 'users' => array(
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

}
