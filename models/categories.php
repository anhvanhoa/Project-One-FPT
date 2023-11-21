<?php
class Categories extends  ServicePdo
{
    public function analytic()
    {
        $dbName = $this->dbName;
        $sql = "SELECT $dbName.name_category, COUNT(PRODUCTS.ID) as count_product FROM $dbName Left JOIN PRODUCTS ON PRODUCTS.ID_CATEGORY = $dbName.ID GROUP BY $dbName.ID";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$categories = new Categories("categories");
