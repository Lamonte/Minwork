<?php
//Initialize all our libraries and constant variables
define("ROOTDIR", str_replace("\\", "/", dirname(__FILE__)) . "/");

function __autoload($class_name) {
	if(file_exists(ROOTDIR . "core/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "core/libs/" . strtolower($class_name) . ".php";
	} else	if(file_exists(ROOTDIR . "web/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "web/libs/" . strtolower($class_name) . ".php";
	} else {
		//TODO: Throw exception
	}
}

//require the Minwork core class
require_once ROOTDIR . "core/minwork.php";
$Minwork = new Minwork();

//load controllers
$Minwork->load_controllers();
