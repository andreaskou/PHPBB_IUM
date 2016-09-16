<?php
/**
 *
 * @package phpBB Extension - Advanced Inactive User Manager
 * @copyright (c) 2013 phpBB Group
 * @license http://opensource.org/licenses/gpl-2.0.php GNU General Public License v2
 *
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
        'USERS_DELETED'         	=>	'"%1s" users were deleted, request type : "%2s"',
        'USER_DELETED'          	=>	'User "%1s" was deleted, request type : "%2s"',
        'SOMETHING_WRONG'       	=>	'Something was wrong with your request. Requested users for deletion did not match with the actual users in the database',
        'USER_SELF_DELETED'     	=>	'A user was self deleted. Configuration for posts was set on "%s"',
        ));
