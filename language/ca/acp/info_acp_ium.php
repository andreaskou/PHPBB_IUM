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
	'ACP_IUM' => 'Configuració IUM ',
	'ACP_IUM_LIST' => 'LLista d\'Usuaris Inactius',
	'ACP_IUM_TITLE' => 'Extensió IUM',
	'ACP_IUM_TITLE2' => 'LLista d\'Usuaris Inactius',
	'ACP_IUM_APPROVAL_LIST' => 'Ignorar/Esborrar LLista d\'Aprobats',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE' => 'Activar Recordatori Usuaris Inactius Avançat ',
	'ANDREASK_IUM_INTERVAL' => 'Intèrval ',
	'ANDREASK_IUM_EMAIL_LIMIT' => 'Limitar E-mails ',
	'ANDREASK_IUM_TOP_USER_THREADS' => 'Incluir millors temes de l\'usuari ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT' => 'Quants temes ',
	'ANDREASK_IUM_TOP_FORUM_THREADS' => 'Incluir millors temes de fòrum ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT' => 'Quants temes ',
	'ANDREASK_IUM_SELF_DELETE' => 'L\'usuari pot auto-eliminar-se',
	'ANDREASK_IUM_DELETE_APPROVE' => 'Les auto-eliminacions requereixen validació',
	'ANDREASK_IUM_KEEP_POSTS' => 'Mantenir missatges d\'usuaris eliminats',
	'ANDREASK_IUM_AUTO_DEL' => 'Esborrar usuari automàticament',
	'ANDREASK_IUM_AUTO_DEL_DAYS' => 'Dies',
	'ANDREASK_IUM_TEST_EMAIL' => 'Enviar email de prova',
	'ANDREASK_IUM_INCLUDED_FORUMS' => 'Fòrums inclosos',
	'ANDREASK_IUM_EXCLUDE_FORUM' => 'Excloure',
	'ANDREASK_IUM_GROUP_IGNORE' => 'Grups a ignorar',
	'ANDREASK_IUM_EXCLUDED_FORUMS' => 'Excloure fòrums',
	'ANDREASK_IUM_INCLUDE_FORUM' => 'Incloure',
	'SELECT_A_FORUM' => 'Si us plau, seleccioni un fòrum',
	'EXCLUDED_EMPTY' => 'Sense fòrums exclosos...',
	'IUM_IGNORE_GROUP_MANAGMENT' => 'Administració de grups',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST' => 'Ignorar',
	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION' => 'Enviar Recordatori',
	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN' => 'Si es actiu, l\'extensió començarà a enviar recordatoris als usuaris \'dorments\'.',
	'ANDREASK_IUM_INTERVAL_EXPLAIN' => 'Es l\'interval de dies a comptar per considerar un usuari \'dorment\'. El valor recomenable es 30 dies.',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN' => 'Nombre de recordatoris que poden enviar-se <b>per dia</b>. El valor recomanat és ~250. Però consulti amb el seu proveïdor si hi ha algun límit de correus enviats al dia.',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN' => 'Si es actiu, el correu inclourà els temes més actius de l\'usuari des de la seva última visita.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN' => 'Nombre de temes destacats de l\'autor que seran inclosos al correu.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN' => 'Si es actiu, el correu inclourà els millors temes del fòrum des de l\'última visita de l\'usuari.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN' => 'Nombre de temes destacats que seran inclosos en el correu.',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN' => 'Si es actiu, s\'inclourà un enllaç a la pàgina "<strong>board_url/ium/{random_key}</strong>" perquè l\'usuari sigui capaç d\'esborrar el seu compte.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN' => 'Si està actiu totes les sol·licituds d\'auto-eliminació hauran de ser aprovades per l\'administrador.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN' => ' "Sí" esborrarà l\'usuari però <strong>mantidrà</strong> els missatges, "No" també esborrarà els missatges.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN' => 'Aquí podeu administrar els usuaris que voleu ignorar (no enviar recordatoris) o eliminar de la llista d\'ignorats.<br/><strong>Cada usuari en una línia.</strong><br/>Tingueu en compte que els següents grups estan <strong>ignorats per defecte</strong>: 1. GUESTS (Convidats), 4. GLOBAL_MODERATORS (Moderadors globals), 5. ADMINISTRATOR (Administrador) i 6. BOTS (Bots) ',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN' => 'Els usuaris seran automàticament eliminats després de cert nombre de dies si no tornen després de 3 recordatoris.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN' => 'Dies a esperar per a auto-eliminar un usuari després del dia del requeriment.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN' => 'Un correu de prova serà enviat a "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN' => 'Seleccioneu una categoria o subcategoria a <strong>excloure</strong> de la llista de millors temes que és enviada als usuaris',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN' => 'Seleccioneu una categoria o subcategoria a <strong>incloure</strong> de la llista de millors temes que és enviada als usuaris',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN' => 'Aquí podeu seleccionar quin(s) grup(s) ha(n) de ser ignorats per l\'extensió. Recordeu que els següents grups estan <strong>ignorats per defecte</strong>: 1. GUESTS (Convidats), 4. GLOBAL_MODERATORS (Moderadors globals), 5. ADMINISTRATOR (Administrador) i 6. BOTS (Bots). Però li recomanem que seleccioneu aquí també aquests grups! ',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN' => 'Premeu Control (CTRL) (o ⌘ a Mac) per a seleccionar múltiples grups.',
// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN' => 'En aquesta llista pot veure els usuaris que s\'han registrat però els seus comptes estan inactives i aquells que no han visitat el fòrum per al perído seleccionat. A El color de l\'usuari representa el seu estat d\'ignorat. <span style="color:#DC143C;"><strong>Vermell</strong></span> -> Ignorat per un administrador, <span style="color:#008000;"><strong>Verd</strong></span> -> Auto-ignorat, <span style="color:#000000;"><strong>Negre</strong></span> -> No ignorat. ',
	'ACP_IUM_SETTINGS' => 'Configuració Recordatoris Usuaris Inactius',
	'ACP_IUM_MAIL_SETTINGS' => 'Configuració Recordatoris',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS' => 'Configuració de coses a Incloure en Recordatoris',
	'ACP_IUM_DANGER' => 'Àrea perillosa',
// configuration page
	'INACTIVE_MAIL_SENT_TO' => 'Un correu mostra del correu a l\'usuari inactiu a "%s"',
	'SLEEPER_MAIL_SENT_TO' => 'Un correu mostra del correu a l\'usuari \'dorment\' a "%s"',
	'SEND_SLEEPER' => 'Envia plantilla \'dorment\'',
	'SEND_INACTIVE' => 'Envia plantilla inactiu',
	'PLUS_SUBFORUMS' => '+ Subfòrums',
// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE' => array(
		0 => 'Actiu',
		1 => 'Preactivació de registre',
		2 => 'Canvi perfil',
		3 => 'Inactiu Admin',
		4 => 'Banejat permanent',
		5 => 'Banejat temporal'
	),
	'NEVER_CONNECTED' => 'Usuari mai connectat',
// Inactive users list page
	'ACP_IUM_NODATE' => 'Usuari <strong>no</strong> desactivat',
	'ACP_USERS_WITH_POSTS' => 'Mostra només usuaris amb missatges',
	'LAST_SENT_REMINDER' => 'Recordatori Anterior',
	'NO_REMINDER_COUNT' => 'Encara no s\'han enviat recordatoris',
	'COUNT' => 'Nombre de recordatoris:',
	'NO_PREVIOUS_SENT_DATE' => 'Encara no s\'ha enviat cap recordatori',
	'REMINDER_DATE' => 'Últim Recordatori Enviat',
	'NO_REMINDER_SENT_YET' => 'Encara no s\'han enviat recordatoris',
	'IUM_INACTIVE_REASON' => 'Estat',
	'TOTAL_USERS_WITH_DAY_AMOUNT' => '<strong>%1$s </strong> usuari(s) en total <i>per a l\'interval establert</i> de "<strong>%2$s</strong>"',
// Delete approval page
	'IGNORE_METHODE' => array(
		0 => 'No ignorat',
		1 => 'Auto',
		2 => 'Ignorat per Admin',
	),
	'IGNORE_METHODES' => 'Tipus d\'Ignorat',
	'ACP_IUM_APPROVAL_LIST_TITLE' => 'Llista d\'aprovació per eliminar',
	'APPROVAL_LIST_PAGE_TITLE' => 'Llista d\'aprovació per eliminar',
	'IUM_APPROVAL_LIST_EXPLAIN' => 'usuaris de la llista d\'aprovats amb sol·licitud d\'eliminació de compte',
	'NO_REQUESTS' => 'Encara sense sol·licituds',
	'NO_USER_SELECTED' => 'No s\'ha seleccionat usuari.',
	'IUM_MANAGMENT' => 'Administració d\'Usuaris Inactius',
	'IGNORE_USER_LIST' => 'Afegir usuaris a la llista de ignorats',
	'IGNORED_USERS_LIST' => 'Llista d\'usuaris ignorats',
	'ADD_IGNORE_USER' => 'Afegir a la Llista',
	'REMOVE_IGNORE_USER' => 'Elimina de la Llista',
	'DELETED_SUCCESSFULLY' => 'Esborrat exitosament.',
	'REQUEST_TYPE' => 'Tipus de sol·licitud',
	'Approve' => 'Aprovar',
	'NO_USER_TYPED' => 'No es va introduir usuari',
	'USER_NOT_FOUND' => 'Usuari(s) %s no trobat(s).',
	'REGISTERED' => 'Registrats',
	'GUESTS' => 'Convidats',
	'REGISTERED_COPPA' => 'Registrats COPPA',
	'GLOBAL_MODERATORS' => 'Moderadors Globals',
	'BOTS' => 'Bots',
	'NEWLY_REGISTERED' => 'Nous Usuaris Registrats',
	'USER_SELECT' => 'Seleccioni',
	'SELECT_AN_ACTION' => 'Seleccioni una Acció',
	'DONT_IGNORE' => 'No Ignorar',
	'NOT_IGNORED' => 'Usuari(s) ja no ignorat(s).',
	'RESET_REMINDERS' => 'Reset completat Satisfactòriament.',
// Sort Lists
	'COUNT_BACK' => '<strong>Fa</strong> interval de dies/mesos/anys i més',
	'ACP_DESCENDING' => 'Ordre descendent',
	'SORT_BY_SELECT' => 'Ordenar per',
	'REQUEST_DATE' => 'Data Sol·licitud Esborrat',
	'SELECT' => 'Seleccioneu D/M/A',
	'THIRTY_DAYS' => 'Trenta dies',
	'SIXTY_DAYS' => 'Seixanta dies',
	'NINETY_DAYS' => 'Noranta dies',
	'FOUR_MONTHS' => 'Quatre mesos',
	'SIX_MONTHS' => 'Sis mesos',
	'NINE_MONTHS' => 'Nou mesos',
	'ONE_YEAR' => 'Un any',
	'TWO_YEARS' => 'Dos anys',
	'THREE_YEARS' => 'Tres anys',
	'FIVE_YEARS' => 'Cinc anys',
	'SEVEN_YEARS' => 'Set anys',
	'DECADE' => 'Una dècada',
// Log
	'SENT_REMINDER_TO_ADMIN' => 'Plantilla "%1$s" va ser enviada a "%2$s"',
	'SENT_REMINDERS' => 'Es van enviar %s recordatoris.',
	'USERS_DELETED' => '"%1$s" usuaris han estat eliminats "<b>%2$s"</b>, tipus de sol·licitud: "<b>%3$s</b>"',
	'USER_DELETED' => 'Usuari "<b>%1$s</b>" va ser eliminat, tipus de sol·licitud: "<b>%2$s</b>"',
	'SOMETHING_WRONG' => 'Quelcom va fallar amb la teva sol·licitud. Els usuaris sol·licitats a esborrar no coincideixen amb els usuaris actuals a la base de dades ',
	'USER_SELF_DELETED' => 'Un usuari va ser auto-eliminat. La configuració dels missatges va ser canviada a "%s"',
	'SENT_REMINDER_TO' => 'Es va enviar un recordatori a l\'usuari "%s"',
	)
);
