<?php

namespace andreask\ium\migrations;

use phpbb\db\migration\migration;

/**
* This file is part of the phpBB Forum Software package.
*
* @copyright (c) phpBB Limited <https://www.phpbb.com>
* @license   GNU General Public License, version 2 (GPL-2.0)
*
* For full copyright and license information, please see
* the docs/CREDITS.txt file.
*/

class release_0_0_9 extends migration
{

	private $schema_name='ium_reminder';

	public function effectively_installed()
	{
		// return $this->db_tools->sql_column_exists($this->table_prefix . $this->schema_name, 'random');
	}

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\add_module');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('andreask_ium_version',   '0.0.9')),
			array('config.add', array('andreask_ium_keep_posts',    1)),
			array('config.add', array('andreask_ium_approve_del',   1)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns' => array(
				$this->table_prefix . $this->schema_name => array(
					'request_date'	=> array('TIMESTAMP', 0),
					'random'	=> array('VCHAR:255', 0),
				),
			),
		);
	}
}
