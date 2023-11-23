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
    $categories = $req->categoriesService->findAll();
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
    if (isset($_POST['add-cart'])) {
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
    $categories = $req->categoriesService->findAll();
    $id = $_GET["id"];
    if (!$id) error();
    $productDetail = $req->productsService->getProductsDetail($id);
    return view("detailProduct", ["categories" => $categories, "productDetail" => $productDetail]);
}
