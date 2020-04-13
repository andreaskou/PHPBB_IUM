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
'USER_SELF_DELETE_TITLE' => 'Page auto-suppression.',
'USER_SELF_DELETE_EXPLAIN' => 'En cochant la case de vérification et en cliquant sur le bouton de confirmation, vous acceptez de supprimer votre compte d’utilisateur sur ce forum. <br/> Tous vos messages resteront intacts mais vous ne pourrez plus vous connecter avec votre nom d’utilisateur. / mot de passe. <br/> Si vous créez un compte avec le même nom d’utilisateur, votre message précédent ne sera pas connecté au nouveau compte. ',
'USER_SELF_DELETE_VERIFY' => 'Je comprends les conséquences et je vérifie',
'HAVE_TO_LOGIN' => 'nous sommes désolés, mais vous devez vous identifier pour voir cette page.',
'HAVE_TO_VERIFY' => 'Veuillez cocher la case de vérification.',
'PAGE_NOT_EXIST' => 'Nous sommes désolés pour le désagrément. <br/> <br/> Mais la suppression automatique est désactivée. <br/> Si vous êtes arrivé sur cette page par accident, veuillez cocher l’URL que vous avez saisie. votre navigateur. <br/> Si vous avez suivi un lien provenant d’un e-mail que vous avez re&ccedil;u de notre part, veuillez contacter l’administrateur de la page. ',
'NEEDS_APPROVAL' => 'Nous sommes désolés que vous ayez décidé de quitter %s. Veuillez noter que votre compte n’est toujours pas supprimé, il doit d’abord être approuvé. s’il vous pla&icirc;t nous donner un peu de temps pour cette action. Dans 3 secondes, vous serez redirigé vers notre page d’accueil. ',
'USER_SELF_DELETE_SUCCESS' => 'Nous sommes désolés que vous ayez décidé de quitter %s. Votre compte a été supprimé. Dans 3 secondes, vous serez redirigé vers notre page d’accueil. ',
'INVALID_LINK_OR_USER' => 'Combinaison invalide.'
));
