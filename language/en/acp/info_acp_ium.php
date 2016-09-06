<?php

/**
 *
 * @package phpBB Extension - Advanced Inactive User Manager
 * @copyright (c) 2013 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
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
	//
	'ACP_IUM'	=>	'IUR configuration',
	'ACP_IUM_LIST'	=>	'Inactive Users List',
	'ACP_IUM_TITLE'	=>	'IUR extension',
	'ACP_IUM_TITLE2'	=> 'Inactive Users List',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Enable Advanced Inactive User Reminder ',
	'ANDREASK_IUM_INTERVAL'	=>	'Interval ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limit E-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Include user\'s top topics ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'How many topics ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Include board\'s top topics ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'How many topics ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'User is able to self delete THIS CONFIGURATION IS NOT AVAILIABLE YET ',
	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'If enabled, the extension will start sending reminders to "sleepers".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'It is the interval of days back to count to consider a user a "sleeper". Recommended is 30 days',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Amount of the reminders that can be sent <strong>per day</strong>. Recommended is ~250. But do check with your host for any limit of e-mails per day',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'If enabled, mail will include user\'s top active topics since user\'s last visit.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Amount of user\'s top topics that should be included in the e-mail.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'If enabled, mail will include board\'s top topics since user\'s last visit.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Amount of forum topics that should be included in e-mail',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'If enabled, the user will be able to remove himself from the board.',
	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'In this list you can see the users who, have registered but whose accounts are inactive and those who have not visited the board for a certain amount of time.',
	'ACP_IUM_SETTINGS'	=>	'Inactive User Reminder Settings',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Reminder Settings',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Reminder Include Settings',
	'ACP_IUM_DANGER'	=>	'Danger Area',
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(	0	=>	'Active',
									1	=>	'Registration pre-activation',
									2	=>	'Profile change',
									3	=>	'Admin deactivated',
									4	=>	'Permanently Banned',
									5	=>	'Temporarily Banned'),
	'NEVER_CONNECTED'	=>	'User never connected',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'User is <strong>not</strong> disabled',
	'ACP_USERS_WITH_POSTS'	=>	'Show only users with posts',
	'LAST_SENT_REMINDER'	=>	'Previous Reminder',
	'NO_REMINDER_COUNT'	=>	'No reminders sent yet',
	'COUNT'	=>	'Reminders Count',
	'NO_PREVIOUS_SENT_DATE'	=> 'Not sent any reminders yet',
	'REMINDER_DATE'	=>	'Last Reminder Sent',
	'NO_REMINDER_SENT_YET'	=>	'Not sent any reminders yet',
	'IUM_INACTIVE_REASON'	=>	'Status',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>FROM</strong> days/months/years interval and backwards',
	'ACP_DESCENDING'	=>	'Descending order',
	'SORT_BY_SELECT'	=>	'Sort by',
	'SELECT'	=>	'Select D/M/Y',
	'THIRTY_DAYS'	=>	'Thirty Days',
	'SIXTY_DAYS'	=>	'Sixty Days',
	'NINETY_DAYS'	=>	'Ninety Days',
	'FOUR_MONTHS'	=>	'Four Months',
	'SIX_MONTHS'	=>	'Six Months',
	'NINE_MONTHS'	=>	'Nine Months',
	'ONE_YEAR'		=>	'One Year',
	'TWO_YEARS'		=>	'Two Years',
	'THREE_YEARS'	=>	'Three Years',
	'FIVE_YEARS'	=>	'Five Years',
	'SEVEN_YEARS'	=>	'Seven Years',
	'DECADE'		=>	'One Decade',)
);
