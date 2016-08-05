<?php
/**
 *
 * This file is part of the phpBB Forum Software package.
 *
 * @copyright (c) phpBB Limited <https://www.phpbb.com>
 * @license GNU General Public License, version 2 (GPL-2.0)
 *
 * For full copyright and license information, please see
 * the docs/CREDITS.txt file.
 *
 */

namespace andreask\ium\migrations;

use phpbb\db\migration\migration;

class add_module extends migration
{
	public function effectively_installed()
	{
		return isset($this->config['andreask_ium_enable']);
	}
	
	static public function depends_on()
    {
        return array('\phpbb\db\migration\data\v31x\v314');
    }

    public function update_data()
    {
    	return array(
    		array('config.add',	array('andreask_ium_enable', 0)),

    		array('module.add',	array(
    			'acp',
    			'ACP_CAT_DOT_MODS',
    			'ACP_IUM_TITLE'
    			)),
            
    		array('module.add',	array(
    			'acp',
    			'ACP_IUM_TITLE',
    			array('module_basename'		=>	'\andreask\ium\acp\main_module',
    				  'modes'		=>	array('ium_settings','ium_list'),
    				  ),
    			)),
    		);
    }
}