<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\config\config;
use PDO;

class Connection
{
    private static $pdo;
    private static $instance;
    private static $config;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public static function setConfig($config)
    {
        self::$config = $config;
    }

    public function getPdo()
    {
        if (empty(self::$pdo)) {
            try {
                self::$pdo = new PDO(self::$config['dsn'], self::$config['name'], self::$config['pwd']);
                self::$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDPException $e) {
                echo $e->gitMessage();
            }            
        }        
        return self::$pdo;
    }
}
