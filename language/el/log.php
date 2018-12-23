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
	'SENT_REMINDERS'		=>	'Εστάλησαν %s υπενθυμίσεις.',
	'USERS_DELETED' => '"%1$s" μέλη διεγράφησαν "<b>%2$s"</b>, τύπος αιτήματος : "<b>%3$s</b>"',
	'USER_DELETED' => '"Το μέλος "<b>%1$s</b>" διεγράφη, τύπος αιτήματος :"<b>%2$s</b>"',
	'SOMETHING_WRONG' => 'Κάτι δεν πείγε καλά με το αίτημά σας. Τα ζητούμενα μέλη για διαγραφή δεν ταιριάζουν με τα πραγματικά μέλη στη βάση δεδομένων',
	'USER_SELF_DELETED' => 'Ένα μέλος διεγράφη αυτόματα. Η ρύθμηση για τις δημοσιεύσεις έχει οριστεί ως "%s"',
	'SENT_REMINDER_TO' => 'Εστάλησαν υπενθυμίσεις στο χρήστη "% s"',
));
