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
	'INCLUDE_USER_TOPICS'				=>	'Nachfolgend einige Links zu Themen, in denen du aktiv warst. %s',
	'INCLUDE_FORUM_TOPICS'				=>	'Nachfolgend einige Links zu aktiven Themen im Forum seit deinem letzten Besuch. %s',
	'FOLOW_TO_DELETE'					=>	'Klicke auf den Link, um deinen Zugang zu löschen .%s',
));
