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
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Activer le rappel avancé pour les utilisateurs inactifs ',
	'ANDREASK_IUM_INTERVAL'	=>	'Intervalle ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limite du nombre d’e-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Inclure les sujets actifs de l’utilisateur  ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Nombre de sujets actifs de l’utilisateur',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Inclure les sujets actifs du forum ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Nombres de sujets ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'l’utilisateur peut supprimer son compte',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Approbation des demandes de suppression',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Conservation des messages des utilisateurs ayant supprimés leur compte',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Suppression automatique de l’utilisateur',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Nombre de jour avant la suppression automatique de l’utilisateur',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'E-mail test',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Forums inclus',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Exclure',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Ignorer les groupes',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Forums exclus',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Inclure',
	'SELECT_A_FORUM'							=>	'Veuillez sélectionner un forum',
	'EXCLUDED_EMPTY'							=>	'Aucun forum exclu...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Gestion de groupe',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Ignorer',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Si activé, l’extension commencera à envoyer des rappels aux "dormeurs".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Il s’agit de l’intervalle de jours pour considérer un utilisateur comme un "dormeur". Le temps recommandé est de 30 jours',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Nombre de rappels pouvant être envoyés <b> par jour </b>. Le nombre recommandé est de ~ 250. Mais vérifiez auprès de votre fournisseur pour connaitre la limite du nombre d’e-mails par jour.',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Si activé, l’e-mail inclura les sujets actifs de l’utilisateur depuis sa dernière visite.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Nombre des sujets actifs de l’utilisateur qui seront inclus dans l’e-mail.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Si activé, l’e-mail inclura les sujets actifs du forum depuis sa dernière visite.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Nombre de sujets du forum qui seront inclus dans l’e-mail.',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Si activé, un lien vers une page "<strong>board_url/ium/{random_key}</strong>" sera inclus afin que l’utilisateur supprime son compte.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Si activé, toutes les demandes de suppression devront être approuvées par l’administrateur.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Oui" supprimera l’utilisateur, mais <strong>conservera</strong> le(s) message(s), "Non" supprimera les messages de l’utilisateur.',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Les utilisateurs seront automatiquement supprimés après le nombre de jours indiqué ci-dessous, s’ils ne ce reconnectent pas au forum après le troisième rappels.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Nombre de jours avant la suppression automatique de l’utilisateur. Le temps recommandé est de <strong>7 jours</strong>.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Un e-mail test à été envoyé à "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Sélectionnez une catégorie ou une sous-catégorie à <strong> exclure </strong> des listes de sujets actifs envoyées aux utilisateurs',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Sélectionnez une catégorie ou une sous-catégorie à <strong> inclure </strong> dans les listes de sujets actifs envoyées aux utilisateurs',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Maintenez la touche (CTRL) / (ou mac pour mac) enfoncé de votre clavier pour sélectionner plusieurs groupes.',

	// page de configuration
	'INACTIVE_MAIL_SENT_TO'			=>	'Un e-mail destiné aux utilisateurs inactifs à été envoyé à "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Un e-mail destiné aux utilisateurs "dormeurs" à été envoyé à "%s"',
	'SEND_SLEEPER'					=>	'Envoyer un modèle de dormeur',
	'SEND_INACTIVE'					=>	'Envoyer un modèle inactif',
	'PLUS_SUBFORUMS'				=>	'+Sous-forums',

    )
);
