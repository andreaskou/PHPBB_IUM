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
	'USER_SELF_DELETE_TITLE'			=>  'Selbstlöschungsseite',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Mit der Auswahl des Überprüfungskästchens und dem Klicken des Bestätigungsbuttons akzeptieren Sie Ihren Nutzerzugang in diesem Forum zu löschen.<br/>All Ihre Beiträge bleiben bestehen, aber Sie werden nicht mehr in der Lage sein, sich mit Ihrem Nutzernamen und dem Passwort anzumelden.<br/>Wenn Sie sich mit dem selben Nutzernamen registrieren, werden die alten Beiträge nicht mit dem neuen Nutzer verknüpft.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ich verstehe die Folgen und bestätige',
	'HAVE_TO_LOGIN'					=>  'Es tut uns leid, aber Sie müssen sich einloggen, um diese Seite zu sehen.',
	'HAVE_TO_VERIFY'				=>  'Bitte wählen Sie das Überprüfungskästchen aus.',
	'PAGE_NOT_EXIST'				=>  'Es tut uns leid.<br/><br/>Aber die Selbstlöschung ist deaktiviert.<br/>Wenn Sie zufällig auf dieser Seite gelandet sind, überprüfen Sie bitte die URL in Ihrem Browser.<br/>Wenn Sie einem Link aus einer erhaltenen E-Mail gefolgt sind, dann benachrichtigen Sie bitte den Administrator des Forums.',
	'NEEDS_APPROVAL'				=>  'Wir bedauern es sehr, dass Sie sich entschieden haben %s zu verlassen. Ihr Kontolöschungsantrag muss noch überprüft werden, das kann mitunter etwas dauern. In drei Sekunden werden Sie zur Startseite weitergeleitet.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Wir bedauern es sehr, dass Sie sich entschieden haben %s zu verlassen. Ihr Konto wurde gelöscht. In drei Sekunden werden Sie zur Startseite weitergeleitet.',
	'INVALID_LINK_OR_USER'			=>	'ungültiger Link oder ungültiger Nutzer...',
));
