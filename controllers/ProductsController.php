<?php
function controller_product(Req $req)
{
    $id = $_GET['id'];
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    if (!$id) error();
    $sortPrices = ['5M - 10M', '10M - 20M', '20M - 30M', 'Hơn 30M'];
    $categories = $req->categoriesService->findAll();
    $category = $req->categoriesService->findOne($id);
    $products_page = $req->productsService->getProductsByCategory($id, $page, $sort);
    $products = $products_page['products'];
    return view("products", ["categories" => $categories, "products" => $products, 'category' => $category, 'products_page' => $products_page, 'sortPrices' => $sortPrices]);
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
