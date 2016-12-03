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

class add_module extends migration
{

	private $schema_name='ium_reminder';

	static public function depends_on()
	{
		return array('\phpbb\db\migration\data\v31x\v314');
	}

	public function effectively_installed()
	{
		return phpbb_version_compare($this->config['andreask_ium_version'], '0.9.0', '>=');
	}

	public function update_data()
	{
		return array(
			// add module
			array('module.add', array(
					'acp',
					'ACP_CAT_DOT_MODS',
					'ACP_IUM_TITLE'
					)),
			array('module.add', array(
					'acp',
					'ACP_IUM_TITLE',
					array('module_basename' => '\andreask\ium\acp\main_module',
							'modes' => array('ium_settings', 'ium_list', 'ium_approval_list'),
							),
					)),
		);
	}
}
