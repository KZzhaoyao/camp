<?php
require __DIR__.'/../app/autoload.php';
require __DIR__.'/../config/Container.php';
require __DIR__.'/../config/config.php';

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Debug\Debug;
use Service\User\Impl\UserServiceImpl;
use Service\User\Dao\Impl\UserDatabaseDaoImpl;
use Service\User\Dao\Impl\UserFileDaoImpl;
use Common\DaoHelper;
use Common\Connection;
use AppBundle\Controller\DefaultController;

$container = Container::getInstance();
// var
// var_dump(111);exit();
// $con = new Connection($container);
// $helper = new DaoHelper($container);
// $Userdao = new UserDatabaseDaoImpl($container);
// $UserService = new UserServiceImpl($container);
// $UserController = new DefaultController($container);
// var_dump($con);
// var_dump($helper);
// var_dump($Userdao);
// var_dump($UserService);
// var_dump($UserController);exit();

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

// var_dump(Container::getInstance()->UserService);exit();
// $container->UserController = function($container){
//     return new DefaultController($container->UserService);
// };


$database = Connection::setConfig($config['database']);
// If you don't want to setup permissions the proper way, just uncomment the following PHP line
// read http://symfony.com/doc/current/book/installation.html#checking-symfony-application-configuration-and-setup
// for more information
//umask(0000);

// This check prevents access to debug front controllers that are deployed by accident to production servers.
// Feel free to remove this, extend it, or make something more sophisticated.
if (isset($_SERVER['HTTP_CLIENT_IP'])
    || isset($_SERVER['HTTP_X_FORWARDED_FOR'])
    || !(in_array(@$_SERVER['REMOTE_ADDR'], ['127.0.0.1', 'fe80::1', '::1']) || php_sapi_name() === 'cli-server')
) {
    header('HTTP/1.0 403 Forbidden');
    exit('You are not allowed to access this file. Check '.basename(__FILE__).' for more information.');
}

/**
 * @var Composer\Autoload\ClassLoader $loader
 */
Debug::enable();

$kernel = new AppKernel('dev', true);
// $kernel->loadClassCache();
$request = Request::createFromGlobals();
$response = $kernel->handle($request);
$response->send();
$kernel->terminate($request, $response);
