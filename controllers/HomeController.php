<?php
function controller_home($req)
{
    $categories = $req->categoriesService->findAll();
    $products = $req->productsService->findAll();
    $productsSelling = $req->productsService->getSelling();
    return view("home", ["categories" => $categories, "productsSelling" => $productsSelling, "products" => $products]);
}
