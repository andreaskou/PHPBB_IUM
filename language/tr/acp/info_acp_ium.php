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

	'ACP_IUM'	=>	'IUM yapılandırması',
	'ACP_IUM_LIST'	=>	'Etkin Olmayan Kullanıcılar Listesi',
	'ACP_IUM_TITLE'	=>	'IUM uzantısı',
	'ACP_IUM_TITLE2'	=> 'Etkin Olmayan Kullanıcılar Listesi',
	'ACP_IUM_APPROVAL_LIST'	=> 'Onay Listesini Yoksay / Sil',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Send Reminder',

	// Log
	'LOG_SENT_REMINDER_TO_ADMIN'	=>	'"%1$s" şablonu "%2$s" adresine gönderildi.',
	'LOG_SENT_REMINDERS'			=>	array(
			0	=>	'Hatırlatıcı gönderilmedi',
			1	=>	'%s hatırlatıcı gönderildi.',
			2	=>	'%s hatırlatıcılar gönderildi.',
	),
	'LOG_USERS_DELETED'				=>	'"%1$s" kullanıcıları silindi "<b>%2$s"</b>, istek türü: "<b>%3$s</b>',
	'LOG_USER_DELETED'				=>	'"<b>%1$s</b>" adlı kullanıcı silindi, istek türü: "<b>%2$s</b>"',
	'LOG_DELETE_REQUEST_DONT_MATCH'			=>	'İsteğinizle ilgili bir sorun vardı. Silmek için istenen kullanıcılar veritabanındaki gerçek kullanıcılarla eşleşmedi',
	'LOG_USER_SELF_DELETED'			=>	'Bir kullanıcı kendisini silindi. Gönderiler için yapılandırma "%s" olarak ayarlandı',
	'LOG_SENT_REMINDER_TO'			=>	'"%s" kullanıcısına bir hatırlatma gönderildi',
	)
);
