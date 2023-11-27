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
    public function getAll()
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN USERS ON USERS.ID = $dbName.ID_USER ORDER BY $dbName.ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getDetail($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN USERS ON USERS.ID = $dbName.ID_USER WHERE $dbName.ID = $id";
        return $this->pdo->query($sql)->fetch();
    }
    public function getBillByUser($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE ID_USER = $id ORDER BY ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function checkReview($idBill, $idUser)
    {
        $dbName = $this->dbName;
        $sql = "SELECT status FROM $dbName WHERE ID = $idBill AND ID_USER = $idUser";
        $status = $this->pdo->query($sql)->fetch();
        $productIds = [];
        if ($status) {
            $sql = "SELECT id_product_detail FROM PRODUCTS_BILL WHERE ID_BILL = $idBill";
            $detailIds = $this->pdo->query($sql)->fetchAll();
            foreach ($detailIds as $detailId) {
                extract($detailId);
                $sql = "SELECT id_product FROM PRODUCTS_DETAIL WHERE ID = $id_product_detail";
                $id = $this->pdo->query($sql)->fetch();
                $id['status'] = $status['status'];
                array_push($productIds, $id);
            }
        }
        return $productIds;
    }
    // handle
}

$bills = new Bills("bills");
