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
	'USER_SELF_DELETE_TITLE' => 'Página de auto-eliminación.',
	'USER_SELF_DELETE_EXPLAIN' => 'Marcando la casilla de verificación y pulsando el botón de confirmación acepta el borrado de su cuenta en este foro.<br/>Todos sus mensajes se mantendrán intactos pero usted no podrá volver a conectarse con su usuario y contraseña.<br/>Si crea una cuenta con el mismo usuario los mensajes anteriores no volverán a conectarse con la nueva cuenta.',
	'USER_SELF_DELETE_VERIFY' => 'Entiendo las consecuencias y confirmo',
	'HAVE_TO_LOGIN' => 'los sentimos pero ha de identificarse para poder ver esta página.',
	'HAVE_TO_VERIFY' => 'Por favor, marque la casilla de verificación.',
	'PAGE_NOT_EXIST' => 'Sentimos los inconvenientes.<br/><br/>La auto-eliminación está desactivada.<br/>Si llegó a esta página por accidente revise la dirección introducida en el navegador.<br/>Si siguió un enlace que nosotros le enviamos, por favor, póngase en contacto con el administrador de la página.',
	'NEEDS_APPROVAL' => 'Lamentamos que haya decidido abandonar %s. Por favor, tenga en cuenta que su cuenta no está aún eliminada, necesita primero ser aprobado. Por favor, denos algo de tiempo para realizar esta acción. En 3 segundos será redireccionado a la página principal de la web.',
	'USER_SELF_DELETE_SUCCESS' => 'Lamentamos que haya decidido abandonar %s. Su cuenta ha sido eliminada. En 3 segundos será redireccionado a la página principal de la web.',
	'INVALID_LINK_OR_USER' => 'Combinación no válida.',
	));
