<?php
class Bills extends ServicePdo
{
    public function getAllToday()
    {
        $dbName = $this->dbName;
        $date = date('Y-m-d');
        $date .= " 00:00:00";
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN users ON users.ID = $dbName.ID_USER WHERE DATE > '$date' ORDER BY STATUS";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getAll($status = '')
    {
        if ($status || $status == 0) {
            $status = "WHERE STATUS = '$status'";
        }
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN users ON users.ID = $dbName.ID_USER $status ORDER BY $dbName.ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getDetail($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN users ON users.ID = $dbName.ID_USER WHERE $dbName.ID = $id";
        return $this->pdo->query($sql)->fetch();
    }
    public function getBillByUser($id, $status = '')
    {
        if ($status || $status == 0) {
            $status = "AND STATUS = '$status'";
        }
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE ID_USER = $id $status ORDER BY ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function checkReview($idBill, $idUser)
    {
        $dbName = $this->dbName;
        $sql = "SELECT status FROM $dbName WHERE ID = $idBill AND ID_USER = $idUser";
        $status = $this->pdo->query($sql)->fetch();
        $productIds = [];
        if ($status) {
            $sql = "SELECT id_product_detail FROM products_bill WHERE ID_BILL = $idBill";
            $detailIds = $this->pdo->query($sql)->fetchAll();
            foreach ($detailIds as $detailId) {
                extract($detailId);
                $sql = "SELECT id_product FROM products_detail WHERE ID = $id_product_detail";
                $id = $this->pdo->query($sql)->fetch();
                $id['status'] = $status['status'];
                array_push($productIds, $id);
            }
        }
        return $productIds;
    }
    public function search($q)
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.ID id FROM $dbName JOIN users ON users.ID = $dbName.ID_USER WHERE DATE LIKE '%$q%' ORDER BY $dbName.ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function analyticMoneyMonth()
    {
        $month = date('m');
        $year = date('Y');
        $dbName = $this->dbName;
        $sql = "SELECT DATE(end_date) AS ngay, SUM(total) AS doanh_thu
        FROM $dbName
        WHERE MONTH(date) = '$month' AND YEAR(date) = '$year' AND STATUS = 5
        GROUP BY ngay";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function analyticMoney()
    {
        $dbName = $this->dbName;
        $sql = "SELECT id, total FROM $dbName WHERE STATUS = 5";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function analyticMoneyToday()
    {
        $dbName = $this->dbName;
        $sql = "SELECT id, total FROM $dbName WHERE DATE(END_DATE) = DATE(NOW()) AND STATUS = 5";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}

$bills = new Bills("bills");
