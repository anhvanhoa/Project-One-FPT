<?php
class Categories extends ServicePdo
{
    public function getAll($is_deleted = false)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = '$is_deleted'";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function search($q)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false AND NAME_CATEGORY LIKE '%$q%'";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function analytic()
    {
        $dbName = $this->dbName;
        $sql = "SELECT $dbName.name_category, COUNT(products.ID) as count_product FROM $dbName Left JOIN products ON products.ID_CATEGORY = $dbName.ID GROUP BY $dbName.ID";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$categories = new Categories("categories");
