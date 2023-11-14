<?php
function controller_detail_product($req)
{
    $categories = $req->categoriesService->findAll();
    $id = $_GET["id"];
    $productDetail = $req->productsService->getProductsDetail($id);
    // var_dump($productDetail);
    return view("detailProduct", ["categories" => $categories, "productDetail" => $productDetail]);
}
