<?php
class Reviews extends ServicePdo
{
    function getAllReview()
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.id as id, $dbName.is_deleted is_deleted FROM $dbName JOIN users ON users.ID = $dbName.ID_USER JOIN products ON products.ID = $dbName.ID_PRODUCT ORDER BY $dbName.ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    // handle
}
$reviews = new Reviews("reviews");
