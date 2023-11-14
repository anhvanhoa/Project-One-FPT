<?php
function controller_account($req)
{
    $categories = $req->categoriesService->findAll();
    return view("account", ["categories" => $categories]);
}
