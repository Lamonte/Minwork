<?php
//Initialize all our constant variables and config data
define("ROOTDIR", str_replace("\\", "/", dirname(__FILE__)) . "/");
require_once ROOTDIR . "web/config.php";

function __autoload($class_name) {
	if(file_exists(ROOTDIR . "core/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "core/libs/" . strtolower($class_name) . ".php";
	} else	if(file_exists(ROOTDIR . "web/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "web/libs/" . strtolower($class_name) . ".php";
	}
}

//Require any core classes or files
require_once ROOTDIR . "core/minwork.php";
require_once ROOTDIR . "core/exceptions.php";
require_once ROOTDIR . "core/bootstrap.php";

//Require any other classes
require_once ROOTDIR . "web/bootstrap.php";

//Minwork object has loaded :P
$Minwork = new Minwork();

try {

//load controllers
$Minwork->load_controllers();

} catch(MinworkException $e) {
	$e->handle();
}