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
		0 =>	'Non ignoré',
		1 =>	'Auto',
		2	=>	'Ignoré par l’administrateur',
    ),
    'IGNORE_METHODES'	=>	'Type de suppression',
	'REQUEST_DATE'                  => 'Date de la suppression',
    'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Liste d’approbation de suppression',
    'APPROVAL_LIST_PAGE_TITLE'		=> 'Liste d’approbation de suppression',
    'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Liste des utilisateurs ayant fait une demande de suppression de leur compte, ainsi que ceux dont leurs compte à été supprimé automatiquement.</br>
	<div align="right">Traduction Française par <a href="http://transportroutier-france.fr/memberlist.php?mode=viewprofile&u=2">V-X</a> - <a href="http://transportroutier-france.fr/">transportroutier-france.fr</a></div>',
    'NO_REQUESTS'			=>  'Aucune demande',
	'NO_USER_SELECTED'		=>	'Aucun utilisateur de sélectionné',
	'SELECT_ACTION'			=>	'Veuillez sélectionner une action',
	'IUM_MANAGMENT'			=>	'Gestion des utilisateurs inactifs',
	'IGNORE_USER_LIST'		=>	'Ajouter les utilisateurs à ignorer la liste',
	'IGNORED_USERS_LIST'	=>	'Liste des utilisateurs ignorés',
    'ADD_IGNORE_USER'		=>	'Ajouter à la liste',
	'REMOVE_IGNORE_USER'	=>	'Supprimer de la liste',
	'DELETED_SUCCESSFULLY'	=>	'Supprimé avec succès.',
	'REQUEST_TYPE'			=>	'Type de demande',
	'APPROVE'				=>	'Approuver',
	'NO_USER_TYPED'			=>	'Aucun utilisateur n’a été saisi',
	'USER_NOT_FOUND'		=>	'Utilisateur(s) %s introuvable.',
	'REGISTERED'			=>	'Enregistré',
    'GUESTS'                =>  'Invités',
    'REGISTERED_COPPA'          =>  'COPPA enregistré',
    'GLOBAL_MODERATORS'         =>  'Modérateurs globaux',
    'BOTS'							=>	'Robots',
    'NEWLY_REGISTERED'              =>  'Nouvellement enregistré',
    'USER_SELECT'					=>	'Sélectionner',
    'SELECT_AN_ACTION'				=>	'Sélectionner une action',
    'DONT_IGNORE'					=>	'Ne pas ignorer',
    'NOT_IGNORED'					=>	'Le(s) utilisateur(s) ne seront plus ignorés.',
    'RESET_REMINDERS'				=>	'Réinitialisation réussi.',
	'USER_EXIST_IN_IGNORED_GROUP'	=>	'Les utilisateurs existent déjà dans un groupe ignoré.',
    'IUM_IGNORE_GROUP_MANAGMENT'		=>	'Gestion des groupes',
    'ANDREASK_IUM_UPDATE_IGNORE_LIST'	=>	'Ignore',
    'ANDREASK_IUM_GROUP_IGNORE'			=>	'Ignorer les groupes',

    'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Ici, vous pouvez sélectionner le ou les groupes à ignorer. Veuillez noter que même s’ils <u>ne sont pas</u> sélectionnés ici,</br>ROBOTS, ADMINISTRATEURS, MODÉRATEURS GLOBAUX et INVITÉ sont <b>ignorés</b>. Mais il est suggéré de sélectionner ces groupes aussi!',
    'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Pour sélectionner ou déselectionner plusieurs groupes, gardez la touche (CTRL) enfoncer (ou &#8984; pour Mac) du clavier et sélectionner plusieurs groupes.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'D’ici, vous pouvez gérer les utilisateurs que vous souhaitez ignorer (ne pas envoyer de rappel) ou les supprimer de la liste des ignorés.<br/><strong>Vous pouvez sélectionner plusieurs membres en une fois, en saisissant chaque nom sur une nouvelle ligne.</strong><br/>Noter, que les groupes suivants sont <strong>ignoré par défaut</strong> : 1. INVITÉS, 4. MODÉRATEURS GLOBAUX, 5. ADMINISTRATEURS et 6. ROBOTS',

    )
);
