<?php
function controller_orders(Req $req)
{
    $categories = $req->categoriesService->findAll();
    $idUser = $_SESSION['user']['id'];
    $bills = $req->billsService->getBillByUser($idUser);
    return view("orders", ["categories" => $categories, 'bills' => $bills]);
}
