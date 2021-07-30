<?php
/**
 */

class DbConfigs
{
	public static $configs = [
		'default' => [ 
			'protocol' => "mysql",
			'host'     => '{DBHOST}',
			'port'     => 3306,
			'user'     => '',
			'pass'     => '',
			'dbname'   => '{DBNAME}',
			'charset'  => 'utf8',
		],
	];
}
