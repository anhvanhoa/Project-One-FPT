<?php
function connect()
{
    try {
        $connect =  new PDO("mysql:host=localhost; dbname=project", "root", "");
        $connect->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $connect;
    } catch (PDOException $e) {
        echo $e->getMessage();
        throw $e;
    }
}
