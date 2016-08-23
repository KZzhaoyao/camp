<?php
namespace ZhaoYao\UserSystem\models;

use PDO;

class UserModel
{
    protected $pdo;

    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    public function listUsers()
    {
        $sql = "SELECT * FROM users";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getUserById($userId)
    {
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(array("id"=>$userId));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);  

        return $user;
    }

    public function deleteUser($userId)
    {
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(array("id"=>$userId));
    }

    public function modifyUser($user)
    {
        $sql = "UPDATE users SET name='$user[name]', sex='$user[sex]', age='$user[age]', about='$user[about]' WHERE id=:id";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute(array("id" => $user["userId"]));
    }

    public function addUser($addUser)
    {
        $sql = "INSERT INTO users(no,name,sex,age,about)VALUES(:no,:name,:sex,:age,:about)";
        $stmt = $this->pdo->getPdo()->prepare($sql);
        $stmt->execute($addUser);    
    }
  }
