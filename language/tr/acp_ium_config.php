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
		'ACP_IUM_SETTINGS'	=>	'Etkin Olmayan Kullanıcı Hatırlatıcısı Ayarları',
		'ACP_IUM_MAIL_SETTINGS'	=>	'Hatırlatma Ayarları',

        'ANDREASK_IUM_ENABLE'	=>	'Gelişmiş Etkin Olmayan Kullanıcı Hatırlatıcısını Etkinleştir ',
        'ANDREASK_IUM_INTERVAL'	=>	'Aralık ',
        'ANDREASK_IUM_EMAIL_LIMIT'	=>	'E-postaları sınırla ',
        'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Kullanıcının en önemli konularını dahil et ',
        'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Kaç konu ',
        'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Tahtanın en iyi konularını dahil et ',
        'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Kaç konu',
        'ANDREASK_IUM_SELF_DELETE'	=>	'Kullanıcı kendini silebilir',
        'ANDREASK_IUM_DELETE_APPROVE'			=>	'Kendini silme istekleri için onay iste',
        'ANDREASK_IUM_KEEP_POSTS'				=>	'Silinen kullanıcıların mesajları tutun',
        'ANDREASK_IUM_AUTO_DEL'					=>	'Kullanıcıyı otomatik sil',
        'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Gün sonra',
        'ANDREASK_IUM_TEST_EMAIL'				=>	'Test e-postası gönder',
        'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Dahil edilen forumlar',
        'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Dışlanan',
        'EMAILS'								=>	'E-postalar',
		'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Hatırlatıcı Dahil Etme Ayarları',
		'ACP_IUM_DANGER'	=>	'Tehlike Bölgesı',

        'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Hariç tutulan forumlar',
        'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Dahil et',
        'SELECT_A_FORUM'							=>	'Lütfen bir forum seçin',
        'EXCLUDED_EMPTY'							=>	'Hariç tutulan forum yok...',

		// ACP configuration page Explanations
		'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Etkinleştirilirse, eklenti "uyuyanlara" hatırlatıcılar göndermeye başlar.',
		'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Bir kullanıcıyı "uyuyan" olarak değerlendirmek için geri sayım gün aralığıdır. 30 gün önerilir',
		'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'<b>Günde</b> gönderilebilecek hatırlatıcı sayısı. Önerilen ~250`dir. Ancak günlük e-posta sınırı için sağlayıcınıza danışın.',
		'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Etkinleştirilirse, posta, kullanıcının son ziyaretinden bu yana kullanıcının en etkin konularını içerir.',
		'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Kullanıcının en önemli konularının e-postaya eklenmesi gereken miktar.',
		'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Etkinleştirilirse, posta, kullanıcının son ziyaretinden bu yana panonun en önemli konularını içerecektir.',
		'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'E-postaya eklenmesi gereken forum konularının sayısı',
		'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Etkinleştirilirse, kullanıcıya "<strong>board_url/ium/{random_key}</strong>" sayfasına bir bağlantı eklenir ve hesaplarını kendi kendine silebilir.',
		'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Etkinleştirilirse, tüm kendini silme isteğinin yönetici tarafından onaylanması gerekir.',
		'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'"Evet" kullanıcıyı silecek ancak gönderiyi <strong>tutacak</strong>, "Hayır" kullanıcının gönderilerini de silecektir.',
		'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Kullanıcılar 3 hatırlatmadan sonra geri dönmezlerse belirli bir gün sonra otomatik olarak silineceklerdir.',
		'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Bir kullanıcının istenen günden sonra otomatik olarak silinmesini beklemek için gün sayısı.',
		'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'"%s" adresine bir test e-postası gönderilecek',
		'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Kullanıcılara gönderilen üst konu listelerinden <strong>hariç tutmak</strong> için bir kategori veya alt kategori seçin',
		'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Kullanıcılara gönderilen üst konu listelerinden <strong>dahil etmek</strong> için bir kategori veya alt kategori seçin',

		// configuration page
		'INACTIVE_MAIL_SENT_TO'			=>	'Etkin olmayan kullanıcılar için "%s" e-posta örneği gönderildi',
		'SLEEPER_MAIL_SENT_TO'			=>	'Etkin olmayan kullanıcılar için "%s" e-posta örneği gönderildi',
		'SEND_SLEEPER'					=>	'Uyuyan şablonu gönder',
		'SEND_INACTIVE'					=>	'Etkin Olmayan şablonu gönder',
		'PLUS_SUBFORUMS'				=>	'Altforumlar',

    )
);
