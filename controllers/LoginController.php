<?php
function controller_login($req)
{
    $categories = $req->categoriesService->findAll();
    return view("login", ["categories" => $categories]);
}
