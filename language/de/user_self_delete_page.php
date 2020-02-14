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
	'USER_SELF_DELETE_EXPLAIN'		=>  'Indem Du das Kontrollkästchen aktivierst und auf die Schaltfläche "Bestätigen" klickst, erklärst Du Dich damit einverstanden, Dein Benutzerkonto in diesem Forum zu löschen.<br/>Alle Deine Beiträge bleiben erhalten, aber Du kannst Dich nicht mehr mit Deinem Benutzernamen/Passwort anmelden.<br/>Wenn Du ein neues Konto mit dem gleichen Benutzernamen erstellst, werden die vorherigen Beiträge nicht mit dem neuen Konto verbunden.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ich verstehe die Konsequenzen und bestätige',
	'HAVE_TO_LOGIN'					=>  'Es tut uns leid, aber Du musst Dich einloggen, um diese Seite zu sehen.',
	'HAVE_TO_VERIFY'				=>  'Bitte markiere das Kontrollkästchen.',
	'PAGE_NOT_EXIST'				=>  'Wir entschuldigen uns sehr für die Unannehmlichkeiten.<br/><br/>Aber die Selbstlöschung ist deaktiviert.<br/>Falls Du versehentlich auf diese Seite gelangt bist, überprüfe bitte die von Dir in Deinem Browser eingegebene URL.<br/>Wenn Du einem Link aus einer E-Mail gefolgt bist, die Du von uns erhalten hast, wende Dich bitte an den Administrator der Seite.',
	'NEEDS_APPROVAL'				=>	'Wir bedauern es sehr, dass Du Dich entschieden hast %s zu verlassen. Bitte beachte, dass Dein Konto noch nicht gelöscht ist, es muss erst genehmigt werden. Bitte gib uns etwas Zeit für diese Aktion. In 3 Sekunden wirst Du auf unsere Homepage weitergeleitet.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Wir bedauern es sehr, dass Du Dich entschieden hast %s zu verlassen. Dein Konto wurde gelöscht. In 3 Sekunden wirst Du auf unsere Homepage weitergeleitet.',
	'INVALID_LINK_OR_USER'			=>	'ungültige Kombination aus Link und/oder Benutzer...',
));
