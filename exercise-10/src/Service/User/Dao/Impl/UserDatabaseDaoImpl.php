<?php
namespace Service\User\Dao\Impl;

use Service\User\Dao\UserDao;

class UserDatabaseDaoImpl implements UserDao
{
    protected $table = 'users';

    private $container;

    function __construct($container)
    {
        $this->container = $container;
    }

    public function addUser($user)
    {
        $connection = $this->container->insert($this->table, $user);

        return $this->getUser($connection->lastInsertId());
    }

    public function updateUser($id, $user)
    {
        $this->container->update($id, $this->table, $user);

        return $this->getUser($id);
    }

    public function deleteUser($id)
    {
        return $this->container->delete($id, $this->table);
    }

    public function getUser($id)
    {
        return $this->container->fetchOne($id, $this->table);
    }

    public function findUsers()
    {
        $users = $this->container->fetchAll($this->table);

        return $users;
    }
}
