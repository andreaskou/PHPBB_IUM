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

        // Sort by, options for the inactive users list
        'ACP_IUM_INACTIVE'	=> array(
                                        0	=>	'Ενεργός',
                                        // Rest of reasons are not active because they are checked via constants.php
                                        1	=>	'Προ-ενεργοποίηση εγγραφής',
                                        2	=>	'Αλλαγή προφίλ',
                                        3	=>	'Απενεργοποιημένος από διαχειριστής ',
                                        4	=>	'Μόνιμα Αποκλεισμένο',
                                        5	=>	'Προσωρινά αποκλεισμένο'),
        'NEVER_CONNECTED'	=>	'Το μέλος δεν συνδέθηκε ποτέ',
        // Inactive users list page
        'ACP_IUM_NODATE'	=>	'Το μέλος <strong>δεν</strong> είναι απενεργοποιημένος',
        'ACP_USERS_WITH_POSTS'	=>	'Εμφάνιση μόνο μέλη με αναρτήσεις',
        'LAST_SENT_REMINDER'	=>	'Προηγούμενη υπενθύμιση',
        'NO_REMINDER_COUNT'	=>	'Δεν έχουν σταλεί ακόμη υπενθυμίσεις',
        'COUNT'	=>	'Αριθμός Υπενθυμίσεων',
        'NO_PREVIOUS_SENT_DATE'	=> '-',
        'REMINDER_DATE'         =>  'Τελευταία υπενθύμιση εστάλλει',
        'NO_REMINDER_SENT_YET'  =>  'Δεν έχουν σταλεί ακόμα υπενθυμίσεις',
        'IUM_INACTIVE_REASON'   =>  'Κατάσταση',
        'TOTAL_USERS_WITH_DAY_AMOUNT'   =>  '<strong>%1$s</strong> Μέλος/η συνολικά <i>για το καθορισμένο διάστημα</i> της <strong>%2$s</strong>"',

        // configuration page Legend
    	'IUM_INACTIVE_USERS_EXPLAIN'   =>  'Σε αυτή τη λίστα μπορείτε να δείτε τα μέλη που έχουν εγγραφεί αλλά οι λογαριασμοί των οποίων είναι ανενεργοί και εκείνοι που δεν έχουν επισκεφτεί το φόρουμ για το καθορισμένο χρονικό διάστημα εδώ. <span style="color: #DC143C;"><strong>Κόκκινο</strong></span> -> Αγνοείται από διαχειριστή, <span style="color: #008000;"><strong>Πράσινο</strong></span> -> Αγνοείται αυτόματα, <span style="color: #000000;"><strong>Μαύρο</strong></span> -> Δεν αγνοείται.',
    	'ACP_IUM_SETTINGS'             =>  'Ρυθμίσεις υπενθύμισης ανενεργού μέλους',
    	'ACP_IUM_MAIL_SETTINGS'        =>  'Ρυθμίσεις υπενθύμισης',

        // Sort Lists
    	'COUNT_BACK'       =>  '<strong>ΑΠΟ</strong> ημέρες/μήνες/έτη πριν και προς τα πίσω',
    	'ACP_DESCENDING'   =>  'Φθίνουσα σειρά',
    	'SORT_BY_SELECT'   =>  'Ταξινόμηση κατά',
    	'REQUEST_DATE'     =>  'Ημερομηνία αιτήματος διαγραφής',
    	'SELECT'           =>  'Επιλέξτε D/M/Y',
    	'THIRTY_DAYS'      =>  'Τριάντα ημέρες',
    	'SIXTY_DAYS'       =>  'Εξήντα ημέρες',
    	'NINETY_DAYS'      =>  'Ενενήντα ημέρες',
    	'FOUR_MONTHS'      =>  'Τέσσερις μήνες',
    	'SIX_MONTHS'       =>  'Έξι μήνες',
    	'NINE_MONTHS'      =>  'Εννέα Μήνες',
    	'ONE_YEAR'         =>  'Ένα έτος',
    	'TWO_YEARS'        =>  'Δύο χρόνια',
    	'THREE_YEARS'      =>  'Τρία χρόνια',
    	'FIVE_YEARS'       =>  'Πέντε χρόνια',
    	'SEVEN_YEARS'      =>  'Επτά χρόνια',
    	'DECADE'           =>  'Μια δεκαετία',
    )
);
