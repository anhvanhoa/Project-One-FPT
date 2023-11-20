<?php
function controller_home(Req $req)
{
    $categories = $req->categoriesService->findAll();
    $products = $req->productsService->findAll();
    $productsSelling = $req->productsService->getSelling();
    $vouchers = $req->vouchersService->getVouchersNew();
    return view("home", ["categories" => $categories, "productsSelling" => $productsSelling, "products" => $products, 'vouchers' => $vouchers]);
}

function controller_search(Req $req)
{
    $sortPrices = ['5M - 10M', '10M - 20M', '20M - 30M', 'Hơn 30M'];
    $sort = isset($_GET['sort']) ? $_GET['sort'] : '';
    $page = isset($_GET['page']) ? $_GET['page'] : 1;
    $keyword = isset($_GET['keyword']) && $_GET['keyword'] != '' ? $_GET['keyword'] : header('location: /');
    $categories = $req->categoriesService->findAll();
    $products_page = $req->productsService->searchProduct($keyword, $page, $sort);
    $products = $products_page['products'];
    return view("search", ['categories' => $categories, 'sortPrices' => $sortPrices, 'keyword' => $keyword, "products" => $products, 'products_page' => $products_page]);
}
