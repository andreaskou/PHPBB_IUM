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
		'USERS_DELETED'			=>	'"%1s" μέλη διαγράφηκαν, τύπος αίτησης : "%2s"',
		'USER_DELETED'			=>	'Το μέλος "%1s" διεγράφει, τύπος αίτησης : "%2s"',
		'SOMETHING_WRONG'		=>	'Κάτι δεν πήγαινε καλά με το αίτημά σας. Τα ζητούμενα μέλη για διαγραφή δεν ταιριάζουν με τα μέλη στην βάσης δεδομένων',
		'USER_SELF_DELETED'		=>	'Ένα μέλος έκανε αυτοδιαγραφή. Η ρύθμιση για τις δημοσιεύσεις ήταν : "%s"',
		));
