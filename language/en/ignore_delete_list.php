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

    // Delete approval page
    'IGNORE_METHODE'	=> array(
        0 =>	'Not ignored',
        1 =>	'Auto',
        2	=>	'Ignored by Admin',
    ),
    'IGNORE_METHODES'	=>	'Ignore type',
    'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Deletion approval list',
    'APPROVAL_LIST_PAGE_TITLE'		=> 'Deletion approval list',
    'IUM_APPROVAL_LIST_EXPLAIN'		=> 'Approval list of users with a request for deleting their account',
    'NO_REQUESTS'					=> 'No requests yet',
    'NO_USER_SELECTED'				=>	'No user selected.',
    'SELECT_ACTION'					=>	'Please select an action',
    'IUM_MANAGMENT'					=>	'Inactive User Management',
    'IGNORE_USER_LIST'				=>	'Add users to ignore list',
    'IGNORED_USERS_LIST'			=>	'List of users that are ignored',
    'ADD_IGNORE_USER'				=>	'Add to List',
    'REMOVE_IGNORE_USER'			=>	'Remove from List',
    'DELETED_SUCCESSFULLY'			=>	'Deleted successfully.',
    'REQUEST_TYPE'					=>	'Request Type',
    'APPROVE'						=>	'Approve',
    'NO_USER_TYPED'					=>	'No user was typed',
    'USER_NOT_FOUND'				=>	'User(s) %s not found.',
    'REGISTERED'					=>	'Registered',
    'GUESTS'						=>	'Guests',
    'REGISTERED_COPPA'				=>	'Registered COPPA',
    'GLOBAL_MODERATORS'				=>	'Global Moderators',
    'BOTS'							=>	'Bots',
    'NEWLY_REGISTERED'				=>	'Newly Registered',
    'USER_SELECT'					=>	'Select',
    'SELECT_AN_ACTION'				=>	'Select an Action',
    'DONT_IGNORE'					=>	'Don’t Ignore',
    'NOT_IGNORED'					=>	'User(s) not Ignored any more.',
    'RESET_REMINDERS'				=>	'Reset Was successful.',
	'USER_EXIST_IN_IGNORED_GROUP'	=>	'User(s) exist in an already ignored group.',
	'REQUEST_DATE'		=>	'Deletion Request date',


    'IUM_IGNORE_GROUP_MANAGMENT'		=>	'Group Management',
    'ANDREASK_IUM_UPDATE_IGNORE_LIST'	=>	'Ignore',
    'ANDREASK_IUM_GROUP_IGNORE'			=>	'Ignore Groups',

    'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Here you can select which group(s) should be ignored by the extension. Please note that even though they <u>are not</u> selected here,</br>BOTS, ADMINISTRATORS, MODERATORS and GUESTS are <b>ignored</b>. But it is still suggested to select the groups here as well!',
    'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Hold control (CTRL) (or &#8984; for mac) on the keyboard to select multiple groups.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Here you can manage the users that you want to ignore (don\'t send reminder) or remove them from the ignore list.<br/><strong>Each user in a new line.</strong><br/>Note, the following groups are <strong>ignored by default</strong> : 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR and 6. BOTS',

    )
);
