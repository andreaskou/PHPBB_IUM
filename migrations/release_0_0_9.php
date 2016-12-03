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

class release_0_0_9 extends migration
{

	private $schema_name='ium_reminder';

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.0', '>=');
	}

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\add_module');
	}

	public function update_data()
	{
		return array(
			array('config.add', array('andreask_ium_version',   '0.9.0')),
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
