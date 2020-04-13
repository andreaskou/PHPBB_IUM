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
    // Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Actif',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'pré-activation de l’enregistrement',
									2	=>	'Changement de profil',
									3	=>	'Admin désactivé',
									4	=>	'Bannissement permanent',
									5	=>	'Bannissement temporaire'),
	'NEVER_CONNECTED'	=>	'Membre jamais connecté',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Le membre <strong>est</strong> activé',
	'ACP_USERS_WITH_POSTS'	=>	'Afficher uniquement les utilisateurs ayant publiés',
	'LAST_SENT_REMINDER'	=>	'Rappel précédent',
	'NO_REMINDER_COUNT'	=>	'Aucun rappel envoyé pour l’instant',
	'COUNT'	=>	'Nombre de rappels',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Dernier rappel envoyé',
	'NO_REMINDER_SENT_YET'	=>	'Aucun rappel envoyé',
	'IUM_INACTIVE_REASON'	=>	'Statut',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Utilisateur(s) au total <i>pour l’intervalle défini</i> de "<strong>%2$s</strong>"',

    // configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Depuis cette liste, vous pouvez voir les utilisateurs qui se sont inscrits, mais dont les comptes sont inactifs, ainsi que ceux qui n’ont pas visité le forum depuis le temps que vous avez défini depuis le "<i>Panneau de configuration IUM</i>". Par défaut <i>30 jours</i>. La couleur des utilisateurs représentent leur statut. <br /><br /> <span style = "color: #DC143C;"> <strong> Rouge </strong> </span> -> Ignoré par un administrateur, <span style = "color: #008000;"> <strong> Vert </strong > </span> -> Ignoré automatiquement, <span style = "color: #000000;"> <strong> Noir </strong> </span> -> Non ignoré.',
	'ACP_IUM_SETTINGS'	=>	'Paramètres de rappel d’utilisateur inactif',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Paramètres de rappel',

// Sort Lists
'COUNT_BACK' => '<strong> EN </strong>jours / mois / années, et inversement',
'ACP_DESCENDING' => 'Ordre décroissant',
'SORT_BY_SELECT' => 'Trier par',
'REQUEST_DATE' => 'Date de la demande de suppression',
'SELECT' => 'Sélectionner D / M / Y',
'THIRTY_DAYS' => '30 jours',
'SIXTY_DAYS' => '60 jours',
'NINETY_DAYS' => '90 jours',
'FOUR_MONTHS' => '4 mois',
'SIX_MONTHS' => '6 mois',
'NINE_MONTHS' => '9 mois',
'ONE_YEAR' => '1 an',
'TWO_YEARS' => '2 ans',
'THREE_YEARS' => '3 ans',
'FIVE_YEARS' => '5 ans',
'SEVEN_YEARS' => '7 ans',
'DECADE'		=>	'10 ans',
	)
);
