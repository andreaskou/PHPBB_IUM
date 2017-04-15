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
use phpbb\config;

class release_0_9_9 extends \phpbb\db\migration\container_aware_migration
{

	private $schema_name='ium_reminder';

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.9', '>=');
	}

	static public function depends_on()
	{
		return array('\andreask\ium\migrations\release_0_9_6');
	}

	public function update_data()
	{
		$group_ids = array();
		return array(
				array('config.update', array('andreask_ium_version',				'0.9.9')),
				array('config_text.add', array('andreask_ium_ignored_groups', '')),
				array('custom',
					array(
						array(
							$this, 'convert_ignore_user_list_to_json_serial')
						)),
		);
	}


	public function convert_ignore_user_list_to_json_serial()
	{
		$config_text = $this->container->get('config_text');
		$user_ignore_list = $config_text->get('andreask_ium_ignore_forum');
		if ($user_ignore_list)
		{
			var_dump($user_ignore_list);
		}
	}
}
