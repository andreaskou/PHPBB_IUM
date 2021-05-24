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

    // Delete approval page
    'IGNORE_METHODE'	=> array(
        0 =>	'Не игнорирован',
        1 =>	'Авто',
        2	=>	'Игнорирован администратором',
    ),
    'IGNORE_METHODES'	=>	'Тип игнорирования',
    'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Запросы на удаление',
    'APPROVAL_LIST_PAGE_TITLE'		=> 'Список пользователей, запрашиваемых к удалению',
    'IUM_APPROVAL_LIST_EXPLAIN'		=> 'Подтвердите или отклоните удаление следующих пользователей.<br><strong>auto</strong> - запрос на удаление сформирован расширением автоматически (это те пользователи, кто так и не зашёл на сайт после 3-х напоминаний)<br><strong>user</strong> - запрос на удаление отправлен пользователем вручную (это те пользователи, кто воспользовался ссылкой на удаление своей учётной записи)',
    'NO_REQUESTS'					=> 'Запросов пока нет',
    'NO_USER_SELECTED'				=>	'Пользователи не выбраны.',
    'SELECT_ACTION'					=>	'Пожалуйста выберите действие',
    'IUM_MANAGMENT'					=>	'Управление игнорируемыми пользователями',
    'IGNORE_USER_LIST'				=>	'Добавить пользователей в список игнорирования',
    'IGNORED_USERS_LIST'			=>	'Список игнорируемых пользователей',
    'ADD_IGNORE_USER'				=>	'Добавить в список',
    'REMOVE_IGNORE_USER'			=>	'Удалить из списка',
    'DELETED_SUCCESSFULLY'			=>	'Выбранные пользолватели были успешно удалены.',
    'REQUEST_DATE'					=>	'Дата запроса',
    'REQUEST_TYPE'					=>	'Тип запроса',
    'APPROVE'						=>	'Подтвердить удаление',
    'NO_USER_TYPED'					=>	'No user was typed',
    'USER_NOT_FOUND'				=>	'Пользователь %s не найден.',
    'REGISTERED'					=>	'Зарегистрированные',
    'GUESTS'						=>	'Гости',
    'REGISTERED_COPPA'				=>	'Зарегистрированные COPPA',
    'GLOBAL_MODERATORS'				=>	'Супермодераторы',
    'BOTS'							=>	'Боты',
    'NEWLY_REGISTERED'				=>	'Новые пользователи',
    'USER_SELECT'					=>	'Выбор',
    'SELECT_AN_ACTION'				=>	'Выберите действие',
    'DONT_IGNORE'					=>	'Не игнорировать',
    'NOT_IGNORED'					=>	'Выбранные пользователи удалены из списка игнорируемых',
    'RESET_REMINDERS'				=>	'Запрос был отклонён.',
	'USER_EXIST_IN_IGNORED_GROUP'	=>	'Выбранные пользователи уже существуют в группе, которая игнорируется',

    'IUM_IGNORE_GROUP_MANAGMENT'		=>	'Управление группами',
    'ANDREASK_IUM_UPDATE_IGNORE_LIST'	=>	'Игнорировать',
    'ANDREASK_IUM_GROUP_IGNORE'			=>	'Группы, которые игнорируются',

    'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Здесь вы можете выбрать, какие группы должны игнорироваться расширением. Обратите внимание, что даже если<br>БОТЫ, АДМИНИСТРАТОРЫ, МОДЕРАТОРЫ и ГОСТИ не выбраны здесь, они всё равно <b>игнорируются</b> по умолчанию.',
    'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Удерживайте CTRL (или &#8984; для mac) на клавиатуре, чтобы выбрать несколько групп.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Здесь вы можете управлять пользователями, которых хотите игнорировать (не отправлять им напоминания), или удалить их из списка игнорируемых.<br/><strong>Каждый пользователь с новой строки</strong><br/>Обратите внимание, что следующие группы <strong>игнорируются по умолчанию</strong> : 1. ГОСТИ, 4. СУПЕРМОДЕРАТОРЫ, 5. АДМИНИСТРАТОРЫ и 6. БОТЫ',

    )
);
