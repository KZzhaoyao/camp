<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\Common\UserDaoFactory1;
use ZhaoYao\UserSystem\Dao\Impl\UserDatabaseDaoImpl;

class UserDaoDatabaseFactory1Impl implements UserDaoFactory1
{
    public function createUserDao()
    {
        return new UserDatabaseDaoImpl();
    }
}