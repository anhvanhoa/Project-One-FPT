<?php
class Vouchers extends ServicePdo
{
    public function getVouchersNew($limit = 4)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE END >= DATE(NOW()) ORDER BY END LIMIT 0, $limit";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getVoucherByCode($code)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE CODE = '$code' AND END >= DATE(NOW())";
        return $this->pdo->query($sql)->fetch();
    }
    // handle

}
$vouchers = new Vouchers("vouchers");
