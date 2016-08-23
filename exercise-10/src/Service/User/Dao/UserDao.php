<?php
namespace Service\User\Dao;

interface UserDao
{
    public function addUser($user);

    public function updateUser($id, $user);

    public function deleteUser($id);

    public function getUser($id);

    public function findUsers();
}
