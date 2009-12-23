<?php
/**
 * Configuration File of Minwork Framework
 *
 * @author	Minwork Developers (Lamonte Harris)
 * @copyright	2009-2010
 */
 

define("ERRORS_ON", true);	//Set to false if you don't want to publically show errors
define("LOG_ERRORS", false);	//not implemented yet - Set to true if you want to log errors
define("default_controller", "welcome");	//Default controller loaded when visiting index.php
define("default_action", "main");	//Default controller action loaded when visiting index.php
define("DB_ENABLED", false);	//Set to 'true' if you want to use the database library

//Database variables
$config['db']['user'] = 'root';      //Database username
$config['db']['pass'] = '';          //Database password
$config['db']['tble'] = '';          //Database table name
$config['db']['host'] = 'localhost'; //Database hostname
$config['db']['conn'] = 'default'; //keep this default unless you know what you're doing