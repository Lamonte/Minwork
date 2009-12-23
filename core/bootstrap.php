<?php
//Used for the database class
$db = null;
if(defined("DB_ENABLED") AND DB_ENABLED == TRUE) {
	Db::setConnectionConfig('default',
		array(
			'dbdriver' => 'mysql',
			'username' => $config['db']['user'],
			'password' => $config['db']['pass'],
			'database' => $config['db']['tble'],
			'hostname' => $config['db']['host']
			)
		);

	$db = Db::getConnection($config['db']['conn']);
}
