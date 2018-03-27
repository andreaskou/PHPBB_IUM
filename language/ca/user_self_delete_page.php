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
if (!defined('IN_PHPBB')) {
	exit;
}

if (empty($lang) || !is_array($lang)) {
	$lang = array();
}

$lang = array_merge($lang, array(
	'USER_SELF_DELETE_TITLE' => 'Pàgina de auto-eliminació.',
	'USER_SELF_DELETE_EXPLAIN' => 'Marcant la casella de verificació i pulsant el botó de confirmació accepta l\'esborrat de el seu compte en aquest fòrum.<br/>Tots els seus missatges es mantindràn intactes però vosté no podrà tornar a connectar-se amb el seu usuari i contrasenya.<br/>Si crea un nou compte amb el mateix usuari els missatges anteriors no tornaran a connectar-se amb el neou compte.',
	'USER_SELF_DELETE_VERIFY' => 'Entenc les conseqüències i comfirmo',
	'HAVE_TO_LOGIN' => 'Ho sentim però ha de identificar-se per poder veure aquesta pàgina.',
	'HAVE_TO_VERIFY' => 'Si us plau, marqui la casella de verificació.',
	'PAGE_NOT_EXIST' => 'Sentim els inconvenients.<br/><br/>L\'auto-eliminació està desactivada.<br/>Si va arribar a aquesta pàgina per accident revisi la direcció introduïda al navegador.<br/>Si va seguir un enllaç que nosaltres vam enviar, si us plau, posi\'s en contacte amb l\'administrador de la pàgina.',
	'NEEDS_APPROVAL' => 'Sentim que hagi decidit abandonar %s. Si us plau, tingui en compte que el se compte encara no està eliminada, necessita primer ser aprovat. Si us plau, doni\'ns una mica de temps per realitzar aquesta acció. En 3 segons serà redireccionat a la pàgina principal de la web.',
	'USER_SELF_DELETE_SUCCESS' => 'Sentim que hagi decidit abandonar %s. El seu compte ha sigut eliminat. En 3 segons serà redireccionat a la pàgina principal de la web.',
	'INVALID_LINK_OR_USER' => 'Combinació no vàlida.',
	));
