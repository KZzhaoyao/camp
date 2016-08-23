<?php
require __DIR__ . '/vendor' . '/autoload.php';
use ZhaoYao\UserSystem\Common\Connection;

$config = include 'config/config.php';


Connection::setConfig($config['database']);

$controllerName = isset($_GET['controller']) ? $_GET['controller'].'Controller' : 'UserController';

$controllerClass = "ZhaoYao\\UserSystem\\Controllers\\".ucfirst($controllerName);
$controller = new $controllerClass();

if (empty($_GET['action'])) {
    $controller->listAction();
} else {
    $action = $_GET['action'].'Action';
    $controller->$action();
}