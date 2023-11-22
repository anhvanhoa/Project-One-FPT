<?php
class Products extends ServicePdo
{
    public function getSelling()
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName ORDER BY SOLD DESC LIMIT 0,9";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getProductsLimit($limit = 9)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName ORDER BY ID DESC LIMIT 0,$limit";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getProductsDetail($id)
    {
        $dbName = $this->dbName;
        $sqlProduct = "SELECT * FROM CATEGORIES JOIN $dbName ON $dbName.id_category = CATEGORIES.ID WHERE $dbName.id = $id";
        $product = $this->pdo->query($sqlProduct)->fetch();
        $sqlReviews = "SELECT * FROM REVIEWS JOIN USERS ON REVIEWS.ID_USER = USERS.ID  WHERE ID_PRODUCT = $id";
        $reviews = $this->pdo->query($sqlReviews)->fetchAll();
        $sqlImages = "SELECT IMAGES.image FROM $dbName JOIN PRODUCTS_DETAIL ON $dbName.ID = PRODUCTS_DETAIL.ID_PRODUCT JOIN IMAGES ON IMAGES.ID_PRODUCT_DETAIL = PRODUCTS_DETAIL.ID WHERE $dbName.ID = $id";
        $images = $this->pdo->query($sqlImages)->fetchAll();
        $sqlProductDetails = "SELECT * FROM PRODUCTS_DETAIL WHERE ID_PRODUCT = $id";
        $productDetails = $this->pdo->query($sqlProductDetails)->fetchAll();
        $sqlStars = "SELECT AVG(STARS) avg_star FROM REVIEWS WHERE ID_PRODUCT = $id";
        $avgStar = $this->pdo->query($sqlStars)->fetch();
        $sqlProductSuggests = "SELECT * FROM PRODUCTS WHERE ID <> $id AND ID_CATEGORY = " . $product['id_category'];
        $productSuggests = $this->pdo->query($sqlProductSuggests)->fetchAll();
        $product['reviews'] = $reviews;
        $product['avg_star'] = $avgStar['avg_star'];
        $product['size'] = $productDetails[0]['size'];
        $product['product_details'] = $productDetails;
        $product['product_suggests'] = $productSuggests;
        $product['images'] = $images;
        return $product;
    }
    public function getProductsByCategory($id, $page = 1, $sort = 'new')
    {
        $dbName = $this->dbName;
        $sqlSort = 'ID DESC';
        if ($sort == 'selling') $sqlSort = 'SOLD DESC';
        if ($sort == 'price-asc') $sqlSort = 'PRICE ASC';
        if ($sort == 'price-desc') $sqlSort = 'PRICE DESC';
        if ($sort == 'discount') $sqlSort = '(ORIGIN_PRICE - PRICE) DESC ';
        $sqlPage = "SELECT FLOOR(COUNT(ID) / 9) + 1 AS page  FROM $dbName WHERE ID_CATEGORY = $id";
        $countProduct = $this->pdo->query($sqlPage)->fetch();
        $productsByCategory = [];
        $productsByCategory['current_page'] = $page;
        $productsByCategory['page'] = $countProduct['page'];
        $limit = $page * 9;
        $minimum =  $limit  - 9;
        $sql = "SELECT * FROM $dbName WHERE ID_CATEGORY = $id ORDER BY $sqlSort LIMIT $minimum, $limit";
        $products = $this->pdo->query($sql)->fetchAll();
        $productsByCategory['products'] = $products;
        return $productsByCategory;
    }
    public function searchProduct($keyword, $page = 1, $sort = 'new')
    {
        $dbName = $this->dbName;
        $sqlSort = 'ID DESC';
        if ($sort == 'selling') $sqlSort = 'SOLD DESC';
        if ($sort == 'price-asc') $sqlSort = 'PRICE ASC';
        if ($sort == 'price-desc') $sqlSort = 'PRICE DESC';
        if ($sort == 'discount') $sqlSort = '(ORIGIN_PRICE - PRICE) DESC';
        $sqlPage = "SELECT FLOOR(COUNT(ID) / 9) + 1 AS page  FROM $dbName WHERE NAME_PRODUCT LIKE '%$keyword%'";
        $countProduct = $this->pdo->query($sqlPage)->fetch();
        $productsSearch = [];
        $productsSearch['current_page'] = $page;
        $productsSearch['page'] = $countProduct['page'];
        $limit = $page * 9;
        $minimum =  $limit  - 9;
        $sql = "SELECT * FROM $dbName WHERE NAME_PRODUCT LIKE '%$keyword%' OR DESCRIPTION LIKE '%$keyword%' ORDER BY $sqlSort LIMIT $minimum, $limit";
        $products = $this->pdo->query($sql)->fetchAll();
        $productsSearch['products'] = $products;
        return $productsSearch;
    }
    public function getProductDetailInBill($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT name_product, price, code_color, color, image
        FROM $dbName JOIN PRODUCTS_DETAIL ON PRODUCTS_DETAIL.ID_PRODUCT = $dbName.ID 
        WHERE PRODUCTS_DETAIL.ID = $id";
        return $this->pdo->query($sql)->fetch();
    }
    // ....
}
$products = new Products("products");
