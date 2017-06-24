<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* Nederlandse vertaling @ Solidjeuh <http://www.froddelpower.be>
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
	//
	'ACP_IUM'	=>	'IUM configuratie',
	'ACP_IUM_LIST'	=>	'Inactieve Gebruikers Lijst',
	'ACP_IUM_TITLE'	=>	'IUM extensie',
	'ACP_IUM_TITLE2'	=> 'Inactieve Gebruikers Lijst',
	'ACP_IUM_APPROVAL_LIST'	=> 'negeer/Verwijder Goedkeuringslijst',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Schakel geavanceerde Inactieve Gebruikers Herinnering in ',
	'ANDREASK_IUM_INTERVAL'	=>	'Tussenperiode ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limiteer E-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Inclusief gebruiker\'s top topics ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Hoeveel topics ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Inclusief forums\'s top topics ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Hoeveel topics ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'Gebruiker kan zichzelf verwijderen',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'De verwijder aanvraag heeft goedkeuring nodig',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Hou posten van verwijderde gebruikers',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Verwijder gebruiker automatisch',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Dagen na',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Zend test e-mail',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'inbegrepen forums',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Uitsluiten',

	'ANDREASK_IUM_EXCLUDED_FORUMS'			=>	'Uitgesloten forums',
	'ANDREASK_IUM_INCLUDE_FORUM'			=>	'Inbegrepen',
	'SELECT_A_FORUM'						=>	'Gelieve een forum te selecteren',
	'EXCLUDED_EMPTY'						=>	'Geen uitgesloten forums...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Groep beheer',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Negeer',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Zend herinnering',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Indien ingeschakeld zal de extensie herinneringen zenden naar de "slapers"".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Het is de tussentijd van dagen om terug tellen om een gebruiker als een "slaper" te beschouwen. Aanbevolen is 30 dagen',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Aantal herinneringen die kunnen verzonden worden <b>per dag</b>. Aanbevolen is ~250. Maar controleer bij je host of er limieten zijn voor e-mails per dag',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Indien ingeschakeld zal de mail de gebruikers top actieve topics toevoegen sinds het laatste bezoek.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Aantal van gebruikers top actieve topics dat moeten toegevoegd worden in de e-mail.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Indien ingeschakeld zal de mail forums top topics toevoegen sinds gebruikers laatste bezoek.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Aantal van het forum top topics dat moet toegevoegd worden in de e-mail',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Indien ingeschakeld zal een link naar een pagina "<strong>board_url/ium/{random_key}</strong>" toegevoegd worden en zal de gebruiker de mogelijkheid hebben om zijn/haar account te verwijderen..',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Indien ingeschakeld zullen alle account verwijder aanvragen moeten goedgekeurd worden door de beheerder.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Ja" zal de gebruiker verwijderen maar zal de posten <strong>bijhouden</strong>. "Nee" zal de posten van de gebruiker ook verwijderen.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Hier kan je de gebruikers beheren die je wenst te negeren (geen herinnering wil zenden) of ze verwijderen van de negeer lijst.<br/><strong>Elke gebruiker op een nieuwe lijn.</strong><br/>Let op, de volgende groepen worden <strong>standaard al genegeerd</strong> : 1. GASTEN, 4. GLOBALE MODERATORS, 5. BEHEERDERS en 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Gebruikers zullen automatisch verwijderd worden na een opgegeven aantal dagen als ze niet inloggen na 3 herinneringen.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Aantal dagen om te wachten totdat een gebruiker automatisch verwijderd zal worden na de aangegeven dag.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Een test e-mail zal verzonden worden naar "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Selecteer een subcategorie om <strong>uit te sluiten</strong> van de top topic lijst die verzonden wordt naar de gebruikers',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Selecteer een categorie of subcategorie om <strong>toe te voegen</strong> in de top topic lijst die verzonden wordt naar de gebruikers',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Hier kan je selecteren welke groep(en) genegeerd moeten worden door de extensie. Houd er rekening mee dat hoewel ze <u>hier niet</u> gelelecteerd zijn,</br>BOTS, BEHEERDER, MODERATOROS en GASTEN <b>genegeerd</b> worden. Maar het wordt nog steeds aangeraden om hier ook de groepen te selecteren!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Houd de control toets (CTRL) (of &#8984; voor mac) ingedrukt op het toetsenbord om meerdere groepen te selecteren.',
	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'In deze lijst kan je de gebruikers zien die geregistreerd zijn maar waarvan de accounts inactief zijn en van gebruikers die het forum al een hele tijd niet meer bezocht hebben.',
	'ACP_IUM_SETTINGS'	=>	'Inactieve Gebruikers Herinnering Instellingen',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Herinnering Instellingen',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Herinnering Include instellingen',
	'ACP_IUM_DANGER'	=>	'Gevarenzone',
	// configuration page
	'INACTIVE_MAIL_SENT_TO'			=>	'Een e-mail voorbeeld voor inactieve gebruikers is verzonden naar "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Een e-mail voorbeeld voor inactieve gebruikers is verzonden naar "%s"',
	'SEND_SLEEPER'					=>	'Zend Slapers template',
	'SEND_INACTIVE'					=>	'Zend Inactieve template',
	'PLUS_SUBFORUMS'				=>	'+Subforums',
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(	0	=>	'Actieve',
									1	=>	'Registratie pre-activatie',
									2	=>	'Profiel veranderd',
									3	=>	'Beheerder gedeactiveerd',
									4	=>	'Permanent geband',
									5	=>	'Tijdelijk geband'),
	'NEVER_CONNECTED'	=>	'Gebruiker nooit ingelogd',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Gebruiker is <strong>niet</strong> uitgeschakeld',
	'ACP_USERS_WITH_POSTS'	=>	'Toon enkel gebruikers met posten',
	'LAST_SENT_REMINDER'	=>	'Vorige herinnering',
	'NO_REMINDER_COUNT'	=>	'Nog geen herinneringen verzonden',
	'COUNT'	=>	'Herinneringen aantal',
	'NO_PREVIOUS_SENT_DATE'	=> 'Nog geen herinneringen verzonden',
	'REMINDER_DATE'	=>	'Laatste verzonden herinnering',
	'NO_REMINDER_SENT_YET'	=>	'Nog geen herinneringen verzonden',
	'IUM_INACTIVE_REASON'	=>	'Status',
	// Delete approval page
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Verwijdering goedkeuring lijst',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Verwijdering goedkeuring lijst',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Goedkeuring lijst van gebruikers die een aanvraag hebben ingediend om hun account te verwijderen',
	'NO_REQUESTS'			=> 'Nog geen aanvragen',
	'NO_USER_SELECTED'		=>	'Geen gebruiker geselecteerd.',
	'IUM_MANAGMENT'			=>	'Inactieve Gebruikers beheer',
	'IGNORE_USER_LIST'		=>	'Voeg gebruikers toe aan de negeer lijst',
	'IGNORED_USERS_LIST'	=>	'Lijst van genegeerde gebruikers',
	'ADD_IGNORE_USER'		=>	'Voeg toe aan lijst',
	'REMOVE_IGNORE_USER'	=>	'Verwijder van lijst',
	'DELETED_SUCCESSFULLY'	=>	'Succesvol verwijderd.',
	'REQUEST_TYPE'			=>	'Aanvraag Type',
	'APPROVE'				=>	'Goedkeuren',
	'NO_USER_TYPED'			=>	'Geen gebruiker ingevuld',
	'USER_NOT_FOUND'		=>	'Gebruiker(s) %s niet gevonden.',
	'REGISTERED'			=>	'Geregistreerd',
	'GUESTS'				=>	'Gasten',
	'REGISTERED_COPPA'		=>	'Geregistreerde COPPA gebruikers',
	'GLOBAL_MODERATORS'		=>	'Globale Moderators',
	'BOTS'					=>	'Bots',
	'NEWLY_REGISTERED'		=>	'Nieuw geregistreerde leden',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>VAN</strong> dagen/maanden/jaren tussentijd en omgekeerd',
	'ACP_DESCENDING'	=>	'Aflopende volgorde',
	'SORT_BY_SELECT'	=>	'Gesorteerd op',
	'REQUEST_DATE'		=>	'Aanvraag verwijdering datum',
	'SELECT'	=>	'Select D/M/Y',
	'THIRTY_DAYS'	=>	'Dertig dagen',
	'SIXTY_DAYS'	=>	'Zestig dagen',
	'NINETY_DAYS'	=>	'Negentig dagen',
	'FOUR_MONTHS'	=>	'Vier maanden',
	'SIX_MONTHS'	=>	'Zes maanden',
	'NINE_MONTHS'	=>	'Negen maanden',
	'ONE_YEAR'		=>	'Een jaar',
	'TWO_YEARS'		=>	'Twee jaar',
	'THREE_YEARS'	=>	'Drie jaar',
	'FIVE_YEARS'	=>	'Vijf jaar',
	'SEVEN_YEARS'	=>	'Zeven jaar',
	'DECADE'		=>	'Tien jaar',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Template "%1$s" verzonden naar "%2$s"',
	'SENT_REMINDERS'			=>	'%s herinneringen zijn verzonden.',
	'USERS_DELETED'				=>	'"%1$s" gebruikers werden verwijderd, aanvraag type : "%2$s"',
	'USER_DELETED'				=>	'Gebruiker "%1$s" werd verwijderd, aanvraag type : "%2$s"',
	'SOMETHING_WRONG'			=>	'Er is iets mis gegaan met je aanvraag. De opgevraagde gebruikers om te verwijderen komen niet overeen met de gebruikers in de database',
	'USER_SELF_DELETED'			=>	'Een gebruiker heeft zichzelf verwijderd. Configuratie van de posten stond op "%s"',
	'SENT_REMINDER_TO'			=>	'Er werd een herinnering verzonden naar gebruiker "%s"',

	)
);
