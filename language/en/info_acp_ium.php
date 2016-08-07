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
        'ACP_IUM_TITLE'        =>  'IUM extension',
        'ACP_IUM'              =>  'IUM configuration',
        'ACP_IUM_LIST'         =>  'Inactive Users List',
        'ACP_IUM_ENABLE'       =>  'Enable Advanced Inactive User Manager?',
        'ACP_IUM_INACTIVE'       =>  [   0   =>  'Is Active',
                                        1   =>  'Registration pre-activation',
                                        2   =>  'Profile change',
                                        3   =>  'Admin deactivated',
                                        4   =>  'Permanently Banned',
                                        5   =>  'Temporarily Banned'],
        'ACP_IUM_NODATE'       =>  'User is <strong>not</strong> disabled',
        'ACP_USERS_WITH_POSTS'  =>  'Show only users with posts',
        'LAST_SENT_REMINDER'    =>  'Previous Reminder',
        'COUNT'                 =>  'Reminders Count',
        'REMINDER_DATE'         =>  'Last Reminder Sent'
));