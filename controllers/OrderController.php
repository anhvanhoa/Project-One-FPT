<?php
function controller_orders(Req $req)
{
    $categories = $req->categoriesService->findAll();
    $idUser = $_SESSION['user']['id'];
    $bills = $req->billsService->getBillByUser($idUser);
    return view("orders", ["categories" => $categories, 'bills' => $bills]);
}

function controller_order_detail(Req $req)
{
    $listStatus = [1, 2, 3, 4, 5];
    isset($_GET['id']) ? $id = $_GET['id'] : header('location: /');
    $categories = $req->categoriesService->findAll();
    $bill = $req->billsService->findOne($id);
    $productBills = $req->productsBillService->getProductsByBill($bill['id']);
    $products = [];
    foreach ($productBills as $productBill) {
        $product = $req->productsService->getProductDetailInBill($productBill['id_product_detail']);
        $product['amount_buy'] = $productBill['amount_buy'];
        array_push($products, ($product));
    }
    $user = $_SESSION['user'];
    return view("orderDetail", [
        "categories" => $categories,
        'bill' => $bill,
        'user' => $user,
        'products' => $products,
        'listStatus' => $listStatus
    ]);
}
