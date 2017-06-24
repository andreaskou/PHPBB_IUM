<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* Nederlandse vertaling @ Solidjeuh <https://www.froddelpower.be>
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
	'INCLUDE_USER_TOPICS'				=>	'Onderaan enkele linken naar topics waar je actief was. %s',
	'INCLUDE_FORUM_TOPICS'				=>	'Onderaan enkele linken naar de meest actieve topics van het forum. %s',
	'FOLOW_TO_DELETE'					=>	'Klik op de volgende link om je account te verwijderen. %s',
));
