<?php
namespace Service\User;

interface UserService
{
    public function addUser($user);

    public function updateUser($id, $user);

    public function deleteUser($id);

    public function getUser($id);

    public function findUsers();
}