<?php
namespace ZhaoYao\UserSystem\Common;

use ZhaoYao\UserSystem\Common\Connection;
use PDO;

class DaoHelper
{
    private static $instance;

    public static function getInstance() {
        if (!(self::$instance instanceof self)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function insert($table, $data)
    {
        $sql = "INSERT INTO {$table}(";
        foreach ($data as $key => $value) {
            $sql .= "{$key},";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ") VALUES (";
        foreach ($data as $key => $value) {
            $sql .= ":{$key},";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= ")";
        $pdoObject = Connection::getInstance()->getPdo();
        $stmt = $pdoObject->prepare($sql);
        $stmt->execute($data);

        return $pdoObject;
    }

    public function update($id, $table, $data)
    {
        $sql = "UPDATE {$table} SET";

        foreach ($data as $key => $value) {
            $sql .= " {$key} "."= :{$key} ,";
        }
        $sql = substr($sql,0,strlen($sql)-1);
        $sql .= " WHERE id = :id";
        $data['id'] = $id;
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        $result = $stmt->execute($data);

        return $result;
    }

    public function delete($id, $table)
    {
        $sql = "DELETE FROM {$table} WHERE id = :id";

        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        $result = $stmt->execute(array("id"=>$id));

        return $result;
    }

    public function fetchOne($id, $table)
    {
        $sql = "SELECT * FROM {$table} WHERE id = :id";  
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        $stmt->execute(array("id"=>$id));
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return $result;
    }

    public function fetchAll($table)
    {
        $sql = "SELECT * FROM {$table}";
        $stmt = Connection::getInstance()->getPdo()->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $result;
    }
}