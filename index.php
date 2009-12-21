<?php
//Initialize all our libraries and constant variables
define("ROOTDIR", str_replace("\\", "/", dirname(__FILE__)) . "/");
define("ERRORS_ON", true);
define("LOG_ERRORS", false); //not implemented yet
define("default_controller", "welcome");

function __autoload($class_name) {
	if(file_exists(ROOTDIR . "core/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "core/libs/" . strtolower($class_name) . ".php";
	} else	if(file_exists(ROOTDIR . "web/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "web/libs/" . strtolower($class_name) . ".php";
	} else {
		//throw new Exception("Library: $class_name, couldn't be loaded");
	}
}


//Require any core classes or files
require_once ROOTDIR . "core/minwork.php";
require_once ROOTDIR . "core/exceptions.php";

//Minwork object has loaded :P
$Minwork = new Minwork();

try {

//load controllers
$Minwork->load_controllers();

} catch(MinworkException $e) {
	$e->handle();
}