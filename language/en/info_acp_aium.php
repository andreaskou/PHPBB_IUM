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
        'SELECT'        =>  'Select D/M/Y',
        'THIRTY_DAYS'   =>  'Thirty Days',
        'SIXTY_DAYS'    =>  'Sixty Days',
        'NINETY_DAYS'   =>  'Ninety Days',
        'FOUR_MONTHS'   =>  '4 Months',
        'SIX_MONTHS'    =>  '6 Months',
        'NINE_MONTHS'   =>  '9 Months',
        'ONE_YEAR'      =>  '1 Year',
        'TWO_YEARS'     =>  '2 Years',
        'THREE_YEARS'   =>  '3 Years',
        'FIVE_YEARS'    =>  '5 Years',
        'SEVEN_YEARS'   =>  '7 Years',
        'DECADE'        =>  'Decade',
));