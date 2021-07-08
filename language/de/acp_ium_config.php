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
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'							=>	'Aktivieren Sie den Inactive User Reminder ',
	'ANDREASK_IUM_INTERVAL'							=>	'Intervall ',
	'ANDREASK_IUM_EMAIL_LIMIT'						=>	'E-Mails einschränken ',
	'ANDREASK_IUM_TOP_USER_THREADS'					=>	'Die wichtigsten Themen der Benutzer einbeziehen ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'			=>	'Wie viele Themen ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'				=>	'Die Top-Themen des Boards einbeziehen ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'			=>	'Wie viele Themen ',
	'ANDREASK_IUM_SELF_DELETE'						=>	'Benutzer kann sich selbst löschen ',
	'ANDREASK_IUM_DELETE_APPROVE'					=>	'Erfordert eine Genehmigung für Selbstlöschungsanträge ',
	'ANDREASK_IUM_KEEP_POSTS'						=>	'Beiträge von gelöschten Benutzern behalten ',
	'ANDREASK_IUM_AUTO_DEL'							=>	'Automatisch Benutzer löschen ',
	'ANDREASK_IUM_AUTO_DEL_DAYS'					=>	'nach Tagen ',
	'ANDREASK_IUM_TEST_EMAIL'						=>	'Test-E-Mail senden ',
	'ANDREASK_IUM_INCLUDED_FORUMS'					=>	'Enthaltene Foren',
	'ANDREASK_IUM_EXCLUDE_FORUM'					=>	'Ausgenommen',
	'EMAILS'										=>	'E-Mails',
	'ACP_IUM_SETTINGS'								=>	'Inaktive Benutzer Erinnerungseinstellungen',
	'ACP_IUM_MAIL_SETTINGS'							=>	'Erinnerungs Einstellungen',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'					=>	'Erinnerung Inklusive Einstellungen',
	'ACP_IUM_DANGER'								=>	'Vorsicht - Gefährlicher Bereich',

	'ANDREASK_IUM_EXCLUDED_FORUMS'					=>	'Ausgeschlossene Foren',
	'ANDREASK_IUM_INCLUDE_FORUM'					=>	'Einschliesslich',
	'SELECT_A_FORUM'								=>	'Bitte wähle ein Forum',
	'EXCLUDED_EMPTY'								=>	'Keine ausgeschlossenen Foren...',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'					=>	'Falls aktiviert, beginnt die Erweiterung mit dem Senden von Erinnerungen an "Schläfer".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'					=>	'Es handelt sich um das Intervall von Tagen, die zurückgerechnet werden müssen, um einen Benutzer als "Schläfer" zu erkennen. Empfohlen wird ein Intervall von 30 Tagen',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'				=>	'Anzahl der Erinnerungen, die <b>pro Tag</b> versendet werden können . Empfohlen wird ein Wert von ~250. Erkundige dich aber bei deinem Provider nach einer eventuellen Beschränkung der Anzahl von E-Mails pro Tag',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'			=>	'Wenn diese Option aktiviert ist, enthält die E-Mail die wichtigsten, aktiven Themen des Benutzers seit seinem letzten Besuch.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Anzahl der Top-Themen der Benutzer, die in die E-Mail aufgenommen werden sollten.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'		=>	'Wenn aktiviert, enthält die E-Mail die wichtigsten Themen des Boards seit dem letzten Besuch des Benutzers.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Anzahl der Forenthemen, die in E-Mails enthalten sein sollten',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'				=>	'Wenn aktiviert, wird dem Benutzer ein Link zu einer Seite „<strong>board_url/ium/{random_key}</strong>" hinzugefügt und er kann sein Konto selbst löschen.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'			=>	'Wenn diese Option aktiviert ist, müssen alle Anträge auf Selbstlöschung vom Administrator genehmigt werden.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'				=>	'"Ja" löscht den Benutzer, aber <strong>behält</strong> die Beiträge, "Nein" löscht auch die Beiträge des Benutzers.',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'					=>	'Benutzer werden nach einer bestimmten Anzahl von Tagen automatisch gelöscht, wenn sie nach den 3 Erinnerungen nicht zurückkehren.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'			=>	'Anzahl der Tage, die gewartet werden sollen, bis ein Benutzer nach dem gewünschten Tag automatisch gelöscht wird.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'				=>	'Eine Test-E-Mail wird an "%s" gesendet.',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'			=>	'Wähle eine Kategorie oder Unterkategorie die aus den Listen der Top-Themen <strong>ausgeschlossen</strong> wird, die an die Benutzer gesendet werden soll.',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'			=>	'Wähle eine Kategorie oder Unterkategorie die in den Listen der Top-Themen <strong>enthalten</strong> wird, die an die Benutzer gesendet werden soll.',

	// configuration page
	'INACTIVE_MAIL_SENT_TO'							=>	'Ein Beispiel für E-Mail für inaktive Benutzer wurde an "%s" gesendet.',
	'SLEEPER_MAIL_SENT_TO'							=>	'Ein Beispiel für E-Mail für schlafende Benutzer wurde an "%s" gesendet.',
	'SEND_SLEEPER'									=>	'Schläfer Vorlage senden',
	'SEND_INACTIVE'									=>	'Inaktive Vorlage senden',
	'PLUS_SUBFORUMS'								=>	'+Unterforen',

	)
);
