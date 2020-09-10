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

$lang = array_merge(
		$lang, array(
	//
	'ACP_IUM'	=>	'IUM ρυθμίσεις',
	'ACP_IUM_LIST'	=>	'Λίστα ανενεργών μελών',
	'ACP_IUM_TITLE'	=>	'Επέκταση IUM',
	'ACP_IUM_TITLE2'	=>	'Λίστα ανενεργών μελών',
	'ACP_IUM_APPROVAL_LIST'	=>	'Παράβλεψη/Διαγραφή λίστας έγκρισης',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Αποστολή Υπενθύμισης',

	// Log
	'SENT_REMINDER_TO_ADMIN' => 'Το πρότυπο "%1$s" εστάλη στο "%2$s"',
	'SENT_REMINDERS' => array(
		0	=>	'Δεν εστάλλει καμία υπενθυμιση.',
		1	=>	'Εστάλλει %s υπενθυμίση.',
		2	=>	'Εστάλησαν %s υπενθυμίσεις.'
	),
	'USERS_DELETED' => '"%1$s" μέλη διεγράφησαν "<b>%2$s"</b>, τύπος αιτήματος : "<b>%3$s</b>"',
	'USER_DELETED' => '"Το μέλος "<b>%1$s</b>" διεγράφη, τύπος αιτήματος :"<b>%2$s</b>"',
	'DELETE_REQUEST_DONT_MATCH' => 'Κάτι δεν πείγε καλά με το αίτημά σας. Τα ζητούμενα μέλη για διαγραφή δεν ταιριάζουν με τα πραγματικά μέλη στη βάση δεδομένων',
	'USER_SELF_DELETED' => 'Ένα μέλος διεγράφη αυτόματα. Η ρύθμηση για τις δημοσιεύσεις έχει οριστεί ως "%s"',
	'SENT_REMINDER_TO' => 'Εστάλησαν υπενθυμίσεις στο χρήστη "% s"',
	)
);
