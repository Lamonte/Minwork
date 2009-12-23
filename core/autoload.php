<?php
//auto load functions
function load_core_libs($class_name) {
	if(file_exists(ROOTDIR . "core/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "core/libs/" . strtolower($class_name) . ".php";
	}
}

function load_web_libs($class_name) {
	if(file_exists(ROOTDIR . "web/libs/" . strtolower($class_name) . ".php")) {
		require_once ROOTDIR . "web/libs/" . strtolower($class_name) . ".php";
	}
}

//Below autoloads the Models, Model Descriptors [RapidDataMapping.com] and the RDM Library
//RapidDataMapping.com
function load_db_classes($class_name)
{
	if(file_exists(ROOTDIR . "web/libs/Db/" . str_replace(array('_', '\\'), DIRECTORY_SEPARATOR, str_replace("Db_" , '', $class_name)).'.php')) {
		require_once ROOTDIR . "web/libs/Db/" . str_replace(array('_', '\\'), DIRECTORY_SEPARATOR, str_replace("Db_" , '', $class_name)).'.php';
	}
}

function load_models($class)
{
	if(file_exists(ROOTDIR . "web/models/" . strtolower(str_replace("_Model", "", $class)) . ".php")) {
		require ROOTDIR . "web/models/" . strtolower(str_replace("_Model", "", $class)) . ".php";
	}
}

function load_model_descriptors($class)
{
	if(file_exists(ROOTDIR . "web/models/" . strtolower(str_replace("_", "/", $class)) . ".php")) {
		require ROOTDIR . "web/models/" . strtolower(str_replace("_", "/", $class)) . ".php"; //web/models/comment/modeldescriptor.php
	}
}

//register functions
spl_autoload_register("load_core_libs");
spl_autoload_register("load_web_libs");
spl_autoload_register("load_db_classes");
spl_autoload_register("load_models");
spl_autoload_register("load_model_descriptors");
?>