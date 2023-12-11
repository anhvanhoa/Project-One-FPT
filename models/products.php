<?php
class Products extends ServicePdo
{
    public function getSelling()
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false ORDER BY SOLD DESC LIMIT 0,9";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getProductsLimit($page = 1)
    {
        $dbName = $this->dbName;
        $limit = $page * 12;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false ORDER BY ID DESC LIMIT 0,$limit";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function getProductsDetail($id)
    {
        $dbName = $this->dbName;
        $sqlProduct = "SELECT * FROM categories JOIN $dbName ON $dbName.id_category = categories.ID WHERE $dbName.id = $id";
        $product = $this->pdo->query($sqlProduct)->fetch();
        if (!$product)
            return $product;
        $sqlReviews = "SELECT * FROM reviews JOIN users ON reviews.ID_USER = users.ID  WHERE ID_PRODUCT = $id";
        $reviews = $this->pdo->query($sqlReviews)->fetchAll();
        $sqlImages = "SELECT images.image FROM $dbName JOIN products_detail ON $dbName.ID = products_detail.ID_PRODUCT JOIN images ON images.ID_PRODUCT_DETAIL = products_detail.ID WHERE $dbName.ID = $id";
        $images = $this->pdo->query($sqlImages)->fetchAll();
        $sqlProductDetails = "SELECT * FROM products_detail WHERE ID_PRODUCT = $id";
        $productDetails = $this->pdo->query($sqlProductDetails)->fetchAll();
        $sqlStars = "SELECT AVG(STARS) avg_star FROM reviews WHERE ID_PRODUCT = $id";
        $avgStar = $this->pdo->query($sqlStars)->fetch();
        $idCate = $product['id_category'];
        $sqlProductSuggests = "SELECT * FROM products WHERE ID <> $id AND ID_CATEGORY = $idCate AND IS_DELETED = false";
        $productSuggests = $this->pdo->query($sqlProductSuggests)->fetchAll();
        $product['reviews'] = $reviews;
        $product['avg_star'] = $avgStar['avg_star'];
        $product['size'] = $productDetails[0]['size'];
        $product['product_details'] = $productDetails;
        $product['product_suggests'] = $productSuggests;
        $product['images'] = $images;
        return $product;
    }
    public function getProductsByCategory($id, $page = 1, $sort = 'new', $max, $min, $material = '')
    {
        $dbName = $this->dbName;
        $sqlFilter = '';
        if ($max && $min) {
            $sqlFilter .= "AND PRICE BETWEEN $min AND $max ";
        }
        if ($material) {
            $sqlFilter .= "AND MATERIAL IN ($material)";
        }
        $sqlSort = "$dbName.ID DESC";
        if ($sort == 'selling')
            $sqlSort = 'SOLD DESC';
        if ($sort == 'price-asc')
            $sqlSort = 'PRICE ASC';
        if ($sort == 'price-desc')
            $sqlSort = 'PRICE DESC';
        if ($sort == 'discount')
            $sqlSort = '(ORIGIN_PRICE - PRICE) DESC ';
        $sqlPage = "SELECT FLOOR(COUNT(ID) / 9) + 1 AS page  FROM $dbName WHERE IS_DELETED = false AND ID_CATEGORY = $id";
        $countProduct = $this->pdo->query($sqlPage)->fetch();
        $productsByCategory = [];
        $productsByCategory['current_page'] = $page;
        $productsByCategory['page'] = $countProduct['page'];
        $limit = $page * 9;
        $minimum = $limit - 9;
        $sql = "SELECT DISTINCT $dbName.* FROM $dbName JOIN products_detail ON $dbName.ID = products_detail.ID_PRODUCT WHERE IS_DELETED = false AND ID_CATEGORY = $id $sqlFilter AND products_detail.AMOUNT > 0 ORDER BY $sqlSort LIMIT $minimum, $limit";
        $products = $this->pdo->query($sql)->fetchAll();
        $productsByCategory['products'] = $products;
        return $productsByCategory;
    }
    public function searchProduct($keyword, $page = 1, $sort = 'new')
    {
        $dbName = $this->dbName;
        $sqlSort = 'ID DESC';
        if ($sort == 'selling')
            $sqlSort = 'SOLD DESC';
        if ($sort == 'price-asc')
            $sqlSort = 'PRICE ASC';
        if ($sort == 'price-desc')
            $sqlSort = 'PRICE DESC';
        if ($sort == 'discount')
            $sqlSort = '(ORIGIN_PRICE - PRICE) DESC';
        $sqlPage = "SELECT FLOOR(COUNT(ID) / 9) + 1 AS page  FROM $dbName WHERE IS_DELETED = false AND NAME_PRODUCT LIKE '%$keyword%'";
        $countProduct = $this->pdo->query($sqlPage)->fetch();
        $productsSearch = [];
        $productsSearch['current_page'] = $page;
        $productsSearch['page'] = $countProduct['page'];
        $limit = $page * 9;
        $minimum = $limit - 9;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false AND NAME_PRODUCT LIKE '%$keyword%' OR DESCRIPTION LIKE '%$keyword%' ORDER BY $sqlSort LIMIT $minimum, $limit";
        $products = $this->pdo->query($sql)->fetchAll();
        $productsSearch['products'] = $products;
        return $productsSearch;
    }
    public function getProductDetailInBill($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT $dbName.ID as id, name_product, price, code_color, color, image
        FROM $dbName JOIN products_detail ON products_detail.ID_PRODUCT = $dbName.ID 
        WHERE $dbName.IS_DELETED = false AND products_detail.ID = $id";
        return $this->pdo->query($sql)->fetch();
    }
    public function getFilter($id)
    {
        $dbName = $this->dbName;
        $sql = "SELECT max(PRICE) as max_price, min(PRICE) as min_price FROM $dbName WHERE ID_CATEGORY = $id";
        $result['price'] = $this->pdo->query($sql)->fetch();
        $sqlMaterial = "SELECT DISTINCT material FROM $dbName WHERE $dbName.IS_DELETED = false AND ID_CATEGORY = $id";
        $result['material'] = $this->pdo->query($sqlMaterial)->fetchAll();
        return $result;
    }
    public function getAll($is_deleted = false)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = '$is_deleted' ORDER BY ID DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function search($q)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false AND NAME_PRODUCT LIKE '%$q%'";
        return $this->pdo->query($sql)->fetchAll();
    }
    function analyticSold()
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false ORDER BY SOLD DESC LIMIT 0,5";
        return $this->pdo->query($sql)->fetchAll();
    }
    // ....
}
$products = new Products("products");
