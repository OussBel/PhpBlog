<?php

require dirname(__DIR__) . "/vendor/autoload.php";

$router = new Core\Router();

$router->add('{controller}/{action}');
$router->add('{controller}/{id:\d+}/{action}');
$router->add('admin/{controller}/{action}', ['namespace' => 'admin']);
$router->add('admin/{controller}/{id:\d+}/{action}');

$url = $_SERVER['QUERY_STRING'];

$router->run($url);
