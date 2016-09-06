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

$lang=array_merge( $lang, array(
	// Sort by, options for the inactive users list
	'ACP_IUM_TITLE'	=>	'IUR extension',
	'ACP_IUM'	=>	'IUR ρυθμίσεις',
	'ACP_IUM_LIST'	=>	'Λίστα ανενεργών μελών',
	'ACP_IUM_INACTIVE'	=>	[	0 =>	'Ενεργοποιημένο μέλος',
								1 =>	'Προ-ενεργοποίηση εγγραφής',
								2 =>	'Αλλαγή προφίλ',
								3 =>	'Απενερεργοποίηση από Διαχειριστή',
								4 =>	'Μόνιμα απενεργοποιημένο μέλος (ban)',
								5 =>	'Προσωρινά απενεργοποιημένο μέλος (ban)'],
	// Inactive users list
	'ACP_IUM_NODATE'	=> 	'Το μέλος <strong>δεν</strong> είναι απενεργοποιημένο',
	'ACP_USERS_WITH_POSTS'	=>	'Μόνο μέλη με δημοσιεύσεις',
	'LAST_SENT_REMINDER'	=>	'Προηγούμενη υπενθύμιση',
	'NO_REMINDER_COUNT'	=>	'Δεν έχει σταλεί υπενθύμιση ακόμα',
	'COUNT'	=>	'Αρθιμός υπενθυμίσεων',
	'NO_PREVIOUS_SENT_DATE'	=>	'Δεν υπάρχει καμία προηγούμενη υπενθύμιση ακόμα',
	'REMINDER_DATE'	=>	'Τελευταία υπενθύμιση εστάλη',
	'NO_REMINDER_SENT_YET'	=>	'Δεν εστάλη καμία υπενθύμιση ακόμα',
	// Configuration APC
	'ANDREASK_IUM_ENABLE'	=>	'Ενεργοποίηση "Inactive User Reminder";',
	'ANDREASK_IUM_EMAIL_LIMIT'	=>	'Όριο αποστολής E-mails',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Αριθμός υπενθυμίσεων προς αποστολή <strong>ανά μέρα</strong>. Προτεινόμενη ρύθμιση είναι ~250. Επικοινονήστε με τον πάροχο hosting σας για τυχών όριο στα e-mails ανά μέρα',
	'ANDREASK_IUM_INTERVAL'	=>	'Διάστημα ημερών πίσω',
	'ANDREASK_IUM_TOP_USER_THREADS'	=>	'Συμπερίληψη πιο ενεργών θεμάτων του μέλους;',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT'	=>		'Πόσα θέματα;',
	'ANDREASK_IUM_TOP_FORUM_THREADS'	=>	'Συμπερίληψη πιο ενεργών θεμάτων κοινότητας;',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT'	=>	'Πόσα θέματα;',
	'ANDREASK_IUM_SELF_DELETE'	=>	'Αυτοδιαγραφή μέλους',
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Αν ενεργοποιηθεί, η επέκταση θα στέλνει αυτόματα υπενθυμίσεις στα "κοιμισμένα" μέλη.',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Είναι το διάστημα των ημερών τελευταίας επίσκεψης ενός μέλους για να θεωρηθεί "κοιμισμένο". Προτεινόμενη ρύθμιση είναι οι 30 μέρες',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Αν ενεργοποιηθεί, στο e-mail θα συμπεριλαμβάνεται μία λίστα με τα πιο ενεργά θέματα του μέλους.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Αριθμός θεμάτων του μέλους που θα συμπεριληφθούν;',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Αν ενεργοποιηθεί, στο e-mail θα συμπεριλαμβάνεται μία λίστα με τα πιο ενεργά θέματα της κοινότητας',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Αριθμός θεμάτων της κοινότητας που θα συμπεριληφθούν',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Αν ενεργοποιηθεί, το μέλος θα μπορεί να διαγραφεί από την κοινότητα μόνο του.<br/>ΑΥΤΗ Η ΛΕΙΤΟΥΡΓΊΑ ΔΕΝ ΕΊΝΑΙ ΔΙΑΘΕΣΙΜΗ ΑΚΟΜΑ',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Σε αυτή την σελίδα μπορείτε να δείτε μέλη που, έχουν εγγραφή αλλά ο λογαρισαμός τους δεν έχει ενεργοποιηθεί ή δεν έχουν επισκεφθεί το φόρουμ για ένα συγκεκριμένο χρονικό διάστημα.',
	'ACP_IUM_SETTINGS'	=>	'Ρυθμίσεις "Inactive User Manager"',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Ρυθμίσεις υπενθυμίσεων',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Ρυθμίσεις Υπενθυμίσεων Συμπερίληψης',
	'ACP_IUM_DANGER'	=>	'Επικίνδυνη ζώνη',
	'NEVER_CONNECTED'	=>	'Το μέλος δεν συνδέθηκε ποτέ',
	// Inactive users list page
	'IUM_INACTIVE_REASON'	=>	'Κατάσταση',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>ΠΡΙΝ</strong> από ημέρες/μήνες/χρόνια, χρονικό διάστημα',
	'ACP_DESCENDING'	=>	'Φθίνουσα σειρά',
	'SORT_BY_SELECT'	=>	'Ταξινόμηση κατά',
	'SELECT'	=>	'Επιλέξτε Η/Μ/Χ',
	'THIRTY_DAYS'	=>	'Τριάντα Μέρες',
	'SIXTY_DAYS'	=>	'Εξήντα Μέρες',
	'NINETY_DAYS'	=>	'Ενενήντα Μέρες',
	'FOUR_MONTHS'	=>	'Τεσσερις Μήνες',
	'SIX_MONTHS'	=>	'Εξι Μήνες',
	'NINE_MONTHS'	=>	'Εννέα Μήνες',
	'ONE_YEAR'		=>	'Ένα χρόνο',
	'TWO_YEARS'		=>	'Δύο Χρόνια',
	'THREE_YEARS'	=>	'Τρία Χρόνια',
	'FIVE_YEARS'	=>	'Πέντε Χρόνια',
	'SEVEN_YEARS'	=>	'Επτά Χρόνια',
	'DECADE'		=>	'Μία δεκαετία',
	));
