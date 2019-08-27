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
	'USER_SELF_DELETE_TITLE'		=>  'Pagina di auto cancellazione.',
	'USER_SELF_DELETE_EXPLAIN'		=>  'Facendo click sul box di verifica e sul bottone di conferma accetti di cancellare il tuo account.<br/>Tutti i tuoi post resteranno intatti, ma non potrai più collegarsti con il tuo username/passowrd.<br/>Anche ricreando un account con lo stesso nome, i post precedentei non saranno ricollegati al nuovo account.',
	'USER_SELF_DELETE_VERIFY'		=>  'Comprendo le conseguenze e confermo',
	'HAVE_TO_LOGIN'					=>  'ci dispiace, ma devi effettuare il login per vedere questa pagina.',
	'HAVE_TO_VERIFY'				=>  'Per favore fai click sul box di verifica.',
	'PAGE_NOT_EXIST'				=>  'Ci dispiace per l\'inconveniente.<br/><br/>Ma l\'auto cancellazione è disabilitata.<br/>Se sei arrivato a questa pagina accidentalmente verifica l\'indirizzo che hai digitato nel browser.<br/>Se tu hai seguito il link da una mail spedita da noi, contatta gli amministratori del sito.',
	'NEEDS_APPROVAL'				=>	'Siamo dispiaciuti che hai deciso di lasciarci %s. Tieni nota che il tuo account non è ancora stato cancellato (la cancellazione sarà approvata a breve). In 3 secondi sarai riportato alla homepage.',
	'USER_SELF_DELETE_SUCCESS'		=>	'Siamo dispiaciuti che hai deciso di lasciarci %s. Il tuo account è stato cancellato. In 3 secondi sarai riportato alla homepage.',
	'INVALID_LINK_OR_USER'			=>	'Combinazione invalida.',
));
