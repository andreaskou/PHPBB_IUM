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
	'USER_SELF_DELETE_EXPLAIN'		=>  'Indem Sie das Kontrollkästchen aktivieren und auf die Schaltfläche "Bestätigen" klicken, erklärst Sie sich damit einverstanden, Ihr Benutzerkonto in diesem Forum zu löschen.<br/>Alle Ihre Beiträge bleiben erhalten, aber Sie können sich nicht mehr mit Ihrem Benutzernamen/Passwort anmelden.<br/>Wenn Sie ein neues Konto mit dem gleichen Benutzernamen erstellen, werden die vorherigen Beiträge nicht mit dem neuen Konto verbunden.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ich verstehe die Konsequenzen und bestätige',
	'HAVE_TO_LOGIN'					=>  'Es tut uns leid, aber Sie müssen sich einloggen, um diese Seite zu sehen.',
	'HAVE_TO_VERIFY'				=>  'Bitte markieren Sie das Kontrollkästchen.',
	'PAGE_NOT_EXIST'				=>  'Wir entschuldigen uns sehr für die Unannehmlichkeiten.<br/><br/>Aber die Selbstlöschung ist deaktiviert.<br/>Falls Sie versehentlich auf diese Seite gelangt sind, überprüfen Sie bitte die von Ihnen in Ihren Browser eingegebene URL.<br/>Wenn Sie einem Link aus einer E-Mail gefolgt sind, die Sie von uns erhalten haben, wende Sie sich bitte an den Administrator der Seite.',
	'NEEDS_APPROVAL'				=>	'Wir bedauern es sehr, dass Sie sich entschieden haben %s zu verlassen. Bitte beachten Sie, dass Ihr Konto noch nicht gelöscht ist, es muss erst genehmigt werden. Bitte geben Sie uns etwas Zeit für diese Aktion. In 3 Sekunden werden Sie auf unsere Homepage weitergeleitet.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Wir bedauern es sehr, dass Sie sich entschieden haben %s zu verlassen. Ihr Konto wurde gelöscht. In 3 Sekunden werden Sie auf unsere Homepage weitergeleitet.',
	'INVALID_LINK_OR_USER'			=>	'ungültige Kombination aus Link und/oder Benutzer...',
));
