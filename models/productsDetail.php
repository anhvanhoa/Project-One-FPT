<?php
class ProductDetail extends ServicePdo
{
    public function getAllProduct($idProduct)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE ID_PRODUCT = $idProduct";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$productsDetail = new productDetail("products_detail");
