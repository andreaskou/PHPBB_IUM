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

class release_1_1_0 extends migration
{

	private $schema_name='ium_reminder';

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '1.1.0', '>=');
	}

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\release_0_9_9');
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
        )
      ),
    );
  }

	public function update_data()
	{
		return array(
				array('config.update', array('andreask_ium_version',				'1.1.0'))
		);
	}
}
