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
	'ACP_IUM'	=>	'IUM Settings',
	'ACP_IUM_LIST'	=>	'Inactive Users List',
	'ACP_IUM_TITLE'	=>	'IUM extension',
	'ACP_IUM_TITLE2'	=> 'Inactive Users List',
	'ACP_IUM_APPROVAL_LIST'	=> 'Ignore/Delete Approval List',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Send Reminder',

	// Log
	'LOG_SENT_REMINDER_TO_ADMIN'	=>	'Template "%1$s" was sent to "%2$s"',
	'LOG_SENT_REMINDERS'			=>	array(
			0	=>	'No reminders was sent',
			1	=>	'%s reminder was sent.',
			2	=>	'%s reminders were sent.'
	),
	'LOG_USERS_DELETED'				=>	'"%1$s" users were deleted "<b>%2$s"</b>, request type : "<b>%3$s</b>"',
	'LOG_FAILED_EMAILS'				=>	'Faild to send e-mails to the following users : "<strong>%1$s</strong>". Check error logs for more details.<br/>Will try again tomorrow',
	'LOG_USER_DELETED'				=>	'User "<b>%1$s</b>" was deleted, request type : "<b>%2$s</b>"',
	'LOG_DELETE_REQUEST_DONT_MATCH'	=>	'Something was wrong with your request. Requested users for deletion did not match with the actual users in the database',
	'LOG_USER_SELF_DELETED'			=>	'A user was self deleted. Configuration for posts was set on "%s"',
	'LOG_SENT_REMINDER_TO'			=>	'A reminders was sent to user "%s"',
)
);
