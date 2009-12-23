<?php
//Initialize all our constant variables and config data
define("ROOTDIR", str_replace("\\", "/", dirname(__FILE__)) . "/");
require_once ROOTDIR . "web/config.php";

//new autoloading
require_once ROOTDIR . "core/autoload.php";
require_once ROOTDIR . "web/autoload.php";

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