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

	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'Nicht ignoriert',
		1 =>	'Automatisch',
		2	=>	'Vom Admin ignoriert',
	),
	'IGNORE_METHODES'							=>	'Ignorier Typ',
	'ACP_IUM_APPROVAL_LIST_TITLE'				=>	'Liste der Löschungsgenehmigung',
	'APPROVAL_LIST_PAGE_TITLE'					=>	'Liste der Löschungsgenehmigung',
	'IUM_APPROVAL_LIST_EXPLAIN'					=>	'Genehmigungsliste von Benutzern mit einem Antrag auf Löschung ihres Kontos',
	'NO_REQUESTS'								=>	'Noch keine Anfragen',
	'NO_USER_SELECTED'							=>	'Kein Benutzer ausgewählt.',
	'SELECT_ACTION'								=>	'Bitte wähle eine Aktion aus',
	'IUM_MANAGMENT'								=>	'Inaktive Benutzerverwaltung',
	'IGNORE_USER_LIST'							=>	'Benutzer zur Ignorierliste hinzufügen',
	'IGNORED_USERS_LIST'						=>	'Liste der Benutzer, die ignoriert werden',
	'ADD_IGNORE_USER'							=>	'Zur Liste hinzufügen',
	'REMOVE_IGNORE_USER'						=>	'Von der Liste entfernen',
	'DELETED_SUCCESSFULLY'						=>	'Wurde erfolgreich gelöscht.',
	'REQUEST_TYPE'								=>	'Anforderungs Typ',
	'APPROVE'									=>	'Bestätigen',
	'NO_USER_TYPED'								=>	'Es wurde kein Benutzer angegeben',
	'USER_NOT_FOUND'							=>	'Benutzer %s nicht gefunden.',
	'REGISTERED'								=>	'Registriert',
	'GUESTS'									=>	'Gäste',
	'REGISTERED_COPPA'							=>	'Registrierte COPPA',
	'GLOBAL_MODERATORS'							=>	'Globale Moderatoren',
	'BOTS'										=>	'Bots',
	'NEWLY_REGISTERED'							=>	'Kürzlich Registrierte',
	'REQUEST_DATE'								=>	'Datum des Löschungsantrags',
	'USER_SELECT'								=>	'Auswählen',
	'SELECT_AN_ACTION'							=>	'Wähle eine Aktion',
	'DONT_IGNORE'								=>	'nicht mehr Ignorieren',
	'NOT_IGNORED'								=>	'Nicht mehr ignorierte(r) Benutzer.',
	'RESET_REMINDERS'							=>	'Das Zurücksetzen war erfolgreich.',
	'USER_EXIST_IN_IGNORED_GROUP'				=>	'Es gibt einen oder mehrere Benutzer in einer bereits ignorierten Gruppe.',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Gruppen Management',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Ignorieren',
	'ANDREASK_IUM_GROUP_IGNORE'					=>	'Ignoriere Gruppen',

	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Hier kannst du auswählen, welche Gruppe(n) von der Erweiterung ignoriert werden sollen. Bitte beachte, dass, auch wenn sie <u>nicht</u> hier ausgewählt werden,</br>BOTS, ADMINISTRATOREN, MODERATOREN und GÄSTE <b>Ignoriert</b> werden. Es wird aber trotzdem vorgeschlagen, auch hier die Gruppen auszuwählen!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'			=>	'Halte die Steuerung (CTRL) (oder &#8984; auf dem Mac) auf der Tastatur gedrückt, um mehrere Gruppen auszuwählen.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'			=>	'Hier kannst du die Benutzer verwalten, die du ignorieren (keine Erinnerung senden) oder aus der Ignorieren-Liste entfernen möchtest. <br/><strong>Jeder Benutzer in einer neuen Zeile.</strong><br/>Beachte, die folgenden Gruppen werden <strong> standardmäßig ignoriert</strong> : 1. Gäste, 2. Globale Moderatoren, 3. Administratoren und 4. Bots',

	)
);
