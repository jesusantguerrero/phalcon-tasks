<?php
	use Phalcon\Loader;
	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Application;
	use Phalcon\Di\FactoryDefault;
	use Phalcon\Mvc\Url as UrlProvider;

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

	$application = new Application($di);

	try {
		$response = $application->handle();
		$response->send();
	} catch (\Exception $e) {
		// var_dump(new Application($di));
		echo 'Exception: ', $e->getMessage();
	}
