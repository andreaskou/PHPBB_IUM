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

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'USER_SELF_DELETE_TITLE'		=>  'Kendini silme sayfası.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Doğrulama kutusunu işaretleyerek ve onaylama düğmesine tıklayarak kullanıcı hesabınızı bu forumda silmeyi kabul edersiniz.<br/>Tüm mesajlarınız değişmeden kalır, ancak artık kullanıcı adınız/şifrenizle bağlantı kuramazsınız.<br/>> Aynı kullanıcı adıyla bir hesap oluşturursanız, önceki mesajlar yeni hesaba bağlanmaz.',
	'USER_SELF_DELETE_VERIFY'		=>  'Sonuçları anlıyorum ve doğruluyorum',
	'HAVE_TO_LOGIN'					=>  'Üzgünüz, ancak bu sayfayı görmek için giriş yapmalısınız.',
	'HAVE_TO_VERIFY'				=>  'Lütfen doğrulama kutusunu kontrol edin.',
	'PAGE_NOT_EXIST'				=>  'Verdiğimiz rahatsızlıktan dolayı özür dileriz.<br/><br/>Ancak kendini silme işlemi devre dışı bırakıldı.<br/>Bu sayfaya yanlışlıkla girdiyseniz, lütfen tarayıcınıza girdiğiniz URL`yi kontrol edin.<br/>Bizden aldığınız bir e-postadaki bir linki izlediyseniz, lütfen sayfanın yöneticisi ile iletişime geçin.',
	'NEEDS_APPROVAL'				=>	'%s\'dan ayrılmaya karar verdiğiniz için çok üzgünüz. Lütfen hesabınızın hala silinmediğini, öncelikle onaylanması gerektiğini unutmayın. Lütfen bu eylem için bize biraz zaman verin. 3 saniyede ana sayfamıza yönlendirileceksiniz.',
	'USER_SELF_DELETE_SUCCESS'		=>	'%s\'dan ayrılmaya karar verdiğiniz için çok üzgünüz. Hesabınız silindi. 3 saniyede ana sayfamıza yönlendirileceksiniz.',
	'INVALID_LINK_OR_USER'			=>	'Geçersiz kombinasyon.',
));
