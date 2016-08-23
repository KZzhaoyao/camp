<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\Common\UserDaoFactory1;
use ZhaoYao\UserSystem\Dao\Impl\UserFileDaoImpl;

class UserDaoFileFactory1Impl implements UserDaoFactory1
{
    public function createUserDao()
    {
        return new UserFileDaoImpl();
    }
}