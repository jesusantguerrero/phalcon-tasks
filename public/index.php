<?php
	use Phalcon\Loader;
	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Application;
	use Phalcon\Di\FactoryDefault;
	use Phalcon\Mvc\Url as UrlProvider;
	use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;
	use config\database\config;

	// Define some absolute path constants to aid in locating resources
	define('BASE_PATH', dirname(__DIR__));
	define('APP_PATH', BASE_PATH . '/app');

	$loader = new Loader();

	$loader->registerDirs(
		[
			APP_PATH . '/controllers/',
			APP_PATH . '/models/',
			]
		);


	$loader->register();

	$di = new FactoryDefault();

	// setting views
	$di->set(
		'view',
		function() {
			$view = new View();
			$view->setViewsDir(APP_PATH . '/views/');
			return $view;
		}
	);

	// setting url

	$di->set(
		'url',
		function() {
			$url = new UrlProvider();
			$url->setBaseUri('/');
			return $url;
		}
	);

	$di->set(
		'db',
		function () {
			return new DbAdapter(
					[
							'host'     => '127.0.0.1',
							'username' => 'jguerrero',
							'password' => '',
							'dbname'   => 'phalcon_tutorial',
					]
			);
		}
	);

	$application = new Application($di);

	try {
		$response = $application->handle();
		$response->send();
	} catch (\Exception $e) {
		echo 'Exception: ', $e->getMessage();
	}
