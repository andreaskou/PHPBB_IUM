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
    // Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Активен',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'Предварительная активация после регистрации',
									2	=>	'Изменён профиль',
									3	=>	'Деактивирован администратором',
									4	=>	'Забанен бессрочно',
									5	=>	'Забанен временно'),
	'NEVER_CONNECTED'	=>	'<span style="color:darkred; font-weight:bold">никогда</span>',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'<strong>не</strong> отключен',
	'ACP_USERS_WITH_POSTS'	=>	'Показать пользователей только с сообщениями',
	'LAST_SENT_REMINDER'	=>	'Предыдущее напоминание',
	'NO_REMINDER_COUNT'	=>	'<span style="color:darkblue; font-weight:bold">нет</span>',
	'COUNT'	=>	'Количество напоминаний',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Последнее напоминание',
	'NO_REMINDER_SENT_YET'	=>	'<i>ещё не было напоминаний</i>',
	'IUM_INACTIVE_REASON'	=>	'Статус',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'Всего <strong>%1$s</strong> пользователей <i>за установленнй интервал</i> в "<strong>%2$s</strong>"',

    // configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'В этом списке вы можете видеть пользователей, которые зарегистрировались, но чьи учётные записи неактивны, а также тех, кто не посещал форум в течение установленного здесь времени.<br>Цвета имени пользователя показывают статус игнорирования. Игнорируемым пользователям напоминания приходить не будут. <span style="color: #DC143C;"><strong>Красный</strong></span> -> игнорируеется администратором, <span style="color: #008000;"><strong>Зелёный</strong></span> -> игнорируется автоматически, <span style="color: #000000;"><strong>Чёрный</strong></span> -> не игнорируется.',
	'ACP_IUM_SETTINGS'	=>	'Настройки напоминаний неактивным пользователям',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Настройки напоминания',

    // Sort Lists
	'COUNT_BACK'	=>	'Пользователи, не посещавшие форум <strong>более чем</strong>',
	'ACP_DESCENDING'	=>	'В порядке убывания',
	'SORT_BY_SELECT'	=>	'Сортировать по',
	'REQUEST_DATE'		=>	'Deletion Request date',
	'SELECT'		=>	'Интервал',
	'THIRTY_DAYS'	=>	'30 дней',
	'SIXTY_DAYS'	=>	'60 дней',
	'NINETY_DAYS'	=>	'90 дней',
	'FOUR_MONTHS'	=>	'4 месяца',
	'SIX_MONTHS'	=>	'6 месяцев',
	'NINE_MONTHS'	=>	'9 месяцев',
	'ONE_YEAR'		=>	'1 год',
	'TWO_YEARS'		=>	'2 года',
	'THREE_YEARS'	=>	'3 года',
	'FIVE_YEARS'	=>	'5 лет',
	'SEVEN_YEARS'	=>	'7 лет',
	'DECADE'		=>	'10 лет',
	)
);
