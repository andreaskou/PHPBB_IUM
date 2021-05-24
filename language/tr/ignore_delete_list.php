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
        0 =>	'Yok sayılmadı',
        1 =>	'Oto',
        2	=>	'Yönetici tarafından yok sayıldı',
    ),
    'IGNORE_METHODES'	=>	'Yoksayma türü',
    'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Silme onay listesi',
    'APPROVAL_LIST_PAGE_TITLE'		=> 'Silme onay listesi',
    'IUM_APPROVAL_LIST_EXPLAIN'		=> 'Hesaplarını silmek için istekte bulunan kullanıcıların onay listesi',
    'NO_REQUESTS'					=> 'Henüz istek yok',
    'NO_USER_SELECTED'				=>	'Hiçbir kullanıcı seçilmedi.',
    'SELECT_ACTION'					=>	'Lütfen bir işlem seçin',
    'IUM_MANAGMENT'					=>	'Etkin Olmayan Kullanıcı Yönetimi',
    'IGNORE_USER_LIST'				=>	'Yoksayılanlar listesine kullanıcı ekle',
    'IGNORED_USERS_LIST'			=>	'Yok sayılan kullanıcıların listesi',
    'ADD_IGNORE_USER'				=>	'Listeye ekle',
    'REMOVE_IGNORE_USER'			=>	'Listeden kaldır',
    'DELETED_SUCCESSFULLY'			=>	'Başarıyla silindi.',
    'REQUEST_TYPE'					=>	'İstek Türü',
    'APPROVE'						=>	'Onay',
    'NO_USER_TYPED'					=>	'Hiçbir kullanıcı yazılmadı',
    'USER_NOT_FOUND'				=>	'%s kullanıcısı bulunamadı.',
    'REGISTERED'					=>	'Kayıtlı',
    'GUESTS'						=>	'Misafirler',
    'REGISTERED_COPPA'				=>	'Kayıtlı COPPA',
    'GLOBAL_MODERATORS'				=>	'Global Moderatörler',
    'BOTS'							=>	'Botlar',
    'NEWLY_REGISTERED'				=>	'Yeni Kayıtlı',
    'USER_SELECT'					=>	'Seç',
    'SELECT_AN_ACTION'				=>	'Bir Eylem Seçin',
    'DONT_IGNORE'					=>	'Yoksaymayın',
    'NOT_IGNORED'					=>	'Kullanıcı(lar) artık yoksayılmıyor.',
    'RESET_REMINDERS'				=>	'Sıfırlama başarılı oldu.',
	'USER_EXIST_IN_IGNORED_GROUP'	=>	'Kullanıcı(lar) zaten yok sayılan bir grupta var.',
	'REQUEST_DATE'		=>	'Silme İsteği tarihi',


    'IUM_IGNORE_GROUP_MANAGMENT'		=>	'Grup yönetimi',
    'ANDREASK_IUM_UPDATE_IGNORE_LIST'	=>	'Yoksay',
    'ANDREASK_IUM_GROUP_IGNORE'			=>	'Grupları Yoksay',

    'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Burada, uzantı tarafından hangi grup(lar)ın yoksayılması gerektiğini seçebilirsiniz. Burada <u>seçilmemiş</u> olsalar bile</br> BOTS, YÖNETİCİLER, MODERATÖRLER ve MİSAFİRLER <b>yok sayılır</b>. Ancak yine de burada grupların seçilmesi önerilmektedir!',
    'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Birden çok grup seçmek için klavyede kontrolü (CTRL) (veya &#8984; mac için) basılı tutun.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Burada yoksaymak istediğiniz kullanıcıları yönetebilir (hatırlatıcı göndermeyin) veya yoksayma listesinden kaldırabilirsiniz.<br/<strong>Yeni bir satırdaki her kullanıcı.</strong><br/>Not , aşağıdaki gruplar <strong>varsayılan olarak yoksayılır</strong> : 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR ve 6. BOTS',

    )
);
