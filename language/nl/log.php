<?php

/**
* This file is part of the phpBB Forum extension package
* IUM (Inactive User Manager).
*
* @copyright (c) 2016 by Andreas Kourtidis
* Nederlandse vertaling @ Solidjeuh <https://www.froddelpower.be>
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
	'SENT_REMINDERS'		=>	'%s herinneringen werden verzonden.',
	'USERS_DELETED'			=>	'"%1s" gebruikers werden verwijderd, verzoek type : "%2s"',
	'USER_DELETED'			=>	'Gebruiker "%1s" werd verwijderd, verzoek type : "%2s"',
	'SOMETHING_WRONG'		=>	'Er was iets niet correct met je verzoek. Gevraagde gebruikers om te verwijderen, komen niet overeen met de werkelijke gebruikers in de database',
	'USER_SELF_DELETED'		=>	'Een gebruiker heeft zichzelf verwijderd. Configuratie voor posten was ingesteld op "%s"',
));
