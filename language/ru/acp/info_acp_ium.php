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
	'ACP_IUM'	=>	'Настройки IUM',
	'ACP_IUM_LIST'	=>	'Список неактивных',
	'ACP_IUM_TITLE'	=>	'Расширение IUM',
	'ACP_IUM_TITLE2'	=> 'Список неактивных пользователей',
	'ACP_IUM_APPROVAL_LIST'	=> 'Запросы на удаление и Списки игнорируемых',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Отправить напоминание',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'Шаблон "%1$s" был отправлен на "%2$s"',
	'SENT_REMINDERS'			=>	array(
			0	=>	'Ни одного напоминания не было отправлено',
			1	=>	'%s напоминание было отправлено.',
			2	=>	'%s напоминания было отправлено.'
	),
	'USERS_DELETED'				=>	'Удалено "%1$s" пользователей: "<b>%2$s"</b>, тип запроса : "<b>%3$s</b>"',
	'USER_DELETED'				=>	'Пользователь "<b>%1$s</b>" был удалён, типа запроса : "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'Что-то не так с вашим запросом. Запрошенные пользователи для удаления не совпадают с фактическими пользователями в базе данных',
	'USER_SELF_DELETED'			=>	'Пользователь был удалён самостоятельно. Конфигурация для сообщений была установлена в "%s"',
	'SENT_REMINDER_TO'			=>	'Напоминание было отправлено пользователю "%s"',
)
);
