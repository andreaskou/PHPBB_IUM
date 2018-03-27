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
	'SENT_REMINDERS' => '%s recordatorios enviados.',
	'USERS_DELETED' => '"%1s" usuarios eliminados, tipo de petición : "%2s"',
	'USER_DELETED' => 'Fué eliminado el usuario "%1s", tipo de petición : "%2s"',
	'SOMETHING_WRONG' => 'Algo no funcionó con su solicitud. Los usuarios seleccionados para eliminar no coinciden con los usuarios actualmente en base de datos',
	'USER_SELF_DELETED' => 'Un usuario fué auto-eliminado. La configuración de sus mensajes fué cambiada a "%s"',
	));
