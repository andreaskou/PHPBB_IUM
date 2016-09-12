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

    static public function depends_on()
    {
        return array('\andreask\ium\migrations\add_module');
    }

    public function update_data()
    {
        return array(
            array('config.add', array('andreask_ium_version', '0.0.9')),
        );
    }
}
