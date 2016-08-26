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

use phpbb\log\null;
use Symfony\Component\DependencyInjection\ContainerInterface;

class main_module
{

	public function main($id, $mode)
	{

		global $user, $template, $request, $config, $phpbb_container;

		if ($mode == 'ium_settings')
		{
			$this->tpl_name = 'acp_ium_body';
			$this->page_title = $user->lang('ACP_IUM_TITLE');

			$form_key = 'andreask_ium';

			add_form_key($form_key);

			if($request->is_set_post('submit'))
			{

				// Check form key
				if(!check_form_key($form_key)){
					trigger_error($user->lang('FORM_INVALID'), adm_back_link($this->u_action), E_USER_WARNING);
				}

				// If everything is OK store the setting
				$this->update_config();
				trigger_error($user->lang('CONFIG_UPDATED') . adm_back_link($this->u_action));
			}

			$template->assign_vars(array(
				'ANDREASK_IUM_ENABLE'                   =>  $config['andreask_ium_enable'],
				'ANDREASK_IUM_INTERVAL'                 =>  $config['andreask_ium_interval'],
				'ANDREASK_IUM_TOP_USER_THREADS'         =>  $config['andreask_ium_top_user_threads'],
				'ANDREASK_IUM_TOP_USER_THREADS_COUNT'   =>  $config['andreask_ium_top_user_threads_count'],
				'ANDREASK_IUM_TOP_FORUM_THREADS'        =>  $config['andreask_ium_top_forum_threads'],
				'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'  =>  $config['andreask_ium_top_forum_threads_count'],
				'ANDREASK_IUM_EMAIL_LIMIT'  			=>  $config['andreask_ium_email_limit'],
				'ANDREASK_IUM_SELF_DELETE'              =>  $config['andreask_ium_self_delete'],
			));

			$test = $phpbb_container->get('andreask.ium.classes.top_topics');
			$test->get_user_top_topics(534);

		}

		if ($mode == 'ium_list')
		{
//			$user->add_lang_ext('andreask/ium', 'user_list');

			$this->tpl_name = 'acp_ium_inactive_users';
			$this->page_title = $user->lang('ACP_IUM_TITLE2');
			$user->add_lang('memberlist');

			$start = $request->variable('start', 0);
			$limit = $request->variable('users_per_page', 10);
			$with_posts = $request->variable('with_posts', 0);
			$actions = $request->variable('count_back', '30d');
			$sort_by = $request->variable('sort_by', 'reg_date');
			$sort_order = $request->variable('sort_order', 0);

			// Keep the limit between 10 and 50
			if ($limit > 50)
			{
				$limit = 50;
			}
			elseif ($limit < 10)
			{
				$limit = 10;
			}

			// get the options to an array so that we pass them to the sql query
			$options = array(
				'with_posts' => $with_posts,
				'count_back' => $actions,
				'sort_by' => $sort_by,
				'sort_order' => $sort_order,
			);

			//base url for pagination, filtering and sorting
			$base_url = $this->u_action . "&amp;users_per_page=" . $limit
				. "&amp;with_posts=" . $with_posts
				. "&amp;count_back=" . $actions
				. "&amp;sort_by=" . $sort_by
				. "&amp;sort_order=" . $sort_order;

			// Long list probably should make shorter.
			$option_ary = array('select' => 'SELECT',
				'30d' => 'THIRTY_DAYS',
				'60d' => 'SIXTY_DAYS',
				'90d' => 'NINETY_DAYS',
				'4m' => 'FOUR_MONTHS',
				'6m' => 'SIX_MONTHS',
				'9m' => 'NINE_MONTHS',
				'1Y' => 'ONE_YEAR',
				'2Y' => 'TWO_YEARS',
				'3Y' => 'THREE_YEARS',
				'5Y' => 'FIVE_YEARS',
				'7Y' => 'SEVEN_YEARS',
				'10Y' => 'DECADE');

			// Sort by element
			$sort_by_ary = array(
				'select' => 'SORT_BY_SELECT',
				'username' => 'USERNAME',
				'posts' => 'POSTS',
				'reg_date' => 'JOINED',
				'last_visit' => 'LAST_VISIT',
				'last_sent_reminder' => 'LAST_SENT_REMINDER',
				'count' => 'COUNT',
				'reminder_date' => 'REMINDER_DATE',
			);

			// Get the users list using get_inactive_users required parameters $limit $start
			$rows = $this->get_inactive_users(true, $limit, $start, $options);
			$inactive_count = $rows['count'];
			$rows = $rows['results'];


			// Load the pagination
			$pagination = $phpbb_container->get('pagination');
			$start = $pagination->validate_start($start, $limit, $inactive_count);
			$pagination->generate_template_pagination($base_url, 'pagination', 'start', $inactive_count, $limit, $start);

			// Assign template vars (including pagination)
			$template->assign_vars(array(
				'S_INACTIVE_USERS' => true,
				'S_INACTIVE_OPTIONS' => build_select($option_ary, $actions),
				'S_IUM_SORT_BY' => build_select($sort_by_ary, $sort_by),
				'COUNT_BACK' => $options['count_back'],
				'PER_PAGE' => $limit,
				'TOTAL_USERS' => $inactive_count,
				'WITH_POSTS' => ($with_posts) ? true : false,
				'SORT_ORDER' => ($sort_order) ? true : false,
			));

			// Assign row results to template var inactive
			foreach ($rows as $row)
			{
				$template->assign_block_vars('inactive', array(
					'USERNAME' => $row['username'],
					'JOINED' => $user->format_date($row['user_regdate']),
					'POSTS' => ($row['user_posts']) ? $row['user_posts'] : 0,
					'LAST_VISIT' => ($row['user_lastvisit']) ? $user->format_date($row['user_lastvisit']) : $user->lang('NEVER_CONNECTED'),
					'INACTIVE_DATE' => ($row['user_inactive_time']) ? $user->format_date($row['user_inactive_time']) : $user->lang('ACP_IUM_NODATE'),
					'REASON' => $user->lang('ACP_IUM_INACTIVE', (int)$row['user_inactive_reason']),
					'COUNT' => ($row['remind_counter']) ? $row['remind_counter'] : $user->lang('NO_REMINDER_COUNT'),
					'LAST_SENT_REMINDER' => ($row['previous_sent_date']) ? $user->format_date($row['previous_sent_date']) : $user->lang('NO_PREVIOUS_SENT_DATE'),
					'REMINDER_DATE' => ($row['reminder_sent_date']) ? $user->format_date($row['reminder_sent_date']) : $user->lang('NO_REMINDER_SENT_YET'),
					'IGNORE_USER' => ($row['dont_send']) ? true : false
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

		$config->set('andreask_ium_enable', $request->variable('andreask_ium_enable', ''));
		$config->set('andreask_ium_interval', $request->variable('andreask_ium_interval', ''));
		$config->set('andreask_ium_top_user_threads', $request->variable('andreask_ium_top_user_threads', ''));
		$config->set('andreask_ium_top_user_threads_count', $request->variable('andreask_ium_top_user_threads_count', ''));
		$config->set('andreask_ium_top_forum_threads', $request->variable('andreask_ium_top_forum_threads', ''));
		$config->set('andreask_ium_top_forum_threads_count', $request->variable('andreask_ium_top_forum_threads_count', ''));
		$config->set('andreask_ium_self_delete', $request->variable('andreask_ium_self_delete', ''));
		$config->set('andreask_ium_email_limit', $request->variable('andreask_ium_email_limit', ''));
		$config->set('andreask_ium_self_delete', $request->variable('andreask_ium_self_delete', ''));
	}

	/**
	 * Getter for inactive users
	 * @param int $limit Used for pagination in sql query to limit the numbers of rows.
	 * @param int $start Used for pagination in sql query to say where to start from.
	 * @param bool $paginate define if pagination is used or not.
	 * @param null $filters Array Used for query to supply extra filters.
	 * @return array result of query and total amount of the result.
	 */

	public function get_inactive_users($paginate = true, $limit=null, $start=null, $filters = null)
	{
		return $this->inactive_users($paginate, $limit, $start, $filters);
	}

	/**
	 * @param int $limit Used for pagination in sql query to limit the numbers of rows.
	 * @param int $start Used for pagination in sql query to say where to start from.
	 * @param bool $paginate define if pagination is used or not.
	 * @param null $filters Array Used for query to supply extra filters.
	 * @return array result of query and total amount of the result.
	 */

	private function inactive_users($paginate = true, $limit=null, $start=null, $filters = null)
	{
		global $db, $table_prefix;

		if ($filters) {

			$ignore = 'select';
			$options = '';

			if ($filters['with_posts']) {
				$options .= ' AND p.user_posts != 0';
			}

			if ($filters['count_back'] && $filters['count_back'] != $ignore) {

				/**
				 * Big case with days back, probably will have to rethink it.
				 */

				switch ($filters['count_back']) {

					case "30d":
						$back = '30 DAY';
						break;
					case "60d":
						$back = '60 DAY';
						break;
					case '90d':
						$back = '90 DAY';
						break;
					case '4m':
						$back = '4 MONTH';
						break;
					case '6m':
						$back = '6 MONTH';
						break;
					case '9m':
						$back = '9 MONTH';
						break;
					case '1Y':
						$back = '1 YEAR';
						break;
					case '2Y':
						$back = '2 YEAR';
						break;
					case '3Y':
						$back = '3 YEAR';
						break;
					case '5Y':
						$back = '5 YEAR';
						break;
					case '7Y':
						$back = '7 YEAR';
						break;
					case '10Y':
						$back = '10 YEAR';
						break;
					case 'select':
						break;
				}
				$options .= ' AND from_unixtime(p.user_lastvisit) < (DATE_SUB(CURDATE(), INTERVAL ' . $back . '))';
			}

			/**
			 * Big case with sort by, probably will have to rethink it.
			 */

			if ($filters['sort_by'] && $filters['sort_by'] != $ignore) {
				$sort = ' ORDER BY ';
				switch ($filters['sort_by']) {

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
					case 'select':
						break;
				}
				if ($filters['sort_order'] === 1) {
					$sort .= ' DESC';
				}
			}
		}

		// Create the SQL statement
		$table_name = $table_prefix . 'ium_reminder';

		$sql = 'SELECT p.username, p.user_regdate, p.user_posts, p.user_lastvisit, p.user_inactive_time, p.user_inactive_reason, r.remind_counter, r.previous_sent_date, r.reminder_sent_date, r.dont_send
		   FROM ' . USERS_TABLE . ' p 
		   LEFT OUTER JOIN ' . $table_name . ' r 
		   ON (p.user_id = r.user_id)
		   WHERE p.user_id not in 
			(SELECT ban_userid FROM ' . BANLIST_TABLE . ')
		   AND p.group_id 
		   not in (1,4,5,6)' . $options . $sort;

		// Run the query With pagination
		if($paginate) {
			$result = $db->sql_query_limit($sql, $limit, $start);
		}
		// W/o pagination
		else{
			$result = $db->sql_query($sql);
		}

		// $row should hold the data you selected
		$inactive_users = array();

		// Store results to rows
		while ($row = $db->sql_fetchrow($result)) {
			$inactive_users[] = $row;
		};

		// Be sure to free the result after a SELECT query
		$db->sql_freeresult($result);

		// Run the same query but this time count the result, to get the total amount.
		$result = $db->sql_query($sql);

		// $row should hold the data you selected
		$count_inactive_users = array();

		// Store results to an array
		while ($row = $db->sql_fetchrow($result)) {
			$count_inactive_users[] = $row;
		};

		$count = sizeof($count_inactive_users);

		// Be sure to free the result after a SELECT query
		$db->sql_freeresult($result);

		return array('results' => $inactive_users, 'count' => $count);
	}
}
