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

//register functions
spl_autoload_register("load_core_libs");
spl_autoload_register("load_web_libs");
?>