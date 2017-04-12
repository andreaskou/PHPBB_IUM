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

namespace andreask\ium\acp;
use DateTime;
use DatePeriod;
use DateInterval;

// use phpbb\log\null;

//use Symfony\Component\DependencyInjection\ContainerInterface;

class main_module
{
	public function main($id, $mode)
	{
		global $user, $template, $request, $config, $phpbb_container, $phpbb_root_path, $phpEx;
		$config_text = $phpbb_container->get('config_text');

		$language = $phpbb_container->get('andreask.ium.classes.language_helper');

		if ($mode == 'ium_settings')
		{
			$this->tpl_name 	= 'acp_ium_body';
			$this->page_title 	= $language->lang('ACP_IUM_TITLE');
			// $this->page_title 	= $user->lang('ACP_IUM_TITLE');

			$form_key = 'andreask_ium';

			add_form_key($form_key);

			// Send sleeper template to admin
			if ($request->is_set_post('send_sleeper'))
			{
				$mail_to_sleeper = $phpbb_container->get('andreask.ium.classes.reminder');
				$mail_to_sleeper->send_to_admin($user->data['user_id'], 'send_sleeper');
				trigger_error($language->lang('SLEEPER_MAIL_SENT_TO', $user->data['user_email']) . adm_back_link( $this->u_action ), E_USER_NOTICE);
				// trigger_error($user->lang('SLEEPER_MAIL_SENT_TO', $user->data['user_email']) . adm_back_link( $this->u_action ), E_USER_NOTICE);
			}
			// Send inactive template to admin
			else if ($request->is_set_post('send_inactive'))
			{
				$mail_to_inactive = $phpbb_container->get('andreask.ium.classes.reminder');
				$mail_to_inactive->send_to_admin($user->data['user_id'], 'send_inactive');
				trigger_error($language->lang('INACTIVE_MAIL_SENT_TO', $user->data['user_email']) . adm_back_link( $this->u_action ), E_USER_NOTICE);
				// trigger_error($user->lang('INACTIVE_MAIL_SENT_TO', $user->data['user_email']) . adm_back_link( $this->u_action ), E_USER_NOTICE);
			}
			// Save settings
			if ( $request->is_set_post('submit_settings') )
			{
				// Check form key
				if ( !check_form_key($form_key) )
				{
					trigger_error($language->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
					// trigger_error($user->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				// If everything is OK store the setting
				$this->update_config();
				trigger_error($language->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
				// trigger_error($user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
			}
			// Exclude forum(s)
			if ( $request->is_set_post('exclude_forum') )
			{
				// Check form key
				if ( !check_form_key($form_key) )
				{
					trigger_error($language->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
					// trigger_error($user->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				if ( $request->variable('subforum_id', '') == null )
				{
					trigger_error($language->lang('SELECT_A_FORUM'). adm_back_link( $this->u_action ), E_USER_WARNING);
					// trigger_error($user->lang('SELECT_A_FORUM'). adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				$already_excluded_forums_array = unserialize($config_text->get('andreask_ium_ignore_forum', ''));
				$new_forum_array = $this->sweap_sforums($request->variable('subforum_id', ''));

				if (!empty($already_excluded_forums))
				{
					$merge_forums = array_merge($already_excluded_forums, $new_forum_array);
					$config_text->set('andreask_ium_ignore_forum', serialize($merge_forums));
				}
				else
				{
					$config_text->set('andreask_ium_ignore_forum', serialize($new_forum_array));
				}
			}
			// Include forum(s)
			if ( $request->is_set_post('include_forum'))
			{
				if ( !check_form_key($form_key) )
				{
					trigger_error($language->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
					// trigger_error($user->lang('FORM_INVALID'). adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				if ( $request->variable('excluded_forum', '') == null )
				{
					trigger_error($language->lang('SELECT_A_FORUM'). adm_back_link( $this->u_action ), E_USER_WARNING);
					// trigger_error($user->lang('SELECT_A_FORUM'). adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				$remove_array 		= $this->sweap_sforums($request->variable('excluded_forum',''));
				$conf_text_array 	= unserialize($config_text->get('andreask_ium_ignore_forum',''));
				$new_conf_array 	= array_diff( $conf_text_array, $remove_array);
				$new_conf_text 		= serialize($new_conf_array);
				$config_text->set('andreask_ium_ignore_forum', $new_conf_text);
			}

			// To get the forum list we have to include functions_admin
			include_once $phpbb_root_path . "includes/functions_admin." . $phpEx;
			$ignore_id = unserialize($config_text->get('andreask_ium_ignore_forum', ''));
			// Get the forum list
			$forum_list = make_forum_select(false, $ignore_id, true, false, false, false, true);
			// Build option list from forums list
			$included_forum_list = $this->build_subforum_options($forum_list);
			// Get the excluded list, if not exist show somethin else instead.
			$excluded_list = (array_filter($ignore_id)) ? $this->make_excluded_forums_list($ignore_id) : '<option disabled>' .$language->lang('EXCLUDED_EMPTY') . '</option>';

			$template->assign_vars(array(
				'ANDREASK_IUM_ENABLE'					=>	$config['andreask_ium_enable'],
				'ANDREASK_IUM_INTERVAL'					=>	$config['andreask_ium_interval'],
				'ANDREASK_IUM_TOP_USER_THREADS'			=>	$config['andreask_ium_top_user_threads'],
				'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	$config['andreask_ium_top_user_threads_count'],
				'ANDREASK_IUM_TOP_FORUM_THREADS'		=>	$config['andreask_ium_top_forum_threads'],
				'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	$config['andreask_ium_top_forum_threads_count'],
				'ANDREASK_IUM_EMAIL_LIMIT'				=>	$config['andreask_ium_email_limit'],
				'ANDREASK_IUM_SELF_DELETE'				=>	$config['andreask_ium_self_delete'],
				'ANDREASK_IUM_APPROVE_DEL'				=>	$config['andreask_ium_approve_del'],
				'ANDREASK_IUM_KEEP_POSTS'				=>	$config['andreask_ium_keep_posts'],
				'ANDREASK_IUM_AUTO_DEL'					=>	$config['andreask_ium_auto_del'],
				'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	$config['andreask_ium_auto_del_days'],
				'ANDREASK_IUM_TEST_EXPLAIN'				=>	$language->lang('ANDREASK_IUM_TEST_EMAIL_EXPLAIN', $user->data['user_email']),
				'ANDREASK_IUM_EXCLUDE_FORUMS'			=>	$included_forum_list,
				'ANDREASK_IUM_UNEXCLUDE_LIST'			=>	$excluded_list,
			));
		}

		if ($mode == 'ium_list')
		{
			$this->tpl_name = 'acp_ium_inactive_users';
			$this->page_title = $language->lang('ACP_IUM_TITLE2');
			$user->add_lang('memberlist');

			$start 		= $request->variable('start', 0);
			$limit 		= $request->variable('users_per_page', 10);
			$with_posts = $request->variable('with_posts', 0);
			$actions 	= $request->variable('count_back', '30d');
			if ($actions == 'select')
			{
				$actions = '30d';
			}
			$sort_by = $request->variable('sort_by', 'reg_date');
			$sort_order = $request->variable('sort_order', 0);

			// Keep the limit between 10 and 50
			if ($limit > 50)
			{
				$limit = 50;
			}
			else if ($limit < 10)
			{
				$limit = 10;
			}

			// get the options to an array so that we pass them to the sql query
			$options = array(
				'with_posts'	=>	$with_posts,
				'count_back'	=>	$actions,
				'sort_by'		=>	$sort_by,
				'sort_order'	=>	$sort_order,
				'approval'		=>	null,
				'ignore'		=>	false
			);

			//base url for pagination, filtering and sorting
			$base_url = $this->u_action 	. "&amp;users_per_page="	. $limit
											. "&amp;with_posts=" 		. $with_posts
											. "&amp;count_back=" 		. $actions
											. "&amp;sort_by=" 			. $sort_by
											. "&amp;sort_order=" 		. $sort_order;

			// Long list probably should make shorter.
			// IDEA perhaps just set number of days insted of this?
			$option_ary = array(
				'select'	=> 'SELECT',
				'30d' 		=> 'THIRTY_DAYS',
				'60d' 		=> 'SIXTY_DAYS',
				'90d' 		=> 'NINETY_DAYS',
				'4m' 		=> 'FOUR_MONTHS',
				'6m' 		=> 'SIX_MONTHS',
				'9m' 		=> 'NINE_MONTHS',
				'1Y' 		=> 'ONE_YEAR',
				'2Y' 		=> 'TWO_YEARS',
				'3Y' 		=> 'THREE_YEARS',
				'5Y' 		=> 'FIVE_YEARS',
				'7Y' 		=> 'SEVEN_YEARS',
				'10Y' 		=> 'DECADE',
			);

			// Sort by element
			$sort_by_ary = array(
				'select' 				=> 'SORT_BY_SELECT',
				'username' 				=> 'USERNAME',
				'posts' 				=> 'POSTS',
				'reg_date' 				=> 'JOINED',
				'last_visit' 			=> 'LAST_VISIT',
				'last_sent_reminder'	=> 'LAST_SENT_REMINDER',
				'count' 				=> 'COUNT',
				'reminder_date' 		=> 'REMINDER_DATE',
			);

			// Get the users list using get_inactive_users required parameters $limit $start
			$rows 			= $this->get_inactive_users(true, $limit, $start, $options);
			$inactive_count = $rows['count'];
			$rows 			= $rows['results'];

			// Load pagination
			$pagination = $phpbb_container->get('pagination');
			$start 		= $pagination->validate_start($start, $limit, $inactive_count);
			$pagination->generate_template_pagination($base_url, 'pagination', 'start', $inactive_count, $limit, $start);

			// Assign template vars (including pagination)
			$template->assign_vars(array(
				'S_INACTIVE_USERS' 		=> true,
				'S_INACTIVE_OPTIONS' 	=> build_select($option_ary, $actions),
				'S_IUM_SORT_BY' 		=> build_select($sort_by_ary, $sort_by),
				'COUNT_BACK' 			=> $options['count_back'],
				'PER_PAGE' 				=> $limit,
				'TOTAL_USERS' 			=> $inactive_count,
				'WITH_POSTS' 			=> ($with_posts) ? true : false,
				'SORT_ORDER' 			=> ($sort_order) ? true : false,
				'USERS_PER_PAGE' 		=> $limit,
				'TOTAL_USERS_WITH_DAY'	=> sprintf($language->lang('TOTAL_USERS_WITH_DAY_AMOUNT', $inactive_count, $language->lang($option_ary[$actions])))
			));

			// Assign row results to template var inactive
			foreach ($rows as $row)
			{
				$link = generate_board_url() . "/adm/index.$phpEx?i=users&amp;mode=overview&amp;redirect=ium_approval_list&amp;sid=$user->session_id&amp;u=".$row['user_id'];
				$template->assign_block_vars('inactive', array(
					'USERNAME' 				=> $row['username'],
					'JOINED' 				=> $user->format_date($row['user_regdate']),
					'POSTS' 				=> ($row['user_posts']) ? $row['user_posts'] : 0,
					'LAST_VISIT' 			=> ($row['user_lastvisit']) ? $user->format_date($row['user_lastvisit']) : $language->lang('NEVER_CONNECTED'),
					'INACTIVE_DATE' 		=> ($row['user_inactive_time']) ? $user->format_date($row['user_inactive_time']) : $language->lang('ACP_IUM_NODATE'),
					'REASON' 				=> $language->lang('ACP_IUM_INACTIVE', (int) $row['user_inactive_reason']),
					'COUNT' 				=> ($row['remind_counter']) ? $row['remind_counter'] : $language->lang('NO_REMINDER_COUNT'),
					'LAST_SENT_REMINDER' 	=> ($row['previous_sent_date']) ? $user->format_date($row['previous_sent_date']) : $language->lang('NO_PREVIOUS_SENT_DATE'),
					'REMINDER_DATE' 		=> ($row['reminder_sent_date']) ? $user->format_date($row['reminder_sent_date']) : $language->lang('NO_REMINDER_SENT_YET'),
					'IGNORE_USER' 			=> ($row['dont_send']) ? true : false,
					'LINK_TO_USER'			=> $link,
				));
			}
		}

		if ($mode == 'ium_approval_list')
		{
			global $phpbb_root_path, $phpEx;

			$form_key = 'andreask_ium';
			add_form_key($form_key);

			$this->tpl_name		= 'acp_ium_approval_list';
			$this->page_title	= $language->lang('ACP_IUM_APPROVAL_LIST_TITLE');
			$user->add_lang('memberlist');

			if ( $request->is_set_post('approve') )
			{
				// Check form key
				if ( !check_form_key($form_key) )
				{
					trigger_error($language->lang('FORM_INVALID') . adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				if (empty($_REQUEST['mark']))
				{
					trigger_error($language->lang('NO_USER_SELECTED') . adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				// Else do your magic...
				include_once $phpbb_root_path . "includes/functions." . $phpEx;

				$delete = $phpbb_container->get('andreask.ium.classes.delete_user');
				$mark = (isset($_REQUEST['mark'])) ? $request->variable('mark', array(0)) : array();
				$delete->delete($mark, 'admin');

				trigger_error($language->lang('DELETED_SUCCESSFULLY') . adm_back_link($this->u_action), E_USER_NOTICE);
			}

			if ( $request->is_set_post('add_users_options'))
			{
				// Check form key
				if ( !check_form_key($form_key) )
				{
					trigger_error($language->lang('FORM_INVALID') . adm_back_link( $this->u_action ), E_USER_WARNING);
				}
				if (! $request->variable('usernames', ''))
				{
					trigger_error($language->lang('NO_USER_TYPED') . adm_back_link( $this->u_action ), E_USER_WARNING);
				}

				// Users ingnore list
				$users 	= explode("\n", $request->variable('usernames', '', true));
				// clean emty lines if exist...
				$users 	= array_filter($users);
				// trim whipe spaces
				$users 	= array_map('trim', $users);
				// remove doubles if exist...
				$users 	= array_unique($users);

				$ignore = $phpbb_container->get('andreask.ium.classes.ignore_user');

				$result = $ignore->exist($users);
				if ($result === true)
				{
					$ignore->ignore_user($users);
				}
				else
				{
					$not_found = implode(', ', array_map(function($un)
						{
							return $un['username'];
						} , $result));
					trigger_error($language->lang('USER_NOT_FOUND', $not_found) . adm_back_link( $this->u_action ), E_USER_WARNING);
				}
			}

			if ( $request->is_set_post('ignore'))
			{
				$user_ids 	= $request->variable('user_id', array(0));
				$remove 	= $phpbb_container->get('andreask.ium.classes.ignore_user');

				foreach ($user_ids as $id)
				{
						$remove->update_user($id, false, true);
				}
			}

			// Group ignore list
			$groups 		= $this->get_groups();
			$ignored_groups = $config_text->get('andreask_ium_ignored_groups');
			$s_defined_group_options = '';

			foreach ($groups as $group)
			{
				$group_name = ($language->lang($group['group_name'])) ? $language->lang($group['group_name']) : $group['group_name'];
				$selected = '';
				if ($ignored_groups != null)
				{
					$selected = (in_array($group['group_id'], unserialize($ignored_groups))) ? ' selected="selected" ' : '';
				}

				$s_defined_group_options .= '<option value="' . $group['group_id'] . '"'. $selected .'>' . $group_name . '</option>';
			}

			if ( $request->is_set_post('ignore_group'))
			{
				$group_ids 		= $request->variable('group_id', array(0));

				if ($group_ids != 0)
				{
					$ignore_groups 	= serialize($group_ids);
					$config_text->set('andreask_ium_ignored_groups', $ignore_groups);
					trigger_error($language->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
				}
			}

			$start = $request->variable('start', 0);
			$limit = $request->variable('users_per_page', 10);

			// get the options to an array so that we pass them to the sql query
			$options = array(
				'with_posts'	=>	false,
				'count_back'	=>	false,
				'sort_by'		=>	'request_date',
				'sort_order'	=>	false,
				'approval'		=>	true,
				'ignore'		=>	false,
			);

			//base url for pagination, filtering and sorting
			$base_url = $this->u_action . "&amp;users_per_page=" . $limit;

			// Get the users list for delition using get_inactive_users
			$rows = $this->get_inactive_users(true, $limit, $start, $options);
			$approval_count = $rows['count'];
			$rows = $rows['results'];

			$opt_out = array(
				'with_posts'	=> false,
				'count_back'	=> false,
				'sort_by'		=> 'username',
				'sort_order'	=> true,
				'approval'		=> false,
				'ignore'		=> true,
			);

			$ignored 				= $this->get_inactive_users(false, $limit, $start, $opt_out);
			$ignored_count 			= $ignored['count'];
			$ignored 				= $ignored['results'];
			$s_defined_user_options = '';

			foreach ($ignored as $ignored_user)
			{
				$s_defined_user_options .= '<option value="' . $ignored_user['user_id'] . '">' . $ignored_user['username'] . '</option>';
			}

			// Load pagination
			$pagination = $phpbb_container->get('pagination');
			$start 		= $pagination->validate_start($start, $limit, $approval_count);
			$pagination->generate_template_pagination($base_url, 'pagination', 'start', $approval_count, $limit, $start);

			// Assign template vars (including pagination)
			$template->assign_vars(array(
				'S_SELF_DELETE'		=>	$config['andreask_ium_approve_del'],
				'PER_PAGE'			=>	$limit,
				'TOTAL_USERS'		=>	$approval_count,
				'U_ACTION'			=>	$this->u_action,
				'IGNORED_USER'		=>	$s_defined_user_options,
				'IGNORED_GROUP'		=>	$s_defined_group_options,
				'U_FIND_USERNAME'	=>	append_sid("{$phpbb_root_path}memberlist.$phpEx", 'mode=searchuser&amp;form=add_user&amp;field=usernames')
			));

			foreach ($rows as $row)
			{
				$link = generate_board_url() . "/adm/index.$phpEx?i=users&amp;mode=overview&amp;redirect=ium_approval_list&amp;sid=$user->session_id&amp;u=".$row['user_id'];
				$template->assign_block_vars(
					'approval_list', array(
					'USER_ID'		=>	$row['user_id'],
					'USERNAME'		=>	$row['username'],
					'POSTS'			=>	($row['user_posts']) ? $row['user_posts'] : 0,
					'REQUEST_DATE' 	=>	$user->format_date($row['request_date']),
					'TYPE'			=>	$row['type'],
					'LINK_TO_USER'	=>	$link
				));
			}
		}
	}

	/**
	* Configuration setter
	*/

	protected function update_config()
	{
		global $config, $request;

		$config->set('andreask_ium_enable', 					$request->variable('andreask_ium_enable', ''));
		$config->set('andreask_ium_interval', 					$request->variable('andreask_ium_interval', ''));
		$config->set('andreask_ium_self_delete', 				$request->variable('andreask_ium_self_delete', ''));
		$config->set('andreask_ium_email_limit', 				$request->variable('andreask_ium_email_limit', ''));
		$config->set('andreask_ium_self_delete', 				$request->variable('andreask_ium_self_delete', ''));
		$config->set('andreask_ium_approve_del', 				$request->variable('andreask_ium_delete_approve', ''));
		$config->set('andreask_ium_keep_posts', 				$request->variable('andreask_ium_keep_posts',''));
		$config->set('andreask_ium_auto_del', 					$request->variable('andreask_ium_auto_del',''));
		$config->set('andreask_ium_auto_del_days', 				$request->variable('andreask_ium_auto_del_days',''));
		$config->set('andreask_ium_top_user_threads', 			$request->variable('andreask_ium_top_user_threads', ''));
		$config->set('andreask_ium_top_user_threads_count', 	$request->variable('andreask_ium_top_user_threads_count', ''));
		$config->set('andreask_ium_top_forum_threads', 			$request->variable('andreask_ium_top_forum_threads', ''));
		$config->set('andreask_ium_top_forum_threads_count', 	$request->variable('andreask_ium_top_forum_threads_count', ''));

	}

	/**
	* XXX redundant???
	* Getter for inactive users
	* @param int $limit Used for pagination in sql query to limit the numbers of rows.
	* @param int $start Used for pagination in sql query to say where to start from.
	* @param bool $paginate define if pagination is used or not.
	* @param null $filters Array Used for query to supply extra filters.
	* @return array result of query and total amount of the result.
	*/

	public function get_inactive_users($paginate = true, $limit = null, $start = null, $filters = null)
	{
		return $this->inactive_users(null, $paginate, $limit, $start, $filters);
	}

	/**
	* @param int $limit Used for pagination in sql query to limit the numbers of rows.
	* @param int $start Used for pagination in sql query to say where to start from.
	* @param bool $paginate define if pagination is used or not.
	* @param null $filters Array Used for query to supply extra filters.
	* @return array result of query and total amount of the result.
	*/

	private function inactive_users($type = null, $paginate = true, $limit = null, $start = null, $filters = null)
	{
		global $db, $config, $table_prefix, $phpbb_container;

		if ($filters)
		{
			$ignore 	= 'select';
			$options 	= '';

			if ( $filters['with_posts'] )
			{
				$options .= ' AND p.user_posts <> 0';
			}
			if ( $filters['approval'])
			{
				$options .= ' AND (r.request_date <> 0 OR type in ("user", "auto"))';
			}
			if ( $filters['ignore'])
			{
				$options .= ' AND r.dont_send = 1 AND request_date = 0 ';
			}

			if ( $filters['count_back'] && $filters['count_back'] != $ignore )
			{
				/**
				* XXX
				* Big case with days back, probably will have to rethink it.
				*/

				switch ( $filters['count_back'] )
				{
					case "30d":
						$back = 'P30D';
						break;
					case "60d":
						$back = 'P60D';
						break;
					case '90d':
						$back = 'P90D';
						break;
					case '4m':
						$back = 'P4M';
						break;
					case '6m':
						$back = 'P6M';
						break;
					case '9m':
						$back = 'P9M';
						break;
					case '1Y':
						$back = 'P1Y';
						break;
					case '2Y':
						$back = 'P2Y';
						break;
					case '3Y':
						$back = 'P3Y';
						break;
					case '5Y':
						$back = 'P5Y';
						break;
					case '7Y':
						$back = 'P7Y';
						break;
					case '10Y':
						$back = 'P10Y';
						break;
					case 'select':
						$back = 'P30D';
						break;
				}
				// Current date
				$present = new DateTime();

				// Set interval
				$interval = new DateInterval($back);

				// Substract the interval of Days/Months/Years from present
				$present->sub($interval);

				// Convert past to timestamp
				$past = strtotime($present->format("y-m-d h:i:s"));

				$options .= ' AND p.user_regdate < ' . $past . ' AND p.user_lastvisit < ' . $past;
			}

				/**
				* XXX
				* Big case with sort by, probably will have to rethink it.
				*/

				if ($filters['sort_by'] && $filters['sort_by'] != $ignore)
				{
					$sort = ' ORDER BY ';
					switch ($filters['sort_by'])
					{
						case 'username':
							$sort .= 'p.username';
							break;
						case 'reg_date':
							$sort .= 'p.user_regdate';
							break;
						case 'last_visit':
							$sort .= 'p.user_lastvisit';
							break;
						case 'posts':
							$sort .= 'p.user_posts';
							break;
						case 'last_sent_reminder':
							$sort .= 'r.previous_sent_date';
							break;
						case 'count':
							$sort .= 'r.remind_counter';
							break;
						case 'reminder_date':
							$sort .= 'r.reminder_sent_date';
							break;
						case 'request_date':
							$sort .= 'r.request_date';
							break;
						case 'select':
							$sort .= 'p.user_regdate';
							break;
					}
					if ($filters['sort_order'] === 1)
					{
						$sort .= ' DESC';
					}
				}
		}

		// Create the SQL statement
		$table_name = $table_prefix . 'ium_reminder';

		$ignore_groups 	= $phpbb_container->get('andreask.ium.classes.ignore_user');
		$must_ignore 	= $ignore_groups->ignore_groups();

		$sql = 'SELECT p.username, p.user_regdate, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.*
			FROM ' . USERS_TABLE . ' p
			RIGHT JOIN ' . $table_name . ' r
			ON (p.user_id = r.user_id)
			WHERE p.user_id not in (SELECT ban_userid FROM ' . BANLIST_TABLE . ')'
			. $must_ignore
			. $options
			. $sort;

		if ($paginate)
		{
			$result = $db->sql_query_limit( $sql, $limit, $start );
		}
		// w/o pagination
		else
		{
			$result = $db->sql_query($sql);
		}

		$inactive_users = array();

		// Store results to rows
		while ($row = $db->sql_fetchrow($result))
		{
			$inactive_users[] = $row;
		};

		// Be sure to free the result after a SELECT query
		$db->sql_freeresult($result);

		// Run the same query but this time unlimited to count the result, to get the total amount.
		$result = $db->sql_query($sql);

		// $row should hold the data you selected
		$count_inactive_users = array();

		// Store results to an array
		while ($row = $db->sql_fetchrow($result))
		{
			$count_inactive_users[] = $row;
		};

		$count = sizeof($count_inactive_users);

		// Be sure to free the result after a SELECT query
		$db->sql_freeresult($result);

		return array('results'	=>	$inactive_users,	'count'	=>	$count);
	}

	private function get_groups()
	{
		global $db;

		$sql = 'SELECT group_id, group_name
				FROM ' . GROUPS_TABLE . '
				ORDER BY group_id';

		$result = $db->sql_query($sql);

		$groups = [];
		while ($row = $db->sql_fetchrow($result))
		{
			$groups[] = $row;
		}
		$db->sql_freeresult($result);

		return $groups;
	}

	/**
	 * Build options from forums list, function is same as acp_permissions of phpbb.
	 * @param	array		$forum_list Need specific information from a function of phpbb
	 * @return string		formated options list of forums
	 */
	function build_subforum_options($forum_list)
	{
		global $user, $phpbb_container;

		$s_options = '';

		$forum_list = array_merge($forum_list);
		$language = $phpbb_container->get('andreask.ium.classes.language_helper');

		foreach ($forum_list as $key => $row)
		{
			if ($row['disabled'])
			{
				continue;
			}

			$s_options .= '<option value="' . $row['forum_id'] . '"' . (($row['selected']) ? ' selected="selected"' : '') . '>' . $row['padding'] . $row['forum_name'];

			// We check if a branch is there...
			$branch_there = false;

			foreach (array_slice($forum_list, $key + 1) as $temp_row)
			{
				if ($temp_row['left_id'] > $row['left_id'] && $temp_row['left_id'] < $row['right_id'])
				{
					$branch_there = true;
					break;
				}
				continue;
			}

			if ($branch_there)
			{
				$s_options .= ' [' . $language->lang('PLUS_SUBFORUMS') . ']';
			}
			$s_options .= '</option>';
		}
		return $s_options;
	}

	/**
	 * Creates the options for the excluded forums list
	 * @param  array $forum_ids Forum id(s)
	 * @return str   options for selection.
	 */
	public function make_excluded_forums_list($forum_ids)
	{
		global $db, $phpbb_container;
		$language = $phpbb_container->get('andreask.ium.classes.language_helper');

		$sql = 'SELECT forum_id, forum_name, left_id, right_id FROM ' . FORUMS_TABLE . '
				WHERE ' . $db->sql_in_set('forum_id', $forum_ids) . ' ORDER BY left_id';
		$result = $db->sql_query($sql);
		$forums = [];
		while ($row = $db->sql_fetchrow($result))
		{
			$forums[] = $row;
		}
		$db->sql_freeresult($result);

		$option = '';

		foreach ($forums as $forum)
		{
			if ($forum['left_id'] < $forum['right_id'] - 1)
			{
				$subforum = true;
			}
			else
			{
				$subforum = false;
			}

			$sub = ($subforum) ? '[' . $language->lang('PLUS_SUBFORUMS') . ']' : '';
			$option .= "<option value='{$forum['forum_id']}' >{$forum['forum_name']} {$sub}</option>";
		}

		return $option;
	}

	/**
	 * Getter of left and right id's for forums
	 * @param  int $forum_id Forum id
	 * @return string  Comma separated forum id's
	 */
	public function sweap_sforums($forum_id)
	{
		global $db;

		$sql = 'SELECT left_id, right_id FROM ' . FORUMS_TABLE . ' WHERE FORUM_ID = ' . $forum_id;

		$result = $db->sql_query($sql);

		$subforums = $db->sql_fetchrow($result);

		$db->sql_freeresult($result);

		if ($subforums['left_id'] != $subforums['right_id'] - 1 )
		{
			$sql = 'SELECT forum_id FROM ' .
					FORUMS_TABLE . '
					WHERE left_id >= ' . $subforums['left_id'] . '
					AND right_id <= ' .$subforums['right_id'] . '
					ORDER BY left_id';
			$result = $db->sql_query($sql);
			$puzzle = [];
			while ($row = $db->sql_fetchrow($result))
			{
				$puzzle[] = $row['forum_id'];
			}
			$db->sql_freeresult($result);
			// $puzzle = implode(',', $puzzle);

			return $puzzle;
		}
		return array($forum_id);
	}

}
