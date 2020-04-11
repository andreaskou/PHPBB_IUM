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
	'USER_SELF_DELETE_TITLE'		=>  'Seite zur Selbstlöschung.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Indem du das Kontrollkästchen aktivierst und auf die Schaltfläche "Bestätigen" klickst, erklärst du dich damit einverstanden, dein Benutzerkonto in diesem Forum zu löschen.<br/>Alle deine Beiträge bleiben erhalten, aber du kannst dich nicht mehr mit deinem Benutzernamen/Passwort anmelden.<br/>Wenn du ein neues Konto mit dem gleichen Benutzernamen erstellst, werden die vorherigen Beiträge nicht mit dem neuen Konto verbunden.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ich verstehe die Konsequenzen und bestätige',
	'HAVE_TO_LOGIN'					=>  'Es tut uns leid, aber du musst dich einloggen, um diese Seite zu sehen.',
	'HAVE_TO_VERIFY'				=>  'Bitte markiere das Kontrollkästchen.',
	'PAGE_NOT_EXIST'				=>  'Wir entschuldigen uns sehr für die Unannehmlichkeiten.<br/><br/>Aber die Selbstlöschung ist deaktiviert.<br/>Falls du versehentlich auf diese Seite gelangt bist, überprüfe bitte die von dir in deinem Browser eingegebene URL.<br/>Wenn du einem Link aus einer E-Mail gefolgt bist, die du von uns erhalten hast, wende dich bitte an den Administrator der Seite.',
	'NEEDS_APPROVAL'				=>	'Wir bedauern es sehr, dass du dich entschieden hast %s zu verlassen. Bitte beachte, dass dein Konto noch nicht gelöscht ist, es muss erst genehmigt werden. Bitte gib uns etwas Zeit für diese Aktion. In 3 Sekunden wirst du auf unsere Homepage weitergeleitet.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Wir bedauern es sehr, dass du dich entschieden hast %s zu verlassen. dein Konto wurde gelöscht. In 3 Sekunden wirst du auf unsere Homepage weitergeleitet.',
	'INVALID_LINK_OR_USER'			=>	'ungültige Kombination aus Link und/oder Benutzer...',
));
