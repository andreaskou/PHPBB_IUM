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
	'SENT REMINDER TO ADMIN'	=>	'Testerinnerungsmail an den Admininstrator gesendet.',
	'SENT_REMINDERS'		=>	'%s Erinnerungen wurden gesendet.',
	'USERS_DELETED'			=>	'"%1s" Nutzer wurden gelöscht, Anfragetyp : "%2s"',
	'USER_DELETED'			=>	'User "%1s" wurde gelöscht, Anfragetyp : "%2s"',
	'SOMETHING_WRONG'		=>	'Etwas schlug fehl bei deiner Anfrage. Die zur Löschung angefragten Nutzer stimmen nicht mit den aktuellen Nutzern in der Datenbank überein',
	'USER_SELF_DELETED'		=>	'Ein Nutzer hat sich selbst gelöscht. Die Beitragskonfiguration wurde auf "%s" gesetzt.',
));
