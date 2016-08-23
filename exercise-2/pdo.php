<?php
try{
    $dsn = "mysql:dbname=user_manage_system;host=127.0.0.1";
    $name = "root";
    $pwd = "root";
    $pdo = new PDO($dsn, $name, $pwd);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch(PDPException $e){
    echo $e->gitMessage();
}