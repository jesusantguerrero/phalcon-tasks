<?php
	namespace App\Config;
	use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

	class Database {
		public function config() {
			return new DbAdapter(
				[
					'host' 			=> 'localhost',
					'username' 	=> 'jguerrero',
					'password'	=> '',
					'dbname'		=> 'phalcon_tutorial',
				]
			);
		}
	}
