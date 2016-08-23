<?php
namespace ZhaoYao\UserSystem\Dao\Impl;

use ZhaoYao\UserSystem\Common\DaoHelper;
use ZhaoYao\UserSystem\Dao\UserDao;

class UserDatabaseDaoImpl implements UserDao
{
    protected $table = 'users';

    public function addUser($user)
    {
        $connection = $this->getHelperDao()->insert($this->table, $user);

        return $this->getUser($connection->lastInsertId());
    }

    public function updateUser($id, $user)
    {
        $this->getHelperDao()->update($id, $this->table, $user);

        return $this->getUser($id);
    }

    public function deleteUser($id)
    {
        return $this->getHelperDao()->delete($id, $this->table);
    }

    public function getUser($id)
    {
        return $this->getHelperDao()->fetchOne($id, $this->table);
    }

    public function findUsers()
    {
        $users = $this->getHelperDao()->fetchAll($this->table);

        return $users;
    }
   
    protected function getHelperDao()
    {
        return  DaoHelper::getInstance();
    }
}
