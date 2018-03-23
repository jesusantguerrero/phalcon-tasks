<?php
	namespace config\database;
	use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

	function config()
	{
		return new DbAdapter(
			[
				'host' 			=> 'localhost',
				'username' 	=> 'jguerrero',
				'password'	=> '',
				'dbname'		=> 'phalcon_tutorial',
			]
		);
	}
