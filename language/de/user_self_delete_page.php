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
	'USER_SELF_DELETE_EXPLAIN'		=>  'Mit der Auswahl des Überprüfungskästchens und dem Klicken des Bestätigungsbuttons akzeptierst du deinen Nutzerzugang in diesem Forum zu löschen.<br/>All deine Beiträge bleiben bestehen, aber du wirst nicht mehr in der Lage sein dich mit deinem Nutzernamen und dem Passwort anzumelden.<br/>Wenn du dich mit dem selben Nutzernamen registrierst, werden die alten Beiträge nicht mit dem neuen Nutzer verknüpft.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ich verstehe die Folgen und bestätige',
	'HAVE_TO_LOGIN'					=>  'Es tut uns leid, aber du musst dich einloggen, um diese Seite zu sehen.',
	'HAVE_TO_VERIFY'				=>  'Bitte wähl das Überprüfungskästchen aus.',
	'PAGE_NOT_EXIST'				=>  'Es tut uns leid.<br/><br/>Aber die Selbstlöschung ist deaktiviert.<br/>Wenn du zufällig auf dieser Seite gelandet bist, überprüfe bitte die URL in deinem Browser.<br/>Wenn du einem Link aus einer erhaltenen E-Mail gefolgt bist, dann benachrichtige bitte den Administrator des Forums.',
	'NEEDS_APPROVAL'				=>  'Wir bedauern es sehr, dass du dich entschieden hast %s zu verlassen. Dein Kontolöschungsantrag muss noch überprüft werden, das kann mitunter etwas dauern. In drei Sekunden wirst du zur Startseite weitergeleitet.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Wir bedauern es sehr, dass du dich entschieden hast %s zu verlassen. Dein Konto wurde gelöscht. In drei Sekunden wirst du zur Startseite weitergeleitet.',
	'INVALID_LINK_OR_USER'			=>	'ungültiger Link oder ungültiger Nutzer...',
));
