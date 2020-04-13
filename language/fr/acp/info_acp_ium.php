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
	'ACP_IUM'	=>	'Configuration IUM',
	'ACP_IUM_LIST'	=>	'Liste des utilisateurs inactifs',
	'ACP_IUM_TITLE'	=>	'Extension IUM',
	'ACP_IUM_TITLE2'	=> 'Liste des utilisateurs inactifs',
	'ACP_IUM_APPROVAL_LIST'	=> 'Ignorer / Supprimer la liste d’approbation',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Envoyer un rappel',

	// légende de la page de configuration
	'ACP_IUM_SETTINGS'	=>	'Paramètres de rappel des utilisateurs inactif',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Paramètres de rappel',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Paramètres des E-mails de rappel',
	'ACP_IUM_DANGER'	=>	'Paramètres de suppression de compte',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Le modèle "%1$s" à été envoyé à "%2$s"',
	'SENT_REMINDERS' => array(
                         0 => 'Aucun rappel n’a été envoyé',
                         1 => '%s rappel à été envoyé.',
                         2 => '%s rappels ont été envoyés.'),
	'USERS_DELETED'				=>	'"%1$s" Les utilisateurs ont été supprimés "<b>%2$s"</b>, type de demande: "<b>%3$s</b>"',
	'USER_DELETED'				=>	'L’utilisateur "<b>%1$s</b>" à été supprimé. Type de demande: "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Quelque chose n’allait pas avec votre demande. Les utilisateurs indiqués pour la suppression ne correspondent pas aux utilisateurs dans la base de données',
	'USER_SELF_DELETED'			=>	'Un utilisateur à été supprimé. La configuration des publications à été définie sur "%s"',
	'SENT_REMINDER_TO'			=>	'Un rappel à été envoyé à l’utilisateur "%s"',
)
);
