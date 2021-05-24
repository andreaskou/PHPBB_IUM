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
									0	=>	'Aktif',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'Kayıt ön aktivasyonu',
									2	=>	'Profil değişikliği',
									3	=>	'Yönetici devre dışı bırakıldı',
									4	=>	'Kalıcı olarak yasaklandı',
									5	=>	'Geçici Olarak Yasaklandı'),
	'NEVER_CONNECTED'	=>	'Kullanıcı hiç bağlanmadı',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Kullanıcı <strong>devre dışı değil</strong>',
	'ACP_USERS_WITH_POSTS'	=>	'Yalnızca mesajları olan kullanıcıları göster',
	'LAST_SENT_REMINDER'	=>	'Önceki Hatırlatma',
	'NO_REMINDER_COUNT'	=>	'Henüz hatırlatma gönderilmedi',
	'COUNT'	=>	'Hatırlatma Sayısı',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Son Hatırlatma Gönderildi',
	'NO_REMINDER_SENT_YET'	=>	'Henüz hatırlatma gönderilmedi',
	'IUM_INACTIVE_REASON'	=>	'Durumu',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> "<strong>%2$s</strong> ayar aralığı için toplam <i>toplam kullanıcı</i>"',

    // configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Bu listede, kayıtlı, ancak hesapları etkin olmayan ve ayarlanan süre boyunca yönetim kurulunu ziyaret etmeyen kullanıcıları görebilirsiniz.<br>Kullanıcı adı renkleri yoksay durumunu temsil eder. <span style="color:#DC143C;"><strong>Kırmızı</strong></span> -> Bir yönetici tarafından yoksayıldı, <span style="color:#008000;"><strong>Yeşil</strong></span> -> Otomatik Yoksayıldı, <span style="color:#000000;"><strong>Siyah</strong></span> -> Yoksayılmadı.',

    // Sort Lists
	'COUNT_BACK'	=>	'<strong>DANM</strong> gün/ay/yıl öncesi ve sonrası',
	'ACP_DESCENDING'	=>	'Azalan düzen',
	'SORT_BY_SELECT'	=>	'Sıralama ölçütü',
	'SELECT'		=>	'G/A/Y seçin',
	'THIRTY_DAYS'	=>	'Otuz Gün',
	'SIXTY_DAYS'	=>	'Altmış Gün',
	'NINETY_DAYS'	=>	'Doksan Gün',
	'FOUR_MONTHS'	=>	'Dört Ay',
	'SIX_MONTHS'	=>	'Altı Ay',
	'NINE_MONTHS'	=>	'Dokuz Ay',
	'ONE_YEAR'		=>	'Bir yıl',
	'TWO_YEARS'		=>	'İki yıl',
	'THREE_YEARS'	=>	'Üç yıl',
	'FIVE_YEARS'	=>	'Beş Yıl',
	'SEVEN_YEARS'	=>	'Yedi Yıl',
	'DECADE'		=>	'On Yıl',
	)
);
