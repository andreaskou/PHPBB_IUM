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

namespace andreask\ium\acp;

class main_info {

	public function module()
	{
		return array(
			'filename'	=>	'\andreask\ium\acp\main_module',
			'title'		=>	'ACP_IUM_TITLE',
			'version'	=>	'1.0.0',
			'modes'		=>	array(
				'ium_settings'	=>	array(
					'title'		=>	'ACP_IUM',
					'auth'		=>	'ext_andreask/ium && acl_a_board',
					'cat'		=>	array('ACP_IUM_TITLE'),
					),
				'ium_list'	=>	array(
					'title'	=>	'ACP_IUM_LIST',
					'auth'	=>	'ext_andreask/ium && acl_a_board',
					'cat'	=>	array('ACP_IUM_TITLE'),
					),
				)
			);
	}
}
