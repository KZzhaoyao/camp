<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\config\config;
use PDO;

class Connection
{
    private static $config;

    public static function setConfig($config)
    {
        self::$config = $config;
    }

    public function getPdo()
    {
        try {
            $pdo = new PDO(self::$config['dsn'], self::$config['name'], self::$config['pwd']);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDPException $e) {
            echo $e->gitMessage();
        }
        return $pdo;
    }
}
