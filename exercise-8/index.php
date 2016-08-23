<?php
require __DIR__ . '/vendor' . '/autoload.php';
require __DIR__ . '/config' . '/Container.php';

use ZhaoYao\UserSystem\Service\Impl\UserServiceImpl;
use ZhaoYao\UserSystem\Dao\Impl\UserDatabaseDaoImpl;
use ZhaoYao\UserSystem\Dao\Impl\UserFileDaoImpl;
use ZhaoYao\UserSystem\Common\DaoHelper;
use ZhaoYao\UserSystem\Common\Connection;

$config = include 'config/config.php';

$container = new Container();

$container->connection = function(){
    return new Connection();
};

$container->helper = function($container){
    return new DaoHelper($container->connection);
};

$container->UserDatabaseDao = function($container){
    return new UserDatabaseDaoImpl($container->helper);
};

$container->UserService = function($container){
    return new UserServiceImpl($container->UserDatabaseDao);
};

$container->UserController = 

Connection::setConfig($config['database']);

$controllerName = isset($_GET['controller']) ? $_GET['controller'].'Controller' : 'UserController';

$controllerClass = "ZhaoYao\\UserSystem\\Controller\\".ucfirst($controllerName);
$controller = new $controllerClass($container);
if (empty($_GET['action'])) {
    $controller->listAction();
} else {
    $action = $_GET['action'].'Action';
    $controller->$action();
}