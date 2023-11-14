<?php
function controller_cart($req)
{
    $categories = $req->categoriesService->findAll();
    return view("cart", ["categories" => $categories]);
}
