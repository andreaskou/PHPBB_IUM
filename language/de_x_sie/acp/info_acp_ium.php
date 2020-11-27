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
	'LOG_SENT_REMINDER_TO_ADMIN'	=>	'<strong>Die Vorlage "%1$s" wurde an "%2$s" gesendet.</strong>',
	'LOG_SENT_REMINDERS'			=>	array(
					0			=>	'<strong>Es wurden keine Erinnerungen gesendet</strong>',
					1			=>	'<strong>%s Erinnerung wurde versendet.</strong>',
					2			=>	'<strong>%s Erinnerungen wurden versendet.</strong>'
	),
	'LOG_USERS_DELETED'				=>	'"%1$s" Benutzer wurden gelöscht "<b>%2$s"</b>, Anfragetyp : "<b>%3$s</b>"',
	'LOG_USER_DELETED'				=>	'Benutzer "<b>%1$s</b>" wurde gelöscht, Anfragetyp : "<b>%2$s</b>"',
	'LOG_DELETE_REQUEST_DONT_MATCH'			=>	'Irgendetwas stimmte nicht mit Ihrer Anfrage. Angeforderte Benutzer zum Löschen stimmten nicht mit den tatsächlichen Benutzern in der Datenbank überein.',
	'LOG_USER_SELF_DELETED'			=>	'Ein Benutzer hat sich selbst gelöscht. Konfiguration für Beiträge war gesetzt auf "%s"',
	'LOG_SENT_REMINDER_TO'			=>	'Es wurde eine Erinnerung an den Benutzer "%s" gesendet.',
));
