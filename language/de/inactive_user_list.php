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
	//
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Aktiv',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'Vorab-Aktivierung der Registrierung',
									2	=>	'Profilwechsel',
									3	=>	'Admin deaktiviert',
									4	=>	'Dauerhaft Gesperrt',
									5	=>	'Vorübergehend Gesperrt'),
	'NEVER_CONNECTED'					=>	'Benutzer nie angemeldet',
	// Inactive users list page
	'ACP_IUM_NODATE'					=>	'Benutzer ist <strong>nicht</strong> deaktiviert',
	'ACP_USERS_WITH_POSTS'				=>	'Nur Benutzer mit Beiträgen anzeigen',
	'LAST_SENT_REMINDER'				=>	'Vorherige Erinnerung',
	'NO_REMINDER_COUNT'					=>	'Noch keine Erinnerungen gesendet',
	'COUNT'								=>	'Anzahl Erinnerungen',
	'NO_PREVIOUS_SENT_DATE'				=> '-',
	'REMINDER_DATE'						=>	'Letzte gesendete Erinnerung',
	'NO_REMINDER_SENT_YET'				=>	'Bisher noch keine Erinnerungen gesendet',
	'IUM_INACTIVE_REASON'				=>	'Status',
	'TOTAL_USERS_WITH_DAY_AMOUNT'		=>	'<strong>%1$s</strong> Benutzer insgesamt <i>für das eingestellte Intervall</i> von "<strong>%2$s</strong>"',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'		=>	'In dieser Liste kannst du die Benutzer sehen, die sich registriert haben, aber deren Konten inaktiv sind, sowie diejenigen, die das Forum für die eingestellte Zeitspanne nicht besucht haben.<br>Die Farben der Benutzernamen stellen den Ignorier Status dar. <span style="color: #DC143C;"><strong>Rot</strong></span> -> Von einem Administrator ignoriert, <span style="color: #008000;"><strong>Grün</strong></span> -> Auto Ignoriert, <span style="color: #000000;"><strong>Schwarz</strong></span> -> Nicht ignoriert.',

	// Sort Lists
	'COUNT_BACK'						=>	'<strong>VON</strong> Tagen/Monaten/Jahren Intervall und rückwärts',
	'ACP_DESCENDING'					=>	'Absteigende Reihenfolge',
	'SORT_BY_SELECT'					=>	'Sortieren nach',
	'SELECT'							=>	'Wähle D/M/Y',
	'THIRTY_DAYS'						=>	'30 Tage',
	'SIXTY_DAYS'						=>	'60 Tage',
	'NINETY_DAYS'						=>	'90 Tage',
	'FOUR_MONTHS'						=>	'4 Monate',
	'SIX_MONTHS'						=>	'6 Monate',
	'NINE_MONTHS'						=>	'9 Monate',
	'ONE_YEAR'							=>	'1 Jahr',
	'TWO_YEARS'							=>	'2 Jahre',
	'THREE_YEARS'						=>	'3 Jahre',
	'FIVE_YEARS'						=>	'5 Jahre',
	'SEVEN_YEARS'						=>	'7 Jahre',
	'DECADE'							=>	'1 Dekade',
	)
);
