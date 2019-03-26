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
	'ACP_IUM'	=>	'IUM yapılandırması',
	'ACP_IUM_LIST'	=>	'Etkin Olmayan Kullanıcılar Listesi',
	'ACP_IUM_TITLE'	=>	'IUM uzantısı',
	'ACP_IUM_TITLE2'	=> 'Etkin Olmayan Kullanıcılar Listesi',
	'ACP_IUM_APPROVAL_LIST'	=> 'Onay Listesini Yoksay / Sil',
	// ACP configuration page
	'ANDREASK_IUM_ENABLE'	=>	'Gelişmiş Etkin Olmayan Kullanıcı Hatırlatıcısını Etkinleştir ',
	'ANDREASK_IUM_INTERVAL'	=>	'Aralık ',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'E-postaları Sınırı ',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Kullanıcının en iyi konularını dahil et ',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Kaç tane konu ',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Kurulun üst konularını dahil et ',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Kaç tane konu ',
	'ANDREASK_IUM_SELF_DELETE'	=>	'Kullanıcı kendini silebilir',
	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Kendi kendine silme istekleri için onay iste',
	'ANDREASK_IUM_KEEP_POSTS'				=>	'Silinen kullanıcıların mesajlarını sakla',
	'ANDREASK_IUM_AUTO_DEL'					=>	'Kullanıcıyı otomatik sil',
	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Gün sonra',
	'ANDREASK_IUM_TEST_EMAIL'				=>	'Gönderilen e-posta adresi',
	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Dahil olan forumlar',
	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Dışla',
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Grupları yoksay',

	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Dışlanan forumlar',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Dahil et',
	'SELECT_A_FORUM'							=>	'Lütfen bir forum seçiniz',
	'EXCLUDED_EMPTY'							=>	'Dışlanan forum yok ...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Grup yönetimi',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Yoksay',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Send Reminder',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Etkinleştirildiğinde, uzantı "uyuyanlara" hatırlatıcı göndermeye başlar..',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Bir kullanıcıyı "uyuyan" olarak değerlendirmek için geri sayılan günlerin aralığıdır. 30 gün tavsiye edilir',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'<b>Günde</b> gönderilebilecek hatırlatıcıların miktarı. Önerilen ~ 250. Ancak, günlük olarak herhangi bir e-posta limiti olup olmadığını öğrenmek için sağlayıcınıza danışın.',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Etkinleştirilirse, kullanıcının son ziyaretinden bu yana kullanıcı\'nın en etkin konularını içerecektir.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Kullanıcının e-postaya dahil etmesi gereken en önemli konularının miktarı.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Etkinleştirilirse, posta, kullanıcının son ziyaretinden bu yana kurulun en önemli konularını içerecektir..',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'E-postaya dahil edilmesi gereken forum konularının miktarı',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Etkinleştirilirse, kullanıcıya "<strong>board_url / ium / {random_key}</strong>" sayfasına bağlantı eklenecek ve hesaplarını kendileri silebilecekler.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Etkinleştirildiğinde, tüm kendini silme isteklerinin yönetici tarafından onaylanması gerekir.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Evet" kullanıcıyı silecek, ancak gönderiyi <strong> saklayacak </strong>, "Hayır" kullanıcının gönderilerini de silecektir.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Burada, yoksaymak istediğiniz kullanıcıları yönetebilir (hatırlatıcı göndermez) veya yoksayma listesinden kaldırabilirsiniz.<br/><strong>Her kullanıcı yeni bir satır.</strong><br/>Not , aşağıdaki gruplar<strong>varsayılan olarak yoksayılır</strong>: 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR ve 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Kullanıcılar 3 hatırlatıcıdan sonra geri dönmezlerse belirli bir gün sonra otomatik olarak silinir.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'İstenen günden sonra bir kullanıcıyı otomatik olarak silene kadar beklenecek gün miktarı.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'"%s" adresine bir test e-postası gönderilecek',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Kullanıcılara gönderilen en üst konu başlıkları listesinden <strong> hariç tutmak </strong> için bir kategori veya alt kategori seçin',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Kullanıcılara gönderilen en üst konu başlıkları listesine <strong> dahil etmek </strong> için bir kategori veya alt kategori seçin',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Burada, hangi grupların uzantı tarafından göz ardı edileceğini seçebilirsiniz. Lütfen burada <u>seçilmemelerine</u> rağmen, </br> BOTS, ADMINISTRATORS, MODERATOROS ve GUESTS <b>dikkate alınmadığını</b> unutmayın. Ancak yine de burada grupları seçmeniz önerilir!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Birden fazla grup seçmek için klavyede kontrolü (CTRL) (veya mac için &#8984;) basılı tutun.',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Bu listede kayıtlı olan ancak hesapları aktif olmayan ve tahtayı burada belirlenen süre boyunca ziyaret etmeyen kullanıcıları görebilirsiniz.<br>Kullanıcı adı renkleri yoksayma durumunu gösterir. <span style="color: #DC143C;"><strong>Kırmızı</strong></span> -> Bir yönetici tarafından yoksayıldı, <span style="color: #008000;"><strong>Yeşil</strong></span> -> Otomatik Yok Sayıldı, <span style="color: #000000;"><strong>Siyah</strong></span> -> Yoksayılmadı.',
	'ACP_IUM_SETTINGS'	=>	'Aktif Olmayan Kullanıcı Hatırlatma Ayarları',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Hatırlatıcı Ayarları',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Hatırlatıcı Ayarları Dahil Et',
	'ACP_IUM_DANGER'	=>	'Tehlike Alanı',
	// configuration page
	'INACTIVE_MAIL_SENT_TO'			=>	'Etkin olmayan kullanıcılar için bir e-posta örneği "%s" adresine gönderildi',
	'SLEEPER_MAIL_SENT_TO'			=>	'Etkin olmayan kullanıcılar için bir e-posta örneği "%s" adresine gönderildi',
	'SEND_SLEEPER'					=>	'Uyuyan şablonu gönder',
	'SEND_INACTIVE'					=>	'Etkin olmayan şablon gönder',
	'PLUS_SUBFORUMS'				=>	'+Altforumlar',
	// Sort by, options for the inactive users list
	'ACP_IUM_INACTIVE'	=> array(
									0	=>	'Aktif',
									// Rest of reasons are not active because they are checked via constants.php
									1	=>	'Kayıt öncesi aktivasyon',
									2	=>	'Profil değişikliği',
									3	=>	'Yönetici devre dışı bırakıldı',
									4	=>	'Kalıcı olarak yasaklandı',
									5	=>	'Geçici Olarak Yasaklandı'),
	'NEVER_CONNECTED'	=>	'Kullanıcı asla bağlanmadı',
	// Inactive users list page
	'ACP_IUM_NODATE'	=>	'Kullanıcı <strong>devre dışı değil</strong>',
	'ACP_USERS_WITH_POSTS'	=>	'Yalnızca gönderileri olan kullanıcıları göster',
	'LAST_SENT_REMINDER'	=>	'Önceki Hatırlatıcı',
	'NO_REMINDER_COUNT'	=>	'Henüz hatırlatıcı gönderilmedi',
	'COUNT'	=>	'Hatırlatma Sayısı',
	'NO_PREVIOUS_SENT_DATE'	=> '-',
	'REMINDER_DATE'	=>	'Son Hatırlatma Gönderildi',
	'NO_REMINDER_SENT_YET'	=>	'Henüz herhangi bir hatırlatma gönderilmedi',
	'IUM_INACTIVE_REASON'	=>	'Durum',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Toplam kullanıcı (lar) <i>belirlenen aralık</i> "<strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'Yoksayılmadı',
		1 =>	'Oto',
		2	=>	'Yönetici tarafından yoksayıldı',
	),
	'IGNORE_METHODES'	=>	'Yoksayma türü',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Silme onay listesi',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Silme onay listesi',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Hesaplarını silme isteği olan kullanıcıların onay listesi',
	'NO_REQUESTS'			=> 'Henüz istek yokHiçbir kullanıcı seçilmedi.',
	'NO_USER_SELECTED'		=>	'Hiçbir kullanıcı seçilmedi.',
	'SELECT_ACTION'			=>	'Lütfen bir işlem seçin',
	'IUM_MANAGMENT'			=>	'Etkin Olmayan Kullanıcı Yönetimi',
	'IGNORE_USER_LIST'		=>	'Listeyi yoksaymak için kullanıcı ekle',
	'IGNORED_USERS_LIST'	=>	'Yok sayılan kullanıcıların listesi',
	'ADD_IGNORE_USER'		=>	'Listeye ekle',
	'REMOVE_IGNORE_USER'	=>	'Listeden sil',
	'DELETED_SUCCESSFULLY'	=>	'Başarıyla silindi.',
	'REQUEST_TYPE'			=>	'İstek Türü',
	'APPROVE'				=>	'Onayla',
	'NO_USER_TYPED'			=>	'Hiçbir kullanıcı girilmedi.',
	'USER_NOT_FOUND'		=>	'Kullanıcı(lar) %s bulunamadı.',
	'REGISTERED'			=>	'Kayıtlı',
	'GUESTS'				=>	'Misafir',
	'REGISTERED_COPPA'		=>	'Kayıtlı COPPA',
	'GLOBAL_MODERATORS'		=>	'Global Moderatörler',
	'BOTS'					=>	'Botlar',
	'NEWLY_REGISTERED'		=>	'Yeni Kayıtlı',
	'USER_SELECT'		=>	'Seç',
	'SELECT_AN_ACTION'		=>	'Bir Eylem Seç',
	'DONT_IGNORE'		=>	'Gözardı etme',
	'NOT_IGNORED'		=>	'Kullanıcı(lar) artık göz ardı edilmedi',
	'RESET_REMINDERS'		=>	'Sıfırlama Başarılı oldu.',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong> itibaren </strong>gün/ay/yıl aralıklığında ve geriye doğru',
	'ACP_DESCENDING'	=>	'Azalan düzen',
	'SORT_BY_SELECT'	=>	'Göre sırala',
	'REQUEST_DATE'		=>	'Silme İsteği tarihi',
	'SELECT'		=>	'G/A/Y\'ı seçin',
	'THIRTY_DAYS'	=>	'Otuz Gün',
	'SIXTY_DAYS'	=>	'Altmış Gün',
	'NINETY_DAYS'	=>	'Doksan Gün',
	'FOUR_MONTHS'	=>	'Dört Ay',
	'SIX_MONTHS'	=>	'Altı Ay',
	'NINE_MONTHS'	=>	'Dokuz Ay',
	'ONE_YEAR'		=>	'Bir Yıl',
	'TWO_YEARS'		=>	'İki Yıl',
	'THREE_YEARS'	=>	'Üç Yıl',
	'FIVE_YEARS'	=>	'Beş Tıl',
	'SEVEN_YEARS'	=>	'Yedi Yıl',
	'DECADE'		=>	'Bir On Yıl',

	// Log
	'SENT_REMINDER_TO_ADMIN'	=>	'"%1$s" şablonu "%2$s" adresine gönderildi.',
	'SENT_REMINDERS'			=>	array(
			0	=>	'Hatırlatıcı gönderilmedi',
			1	=>	'%s hatırlatıcı gönderildi.',
			2	=>	'%s hatırlatıcılar gönderildi.',
	),
	'USERS_DELETED'				=>	'"%1$s" kullanıcıları silindi "<b>%2$s"</b>, istek türü: "<b>%3$s</b>',
	'USER_DELETED'				=>	'"<b>%1$s</b>" adlı kullanıcı silindi, istek türü: "<b>%2$s</b>"',
	'SOMETHING_WRONG'			=>	'İsteğinizle ilgili bir sorun vardı. Silmek için istenen kullanıcılar veritabanındaki gerçek kullanıcılarla eşleşmedi',
	'USER_SELF_DELETED'			=>	'Bir kullanıcı kendisini silindi. Gönderiler için yapılandırma "%s" olarak ayarlandı',
	'SENT_REMINDER_TO'			=>	'"%s" kullanıcısına bir hatırlatma gönderildi',

	)
);
