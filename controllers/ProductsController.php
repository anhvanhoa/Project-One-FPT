<?php
function controller_product($req)
{
    $categories = $req->categoriesService->findAll();
    $id = $_GET['id'];
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $products_page = $req->productsService->getProductsByCategory($id, $page);
    $products = $products_page['products'];
    $category = $req->categoriesService->findOne($id);
    return view("products", ["categories" => $categories, "products" => $products, 'category' => $category, 'products_page' => $products_page]);
}
