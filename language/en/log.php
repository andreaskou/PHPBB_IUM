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

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'SENT_REMINDERS'		=>	'%s reminders were sent.',
	'USERS_DELETED'			=>	'"%1s" users were deleted, request type : "%2s"',
	'USER_DELETED'			=>	'User "%1s" was deleted, request type : "%2s"',
	'SOMETHING_WRONG'		=>	'Something was wrong with your request. Requested users for deletion did not match with the actual users in the database',
	'USER_SELF_DELETED'		=>	'A user was self deleted. Configuration for posts was set on "%s"',
));
