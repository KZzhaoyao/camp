<?php

class PdoUtil
{
    public function getPdo()
    {
        include "../config/config.php";
        try {
            $pdo = new PDO($dsn, $name, $pwd);
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDPException $e) {
            echo $e->gitMessage();
        }
        return $pdo;
    }
}
