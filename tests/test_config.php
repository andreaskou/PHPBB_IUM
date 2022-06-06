<?php
// This file should be located as: tests/test_config.php
// So it will be placed after the RUNNING_TESTS.md file.
$dbms = 'phpbb\\db\\driver\\mysqli';							# Change this when needed
$dbhost = 'localhost';
$dbport = '';
$dbname = 'phpbb_test';											# Change this
$dbuser = 'root';										# Change this
$dbpasswd = 'zxcvbn';										# Change this
$table_prefix = 'phpbb_';
$phpbb_adm_relative_path = 'adm/';
$acm_type = 'phpbb\\cache\\driver\\file';

$phpbb_functional_url = 'http://test.devian/';				# Change this when needed
