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
	'USER_SELF_DELETE_TITLE'		=>  'Página de auto eliminación.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Al marcar la casilla de verificación y hacer clic en el botón de confirmación, acepta eliminar su cuenta de usuario en este foro.<br/>Todas sus publicaciones permanecerán intactas, pero ya no podrá conectarse con su nombre de usuario/contraseña.<br/>Si creas una cuenta con el mismo nombre de usuario, la publicación anterior no se conectará con la nueva cuenta.',
	'USER_SELF_DELETE_VERIFY'		=>  'Entiendo las consecuencias y las acepto.',
	'HAVE_TO_LOGIN'					=>  'Lo sentimos, pero tienes que iniciar sesión para ver esta página.',
	'HAVE_TO_VERIFY'				=>  'Por favor, marque la casilla de verificación.',
	'PAGE_NOT_EXIST'				=>  'Lamentamos los inconvenientes..<br/><br/>Pero la auto-eliminación está deshabilitada.<br/>Si llegó a esta página por accidente, verifique la URL que ha escrito en su navegador.<br/>Si siguió un enlace de un correo electrónico que recibió de nosotros, póngase en contacto con el administrador de la página.',
	'NEEDS_APPROVAL'				=>	'Lamentamos mucho que haya decidido irse. %s. Tenga en cuenta que su cuenta todavía no se ha eliminado, primero debe ser aprobada. Por favor, danos algo de tiempo para esta acción. En 3 segundos serás redirigido a nuestra página de inicio.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Lamentamos mucho que haya decidido irse %s. Su cuenta ha sido eliminada. En 3 segundos serás redirigido a nuestra página de inicio.',
	'INVALID_LINK_OR_USER'			=>	'Combinación inválida.',
));
