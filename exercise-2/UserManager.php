<?php

class UserManager
{
    public function listUsers()
    {
        $pdo = $this->getPDO();
        $sql = "SELECT * FROM users";
        $stmt = $pdo->prepare($sql);
        $stmt->execute();
        $users = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $users;
    }

    public function getUserById($userId)
    {
        $pdo = $this->getPDO();
        $sql = "SELECT * FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array("id"=>$userId));
        $user = $stmt->fetch(PDO::FETCH_ASSOC);  

        return $user;
    }

    public function deleteUser($userId)
    {
        $pdo = $this->getPDO();
        $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array("id"=>$userId));
    }

    public function modifyUser($user)
    {
        $pdo = $this->getPDO();
        $sql = "UPDATE users SET name='$user[name]', sex='$user[sex]', age='$user[age]', about='$user[about]' WHERE id=:id";
        $stmt = $pdo->prepare($sql);
        $stmt->execute(array("id" => $user["id"]));     
    }

    public function addUser($addUser)
    {
        $pdo = $this->getPDO();
        $sql = "INSERT INTO users(name,sex,age,about)VALUE(:name,:sex,:age,:about)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute($addUser);    
    }

    private function getPDO()
    {
        include ("pdo.php");

        return $pdo;
    }
  }
