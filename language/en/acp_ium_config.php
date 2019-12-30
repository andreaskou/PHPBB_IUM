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

if (!defined('IN_PHPBB'))
{
	exit;
}

if (empty( $lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge(
		$lang, array(
        // ACP configuration page
        'ANDREASK_IUM_ENABLE'	=>	'Enable Advanced Inactive User Reminder ',
        'ANDREASK_IUM_INTERVAL'	=>	'Interval ',
        'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limit E-mails ',
        'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Include user\'s top topics ',
        'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'How many topics ',
        'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Include board\'s top topics ',
        'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'How many topics ',
        'ANDREASK_IUM_SELF_DELETE'	=>	'User is able to self delete',
        'ANDREASK_IUM_DELETE_APPROVE'			=>	'Require approval for self delete requests',
        'ANDREASK_IUM_KEEP_POSTS'				=>	'Keep posts of deleted users',
        'ANDREASK_IUM_AUTO_DEL'					=>	'Auto delete User',
        'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Days after',
        'ANDREASK_IUM_TEST_EMAIL'				=>	'Send test e-mail',
        'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Included forums',
        'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Exclude',
        'EMAILS'								=>	'E-mails',
		'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Reminder Include Settings',
		'ACP_IUM_DANGER'	=>	'Danger Area',


        'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Excluded forums',
        'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Include',
        'SELECT_A_FORUM'							=>	'Please select a forum',
        'EXCLUDED_EMPTY'							=>	'No excluded forums...',

		// ACP configuration page Explanations
		'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'If enabled, the extension will start sending reminders to "sleepers".',
		'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'It is the interval of days to count back to consider a user a "sleeper". Recommended is 30 days',
		'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Amount of the reminders that can be sent <b>per day</b>. Recommended is ~250. But do check with your provider for any limit of e-mails per day',
		'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'If enabled, mail will include user\'s top active topics since user\'s last visit.',
		'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Amount of user\'s top topics that should be included in the e-mail.',
		'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'If enabled, mail will include board\'s top topics since user\'s last visit.',
		'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Amount of forum topics that should be included in e-mail',
		'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'If enabled, a link to a page "<strong>board_url/ium/{random_key}</strong>" will be included to user and they will be able to self delete their account.',
		'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'If enabled all self delete request will have to be approved by the administrator.',
		'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Yes" will delete user but will <strong>keep</strong> the post, "No" will delete the posts of the user as well.',
		'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Here you can manage the users that you want to ignore (don\'t send reminder) or remove them from the ignore list.<br/><strong>Each user in a new line.</strong><br/>Note, the following groups are <strong>ignored by default</strong> : 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR and 6. BOTS',
		'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Users will be autodeleted after a given amount of days if they do not return after the 3 reminders.',
		'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Amount of days to wait until auto delete a user after the requested day.',
		'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'A test e-mail will be sent to "%s"',
		'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Select a category or subcategory to <strong>exclude</strong> it from the top topics lists that are sent to the users',
		'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Select a category or subcategory to <strong>include</strong> it from the top topics lists that are sent to the users',

		// configuration page
		'INACTIVE_MAIL_SENT_TO'			=>	'A sample of email for inactive users was sent to "%s"',
		'SLEEPER_MAIL_SENT_TO'			=>	'A sample of email for inactive users was sent to "%s"',
		'SEND_SLEEPER'					=>	'Send sleeper template',
		'SEND_INACTIVE'					=>	'Send Inactive template',
		'PLUS_SUBFORUMS'				=>	'+Subforums',

    )
);
