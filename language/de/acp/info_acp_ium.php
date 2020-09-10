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

$lang = array_merge($lang, array(
	//
	'ACP_IUM'					=>	'IUM Konfiguration',
	'ACP_IUM_LIST'				=>	'Inaktive Benutzerliste',
	'ACP_IUM_TITLE'				=>	'IUM Erweiterung',
	'ACP_IUM_TITLE2'			=>	'Inaktive Benutzerliste',
	'ACP_IUM_APPROVAL_LIST'		=>	'Genehmigungsliste ignorieren/löschen',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Erinnerung senden',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Die Vorlage "%1$s" wurde an "%2$s" gesendet.',
	'SENT_REMINDERS'			=>	array(
					0			=>	'Es wurden keine Erinnerungen gesendet',
					1			=>	'%s Erinnerung wurde versendet.',
					2			=>	'%s Erinnerungen wurden versendet.'
	),
	'USERS_DELETED'				=>	'"%1$s" Benutzer wurden gelöscht "<b>%2$s"</b>, Anfragetyp : "<b>%3$s</b>"',
	'USER_DELETED'				=>	'Benutzer "<b>%1$s</b>" wurde gelöscht, Anfragetyp : "<b>%2$s</b>"',
	'DELETE_REQUEST_DONT_MATCH'			=>	'Irgendetwas stimmte nicht mit deiner Anfrage. Angeforderte Benutzer zum Löschen stimmten nicht mit den tatsächlichen Benutzern in der Datenbank überein.',
	'USER_SELF_DELETED'			=>	'Ein Benutzer hat sich selbst gelöscht. Konfiguration für Beiträge war gesetzt auf "%s"',
	'SENT_REMINDER_TO'			=>	'Es wurde eine Erinnerung an den Benutzer "%s" gesendet.',
));
