<?php
	use Phalcon\Loader;
	use Phalcon\Mvc\View;
	use Phalcon\Mvc\Application;
	use Phalcon\Di\FactoryDefault;
	use Phalcon\Mvc\Url as UrlProvider;
	use Phalcon\Db\Adapter\Pdo\Mysql as DbAdapter;

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

	$loader->registerNamespaces(
		[
			'App\Config' => APP_PATH . '/config/'
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


	try {
		$application = new Application($di);
		$response = $application->handle();
		$response->send();
	} catch (Exception $e) {
    echo '<pre>';
    echo get_class($e), ": ", $e->getMessage(), "\n";
    echo " File=", $e->getFile(), "\n";
    echo " Line=", $e->getLine(), "\n";
    echo $e->getTraceAsString();
    echo '</pre>';
    //echo $e->getMessage();
} catch (PDOException $e) {
    echo '<pre>';
    var_dump($e);
    echo '</pre>';
    //echo $e->getMessage();
}
