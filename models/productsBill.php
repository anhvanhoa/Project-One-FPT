<?php
class ProductsBill extends ServicePdo
{
    public function getProductsByBill($idBill)
    {
        $dbName = $this->dbName;
        $sql = "SELECT id_product_detail, amount_buy FROM $dbName WHERE ID_BILL = $idBill";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$productsBill = new ProductsBill("products_bill");
