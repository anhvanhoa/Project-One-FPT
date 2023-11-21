<?php
class Bills extends  ServicePdo
{
    public function getAllToday()
    {
        $dbName = $this->dbName;
        $date = date('Y-m-d');
        $date .= " 00:00:00";
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN USERS ON USERS.ID = $dbName.ID_USER WHERE DATE > '$date' ORDER BY STATUS";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getBillByUser($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE ID_USER = $id ORDER BY ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$bills = new Bills("bills");
