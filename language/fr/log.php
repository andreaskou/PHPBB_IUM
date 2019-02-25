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
	'SENT_REMINDERS'		=>	'%s rappels ont été envoyés.',
	'USERS_DELETED'			=>	'"%1s" Les utilisateurs ont été supprimés, type de demande: "%2s"',
	'USER_DELETED'			=>	'L’utilisateur "%1s" a été supprimé, type de demande: "%2s"',
	'SOMETHING_WRONG'		=>	'Quelque chose n’allait pas avec votre demande. Les utilisateurs demandés pour la suppression ne correspondaient pas aux utilisateurs réels de la base de données',
	'USER_SELF_DELETED'		=>	'Un utilisateur a été auto-supprimé. La configuration des publications a été définie sur "%s"',
));
