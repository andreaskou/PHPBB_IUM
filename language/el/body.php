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
	'INCLUDE_USER_TOPICS'				=>	'Παρακάτω μερικοί σύνδεσμοι σε θέματα που ήσασταν ενεργοί.%s',
	'INCLUDE_FORUM_TOPICS'				=>	'Παρακάτω μερικοί σύνδεσμοι στα πιο ενεργά θέματα. %s',
	'FOLLOW_TO_DELETE'					=>	'Πατήστε στο σύνδεσμο για να διαγράψετε τον λογαριασμό σας.%s',
));
