<?php
include("database.php");
class ServicePdo
{
    protected $pdo;
    protected $dbName;
    public function __construct($nameDB)
    {
        $this->dbName = $nameDB;
        $this->pdo = connect();
    }
    public function findAll()
    {
        try {
            $dbName = $this->dbName;
            $sql = "SELECT * FROM $dbName ORDER BY ID DESC";
            return $this->pdo->query($sql)->fetchAll();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function findOne($id)
    {
        try {
            $dbName = $this->dbName;
            $sql = "SELECT * FROM $dbName WHERE ID = $id";
            return $this->pdo->query($sql)->fetch();
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function deleteOne($id)
    {
        try {
            $dbName = $this->dbName;
            $sql = "DELETE FROM $dbName WHERE ID = $id";
            return $this->pdo->exec($sql);
        } catch (\Throwable $th) {
            return $th;
        }
    }

    public function insertOne($arrColum = [])
    {
        try {
            $dbName = $this->dbName;
            $sql = "INSERT INTO ";
            $sqlFirst = [];
            $sqlLast = [];
            foreach ($arrColum as $key => $value) {
                array_push($sqlFirst, $key);
                array_push($sqlLast, $value);
            }
            $sqlFirst = join(',', $sqlFirst);
            $values = "";
            foreach ($sqlLast as $i => $value) {
                if ($i == 0)
                    $values .= "'$value'";
                else
                    $values .= ",'$value'";
            }
            $sql .= "$dbName($sqlFirst) VALUES($values)";
            $isSuccess = $this->pdo->exec($sql);
            return $isSuccess ? $this->pdo->lastInsertId() : 0;
        } catch (\Throwable $th) {
            return $th;
        }
    }
    public function updateOne($arrColum = [], $id)
    {
        try {
            $dbName = $this->dbName;
            $sqlFirst = "";
            $i = 0;
            foreach ($arrColum as $key => $value) {
                if ($i === 0) {
                    $i++;
                    $sqlFirst .= "$key = '$value'";
                } else
                    $sqlFirst .= ", $key = '$value'";
            }
            $sql = "UPDATE $dbName SET $sqlFirst WHERE ID = $id";
            return $this->pdo->exec($sql);
        } catch (\Throwable $th) {
            return $th;
        }
    }
}
