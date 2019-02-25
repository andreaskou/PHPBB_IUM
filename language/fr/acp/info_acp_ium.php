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
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Activer le rappel avancé pour les utilisateurs inactifs ',
	'ANDREASK_IUM_INTERVAL'	=>	'Intervalle ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limiter le nombre de courriels ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Inclure les principaux sujets de l’utilisateur  ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Combien de sujets ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Inclure les sujets principaux du forum ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Combien de sujets ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'l’utilisateur peut se supprimer lui-même',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Exiger l’approbation pour les demandes d’auto-suppression',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Garder les messages des utilisateurs supprimés',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Supprimer automatiquement l’utilisateur',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Jours après',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Envoyer un e-mail de test',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Forums inclus',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Exclure',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Ignorer les groupes',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Forums exclus',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Inclure',
	'SELECT_A_FORUM'							=>	'Veuillez sélectionner un forum',
	'EXCLUDED_EMPTY'							=>	'Aucun forum exclu...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Gestion de groupe',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Ignorer',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Envoyer un rappel',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Si activé, l’extension commencera à envoyer des rappels aux "dormeurs".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Il s agit de l’intervalle de jours à compter pour considérer un utilisateur comme un "dormeur". Recommandé est 30 jours',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Nombre de rappels pouvant être envoyés <b> par jour </ b>. Recommandé est ~ 250. Mais vérifiez auprès de votre fournisseur quelle est la limite du nombre de courriers électroniques par jour',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Si activé, le courrier inclura les principaux sujets actifs de l’utilisateur depuis la dernière visite de l’utilisateur.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Nombre de sujets principaux de l’utilisateur à inclure dans le message électronique.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Si activé, le courrier inclura les principaux sujets du forum depuis la dernière visite de l’utilisateur.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Nombre de sujets de forum à inclure dans l’e-mail’',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Si activé, un lien vers une page "<strong> board_url / ium / {random_key} </ strong>" sera inclus pour l’utilisateur et permettra à celui-ci de supprimer lui-même son compte.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Si activé, toutes les demandes d’auto-suppression devront être approuvées par l’administrateur.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Oui" supprimera l’utilisateur, mais <strong> conservera </ strong> le message, "Non" supprimera également les messages de l’utilisateur.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Vous pouvez gérer ici les utilisateurs que vous voulez ignorer (ne pas envoyer de rappel) ou les supprimer de la liste des ignorés. <br/> <strong> Chaque utilisateur d’une nouvelle ligne. </ Strong > <br/> Remarque: <strong> les groupes suivants sont ignorés par défaut </ strong>: 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR et 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Les utilisateurs seront automatiquement supprimés après un nombre de jours donné s’ils ne reviennent pas après les 3 rappels.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Nombre de jours à attendre jusqu’à la suppression automatique d’un utilisateur après le jour demandé.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Un email de test sera envoyé à "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Sélectionnez une catégorie ou une sous-catégorie à <strong> exclure </ strong> des listes de sujets les plus populaires envoyées aux utilisateurs',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Sélectionnez une catégorie ou une sous-catégorie à <strong> inclure </ strong> dans les listes de sujets supérieurs envoyées aux utilisateurs',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Vous pouvez sélectionner ici le ou les groupes qui doivent être ignorés par l’extension. Veuillez noter que même s’ils <u> ne sont pas </ u> sélectionnés ici, </ br> BOTS, ADMINISTRATORS, MODERATOROS et GUESTS sont <b> ignorés </ b>. Mais il est toujours suggéré de sélectionner les groupes ici aussi!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Maintenez le contrôle enfoncé (CTRL) (ou mac pour mac) sur le clavier pour sélectionner plusieurs groupes.',

	// légende de la page de configuration
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Dans cette liste, vous pouvez voir les utilisateurs qui se sont inscrits, mais dont les comptes sont inactifs, ainsi que ceux qui n’ont pas visité le forum pendant le temps imparti ici. Les couleurs du nom d’utilisateur représentent le statut Ignorer. <span style = "color: #DC143C;"> <strong> Rouge </strong> </span> -> Ignoré par un administrateur, <span style = "color: #008000;"> <strong> Vert </strong > </span> -> Ignoré automatiquement, <span style = "color: #000000;"> <strong> Noir </strong> </span> -> Non ignoré.',
	'ACP_IUM_SETTINGS'	=>	'Paramètres de rappel d’utilisateur inactif',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Paramètres de rappel',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Paramètres d’inclusion de rappel',
	'ACP_IUM_DANGER'	=>	'Zone de danger',
	// page de configuration
	'INACTIVE_MAIL_SENT_TO'			=>	'Un échantillon de courrier électronique destiné aux utilisateurs inactifs a été envoyé à "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Un exemple de courrier électronique destiné aux utilisateurs inactifs a été envoyé à "%s"',
	'SEND_SLEEPER'					=>	'Envoyer un modèle de dormeur',
	'SEND_INACTIVE'					=>	'Envoyer un modèle inactif',
	'PLUS_SUBFORUMS'				=>	'+Sous-forums',
	// Trier par, options pour la liste des utilisateurs inactifs
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Actif',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'pré-activation de l’enregistrement',
									2	=>	'Changement de profil',
									3	=>	'Admin désactivé',
									4	=>	'banni en permanence',
									5	=>	'Temporairement banni'),
	'NEVER_CONNECTED'	=>	'Membre jamais connecté',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Le membre <strong>est</strong> activé',
	'ACP_USERS_WITH_POSTS'	=>	'Afficher uniquement les utilisateurs avec des publications',
	'LAST_SENT_REMINDER'	=>	'Rappel précédent',
	'NO_REMINDER_COUNT'	=>	'Aucun rappel envoyé pour l’instant',
	'COUNT'	=>	'Nombre de rappels',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Dernier rappel envoyé',
	'NO_REMINDER_SENT_YET'	=>	'Pas encore envoyé de rappels',
	'IUM_INACTIVE_REASON'	=>	'Statut',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Utilisateur (s) au total <i>pour l’intervalle défini</i> de "<strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'Pas ignoré',
		1 =>	'Auto',
		2	=>	'Ignoré par Administrateur',
	),
	'IGNORE_METHODES'	=>	'Ignorer le type',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Liste d’approbation de suppression',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Liste d’approbation de suppression',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Liste d’approbation des utilisateurs avec une demande de suppression de leur compte',
	'NO_REQUESTS'			=> 'Pas encore de demandes',
	'NO_USER_SELECTED'		=>	'Aucun utilisateur sélectionné',
	'SELECT_ACTION'			=>	'Veuillez sélectionner une action',
	'IUM_MANAGMENT'			=>	'Gestion des utilisateurs inactifs',
	'IGNORE_USER_LIST'		=>	'Ajouter les utilisateurs à ignorer la liste',
	'IGNORED_USERS_LIST'	=>	'Liste des utilisateurs ignorés',
	'ADD_IGNORE_USER'		=>	'Ajouter à la liste',
	'REMOVE_IGNORE_USER'	=>	'Supprimer de la liste',
	'DELETED_SUCCESSFULLY'	=>	'Supprimé avec succès.',
	'REQUEST_TYPE'			=>	'Type de requête',
	'APPROVE'				=>	'Approuver',
	'NO_USER_TYPED'			=>	'Aucun utilisateur n a été saisi',
	'USER_NOT_FOUND'		=>	'Utilisateur(s) %s introuvable.',
	'REGISTERED'			=>	'Inscrit',
	'GUESTS' => 'Invités',
'Registered_COPPA' => 'COPPA enregistré',
'GLOBAL_MODERATORS' => 'Modérateurs globaux',
'BOTS' => 'Bots',
'NEWLY_REGTED' => 'Nouvellement enregistré',
'USER_SELECT' => 'Select',
'SELECT_AN_ACTION' => 'Sélectionnez une action',
	'DONT_IGNORE'		=>	'Don’t Ignore',
	'NOT_IGNORED' => 'Utilisateur (s) non plus ignoré.',
'RESET_REMINDERS' => 'La réinitialisation a réussi.',
// Trier les listes
'COUNT_BACK' => '<strong> DE </ strong> jours / mois / années, et inversement',
'ACP_DESCENDING' => 'Ordre décroissant',
'SORT_BY_SELECT' => 'Trier par',
'REQUEST_DATE' => 'Date de la demande de suppression',
'SELECT' => 'Sélectionner D / M / Y',
'THIRTY_DAYS' => 'Trente jours',
'SIXTY_DAYS' => 'Soixante jours',
'NINETY_DAYS' => 'Quatre-vingt-dix jours',
'FOUR_MONTHS' => 'Quatre mois',
'SIX_MONTHS' => 'Six mois',
'NINE_MONTHS' => 'Neuf mois',
'ONE_YEAR' => 'Un an',
'TWO_YEARS' => 'Deux ans',
'THREE_YEARS' => 'Trois ans',
'FIVE_YEARS' => 'Cinq ans',
'SEVEN_YEARS' => 'Sept ans',
	'DECADE'		=>	'Une décennie',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Le modèle "%1$s" a été envoyé à "%2$s"',
	'SENT_REMINDERS'			=>	'%s rappels ont été envoyés.',
	'USERS_DELETED'				=>	'"%1$s" Les utilisateurs ont été supprimés "<b>%2$s"</b>, type de demande: "<b>%3$s</b>"',
	'USER_DELETED'				=>	'L’utilisateur "<b>%1$s</b>" a été supprimé. Type de demande: "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Quelque chose n’allait pas avec votre demande. Les utilisateurs demandés pour la suppression ne correspondaient pas aux utilisateurs réels de la base de données',
	'USER_SELF_DELETED'			=>	'Un utilisateur a été auto-supprimé. La configuration des publications a été définie sur "%s"',
	'SENT_REMINDER_TO'			=>	'Un rappel a été envoyé à l’utilisateur "%s"',

	)
);
