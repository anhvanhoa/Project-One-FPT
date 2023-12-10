<?php
class Images extends ServicePdo
{
    public function getAll($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE ID_PRODUCT_DETAIL = $id";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$images = new Images("images");
