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

class release_0_9_1 extends migration
{

	private $schema_name='ium_reminder';

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\release_0_9_0');
	}

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.5', '>=');
	}

	public function update_data()
	{
		return array(
				array('config.add', array('andreask_ium_version',		'0.9.5')),
				array('config.add', array('andreask_ium_auto_del',		0)),
				array('config.add', array('andreask_ium_auto_del_days', 7)),
		);
	}

	public function update_schema()
	{
		return array(
			'add_columns' => array(
				$this->table_prefix . $this->schema_name => array(
					'type'	=> array('VCHAR:10', '', 'after' => 'request_date'),
				),
			),
		);
	}
}
