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

class update_120 extends migration
{

	public function update_data()
	{
		return array(
			array('config.add', array('andreask_ium_interval2', 0)),
			array('config.add', array('andreask_ium_interval3', 0)),
			array('config.add', array('andreask_ium_respect_user_choice', 1)),
			array('config.add', array('andreask_ium_ignore_limit', 1)),
			array('config.add', array('andreask_ium_no_reply', '')),
			);
	}

  static public function depends_on()
  {
    return ['andreask\ium\migrations\add_data'];
  }

  public function update_schema()
  {
		return [
			'drop_columns' =>[
				$this->table_prefix . 'users'=>
				['ium_request_type',],
			],
		];
  }
}
