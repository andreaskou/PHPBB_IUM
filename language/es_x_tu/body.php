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
if (!defined('IN_PHPBB')) {
	exit;
}

if (empty($lang) || !is_array($lang)) {
	$lang = array();
}

$lang = array_merge($lang, array(
	'INCLUDE_USER_TOPICS' => 'Debajo tienes algunos enlaces a temas en los que has estado activo. %s',
	'INCLUDE_FORUM_TOPICS' => 'Debajo tienes algunos enlaces a los temas mas activos del foro. %s',
	'FOLLOW_TO_DELETE' => 'Pulsan en el siguiente enlace para eliminar tu cuenta. %s',
	));
