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
        'ANDREASK_IUM_ENABLE'	=>	'Ενεργοποίηση του IUM ',
    	'ANDREASK_IUM_INTERVAL'	=>	'Διάστημα ',
    	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Όριο μηνυμάτων ηλεκτρονικού ταχυδρομείου ',
    	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Συμπεριλάβετε τα κορυφαία νήματα του μέλους',
    	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>	'Πόσα νήματα ',
    	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Συμπεριλάβετε τα κορυφαία θέματα του φόρουμ',
    	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Πόσα θέματα ',
    	'ANDREASK_IUM_SELF_DELETE'	=>	'Το μέλος μπορεί να διαγραφεί μόνο του',
    	'ANDREASK_IUM_DELETE_APPROVE'			=>	'Απαιτείται έγκριση για αιτήματα αυτοδιαγραφής',
    	'ANDREASK_IUM_KEEP_POSTS'				=>	'Διατηρήση δημοσιεύσεων των διεγραμμένων μελών',
    	'ANDREASK_IUM_AUTO_DEL'					=>	'Αυτόματη διαγραφή μέλους',
    	'ANDREASK_IUM_AUTO_DEL_DAYS'			=>	'Μέρες μετά',
    	'ANDREASK_IUM_TEST_EMAIL'				=>	'Αποστολή δοκιμαστικού email',
    	'ANDREASK_IUM_INCLUDED_FORUMS'			=>	'Συμπεριλαμβανόμενα φόρουμ',
    	'ANDREASK_IUM_EXCLUDE_FORUM'			=>	'Εξαίρεση',
    	'EMAILS'								=>	'E-mails',
        'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Ρυθμίσεις υπενθύμισης συμπεριληψης',
    	'ACP_IUM_DANGER'	=>	'Περιοχή κινδύνου',

        'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Εξαιρούμενα φόρουμ',
    	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Συμπερίληψη',
    	'SELECT_A_FORUM'							=>	'Παρακαλώ επιλέξτε ένα φόρουμ',
    	'EXCLUDED_EMPTY'							=>	'Δεν υπάρχουν εξαιρούμενα φόρουμ...',

        // ACP configuration page Explanations
    	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Αν είναι ενεργοποιημέν, η επέκταση θα αρχίσει να στέλνει υπενθυμίσεις στους "κοιμισμένους".',
    	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Είναι το διάστημα των ημερών για να θεωρηθεί ένα μέλος ως "κοιμισμένο". Συνιστώνται οι 30 ημέρες',
    	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Ο αριθμός των υπενθυμίσεων που μπορούν να αποσταλούν <b>ανά ημέρα</b>. Συνιστάται να είναι ~ 250. Αλλά ελέγξτε με τον παροχέα σας για τυχών όριο μηνυμάτων ηλεκτρονικού ταχυδρομείου ανά ημέρα',
    	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Εάν είναι ενεργοποιημένο, το ηλεκτρονικό ταχυδρομείο θα περιλαμβάνει τα κορυφαία ενεργά θέματα του μέλους από την τελευταία επίσκεψη του.',
    	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Πόσα κορυφαία θεμάτα του μέλους θα μπορούν να περιλαμβάνονται στο μήνυμα ηλεκτρονικού ταχυδρομείου.',
    	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Εάν είναι ενεργοποιημένο, το ηλεκτρονικό ταχυδρομείο θα περιλαμβάνει τα κορυφαία θέματα της πλατφόρμας από την τελευταία επίσκεψη του.',
    	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Ποσό θεμάτων του φόρουμ μπορούν να συμπεριλαμβάνονται στο ηλεκτρονικό ταχυδρομείο',
    	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'		=>	'Εάν είναι ενεργοποιημένο, ένας σύνδεσμος σε μια σελίδα "<strong>board_url/ium/{random_key}</strong>" θα συμπεριληφθεί στο μέλος και θα μπορεί να διαγράψει το λογαριασμό του.',
    	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Αν είναι ενεργοποιημένο, το αίτημα αυτόδιαγραφής θα πρέπει να εγκριθεί από το διαχειριστή.',
    	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'		=>	'Το "Ναι" θα διαγράψει το μέλος, αλλά θα <strong>κρατήσει</strong> τις δημοσιεύσεις του, το "Όχι" θα διαγράψει και τις δημοσιεύσεις του μέλους.',
    	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Τα μέλη θα διαγράφονται αυτόματα μετά από ένα δεδομένο ποσό ημερών εάν δεν επιστρέψουν μετά τις 3 υπενθυμίσεις.',
    	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Ποσό ημερών για να περιμένετε μέχρι να διαγραφεί αυτόματα ένα μέλος μετά την ημέρα που ζητήθηκε.',
    	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Ένα δοκιμαστικό μήνυμα ηλεκτρονικού ταχυδρομείου θα σταλεί στο "%s"',
    	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Επιλέξτε μια κατηγορία ή υποκατηγορία για <strong>αποκλεισμό</strong> από τις λίστες κορυφαίων θεμάτων που αποστέλλονται στα μέλη',
    	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Επιλέξτε μια κατηγορία ή υποκατηγορία για <strong>συμπεριληφθεί</strong> στις λίστες κορυφαίων θεμάτων που αποστέλλονται στα μέλη',

        // configuration page
    	'INACTIVE_MAIL_SENT_TO'			=>	'Ένα δείγμα μηνυμάτων ηλεκτρονικού ταχυδρομείου για ανενεργούς χρήστες στάλθηκε στο "%s"',
    	'SLEEPER_MAIL_SENT_TO'			=>	'Ένα δείγμα μηνυμάτων ηλεκτρονικού ταχυδρομείου για ανενεργούς χρήστες στάλθηκε στο "%s"',
    	'SEND_SLEEPER'					=>	'Αποστολή πρότυπο κοιμισμένου',
    	'SEND_INACTIVE'					=>	'Αποστολή πρότυπο ανενεργού',
    	'PLUS_SUBFORUMS'				=>	'+Υποφόρουμ',

    )
);
