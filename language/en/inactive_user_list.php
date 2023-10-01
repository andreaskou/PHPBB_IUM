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
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Active',
									// Rest of reasons are not active because they are checked via constants.php
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
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Last Reminder Sent',
	'NO_REMINDER_SENT_YET'	=>	'Not sent any reminders yet',
	'IUM_INACTIVE_REASON'	=>	'Status',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> User(s) in total <i>for the set interval</i> of "<strong>%2$s</strong>" prior.',
	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'In this list you can see the users who, have registered but whose accounts are inactive and those who have not visited the board since the time period set here.<br>Username colors represent the ignore status. <span style="color: #DC143C;"><strong>Red</strong></span> -> Ignored by an administrator, <span style="color: #008000;"><strong>Green</strong></span> -> Auto Ignored, <span style="color: #000000;"><strong>Black</strong></span> -> Not ignored.',

	// Sort Lists
	'COUNT_BACK'	=>	'<strong>FROM</strong> days/months/years interval and backwards',
	'ACP_DESCENDING'	=>	'Descending order',
	'SORT_BY_SELECT'	=>	'Sort by',
	'SELECT'		=>	'Select D/M/Y',
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
	'DECADE'		=>	'One Decade',
	)
);
