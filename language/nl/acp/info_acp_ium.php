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
	//
	'ACP_IUM'	=>	'IUM configuratie',
	'ACP_IUM_LIST'	=>	'Inactieve Gebruikers Lijst',
	'ACP_IUM_TITLE'	=>	'IUM extensie',
	'ACP_IUM_TITLE2'	=> 'Inactieve Gebruikers Lijst',
	'ACP_IUM_APPROVAL_LIST'	=> 'Goedkeuringslijst negeren/verwijderen',
	// ACP configuratiepagina
	'ANDREASK_IUM_ENABLE'	=>	'Geavanceerde niet actieve gebruiker herinnering inschakelen ',
	'ANDREASK_IUM_INTERVAL'	=>	'Interval ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Beperk e-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Inclusief de top onderwerpen van gebruikers ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Hoeveel onderwerpen ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Inclusief top onderwerpen van het forum ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Hoeveel onderwerpen ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'Gebruiker kan zichzelf verwijderen',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Heeft goedkeuring nodig voor account zelf te verwijderen',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Houd berichten van verwijderde gebruikers bij',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Gebruiker automatisch verwijderen',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Dagen daarna',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Verzend e-mail test',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Inbegrepen forums',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Uitsluiten',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Groepen negeren',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Uitgesloten forums',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Inclusief',
	'SELECT_A_FORUM'							=>	'Selecteer alstublieft een forum',
	'EXCLUDED_EMPTY'							=>	'Geen uitgesloten forums...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Groep management',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Negeer',

	// ACP gebruikersoverzicht optie toevoegen
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Stuur herinnering',

	// ACP configuratiepagina Uitleg
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Indien ingeschakeld, start de extensie met het zenden van herinneringen naar "slapers".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Dit is de interval van dagen om terug te tellen om een gebruiker als een "slaper" te beschouwen. Aanbevolen is 30 dagen',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Aantal herinneringen die <b>per dag</b> kunnen worden verzonden. Aanbevolen is ~250. Maar neem contact op met uw provider voor de limiet van e-mails per dag',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Als deze optie is ingeschakeld, bevat de e-mail de belangrijkste actieve onderwerpen van de gebruiker sinds het laatste bezoek van de gebruiker.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Aantal van gebruikers Top onderwerpen die in de e-mail moeten worden opgenomen.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Als dit is ingeschakeld, bevat de mail de belangrijkste onderwerpen van het forum sinds het laatste bezoek van de gebruiker.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Aantal forum onderwerpen dat in e-mail moet worden opgenomen',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Indien ingeschakeld, wordt een link naar een pagina "<strong>board_url/ium/{random_key}</strong>" toegevoegd aan de gebruiker en kunnen ze zelf hun account verwijderen..',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Indien ingeschakeld, moet elk verzoek om zelf te verwijderen worden goedgekeurd door de beheerder.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Ja" zal de gebruiker verwijderen maar zal <strong>de berichten</strong> behouden, "Nee" zal ook de berichten van de gebruiker verwijderen.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Hier kunt u de gebruikers beheren die u wilt negeren (geen herinnering verzenden) of ze uit de negeer lijst verwijderen.<br><strong>Elke gebruiker in een nieuwe regel.</strong><br>Let op, de volgende groepen worden <strong>standaard genegeerd</strong> : 1. GASTEN, 4. GLOBALE_MODERATORS, 5. BEHEERDER en 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Gebruikers worden na een bepaald aantal dagen automatisch verwijderd als ze na de 3 herinneringen niet inloggen.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Aantal dagen wachten tot een gebruiker automatisch wordt verwijderd na de gevraagde dag.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Er wordt een test mail verzonden naar "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Selecteer een categorie of subcategorie om <strong>uit te sluiten</strong> in de lijsten met top onderwerpen die naar de gebruikers worden verzonden',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Selecteer een categorie of subcategorie <strong>op te nemen</strong> in de lijst met top onderwerpen die naar de gebruikers wordt verzonden',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Hier kun je selecteren welke groepen moeten worden genegeerd door de extensie. Hoewel ze <u>hier niet</u> geselecteerd zijn zullen </> BOTS, BEHEERDERS, MODERATOROS en GASTEN <b>genegeerd</ b> worden. Maar het is nog steeds aan te raden om hier ook de groepen te selecteren!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Houd de control (CTRL) (of &#8984; voor mac) op het toetsenbord ingedrukt om meerdere groepen te selecteren.',

	// configuratiepagina Legenda
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'In deze lijst kunt u de gebruikers zien die zich hebben geregistreerd, maar waarvan de accounts inactief zijn en degenen die het forum gedurende de ingestelde tijd hier niet hebben bezocht.<br>Gebruikers naam kleuren vertegenwoordigen de negeer status. <span style="color: #DC143C;"><strong>Rood</strong></span> -> Genegeerd door een beheerder, <span style="color: #008000;"><strong>Groen</strong></span> -> Auto genegeerd, <span style="color: #000000;"><strong>Zwart</strong></span> -> Niet genegeerd.',
	'ACP_IUM_SETTINGS'	=>	'Inactieve gebruikers herinnering instellingen',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Herinnering instellingen',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Herinnering "Inclusief" instellingen',
	'ACP_IUM_DANGER'	=>	'Gevarenzone',
	// configuratiepagina
	'INACTIVE_MAIL_SENT_TO'			=>	'Een voorbeeld van e-mail voor inactieve gebruikers is verzonden naar "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Een voorbeeld van e-mail voor slapende gebruikers is verzonden naar "%s"',
	'SEND_SLEEPER'					=>	'Zend slaper sjabloon',
	'SEND_INACTIVE'					=>	'Zend inactief sjabloon',
	'PLUS_SUBFORUMS'				=>	'+Subforums',
	// Sorteren op, opties voor de lijst met inactieve gebruikers
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Actief',
									// Rest van redenen zijn niet actief omdat ze worden gecontroleerd via constants.php
									1	=>	'Registratie pre-activatie',
									2	=>	'Profiel wijzigen',
									3	=>	'Beheerder gedeactiveerd',
									4	=>	'Permanent verbannen',
									5	=>	'Tijdelijk verbannen'),
	'NEVER_CONNECTED'	=>	'Gebruiker nooit ingelogd',
	// Inactieve gebruikerslijstpagina
	'ACP_IUM_NODATE'	=>	'Gebruiker is <strong>niet</strong> uitgeschakeld',
	'ACP_USERS_WITH_POSTS'	=>	'Toon alleen gebruikers met berichten',
	'LAST_SENT_REMINDER'	=>	'Vorige herinnering',
	'NO_REMINDER_COUNT'	=>	'Nog geen herinneringen verzonden',
	'COUNT'	=>	'Herinneringen teller',
	'NO_PREVIOUS_SENT_DATE'	=> 'Nog geen herinneringen verzonden',
	'REMINDER_DATE'	=>	'Laatste herinnering verzonden',
	'NO_REMINDER_SENT_YET'	=>	'Nog geen herinneringen verzonden',
	'IUM_INACTIVE_REASON'	=>	'Status',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Gebruiker(s) in totaal <i>voor het ingestelde interval</i> van "<strong>%2$s</strong>"',
	// De goedkeuringspagina verwijderen
	'IGNORE_METHODE'	=> array(
		0 =>	'Niet genegeerd',
		1 =>	'Auto',
		2	=>	'Genegeerd door beheerder',
	),
	'IGNORE_METHODES'	=>	'Negeer type',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Lijst met verwijdering goedkeuringen',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Lijst met verwijdering goedkeuringen',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Goedkeuringslijst van gebruikers met een verzoek om hun account te verwijderen',
	'NO_REQUESTS'			=> 'Nog geen aanvragen',
	'NO_USER_SELECTED'		=>	'Geen gebruiker geselecteerd.',
	'SELECT_ACTION'			=>	'Gelieve een actie te selecteren',
	'IUM_MANAGMENT'			=>	'Inactief gebruikers beheer',
	'IGNORE_USER_LIST'		=>	'Gebruikers toevoegen aan de negeer lijst',
	'IGNORED_USERS_LIST'	=>	'Lijst met gebruikers die worden genegeerd',
	'ADD_IGNORE_USER'		=>	'Toevoegen aan lijst',
	'REMOVE_IGNORE_USER'	=>	'Verwijder van Lijst',
	'DELETED_SUCCESSFULLY'	=>	'Met succes verwijderd.',
	'REQUEST_TYPE'			=>	'Aanvraag type',
	'APPROVE'				=>	'Goedkeuren',
	'NO_USER_TYPED'			=>	'Er is geen gebruiker opgegeven',
	'USER_NOT_FOUND'		=>	'Gebruiker(s) %s niet gevonden.',
	'REGISTERED'			=>	'Geregistreerd',
	'GUESTS'				=>	'Gasten',
	'REGISTERED_COPPA'		=>	'Geregistreerde COPPA',
	'GLOBAL_MODERATORS'		=>	'Globale Moderators',
	'BOTS'					=>	'Bots',
	'NEWLY_REGISTERED'		=>	'Nieuwe geregistreerd',
	'USER_SELECT'		=>	'Select',
	'SELECT_AN_ACTION'		=>	'Selecteer een actie',
	'DONT_IGNORE'		=>	'Niet negeren',
	'NOT_IGNORED'		=>	'Gebruiker(s) niet meer genegeerd.',
	'RESET_REMINDERS'		=>	'Reset was succesvol.',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>VAN</strong> dagen/maanden/jaren interval en achteruit',
	'ACP_DESCENDING'	=>	'Aflopende volgorde',
	'SORT_BY_SELECT'	=>	'Sorteer op',
	'REQUEST_DATE'		=>	'Datum verwijderingsverzoek',
	'SELECT'		=>	'Selecteer D/M/Y',
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
	'DECADE'		=>	'Een decennium',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Sjabloon "%1$s" was verstuurd naar "%2$s"',
	'SENT_REMINDERS'			=>	'%s herinneringen zijn verzonden.',
	'USERS_DELETED'				=>	'"%1$s" gebruikers zijn verwijderd "<b>%2$s"</b>, aanvraag type : "<b>%3$s</b>"',
	'USER_DELETED'				=>	'Gebruiker "<b>%1$s</b>" is verwijderd, aanvraag type : "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Er was iets mis met je verzoek. Gevraagde gebruikers voor verwijdering kwamen niet overeen met de daadwerkelijke gebruikers in de database',
	'USER_SELF_DELETED'			=>	'Een gebruiker heeft zichzelf verwijderd. Configuratie voor berichten is ingeschakeld "%s"',
	'SENT_REMINDER_TO'			=>	'Er is een herinnering verzonden naar "%s"',

	)
);
