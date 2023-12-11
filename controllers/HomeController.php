<?php
function controller_home(Req $req)
{
    $page = isset($_GET['limit']) ? $_GET['limit'] : 1;
    $categories = $req->categoriesService->getAll();
    $products = $req->productsService->getProductsLimit($page);
    $productsSelling = $req->productsService->getSelling();
    $vouchers = $req->vouchersService->getVouchersNew();
    return view("home", [
        "categories" => $categories,
        "productsSelling" => $productsSelling,
        "products" => $products,
        'vouchers' => $vouchers,
        'page' => $page
    ]);
}

function controller_search(Req $req)
{
    $sortPrices = ['5M - 10M', '10M - 20M', '20M - 30M', 'Hơn 30M'];
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $keyword = isset($_GET['keyword']) && $_GET['keyword'] != '' ? $_GET['keyword'] : header('location: /');
    $categories = $req->categoriesService->getAll();
    $products_page = $req->productsService->searchProduct($keyword, $page, $sort);
    $products = $products_page['products'];
    return view("search", [
        'categories' => $categories,
        'sortPrices' => $sortPrices,
        'keyword' => $keyword,
        "products" => $products,
        'products_page' => $products_page
    ]);
}
