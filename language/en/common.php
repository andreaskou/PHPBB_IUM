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

if (empty($lang) || !is_array($lang))
{
        $lang = array();
}

$lang = array_merge($lang, array(
        'ACP_IUM'               => 'IUM configuration',
        'ACP_IUM_TITLE'         => 'IUM Main Configuration',
        'ACP_IUM_TITLE2'        => 'Inactive Users List',
        'COUNT_BACK'            =>  'Select the interval back for the list',

));