<?php

defined('BASEPATH') or exit('No direct script access allowed');
$active_group = 'default';
$query_builder = TRUE;


$db['default'] = array(
	'dsn'	=> '',
	// LOCAL SETTING ========================
	'hostname' => 'localhost',
	'username' => 'root',
	'password' => '',
	'database' => 'dblive_sik_grandmutiara',
	// EPIZY SETTING =======================
	// 'hostname' => 'sql103.epizy.com',
	// 'username' => 'epiz_28970334',
	// 'password' => 'r78fGKoAV4Jj5rG',
	// 'database' => 'epiz_28970334_sik_grandmutiara',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	'db_debug' => (ENVIRONMENT !== 'production'),
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => TRUE,
	'failover' => array(),
	'save_queries' => TRUE
);
