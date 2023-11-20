<?php
include("database.php");
class ServicePdo
{
    protected $pdo;
    protected $dbName;
    public function __construct($nameDB)
    {
        $this->dbName  = $nameDB;
        $this->pdo  = connect();
    }
    public function findAll()
    {
        try {
            $dbName = $this->dbName;
            $sql = "SELECT * FROM $dbName";
            return $this->pdo->query($sql)->fetchAll();
        } catch (\Throwable $th) {
            throw $th;
        }
    }

    public function findOne($id)
    {
        try {
            $dbName = $this->dbName;
            $sql = "SELECT * FROM $dbName WHERE ID = $id";
            return $this->pdo->query($sql)->fetch();
        } catch (\Throwable $th) {
            throw $th;
        }
    }
    function pdo_execute($sql){
        $sql_args=array_slice(func_get_args(),1);
        try{
            $conn=connect();
            $stmt=$conn->prepare($sql);
            $stmt->execute($sql_args);
    
        }
        catch(PDOException $e){
            throw $e;
        }
        finally{
            unset($conn);
        }
    }
}
