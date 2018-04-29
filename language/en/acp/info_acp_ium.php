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
	//
	'ACP_IUM'	=>	'IUM configuration',
	'ACP_IUM_LIST'	=>	'Inactive Users List',
	'ACP_IUM_TITLE'	=>	'IUM extension',
	'ACP_IUM_TITLE2'	=> 'Inactive Users List',
	'ACP_IUM_APPROVAL_LIST'	=> 'Ignore/Delete Approval List',
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
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Sent test e-mail',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Included forums',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Exclude',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Ignore Groups',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Excluded forums',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Include',
	'SELECT_A_FORUM'							=>	'Please select a forum',
	'EXCLUDED_EMPTY'							=>	'No excluded forums...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Group Managment',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Ignore',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Send Reminder',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'If enabled, the extension will start sending reminders to "sleepers".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'It is the interval of days to count back to consider a user a "sleeper". Recommended is 30 days',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Amount of the reminders that can be sent <b>per day</b>. Recommended is ~250. But do check with your provider for any limit of e-mails per day',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'If enabled, mail will include user\'s top active topics since user\'s last visit.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Amount of user\'s top topics that should be included in the e-mail.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'If enabled, mail will include board\'s top topics since user\'s last visit.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Amount of forum topics that should be included in e-mail',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'If enabled, a link to a page "<strong>board_url/ium/{random_key}</strong>" will be included to user and they will be able to self delete their acount..',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'If enabled all self delete request will have to be approved by the administrator.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Yes" will delete user but will <strong>keep</strong> the post, "No" will delete the posts of the user as well.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Here you can manage the users that you want to ignore (don\'t send reminder) or remove them from the ignore list.<br/><strong>Each user in a new line.</strong><br/>Note, the following groups are <strong>ignored by default</strong> : 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR and 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Users will be autodeleted after a given amount of days if they do not return after the 3 reminders.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Ammount of days to wait until auto delete a user after the requested day.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'A test e-mail will be sent to "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Select a category or subcategory to <strong>exclude</strong> it from the top topics lists that are sent to the users',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Select a category or subcategory to <strong>include</strong> it from the top topics lists that are sent to the users',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Here you can selecet which groupd(s) should be ignored by the extension. Please note that even though they <u>are not</u> selected here,</br>BOTS, ADMINISTRATORS, MODERATOROS and GUESTS are <b>ignored</b>. But it is still suggested to select the groups here as well!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Hold control (CTRL) (or &#8984; for mac) on the keyboard to select multiple groups.',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'In this list you can see the users who, have registered but whose accounts are inactive and those who have not visited the board for the set amount of time here.<br>Username colors represent the ignore status. <span style="color: #DC143C;"><strong>Red</strong></span> -> Ignored by an administrator, <span style="color: #008000;"><strong>Green</strong></span> -> Auto Ignored, <span style="color: #000000;"><strong>Black</strong></span> -> Not ignored.',
	'ACP_IUM_SETTINGS'	=>	'Inactive User Reminder Settings',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Reminder Settings',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Reminder Include Settings',
	'ACP_IUM_DANGER'	=>	'Danger Area',
	// configuration page
	'INACTIVE_MAIL_SENT_TO'			=>	'A sample of email for inactive users was sent to "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'A sample of email for inactive users was sent to "%s"',
	'SEND_SLEEPER'					=>	'Send sleeper template',
	'SEND_INACTIVE'					=>	'Send Inactive template',
	'PLUS_SUBFORUMS'				=>	'+Subforums',
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
	'NO_PREVIOUS_SENT_DATE'	=> 'Not sent any reminders yet',
	'REMINDER_DATE'	=>	'Last Reminder Sent',
	'NO_REMINDER_SENT_YET'	=>	'Not sent any reminders yet',
	'IUM_INACTIVE_REASON'	=>	'Status',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> User(s) in total <i>for the set interval</i> of "<strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'Not ignored',
		1 =>	'Auto',
		2	=>	'Ignored by Admin',
	),
	'IGNORE_METHODES'	=>	'Ignore type',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Deletion approval list',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Deletion approval list',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Approval list of users with a request for deleting their account',
	'NO_REQUESTS'			=> 'No requests yet',
	'NO_USER_SELECTED'		=>	'No user selected.',
	'IUM_MANAGMENT'			=>	'Inactive User Managment',
	'IGNORE_USER_LIST'		=>	'Add users to ignore list',
	'IGNORED_USERS_LIST'	=>	'List of users that are ignored',
	'ADD_IGNORE_USER'		=>	'Add to List',
	'REMOVE_IGNORE_USER'	=>	'Remove from List',
	'DELETED_SUCCESSFULLY'	=>	'Deleted successfully.',
	'REQUEST_TYPE'			=>	'Request Type',
	'APPROVE'				=>	'Approve',
	'NO_USER_TYPED'			=>	'No user was typed',
	'USER_NOT_FOUND'		=>	'User(s) %s not found.',
	'REGISTERED'			=>	'Registered',
	'GUESTS'				=>	'Guests',
	'REGISTERED_COPPA'		=>	'Registered COPPA',
	'GLOBAL_MODERATORS'		=>	'Global Moderators',
	'BOTS'					=>	'Bots',
	'NEWLY_REGISTERED'		=>	'Newly Registered',
	'USER_SELECT'		=>	'Select',
	'SELECT_AN_ACTION'		=>	'Select an Action',
	'DONT_IGNORE'		=>	'Don’t Ignore',
	'NOT_IGNORED'		=>	'User(s) not Ignored any more.',
	'RESET_REMINDERS'		=>	'Reset Was successful.',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>FROM</strong> days/months/years interval and backwards',
	'ACP_DESCENDING'	=>	'Descending order',
	'SORT_BY_SELECT'	=>	'Sort by',
	'REQUEST_DATE'		=>	'Deletion Request date',
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

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Template "%1$s" was sent to "%2$s"',
	'SENT_REMINDERS'			=>	'%s reminders were sent.',
	'USERS_DELETED'				=>	'"%1$s" users were deleted "<b>%2$s"</b>, request type : "<b>%3$s</b>"',
	'USER_DELETED'				=>	'User "<b>%1$s</b>" was deleted, request type : "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Something was wrong with your request. Requested users for deletion did not match with the actual users in the database',
	'USER_SELF_DELETED'			=>	'A user was self deleted. Configuration for posts was set on "%s"',
	'SENT_REMINDER_TO'			=>	'A reminders was sent to user "%s"',

	)
);
