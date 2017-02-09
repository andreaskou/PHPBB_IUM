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

class release_0_9_6 extends migration
{

	private $schema_name='ium_reminder';

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.7', '>=');
	}

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\release_0_9_1');
	}

	public function update_data()
	{
		return array(
				array('config.add', array('andreask_ium_version',				'0.9.8')),
				array('config_text.add', array('andreask_ium_ignore_forum',	'')),
		);
	}
}
