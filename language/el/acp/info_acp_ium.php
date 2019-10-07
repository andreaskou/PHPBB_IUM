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

if ( empty($lang) || !is_array($lang) )
{
	$lang = array();
}

$lang = array_merge(
		$lang, array(
	//
	'ACP_IUM'	=>	'IUM ρυθμίσεις',
	'ACP_IUM_LIST'	=>	'Λίστα ανενεργών μελών',
	'ACP_IUM_TITLE'	=>	'Επέκταση IUM',
	'ACP_IUM_TITLE2'	=>	'Λίστα ανενεργών μελών',
	'ACP_IUM_APPROVAL_LIST'	=>	'Παράβλεψη/Διαγραφή λίστας έγκρισης',
	// ΠΕΔ Σελίδα Ρυθμίσεων
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
	'ANDREASK_IUM_GROUP_IGNORE'				=>	'Αγνοήστε ομάδες',
	'EMAILS'								=>	'E-mails',


	'ANDREASK_IUM_EXCLUDED_FORUMS'				=>	'Εξαιρούμενα φόρουμ',
	'ANDREASK_IUM_INCLUDE_FORUM'				=>	'Συμπερίληψη',
	'SELECT_A_FORUM'							=>	'Παρακαλώ επιλέξτε ένα φόρουμ',
	'EXCLUDED_EMPTY'							=>	'Δεν υπάρχουν εξαιρούμενα φόρουμ...',

	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Διαχείριση Ομάδων',
	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Αγνόηση',

	// acp user overview add option
	'USER_ADMIN_ANDREASK_IUM_USERS_OVERVIEW_OPTION'	=>	'Αποστολή Υπενθύμισης',

	// ACP configuration page Explanations
	'ANDREASK_IUM_ENABLE_EXPLAIN'	=>	'Αν είναι ενεργοποιημέν, η επέκταση θα αρχίσει να στέλνει υπενθυμίσεις στους "κοιμισμένους".',
	'ANDREASK_IUM_INTERVAL_EXPLAIN'	=>	'Είναι το διάστημα των ημερών για να θεωρηθεί ένα μέλος ως "κοιμισμένο". Συνιστώνται οι 30 ημέρες',
	'ANDREASK_IUM_EMAIL_LIMIT_EXPLAIN'	=>	'Ο αριθμός των υπενθυμίσεων που μπορούν να αποσταλούν <b>ανά ημέρα</b>. Συνιστάται να είναι ~ 250. Αλλά ελέγξτε με τον παροχέα σας για τυχών όριο μηνυμάτων ηλεκτρονικού ταχυδρομείου ανά ημέρα',
	'ANDREASK_IUM_TOP_USER_THREADS_EXPLAIN'	=>	'Εάν είναι ενεργοποιημένο, το ηλεκτρονικό ταχυδρομείο θα περιλαμβάνει τα κορυφαία ενεργά θέματα του μέλους από την τελευταία επίσκεψη του.',
	'ANDREASK_IUM_TOP_USER_THREADS_COUNT_EXPLAIN'	=>	'Πόσα κορυφαία θεμάτα του μέλους θα μπορούν να περιλαμβάνονται στο μήνυμα ηλεκτρονικού ταχυδρομείου.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_EXPLAIN'	=>	'Εάν είναι ενεργοποιημένο, το ηλεκτρονικό ταχυδρομείο θα περιλαμβάνει τα κορυφαία θέματα της πλατφόρμας από την τελευταία επίσκεψη του.',
	'ANDREASK_IUM_TOP_FORUM_THREADS_COUNT_EXPLAIN'	=>	'Ποσό θεμάτων του φόρουμ μπορούν να συμπεριλαμβάνονται στο ηλεκτρονικό ταχυδρομείο',
	'ANDREASK_IUM_SELF_DELETE_EXPLAIN'	=>	'Εάν είναι ενεργοποιημένο, ένας σύνδεσμος σε μια σελίδα "<strong>board_url/ium/{random_key}</strong>" θα συμπεριληφθεί στο μέλος και θα μπορεί να διαγράψει το λογαριασμό του.',
	'ANDREASK_IUM_DELETE_APPROVE_EXPLAIN'	=>	'Αν είναι ενεργοποιημένο, το αίτημα αυτόδιαγραφής θα πρέπει να εγκριθεί από το διαχειριστή.',
	'ANDREASK_IUM_KEEP_POSTS_EXPLAIN'	=>	'Το "Ναι" θα διαγράψει το μέλος, αλλά θα <strong>κρατήσει</strong> τις δημοσιεύσεις του, το "Όχι" θα διαγράψει και τις δημοσιεύσεις του μέλους.',
	'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'	=>	'Εδώ μπορείτε να διαχειριστείτε τα μέλη που θέλετε να αγνοήσετε (μην σταλεί υπενθύμιση) ή να τους αφαιρέσετε από τη λίστα αυτή.<br/><strong>Κάθε μέλος σε νέα γραμμή.</Strong><br/>Σημείωση, οι ακόλουθες ομάδες <strong>αγνοούνται από προεπιλογή</strong>: 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR και 6. BOTS',
	'ANDREASK_IUM_AUTO_DEL_EXPLAIN'			=>	'Τα μέλη θα διαγράφονται αυτόματα μετά από ένα δεδομένο ποσό ημερών εάν δεν επιστρέψουν μετά τις 3 υπενθυμίσεις.',
	'ANDREASK_IUM_AUTO_DEL_DAYS_EXPLAIN'	=>	'Ποσό ημερών για να περιμένετε μέχρι να διαγραφεί αυτόματα ένα μέλος μετά την ημέρα που ζητήθηκε.',
	'ANDREASK_IUM_TEST_EMAIL_EXPLAIN'		=>	'Ένα δοκιμαστικό μήνυμα ηλεκτρονικού ταχυδρομείου θα σταλεί στο "%s"',
	'ANDREASK_IUM_INCLUDED_FORUMS_EXPLAIN'	=>	'Επιλέξτε μια κατηγορία ή υποκατηγορία για <strong>αποκλεισμό</strong> από τις λίστες κορυφαίων θεμάτων που αποστέλλονται στα μέλη',
	'ANDREASK_IUM_EXCLUDED_FORUMS_EXPLAIN'	=>	'Επιλέξτε μια κατηγορία ή υποκατηγορία για <strong>συμπεριληφθεί</strong> στις λίστες κορυφαίων θεμάτων που αποστέλλονται στα μέλη',
	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Εδώ μπορείτε να επιλέξετε ποιες ομάδες πρέπει να αγνοηθούν από την επέκταση. Λάβετε υπόψη ότι αν και <u>δεν έχουν επιλεγεί</u>,</b> BOTS, ADMINISTRATORS, MODERATOROS και GUESTS <b>αγνοούνται</b>. Αλλά εξακολουθεί να προτείνεται να επιλέξετε τις ομάδες και εδώ!',
	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'		=>	'Κρατήστε τον πλήκτρο (CTRL) (ή &#8984; για mac) στο πληκτρολόγιο για να επιλέξετε περισσότερες από μία ομάδες.',

	// configuration page Legend
	'IUM_INACTIVE_USERS_EXPLAIN'	=>	'Σε αυτή τη λίστα μπορείτε να δείτε τα μέλη που έχουν εγγραφεί αλλά οι λογαριασμοί των οποίων είναι ανενεργοί και εκείνοι που δεν έχουν επισκεφτεί το φόρουμ για το καθορισμένο χρονικό διάστημα εδώ. <span style="color: #DC143C;"><strong>Κόκκινο</strong></span> -> Αγνοείται από διαχειριστή, <span style="color: #008000;"><strong>Πράσινο</strong></span> -> Αγνοείται αυτόματα, <span style="color: #000000;"><strong>Μαύρο</strong></span> -> Δεν αγνοείται.',
	'ACP_IUM_SETTINGS'	=>	'Ρυθμίσεις υπενθύμισης ανενεργού μέλους',
	'ACP_IUM_MAIL_SETTINGS'	=>	'Ρυθμίσεις υπενθύμισης',
	'ACP_IUM_MAIL_INCLUDE_SETTINGS'	=>	'Ρυθμίσεις υπενθύμισης συμπεριληψης',
	'ACP_IUM_DANGER'	=>	'Περιοχή κινδύνου',
	// configuration page
	'INACTIVE_MAIL_SENT_TO'			=>	'Ένα δείγμα μηνυμάτων ηλεκτρονικού ταχυδρομείου για ανενεργούς χρήστες στάλθηκε στο "%s"',
	'SLEEPER_MAIL_SENT_TO'			=>	'Ένα δείγμα μηνυμάτων ηλεκτρονικού ταχυδρομείου για ανενεργούς χρήστες στάλθηκε στο "%s"',
	'SEND_SLEEPER'					=>	'Αποστολή πρότυπο κοιμισμένου',
	'SEND_INACTIVE'					=>	'Αποστολή πρότυπο ανενεργού',
	'PLUS_SUBFORUMS'				=>	'+Υποφόρουμ',
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
	'REMINDER_DATE'	=>	'Τελευταία υπενθύμιση εστάλλει',
	'NO_REMINDER_SENT_YET'	=>	'Δεν έχουν σταλεί ακόμα υπενθυμίσεις',
	'IUM_INACTIVE_REASON'	=>	'Κατάσταση',
	'TOTAL_USERS_WITH_DAY_AMOUNT'	=>	'<strong>%1$s</strong> Μέλος/η συνολικά <i>για το καθορισμένο διάστημα</i> της <strong>%2$s</strong>"',
	// Delete approval page
	'IGNORE_METHODE'	=> array(
		0 =>	'Δεν αγνοείται',
		1 =>	'Auto',
		2	=>	'Αγνοείται από τον Admin',
	),
	'IGNORE_METHODES'	=>	'Τύπος αγνόησης',
	'ACP_IUM_APPROVAL_LIST_TITLE'	=> 'Λίστα έγκρισης διαγραφής',
	'APPROVAL_LIST_PAGE_TITLE'	=> 'Λίστα έγκρισης διαγραφής',
	'IUM_APPROVAL_LIST_EXPLAIN'	=> 'Λίστα έγκρισης μελων με αίτημα για τη διαγραφή του λογαριασμού τους',
	'NO_REQUESTS'			=> 'Δεν υπάρχουν ακόμη αιτήσεις',
	'NO_USER_SELECTED'		=>	'Δεν έχει επιλεγεί μέλος.',
	'SELECT_ACTION'			=>	'Επιλέξτε μια ενέργεια',
	'IUM_MANAGMENT'			=>	'Διαχείριση ανενεργών μελών',
	'IGNORE_USER_LIST'		=>	'Προσθέστε μέλη στη λίστα αγνόησης',
	'IGNORED_USERS_LIST'	=>	'Λίστα χρηστών που αγνοούνται',
	'ADD_IGNORE_USER'		=>	'Πρόσθεσε στη λίστα',
	'REMOVE_IGNORE_USER'	=>	'Αφαίρεση από τη λίστα',
	'DELETED_SUCCESSFULLY'	=>	'Διαγράφηκε με επιτυχία.',
	'REQUEST_TYPE'			=>	'Τύπος αιτήματος',
	'APPROVE'				=>	'Έγκριση',
	'NO_USER_TYPED'			=>	'Δεν πληκτρολογήθηκε μέλος',
	'USER_NOT_FOUND'		=>	'Το/α μέλος/η %s δεν βρέθηκε/αν.',
	'REGISTERED'			=>	'Εγγεγραμμένος',
	'GUESTS'				=>	'Επισκέπτες',
	'REGISTERED_COPPA'		=>	'εγγεγραμμένοι COPPA',
	'GLOBAL_MODERATORS'		=>	'Γενικοί Συντονιστές',
	'BOTS'					=>	'Bots',
	'NEWLY_REGISTERED'		=>	'Νέο μέλος',
	'USER_SELECT'		=>	'Επιλογή',
	'SELECT_AN_ACTION'		=>	'Επιλέξτε μια ενέργεια',
	'DONT_IGNORE'		=>	'Μην αγνοείται',
	'NOT_IGNORED'		=>	'Ο/οι χρήστης/ες δεν αγνοήται/ούνται πια.',
	'RESET_REMINDERS'		=>	'Η επαναφορά ήταν επιτυχής.',
	// Sort Lists
	'COUNT_BACK'	=>	'<strong>ΑΠΟ</strong> ημέρες/μήνες/έτη πριν και προς τα πίσω',
	'ACP_DESCENDING'	=>	'Φθίνουσα σειρά',
	'SORT_BY_SELECT'	=>	'Ταξινόμηση κατά',
	'REQUEST_DATE'		=>	'Ημερομηνία αιτήματος διαγραφής',
	'SELECT'		=>	'Επιλέξτε D/M/Y',
	'THIRTY_DAYS' => 'Τριάντα ημέρες',
	'SIXTY_DAYS' => 'Εξήντα ημέρες',
	'NINETY_DAYS' => 'Ενενήντα ημέρες',
	'FOUR_MONTHS' => 'Τέσσερις μήνες',
	'SIX_MONTHS' => 'Έξι μήνες',
	'NINE_MONTHS' => 'Εννέα Μήνες',
	'ONE_YEAR' => 'Ένα έτος',
	'TWO_YEARS' => 'Δύο χρόνια',
	'THREE_YEARS' => 'Τρία χρόνια',
	'FIVE_YEARS' => 'Πέντε χρόνια',
	'SEVEN_YEARS' => 'Επτά χρόνια',
	'DECADE' => 'Μια δεκαετία',

	// Log
	'SENT_REMINDER_TO_ADMIN' => 'Το πρότυπο "%1$s" εστάλη στο "%2$s"',
	'SENT_REMINDERS' => array(
		0	=>	'Δεν εστάλλει καμία υπενθυμιση.',
		1	=>	'Εστάλλει %s υπενθυμίση.',
		2	=>	'Εστάλησαν %s υπενθυμίσεις.'
	),
	'USERS_DELETED' => '"%1$s" μέλη διεγράφησαν "<b>%2$s"</b>, τύπος αιτήματος : "<b>%3$s</b>"',
	'USER_DELETED' => '"Το μέλος "<b>%1$s</b>" διεγράφη, τύπος αιτήματος :"<b>%2$s</b>"',
	'SOMETHING_WRONG' => 'Κάτι δεν πείγε καλά με το αίτημά σας. Τα ζητούμενα μέλη για διαγραφή δεν ταιριάζουν με τα πραγματικά μέλη στη βάση δεδομένων',
	'USER_SELF_DELETED' => 'Ένα μέλος διεγράφη αυτόματα. Η ρύθμηση για τις δημοσιεύσεις έχει οριστεί ως "%s"',
	'SENT_REMINDER_TO' => 'Εστάλησαν υπενθυμίσεις στο χρήστη "% s"',
	)
);
