<?php
class CartsDetail extends ServicePdo
{
    public function addCart($idProduct, $idCart, $amountBuy)
    {
        $dbName = $this->dbName;
        $productsCart = $this->getAllProductInCart($idCart);
        foreach ($productsCart as $productCart) {
            extract($productCart);
            if ($idProduct == $id_product_detail) {
                return false;
            }
        }
        $sql = "INSERT INTO $dbName(id_product_detail, id_cart , amount_buy) VALUES($idProduct, $idCart, $amountBuy)";
        return $this->pdo->exec($sql);
    }
    public function countProductInCart($idCart)
    {
        $dbName = $this->dbName;
        $sql = "SELECT count(ID) count_cart FROM $dbName WHERE ID_CART = $idCart";
        return $this->pdo->query($sql)->fetch();
    }
    public function getAllProductInCart($idCart)
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.id id  FROM $dbName JOIN products_detail ON products_detail.ID = $dbName.ID_PRODUCT_DETAIL JOIN products ON products.ID = products_detail.ID_PRODUCT WHERE ID_CART = $idCart";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getProductById($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT *, $dbName.id id  FROM $dbName JOIN products_detail ON products_detail.ID = $dbName.ID_PRODUCT_DETAIL JOIN products ON products.ID = products_detail.ID_PRODUCT WHERE $dbName.ID = $id";
        return $this->pdo->query($sql)->fetch();
    }
    // handle
}
$cartsDetail = new CartsDetail("products_cart");
