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
	'SENT_REMINDERS' => '%s recordatoris enviats.',
	'USERS_DELETED' => '"%1s" usuaris eliminats, tipus de petició : "%2s"',
	'USER_DELETED' => 'Ha sigut eliminat l\'usuari "%1s", tipus de petició : "%2s"',
	'SOMETHING_WRONG' => 'Quelcom no ha funcionat amb la seva sol·licitud. Els usuaris sel·leccionats per eliminar no coincideixen no coinciden amb els usuaris actualment a la base de dades',
	'USER_SELF_DELETED' => 'Un usuari ha sigut auto-eliminat. La configuració dels seus missatges ha sigut cambiada a "%s"',
	));
