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
    private $schema_name = 'ium_reminder';

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
		array('config.add', array('andreask_ium_interval', 30)),
		array('config.add', array('andreask_ium_top_user_threads', 0)),
		array('config.add', array('andreask_ium_top_user_threads_count', 5)),
		array('config.add', array('andreask_ium_top_forum_threads', 0)),
		array('config.add', array('andreask_ium_top_forum_threads_count', 5)),
		array('config.add', array('andreask_ium_email_limit', 250)),
		array('config.add', array('andreask_ium_self_delete', 0)),

		// cron config
		array('config.add', array('send_reminder_last_gc', 0, true)),
		array('config.add', array('send_reminder_gc', 10800 )),
		array('config.add', array('reminder_limit',	250 )),

		// add module
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

		// Initial table population.
		array('custom', array(array($this, 'first_time_install')
		)),

		);
    }

    public function update_schema()
    {
        return array(
            'add_tables'   => array(
                $this->table_prefix . $this->schema_name => array(
                    'COLUMNS'   => array(
                        'id'               		=> array('UINT', null, 'auto_increment'),
                        'user_id'               => array('UINT', 0),
                        'username'              => array('VCHAR', ''),
                        'remind_counter'        => array('UINT', '0'),
                        'previous_sent_date'    => array('TIMESTAMP', 0),
                        'reminder_sent_date'    => array('TIMESTAMP', 0),
                        'dont_send'             => array('UINT', 0),
                        ),
                    'PRIMARY_KEY'   => 'id',
					'KEYS'			=> array(
						'type'			=> array('UNIQUE', array('user_id'))
					),
                ),
            ),
        );
    }

    public function revert_schema()
    {
        return array(
            'drop_table'    =>  array(
                $this->table_prefix . $this->schema_name
            ),
        );
    }

    public function first_time_install(){
    	if (!$this->has_users())
		{
			if ($this->db_tools->sql_table_exists($this->table_prefix . $this->schema_name))
			{
				$sql = 'INSERT INTO ' . $this->table_prefix . $this->schema_name . ' (user_id, username)
					SELECT user_id, username FROM `' . USERS_TABLE . '` u
					WHERE from_unixtime(u.user_lastvisit) < DATE_SUB(NOW(), INTERVAL 30 DAY)
					AND u.group_id NOT IN (1,4,5,6)';
				$result = $this->sql_query($sql);
				$this->db->sql_freeresult($result);
			}
		}
	}

	private function has_users(){
		$result = $this->db->get_row_count($this->table_prefix.$this->schema_name);
		return (bool) $result;
	}
}
