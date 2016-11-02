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

if ( !defined('IN_PHPBB') )
{
	exit;
}

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'INCLUDE_USER_TOPICS'				=>	'Below some links to topics that you\'ve been active. %s',
	'INCLUDE_FORUM_TOPICS'				=>	'Below some links to the most active topics of the board. %s',
	'FOLOW_TO_DELETE'					=>	'Click on the following link to delete your account. %s',
));
