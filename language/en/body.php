<?php
/**
 *
 * @package phpBB Extension - Advanced Inactive User Manager
 * @copyright (c) 2013 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
 */

if ( !defined('IN_PHPBB') )
{
	exit;
}

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge($lang, array(
	'INCLUDE_USER_TOPICS'				=>	'Bellow some links to topics that you\'ve been active. %s',
	'INCLUDE_FORUM_TOPICS'				=>	'Bellow some links to the most active topics of the board. %s',
	'FOLOW_TO_DELETE'					=>	'Click on the following link to delete your account.%s',
));
