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
        // ACP configuration page
        'ANDREASK_IUM_ENABLE'	=>	'Включить расширение "Advanced Inactive User Reminder" ',
        'ANDREASK_IUM_INTERVAL'	=>	'Интервал',
        'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Лимит писем',
        'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Включить в письмо ТОП тем пользователя',
        'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Количество тем ',
        'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Включить в письмо ТОП тем форума',
        'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Количество тем ',
        'ANDREASK_IUM_SELF_DELETE'	=>	'Пользователь может самостоятельно удалить себя',
        'ANDREASK_IUM_DELETE_APPROVE'			=>	'Требовать подтверждения для запросов на удаление',
        'ANDREASK_IUM_KEEP_POSTS'				=>	'Сохранить сообщения пользователя после удаления',
        'ANDREASK_IUM_AUTO_DEL'					=>	'Автоматическое удаление пользователей',
        'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Дней отсрочки',
        'ANDREASK_IUM_TEST_EMAIL'				=>	'Отправить тестовый e-mail',
        'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Включённые форумы',
        'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Исключить',
        'EMAILS'								=>	'писем',
		'ACP_IUM_SETTINGS'	=>	'Глобальные настройки',
		'ACP_IUM_MAIL_SETTINGS'	=>	'Настройки уведомлений по электронной почте',		
		'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Настройки напоминания',
		'ACP_IUM_DANGER'	=>	'Настройки удаления пользователей',

        'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Исключённые форумы',
        'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Включить',
        'SELECT_A_FORUM'							=>	'Пожалуйста выберите форум',
        'EXCLUDED_EMPTY'							=>	'Нет исключённых форумов...',

		// ACP configuration page Explanations
		'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Если включено, расширение начнёт отправлять напоминания неактивным пользователям.',
		'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Количество дней, которое должно пройти, чтобы считать пользователя неактивным. Письма с уведомлениями будут отправляться с установленным здесь интервалом. К примеру, установив значение в "30 дней", пользователь, не посещавший форум 30 дней, получит первое уведомление, ещё через 30 дней второе, ну и ещё через 30 дней третье - последнее, после чего будет игнорироваться расширением.',
		'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Количество напоминаний, которое может быть отправлено <b>за день</b>. Рекомендуется ~250. Обязательно проконсультируйтесь с вашим хостинг-провайдером на предмет ограничения отправляемых писем.',
		'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Если включено, напоминание по электронной почте будет содержать также ссылки на ТОП активных тем пользователя с момента его последнего визита.',
		'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Количество ТОП тем пользователя, которое будет включено в письмо',
		'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Если включено, напоминание по электронной почте будет содержать также ссылки на ТОП активных тем форума с момента последнего визита пользователя.',
		'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Количество ТОП тем форума, которое будет включено в письмо',
		'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Если включено, пользователь получит вместе с напоминанием также ссылку вида "<strong>board_url/ium/{random_key}</strong>", по которой сможет подать запрос на удаление своего аккаунта.<br>Ссылка будет добавляться в письмо начиная со второго напоминания. В целях безопасности, тестовое сообщение, которое вы можете отправить с этой страницы, также никогда не будет содержать такую ссылку.',
		'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Если включено, то все запросы на удаление аккаунтов должны быть утверждены администратором.',
		'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'Если "Да", то все сообщения пользователя после его удаления будут сохранены. Если "Нет", то пользователь будет удалён вместе со своими сообщениями.',
		'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Пользователи будут автоматически удаляться после получения 3-го напоминания, если так и не зайдут на форум.',
		'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Количество дней, которое должно пройти, прежде чем пользователь будет автоматически удалён, с момента получения последнего 3-го напоминания.',
		'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Тестовое сообщение будет отправлено на "%s"<br><br><strong>Sleeper</strong> - пользователь, который не посещал форум установленное количество дней.<br><strong>Inactive</strong> - пользователь, который ещё ни разу не посещал форум.<br><br><i>Текст шаблонов можно изменить в директории: ext/andreask/ium/language/ru/email</i>',
		'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Выберите категорию или подкатегорию, чтобы <strong>исключить</strong> их из списка ТОП тем, которые будут отправлены пользователю.',
		'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Выберите категорию или подкатегорию, чтобы <strong>включить</strong> их в список ТОП тем, которые будут отправлены пользователю.',

		// configuration page
		'INACTIVE_MAIL_SENT_TO'			=>	'Шаблон Inactive был отправлен на "%s"',
		'SLEEPER_MAIL_SENT_TO'			=>	'Шаблон Sleeper был отправлен на "%s"',
		'SEND_SLEEPER'					=>	'Отправить шаблон \'Sleeper\' ',
		'SEND_INACTIVE'					=>	'Отправить шаблон \'Inactive\' ',
		'PLUS_SUBFORUMS'				=>	'+подкатегории',

    )
);
