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

$lang = array_merge(
	$lang, array(
	//
	'ACP_IUM' => 'Configuración IUM ',
	'ACP_IUM_LIST' => 'Lista de Usuarios Inactivos',
	'ACP_IUM_TITLE' => 'Extensión IUM',
	'ACP_IUM_TITLE2' => 'Lista de Usuarios Inactivos',
	'ACP_IUM_APPROVAL_LIST' => 'Ignorar/Borrar Lista de Aprobados',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE' => 'Activar Recordatorio Usuarios Inactivos Avanzado ',
	'ANDREASK_IUM_INTERVAL' => 'Intervalo ',
	'ANDREASK_IUM_EMAIL_LIMIT' => 'Limitar E-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS' => 'Incluir mejores temas del usuario ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT' => 'Cuántos temas ',
	'ANDREASK_IUM_TOP_FORUM_THREADS' => 'Incluir mejores temas del foro ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT' => 'Cuántos temas ',
	'ANDREASK_IUM_SELF_DELETE' => 'El usuario puede auto-eliminarse',
	'ANDREASK_IUM_DELETE_APPROVE' => 'Las auto-eliminaciones requieren validación',
	'ANDREASK_IUM_KEEP_POSTS' => 'Mantener mensajes de usuarios eliminados',
	'ANDREASK_IUM_AUTO_DEL' => 'Borrar usuario automáticamente',
	'ANDREASK_IUM_AUTO_DEL_DAYS' => 'Días',
	'ANDREASK_IUM_TEST_EMAIL' => 'Enviar email de prueba',
	'ANDREASK_IUM_INCLUDED_FORUMS' => 'Foros incluidos',
	'ANDREASK_IUM_EXCLUDE_FORUM' => 'Excluir',
	'ANDREASK_IUM_GROUP_IGNORE' => 'Grupos a ignorar',
	'ANDREASK_IUM_EXCLUDED_FORUMS' => 'Excluir foros',
	'ANDREASK_IUM_INCLUDE_FORUM' => 'Incluir',
	'SELECT_A_FORUM' => 'Por favor, selecciona un foro',
	'EXCLUDED_EMPTY' => 'Sin foros excluidos...',
	'IUM_IGNORE_GROUP_MANAGMENT' => 'Administración de grupos',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST' => 'Ignorar',
	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION' => 'Enviar Recordatorio',
	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN' => 'Si está activado, la extensión comenzará a enviar recordatorios a los usuarios \'durmientes\'.',
	'ANDREASK_IUM_INTERVAL_EXPLAIN' => 'Es el intervalo de días a contar para considerar un usuario \'durmiente\'. El valor recomendado es 30 días.',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN' => 'Cantidad de recordatorios que pueden enviarse <b>por dia</b>. El valor recomendado es ~250. Pero consulta con tu proveedor si existe algún límite de correos enviados al día.',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN' => 'Si está activo, el correo incluirá los temas mas activos del usuario desde su última visita.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN' => 'Cantidad de temas destacados del autor que serán incluidos en el correo.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN' => 'Si está activo, el correo incluirá los mejores temas del foro desde la última visita del usuario.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN' => 'Cantidad de temas destacados que serán incluídos en el correo.',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN' => 'Si está activo, se incluirá un enlace a la página "<strong>board_url/ium/{random_key}</strong>" para que el usuario sea capaz de borrar su cuenta.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN' => 'Si está activo todas las auto-solicitudes de eliminación tendrán que ser aprobadas por el administrador.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN' => '"Sí" borrará el usuario pero<strong>mantedrá</strong> los mensajes, "No" también borrará los mensajes.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN' => 'Aquí puede administrar los usuarios que desea ignorar (no enviar recordatorios) o eliminar de la lista de ignorados.<br/><strong>Cada usuario en una línea.</strong><br/>Tenga en cuenta que los siguientes grupos están <strong>ignorados por defecto</strong> : 1. GUESTS (Invitados), 4. GLOBAL_MODERATORS (Moderadores globales), 5. ADMINISTRATOR (Administrador) y 6. BOTS (Bots)',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN' => 'Los usuarios serán automáticamente eliminados tras cierto número de días si no regresan tras 3 recordatorios.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN' => 'Días a esperar para auto-eliminar un usuario tras el día del requerimiento.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN' => 'Un correo de prueba será enviado a "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN' => 'Selecciona una categoría o subcategoría a <strong>excluir</strong> de la lista de mejores temas que es enviada a los usuarios',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN' => 'Selecciona una categoría o subcategoría a <strong>incluir</strong> de la lista de mejores temas que es enviada a los usuarios',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN' => 'Aquí puedes seleccionar que grupo(s) deben ser ignorados por la extensión. Ten en cuenta que los siguientes grupos están <strong>ignorados por defecto</strong> : 1. GUESTS (Invitados), 4. GLOBAL_MODERATORS (Moderadores globales), 5. ADMINISTRATOR (Administrador) y 6. BOTS (Bots). ¡Pero te sugerimos que seleccione aquí también dichos grupos!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN' => 'Mantén pulsado Control (CTRL) (o &#8984; en Mac) para seleccionar múltiples grupos.',
	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN' => 'En esta lista puedes ver los usuarios que se han registrado pero sus cuentas están inactivas y aquellos que no han visitado el foro por en el perído seleccionado.<br>El color del usuario representa su estado de ignorado. <span style="color: #DC143C;"><strong>Rojo</strong></span> -> Ignorado por un administrador, <span style="color: #008000;"><strong>Verde</strong></span> -> Auto-ignorado, <span style="color: #000000;"><strong>Negro</strong></span> -> No ignorado.',
	'ACP_IUM_SETTINGS' => 'Configuración Recordatorios Usuarios Inactivos',
	'ACP_IUM_MAIL_SETTINGS' => 'Configuración Recordatorios',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS' => 'Configuración de cosas a Incluir en Recordatorios',
	'ACP_IUM_DANGER' => 'Área peligrosa',
	// configuration page
	'INACTIVE_MAIL_SENT_TO' => 'Un correo muestra del correo al usuario inactivo  a "%s"',
	'SLEEPER_MAIL_SENT_TO' => 'Un correo muestra del correo al usuario \'durmientes\'  a "%s"',
	'SEND_SLEEPER' => 'Enviar plantilla \'durmiente\'',
	'SEND_INACTIVE' => 'Enviar plantilla inactivo',
	'PLUS_SUBFORUMS' => '+Subforos',
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE' => array(
		0 => 'Activo',
		1 => 'Preactivación de registro',
		2 => 'Cambio perfil',
		3 => 'Desactivado Admin',
		4 => 'Baneado permanente',
		5 => 'Baneado temporal'),
	'NEVER_CONNECTED' => 'Usuario nunca conectado',
	// Inactive users list page
	'ACP_IUM_NODATE' => 'Usuario <strong>no</strong> desactivado',
	'ACP_USERS_WITH_POSTS' => 'Mostrar solo usuarios con mensajes',
	'LAST_SENT_REMINDER' => 'Recordatorio Anterior',
	'NO_REMINDER_COUNT' => 'Aún no se han enviado recordatorios',
	'COUNT' => 'Número de recordatorios: ',
	'NO_PREVIOUS_SENT_DATE' => 'Aún no se ha enviado ningun recordatorio',
	'REMINDER_DATE' => 'Último Recordatorio Enviado',
	'NO_REMINDER_SENT_YET' => 'Aún no se han enviado recordatorios',
	'IUM_INACTIVE_REASON' => 'Estado',
	'TOTAL_USERS_WITH_DAY_AMOUNT' => '<strong>%1$s</strong> usuario(s) en total <i>para el intervalo establecido</i> de "<strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE' => array(
		0 => 'No ignorado',
		1 => 'Auto',
		2 => 'Ignorado por Admin',
	),
	'IGNORE_METHODES' => 'Tipo de Ignorado',
	'ACP_IUM_APPROVAL_LIST_TITLE' => 'Lista de aprobación para eliminar',
	'APPROVAL_LIST_PAGE_TITLE' => 'Lista de aprobación para eliminar',
	'IUM_APPROVAL_LIST_EXPLAIN' => 'usuarios de la lista de aprobados con solicitud de eliminación de cuenta',
	'NO_REQUESTS' => 'Aún sin solicitudes',
	'NO_USER_SELECTED' => 'No se ha seleccionado usuario.',
	'IUM_MANAGMENT' => 'Administración de Usuarios Inactivos',
	'IGNORE_USER_LIST' => 'Añadir usuarios a la lista de ignorados',
	'IGNORED_USERS_LIST' => 'Lista de usuarios ignorados',
	'ADD_IGNORE_USER' => 'Añadir a la Lista',
	'REMOVE_IGNORE_USER' => 'Eliminar de la Lista',
	'DELETED_SUCCESSFULLY' => 'Borrado con éxito.',
	'REQUEST_TYPE' => 'Tipo de solicitud',
	'APPROVE' => 'Aprobar',
	'NO_USER_TYPED' => 'No se introdujo usuario',
	'USER_NOT_FOUND' => 'Usuario(s) %s no encontrado(s).',
	'REGISTERED' => 'Registrados',
	'GUESTS' => 'Invitados',
	'REGISTERED_COPPA' => 'Registrados COPPA',
	'GLOBAL_MODERATORS' => 'Moderadores Globales',
	'BOTS' => 'Bots',
	'NEWLY_REGISTERED' => 'Nuevos Usuarios Registrados',
	'USER_SELECT' => 'Selecciona',
	'SELECT_AN_ACTION' => 'Selecciona una Acción',
	'DONT_IGNORE' => 'No Ignorar',
	'NOT_IGNORED' => 'Usuario(s) ya no ignorados.',
	'RESET_REMINDERS' => 'Reset completado Satisfactoriamente.',
	// Sort Lists
	'COUNT_BACK' => '<strong>Desde</strong> intervalo de días/meses/años y más',
	'ACP_DESCENDING' => 'Orden descendente',
	'SORT_BY_SELECT' => 'Ordenar por',
	'REQUEST_DATE' => 'Fecha Solicitud Borrado',
	'SELECT' => 'Seleccione D/M/A',
	'THIRTY_DAYS' => 'Treinta días',
	'SIXTY_DAYS' => 'Sesenta días',
	'NINETY_DAYS' => 'Noventa días',
	'FOUR_MONTHS' => 'Cuatro meses',
	'SIX_MONTHS' => 'Seis meses',
	'NINE_MONTHS' => 'Nueve meses',
	'ONE_YEAR' => 'Un año',
	'TWO_YEARS' => 'Dos años',
	'THREE_YEARS' => 'Tres años',
	'FIVE_YEARS' => 'Cinco años',
	'SEVEN_YEARS' => 'Siete años',
	'DECADE' => 'Una década',
	// Log
	'SENT_REMINDER_TO_ADMIN' => 'Plantilla "%1$s" fué enviada a "%2$s"',
	'SENT_REMINDERS' => 'Se enviaron %s recordatorios.',
	'USERS_DELETED' => '"%1$s" usuarios han sido eliminados "<b>%2$s"</b>, tipo de solicitud : "<b>%3$s</b>"',
	'USER_DELETED' => 'Usuario "<b>%1$s</b>" fué eliminado, tipo de solicitud : "<b>%2$s</b>"',
	'SOMETHING_WRONG' => 'Algo falló con tu solicitud. Los usuarios solicitados a borrar no coinciden con los usuarios actuales de la base de datos',
	'USER_SELF_DELETED' => 'Un usuario fué auto-eliminado. La configuración de los mensajes fué cambiada a "%s"',
	'SENT_REMINDER_TO' => 'Se envió un recordatorio al usuario "%s"',
	)
);
