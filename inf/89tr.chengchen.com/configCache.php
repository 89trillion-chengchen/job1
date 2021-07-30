<?php
/**
 */

class CacheConfigs
{
	public static $configs = [
		'default' => [
			'protocol' => "redis",
			'host'     => '{REDIS_HOST}',
			'port'     => 6379,
			'pass'     => '',
			'dbindex'  => '{REDIS_DB}',
		],
	];
}
