<?php
function controller_product(Req $req)
{
    $id = $_GET['id'];
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if (!$id) error();
    $filter = $req->productsService->getFilter($id);
    $price = $filter['price'];
    $material = $filter['material'];
    $max = isset($_GET['price-max']) ? $_GET['price-max'] : '';
    $min = isset($_GET['price-min']) ? $_GET['price-min'] : '';
    $mater = isset($_GET['material']) ? $_GET['material'] : [];
    $strMaterial = join("','", $mater);
    $strMaterial = "'$strMaterial'";
    if (count($mater) <= 0) $strMaterial = '';
    $price['max'] = $max;
    $price['min'] = $min;
    $categories = $req->categoriesService->getAll();
    $category = $req->categoriesService->findOne($id);
    $products_page = $req->productsService->getProductsByCategory($id, $page, $sort, $max, $min, $strMaterial);
    $products = $products_page['products'];
    return view("products", [
        'typeProduct' => $category,
        "categories" => $categories,
        "products" => $products,
        'products_page' => $products_page,
        'price' => $price,
        'materials' => $material
    ]);
}

function controller_detail_product(Req $req)
{
    $categories = $req->categoriesService->getAll();
    $id = $_GET["id"];
    if (!$id) error();
    $productDetail = $req->productsService->getProductsDetail($id);
    if (!$productDetail) error();
    if (isset($_POST['add-cart'])) {
        $user = $_SESSION['user'];
        if (!$user) header('location: ?act=login');
        $amount = $_POST['amount'];
        $idProduct = $_POST['product-detail'];
        $idCart = $_SESSION['user']['id_cart'];
        $productCart = $req->cartsService->addCart($idProduct, $idCart, $amount);
        if (!$productCart) header("location: ?" . $_SERVER['QUERY_STRING']);
        if ($productCart) {
            $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
            header("location: ?" . $_SERVER['QUERY_STRING']);
        }
    }
    $review = false;
    if (isset($_GET['review'])) {
        $idReview = $_GET['review'];
        $idUser = $_SESSION['user']['id'];
        $productIds = $req->billsService->checkReview($idReview, $idUser);
        if ($productIds) {
            foreach ($productIds as $productId) {
                extract($productId);
                if ($id_product == $id && $status == 5) {
                    $review = true;
                }
            }
        }
    }
    return view("detailProduct", ["categories" => $categories, "productDetail" => $productDetail, 'isReview' => $review]);
}

function controller_review(Req $req)
{
    if (isset($_POST['btn-review'])) {
        $content = $_POST['content'];
        $stars = $_POST['stars'];
        $created_at = date('Y-m-d');
        $id_user = $_SESSION['user']['id'];
        $id_product = $_POST['id-product'];
        $req->reviewsService->insertOne([
            'content' => $content,
            'stars' => $stars,
            'created_at' => $created_at,
            'id_user' => $id_user,
            'id_product' => $id_product,
        ]);
        header("location: ?act=product&id=$id_product");
    }
}
