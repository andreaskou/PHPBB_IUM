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
	'ACP_IUM'	=>	'Configuracion LUI',
	'ACP_IUM_LIST'	=>	'Lista de Usuarios Inactivos',
	'ACP_IUM_TITLE'	=>	'Extension LUI',
	'ACP_IUM_TITLE2'	=> 'Lista de Usuarios Inactivos',
	'ACP_IUM_APPROVAL_LIST'	=> 'Lista aprobada de Ignorados/Borrados',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Habilitar recordatorio de usuario inactivo avanzado ',
	'ANDREASK_IUM_INTERVAL'	=>	'Intervalo ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Limites de E-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Incluir temas principales del usuario\'s  ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Cuantos temas ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Incluir temas principales del foro ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Cuantos temas ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'El usuario es capaz de auto eliminar',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Requerir aprobación para las solicitudes de auto borrado',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Mantener las publicaciones de los usuarios eliminados',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Auto borrar usuario',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Dias despues',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Enviar e-mail de prueba',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Foros incluidos',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Excluir',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Ignorar grupos',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Foros excluidos',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Incluir',
	'SELECT_A_FORUM'							=>	'Por favor seleccione un foro',
	'EXCLUDED_EMPTY'							=>	'No hay foros excluidos...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'administración de grupo',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Ignorar',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Enviar recordatorio',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Si está habilitada, la extensión comenzará a enviar recordatorios a "durmientes".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Es el intervalo de días para volver a contar para considerar a un usuario como un "durmientes". La Recomendado es de 30 dias',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Cantidad de recordatorios que se pueden enviar  <b>por dia</b>. Se recomienda ~250. Pero consulte con su proveedor para cualquier límite de e-mails por día',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Si está habilitado, el correo incluirá los principales temas activos del usuario\'s desde la última visita del usuario\'s.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Cantidad de temas principales del usuario que deben incluirse en el e-mail.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Si está habilitado, el correo incluirá los temas principales del foro desde la última visita del usuario\'s.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Cantidad de temas del foro que deben incluirse en el e-mail',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Si está habilitado, un enlace a una página. "<strong>board_url/ium/{random_key}</strong>" se incluirá al usuario y podrán eliminar automáticamente su cuenta.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Si está habilitado, toda solicitud de auto-eliminación tendrá que ser aprobada por el administrador.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"SI" borrará usuario pero <strong>mantendrá</strong> los mensajes, "No" borrará las publicaciones del usuario también.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Aquí puedes gestionar los usuarios que quieras ignorar. (no enviar recordatorio) o eliminarlos de la lista de ignorados.<br/><strong>Cada usuario en una nueva línea.</strong><br/>Tenga en cuenta, los siguientes grupos son <strong>ignorados por defecto</strong> : 1. INVITADOS, 4. MODERADORES_GLOBALES, 5. ADMINISTRADOR y 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Los usuarios se eliminarán automáticamente después de una cantidad determinada de días si no regresan después de los 3 recordatorios.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Cantidad de días a esperar hasta que se elimine automáticamente un usuario después del día solicitado.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Un e-mail de prueba será enviado a "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Seleccione una categoría o subcategoría para <strong>excluirla</strong> de las listas de temas principales que se envían a los usuarios',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Seleccione una categoría o subcategoría para <strong>incluirla</strong> de las listas de temas principales que se envían a los usuarios',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Aquí puede seleccionar qué grupo (s) debe ignorar la extensión. Tenga en cuenta que aunque <u>no están</u> seleccionados aquí,</br>BOTS, ADMINISTRADORES, MODERADORES e INVITADOS SON <b>ignorados</b>. Pero aún así se sugiere seleccionar los grupos aquí también.!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Mantener la tecla control (CTRL) (o &#8984; para mac) en el teclado para seleccionar varios grupos.',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'En esta lista puede ver a los usuarios que se han registrado pero cuyas cuentas están inactivas y aquellos que no han visitado el foro por el tiempo establecido aquí.<br>Los colores del nombre de usuario representan el estado de ignorar. <span style="color: #DC143C;"><strong>Red</strong></span> -> Ignorado por un administrador, <span style="color: #008000;"><strong>Green</strong></span> -> Auto Ignorado, <span style="color: #000000;"><strong>Black</strong></span> -> No ignorado.',
	'ACP_IUM_SETTINGS'	=>	'Configuración de recordatorio de usuario inactivo',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Configuraciones de recordatorio',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Ajustes recordatorio incluido',
	'ACP_IUM_DANGER'	=>	'Zona de peligro',
	// configuration page
	'INACTIVE_MAIL_SENT_TO'			=>	'Se envió una muestra de e-mail para usuarios inactivos a "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Se envió una muestra de e-mail para usuarios inactivos a "%s"',
	'SEND_SLEEPER'					=>	'Enviar plantilla a durmientes',
	'SEND_INACTIVE'					=>	'Enviar plantilla a inactivos',
	'PLUS_SUBFORUMS'				=>	'+Subforos',
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Activo',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'Pre-activación de registro.',
									2	=>	'Cambio de perfil',
									3	=>	'Admin desactivado',
									4	=>	'Vetado permanentemente',
									5	=>	'Vetado Temporalmente'),
	'NEVER_CONNECTED'	=>	'Usuario nunca conectado',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Usuario está <strong>not</strong> desactivado',
	'ACP_USERS_WITH_POSTS'	=>	'Mostrar solo usuarios con mensajes',
	'LAST_SENT_REMINDER'	=>	'Recordatorio anterior',
	'NO_REMINDER_COUNT'	=>	'Aún no se han enviado recordatorios.',
	'COUNT'	=>	'Recuento de recordatorios',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Último recordatorio enviado',
	'NO_REMINDER_SENT_YET'	=>	'Aún no ha enviado ningún recordatorio.',
	'IUM_INACTIVE_REASON'	=>	'Estado',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Usuario(s) en total <i>para el intervalo establecido</i> de "<strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'No ignorado',
		1 =>	'Auto',
		2	=>	'Ignorado por el admin',
	),
	'IGNORE_METHODES'	=>	'Ignorar el tipo',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Lista de aprobados para eliminación',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Lista de aprobados para eliminación',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Lista de aprobación de usuarios con una solicitud para eliminar su cuenta.',
	'NO_REQUESTS'			=> 'Aún no hay solicitudes',
	'NO_USER_SELECTED'		=>	'Ningún usuario seleccionado.',
	'SELECT_ACTION'			=>	'Por favor seleccione una acción',
	'IUM_MANAGMENT'			=>	'Gestión de usuarios inactivos',
	'IGNORE_USER_LIST'		=>	'Agregar usuarios a la lista de ignorados',
	'IGNORED_USERS_LIST'	=>	'Lista de usuarios que son ignorados',
	'ADD_IGNORE_USER'		=>	'Agregar a la lista',
	'REMOVE_IGNORE_USER'	=>	'Quitar de la lista',
	'DELETED_SUCCESSFULLY'	=>	'Borrado exitosamente.',
	'REQUEST_TYPE'			=>	'Tipo de solicitud',
	'APPROVE'				=>	'Aprobar',
	'NO_USER_TYPED'			=>	'Ningún usuario fue escrito',
	'USER_NOT_FOUND'		=>	'Usuario(s) %s no encontrado.',
	'REGISTERED'			=>	'Registrado',
	'GUESTS'				=>	'Invitados',
	'REGISTERED_COPPA'		=>	'Registrado COPPA',
	'GLOBAL_MODERATORS'		=>	'Moderadores globales',
	'BOTS'					=>	'Bots',
	'NEWLY_REGISTERED'		=>	'Recién registrado',
	'USER_SELECT'		=>	'Seleccionar',
	'SELECT_AN_ACTION'		=>	'Seleccione una acción',
	'DONT_IGNORE'		=>	'No ignore',
	'NOT_IGNORED'		=>	'Usuario(s) no se ignora más.',
	'RESET_REMINDERS'		=>	'El reinicio fue exitoso.',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>DESDE</strong> dias/meses/años intervalo y al revés',
	'ACP_DESCENDING'	=>	'Orden descendiente',
	'SORT_BY_SELECT'	=>	'Ordenar por',
	'REQUEST_DATE'		=>	'Fecha de solicitud de borrado',
	'SELECT'		=>	'Seleccionar D/M/A',
	'THIRTY_DAYS'	=>	'Treinta días',
	'SIXTY_DAYS'	=>	'Sesenta dias',
	'NINETY_DAYS'	=>	'Noventa dias',
	'FOUR_MONTHS'	=>	'Cuatro meses',
	'SIX_MONTHS'	=>	'Seis meses',
	'NINE_MONTHS'	=>	'Nueve meses',
	'ONE_YEAR'		=>	'Un año',
	'TWO_YEARS'		=>	'Dos años',
	'THREE_YEARS'	=>	'Tres años',
	'FIVE_YEARS'	=>	'Cinco años',
	'SEVEN_YEARS'	=>	'Siete años',
	'DECADE'		=>	'Una década',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Modelo "%1$s" fue enviado a "%2$s"',
	'SENT_REMINDERS'			=>	array(
			0	=>	'No se enviaron recordatorios',
			1	=>	'%s recordatorio fue enviado.',
			2	=>	'%s se enviaron recordatorios.'
	),
	'USERS_DELETED'				=>	'"%1$s" usuarios fueron eliminados "<b>%2$s"</b>, tipo de solicitud : "<b>%3$s</b>"',
	'USER_DELETED'				=>	'Usuario "<b>%1$s</b>" fue borrado, tipo de solicitud : "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Algo estaba mal con su solicitud. Los usuarios solicitados para la eliminación no coincidían con los usuarios reales en la base de datos',
	'USER_SELF_DELETED'			=>	'Un usuario fue auto eliminado La configuración de los mensajes se estableció en "%s"',
	'SENT_REMINDER_TO'			=>	'Se envió un recordatorio al usuario "%s"',
)
);
