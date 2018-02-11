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

namespace andreask\ium\controller;

class main
{
	/**
	 *
	 * Main class for self deletion of inactive users
	 *
	 */

	protected $config;
	protected $db;
	protected $user;
	protected $request;
	protected $helper;
	protected $template;
	protected	$delete_user;
	protected $table_name;
	protected $u_action;

	public function __construct(\phpbb\config\config $config, \phpbb\db\driver\driver_interface $db, \phpbb\user $user, \phpbb\request\request $request, \phpbb\controller\helper $helper, \phpbb\template\template $template, \andreask\ium\classes\delete_user $delete_user, $ium_table)
	{
		$this->config       =   $config;
		$this->db           =   $db;
		$this->user         =   $user;
		$this->request      =   $request;
		$this->helper       =   $helper;
		$this->template     =   $template;
		$this->delete_user	=		$delete_user;
		$this->container    =   $container;
		$this->table_name   =   $ium_table;
		$this->u_action     =   append_sid(generate_board_url() . '/' . $this->user->page['page']);
	}

	public function handle($random)
	{
		$this->user->add_lang_ext('andreask/ium', 'user_self_delete_page');

		if ($this->config['andreask_ium_enable'] == 0 || $this->config['andreask_ium_self_delete'] == 0)
		{
			return $this->helper->error($this->user->lang('PAGE_NOT_EXIST'), 404);
		}

		// Check to see if user is logged in.
		if ($this->user->data['user_id'] == ANONYMOUS)
		{
			return $this->helper->error(login_box('', $this->user->lang('HAVE_TO_LOGIN')), 403);
		}

		if (! $this->user_check( $this->user->data['user_id'], $random ) )
		{
			return $this->helper->error($this->user->lang('INVALID_LINK_OR_USER'), 403);
		}

		$form_key = 'andreask_ium';
		add_form_key($form_key);

		// The form get submited...
		if ($this->request->is_set_post('submit') )
		{
			if ( !check_form_key($form_key) )
			{
				$this->helper->error($this->user->lang('FORM_INVALID') . $this->usr_back_link( $this->u_action ), 403);
			}
			// Make sure confirm is selected
			if ( $this->request->variable('self_delete_verify', '') != 1)
			{
				return $this->helper->message($this->user->lang('HAVE_TO_VERIFY') . $this->usr_back_link( $this->u_action ));
			}

			// Request to delete user...
			$delete_me = $this->delete_user;
			$delete_me->delete($this->user->data['user_id'], 'user');

			// log out user.
			$board_url = generate_board_url(). '/ucp.php?mode=logout&sid='. $this->user->session_id;
			$message = ($this->config['andreask_ium_approve_del']) ? $this->user->lang('NEEDS_APPROVAL', htmlspecialchars_decode($this->config['sitename'])) : $this->user->lang('USER_SELF_DELETE_SUCCESS', htmlspecialchars_decode($this->config['sitename']));

			// meta_refresh (redirect) has to run before return because after return nothing is going to run...
			meta_refresh(5, $board_url );

			return $this->helper->message( $this->user->lang( $message ));
		}

		$this->template->assign_vars(array(
					'RANDOM'    => $random,
					'U_ACTION'  => $this->u_action
				));

		return $this->helper->render('ium_user_remove.html', $this->user->lang('USER_SELF_DELETE_TITLE'));
	}

	private function user_check($user, $random)
	{

		$sql_arr = array(
			'user_id'   => (int) $user,
			'random'    =>  $random
		);

		$sql = 'SELECT user_id, random
				FROM ' . $this->table_name . '
				WHERE ' . $this->db->sql_build_array('SELECT', $sql_arr);
		$result = $this->db->sql_query($sql);
		$valid = (bool) $this->db->sql_fetchrow($result);
		$this->db->sql_freeresult($result);

		return $valid;
	}

	private function usr_back_link($u_action)
	{
		return '<br /><br /><a href="' . $u_action . '">&laquo; ' . $this->user->lang['BACK_TO_PREV'] . '</a>';
	}
}
