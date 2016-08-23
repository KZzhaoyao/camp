<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\Dao\Impl\UserDatabaseDaoImpl;
use ZhaoYao\UserSystem\Dao\Impl\UserFileDaoImpl;

class UserDaoFactory
{
    private static $userDatabaseDao;

    private static $userFileDao;

    public static function createUserDao($type)
    {
        if ($type == 'file') {
            if (!(self::$userFileDao instanceof UserFileDaoImpl)) {
                self::$userFileDao = new UserFileDaoImpl();
            }
            return self::$userFileDao;
        }
        if ($type == 'database') {
            if (!(self::$userDatabaseDao instanceof UserDatabaseDaoImpl)) {
                self::$userDatabaseDao = new UserDatabaseDaoImpl();
            }
            return self::$userDatabaseDao;
        }        
    }
}