<?php

session_start();

require_once __DIR__.'/../vendor/autoload.php';

use Icebox\App;
use Icebox\Controller;
use Icebox\Request;
use Icebox\Response;

define('CATCH_WARNING', true);
define('ICEBOX_DEBUG', true);

define('ICEBOX_DIRECTORY_PUBLIC', __DIR__);
define('ICEBOX_DIRECTORY_SRC', dirname(__DIR__).'/src');

define('PROJECT_SOURCE_DIRECTORY', dirname(__DIR__).'/src');

$project_directory = '/icebox-local/public';

$index_page = '/index.php';


$app = new App(__FILE__, $project_directory);

include PROJECT_SOURCE_DIRECTORY.'/config/initializers.php';

$routes = include PROJECT_SOURCE_DIRECTORY.'/config/routes.php';
$matcher = $routes->url_matcher();

// var_dump($matcher);

$response = $app->handle($matcher);
$response->send();
