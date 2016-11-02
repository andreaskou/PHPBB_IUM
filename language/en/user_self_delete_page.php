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
	'USER_SELF_DELETE_TITLE'		=>  'Self deletion page.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'By checking the verify box and clicking on the confirm button you accept to delete your user account in this forum.<br/>All your posts will remain intact but you will no longer be able to connect with your username/password.<br/>If you create an account with the same username previous post will not be connected with the new acount.',
	'USER_SELF_DELETE_VERIFY'		=>  'I understand the consequencies and I verify',
	'HAVE_TO_LOGIN'					=>  'we are sorry, but you have to login to see this page.',
	'HAVE_TO_VERIFY'				=>  'Please check the verification box.',
	'PAGE_NOT_EXIST'				=>  'We are very sorry for the inconvenience.<br/><br/>But self deletion is disabled.<br/>If you came to this page by accident please check the url you\'ve typed in your browser.<br/>If you followed a link from an e-mail that you received from us, please contact with the administrator of the page.',
	'NEEDS_APPROVAL'				=>	'We are very sorry that you have decided to leave %s. Please note that your account is still not deleted, it first needs to be approved. Please give us some time for this action. In 3 seconds you will be redirected to our home page.',
	'USER_SELF_DELETE_SUCCESS'		=>	'We are very sorry that you have decided to leave %s. Your account have been deleted. In 3 seconds you will be redirected to our home page.',
	'INVALID_LINK_OR_USER'			=>	'Invalid combination.',
));
