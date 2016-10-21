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

namespace andreask\ium\classes;

class top_topics {

	protected $user_id = null;
	protected $user_lastvisit;
	protected $db;
	protected $config;
	protected $auth;

	public function __construct(\phpbb\config\config $config, \phpbb\auth\auth $auth, \phpbb\db\driver\driver_interface $db)
	{
		$this->config	=	$config;
		$this->auth		=	$auth;
		$this->db		=	$db;
	}

	// Set the iser_id
	public function set_id_and_date($id, $date)
	{
		$this->user_id			=	$id;
		$this->user_lastvisit	=	$date;
	}

	public function get_user_top_topics($id, $last_visit)
	{
		if (!$id)
		{
			return false;
		}
		if ($this->config['andreask_ium_top_user_threads'] == 0)
		{
			return false;
		}

		$this->set_id_and_date($id, $last_visit);

		if ( $this->user_post_count($this->user_id) > $this->config['andreask_ium_top_user_threads_count'])
		{
			// Obtain most active topic for user
			$sql = 'SELECT topic_id, count(post_id) as posts_count
					FROM ' . POSTS_TABLE . '
					WHERE poster_id = ' . $this->user_id . '
					AND post_postcount = 1
					GROUP BY topic_id
					ORDER BY posts_count DESC';

			$result = $this->db->sql_query($sql);
			$active_t_row = '';

			while ($row = $this->db->sql_fetchrow($result))
			{
				$active_t_row[] = $row['topic_id'];
			};

			$this->db->sql_freeresult($result);

			if (empty($active_t_row))
			{
				return null;
			}

			// get the latest updated topics from users last visit date
			$sql = 'SELECT forum_id, topic_id, count(post_id) as post_count, max(post_time)
					FROM ' . POSTS_TABLE . '
					WHERE ' . $this->db->sql_in_set('topic_id', $active_t_row) .'
					AND post_time > '. $this->user_lastvisit .'
					GROUP BY forum_id, topic_id ORDER BY max(post_time) desc, count(post_id) desc';
			$result = $this->db->sql_query_limit($sql, $this->config['andreask_ium_top_user_threads_count']);
			$active_topics = '';

			while ($row = $this->db->sql_fetchrow($result))
			{
				$active_topics[] = $row;
			}

			$this->db->sql_freeresult($result);

			if (empty($active_topics))
			{
				return null;
			}

			foreach ($active_topics as $key => &$topic)
			{
				if ( !$this->user_access($topic['forum_id']) )
				{
					// delete if user does not have access to the topic any more, I just couldn't find a better place to do this.
					unset($active_topics[$key]);
				}
				else
				{
					// else complete the puzzle.
					$sql = 'SELECT topic_title as title
						FROM ' . TOPICS_TABLE . '
						WHERE topic_id = ' . $topic['topic_id'];

					$result = $this->db->sql_query($sql);
					$topic['topic_title'] = (string) htmlspecialchars_decode($this->db->sql_fetchfield('title'));
					$this->db->sql_freeresult($result);
				}
			}
			return $active_topics;
		}
	}

	public function get_forum_top_topics($id, $last_visit)
	{
		if (!$id)
		{
			return null;
		}
		else if ($this->config['andreask_ium_top_forum_threads'] == 0)
		{
			return null;
		}
		$this->set_id_and_date($id, $last_visit);

		// Obtain most active topic of board
		$sql = 'SELECT forum_id, topic_id, count(post_id) as posts_count
		FROM ' . POSTS_TABLE . '
		WHERE post_postcount = 1
		AND post_time > '. $this->user_lastvisit .'
		GROUP BY forum_id, topic_id
		ORDER BY posts_count DESC';

		// limit results to configuration
		$result = $this->db->sql_query_limit($sql, $this->config['andreask_ium_top_forum_threads_count']);
		$active_t_row = array();

		while ($row = $this->db->sql_fetchrow($result))
		{
			$active_t_row[] = $row;
		};

		$this->db->sql_freeresult($result);

		if (empty($active_t_row))
		{
			return null;
		}

		foreach ($active_t_row as $key => &$topic)
		{
			if ( !$this->user_access($topic['forum_id']) )
			{
				// delete if user does not have access to the topic any more, I just couldn't find a better place to do this.
				unset($active_t_row[$key]);
			}
			else
			{
				// else complete the puzzle.
				$sql = 'SELECT topic_title as title
					FROM ' . TOPICS_TABLE . '
					WHERE topic_id = ' . $topic['topic_id'];

				$result = $this->db->sql_query($sql);
				$topic['topic_title'] = (string) htmlspecialchars_decode($this->db->sql_fetchfield('title'));
				$this->db->sql_freeresult($result);
			}
		}
		return $active_t_row;
	}

	/**
	 * Give the amount of post for user
	 * @param $user user_id
	 * @return bool|int Number of posts or else return false
	 */

	private function user_post_count($user_id)
	{
		if ($user_id)
		{
			$sql = 'SELECT user_posts AS post_count
				FROM ' . USERS_TABLE . '
				WHERE user_id = ' . $user_id;

			$result = $this->db->sql_query($sql);
			$post_count = (int) $this->db->sql_fetchfield('post_count');
			$this->db->sql_freeresult($result);
			return $post_count;
		}
		return false;
	}

	private function user_access($forum_id)
	{
		$data = $this->auth->obtain_user_data($this->user_id);
		$this->auth->acl($data);
		return $this->auth->acl_get('f_read', $forum_id);
	}
}
