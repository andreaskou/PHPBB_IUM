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
        'COUNT_BACK'            =>  '<strong>FROM</strong> days/months/years interval and backwards',
        'SELECT'        =>  'Select D/M/Y',
        'THIRTY_DAYS'   =>  'Thirty Days',
        'SIXTY_DAYS'    =>  'Sixty Days',
        'NINETY_DAYS'   =>  'Ninety Days',
        'FOUR_MONTHS'   =>  'Four Months',
        'SIX_MONTHS'    =>  'Six Months',
        'NINE_MONTHS'   =>  'Nine Months',
        'ONE_YEAR'      =>  'One Year',
        'TWO_YEARS'     =>  'Two Years',
        'THREE_YEARS'   =>  'Three Years',
        'FIVE_YEARS'    =>  'Five Years',
        'SEVEN_YEARS'   =>  'Seven Years',
        'DECADE'        =>  'One Decade',
));