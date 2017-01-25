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

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'USER_SELF_DELETE_TITLE'		=>  'Zelf verwijderings pagina.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Door het aanvinken van de verificatie box en het klikken op de confirmatie knop ga je akkoord om je account te verwijderen van dit forum.<br/>Al je posten zullen blijven staan, maar je zal niet meer kunnen inloggen met je gebruikersnaam en paswoord.<br/>Indien je opnieuw een account aanmaakt met dezelfde gebruikersnaam zullen je posten niet op je nieuwe account komen te staan.',
	'USER_SELF_DELETE_VERIFY'		=>  'Ik begrijp de gevolgen en ik verifieer',
	'HAVE_TO_LOGIN'					=>  'het spijt ons, maar je moet inloggen om deze pagina te bekijken.',
	'HAVE_TO_VERIFY'				=>  'Gelieve de verificatie box aan te vinken.',
	'PAGE_NOT_EXIST'				=>  'Het spijt ons voor het ongemak.<br/><br/>Maar de zelf verwijdering optie is uitgeschakeld.<br/>Indien je per ongeluk op deze pagina terecht kwam, gelieve dan de url te controleren die je hebt ingetypt in je browser.<br/>Indien je een link volgde van een e-mail die je hebt ontvangen, gelieve dan de beheerder van dit forum te contacteren.',
	'NEEDS_APPROVAL'				=>	'We vinden het spijtig dat je %s wenst te verlaten. Je account is nog steeds niet verwijderd, dit moet eerst goedgekeurd worden. Gelieve onze wat tijd te geven om dit uit te voeren. Binnen 3 seconden zal je doorgestuurd worden naar onze startpagina.',
	'USER_SELF_DELETE_SUCCESS'		=>	'We vinden het spijtig dat je %s wenst te verlaten. je account werd succesvol verwijderd. Binnen 3 seconden zal je doorgestuurd worden naar onze startpagina.',
	'INVALID_LINK_OR_USER'			=>	'Ongeldige combinatie.',
));
