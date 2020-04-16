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

        // Delete approval page
        'IGNORE_METHODE'	=> array(
            0 =>	'Δεν αγνοείται',
            1 =>	'Auto',
            2 =>	'Αγνοείται από τον Admin',
        ),

        'IGNORE_METHODES'				=>	'Τύπος αγνόησης',
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
    	'USER_SELECT'			=>	'Επιλογή',
    	'SELECT_AN_ACTION'		=>	'Επιλέξτε μια ενέργεια',
    	'DONT_IGNORE'			=>	'Μην αγνοείται',
    	'NOT_IGNORED'			=>	'Ο/οι χρήστης/ες δεν αγνοήται/ούνται πια.',
    	'RESET_REMINDERS'		=>	'Η επαναφορά ήταν επιτυχής.',
		'USER_EXIST_IN_IGNORED_GROUP'	=>	'Ο/οι χρήστης(ες) υπάρχη(ουν) ήδη σε μία λίστα υπο εξαίρεση.',
		'REQUEST_DATE'			=>  'Ημερομηνία αιτήματος διαγραφής',



    	'IUM_IGNORE_GROUP_MANAGMENT'				=>	'Διαχείριση Ομάδων',
    	'ANDREASK_IUM_UPDATE_IGNORE_LIST'			=>	'Αγνόηση',

    	'ANDREASK_IUM_IGNORE_GROUP_LIST_EXPLAIN'	=>	'Εδώ μπορείτε να επιλέξετε ποιες ομάδες πρέπει να αγνοηθούν από την επέκταση. Λάβετε υπόψη ότι αν και <u>δεν έχουν επιλεγεί</u>,</b> BOTS, ADMINISTRATORS, MODERATORS και GUESTS <b>αγνοούνται</b>. Αλλά εξακολουθεί να προτείνεται να επιλέξετε τις ομάδες και εδώ!',
    	'ANDREASK_IUM_GROUP_IGNORE_EXPLAIN'			=>	'Κρατήστε τον πλήκτρο (CTRL) (ή &#8984; για mac) στο πληκτρολόγιο για να επιλέξετε περισσότερες από μία ομάδες.',
		'ANDREASK_IUM_IGNORE_LIST_EXPLAIN'			=>	'Εδώ μπορείτε να διαχειριστείτε τα μέλη που θέλετε να αγνοήσετε (μην σταλεί υπενθύμιση) ή να τους αφαιρέσετε από τη λίστα αυτή.<br/><strong>Κάθε μέλος σε νέα γραμμή.</Strong><br/>Σημείωση, οι ακόλουθες ομάδες <strong>αγνοούνται από προεπιλογή</strong>: 1. GUESTS, 4. GLOBAL_MODERATORS, 5. ADMINISTRATOR και 6. BOTS',
		'ANDREASK_IUM_GROUP_IGNORE'					=>	'Αγνοήστε ομάδες',

    )
);
