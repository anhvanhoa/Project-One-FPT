<?php
function controller_orders(Req $req)
{
    $categories = $req->categoriesService->getAll();
    $idUser = $_SESSION['user']['id'];
    $bills = $req->billsService->getBillByUser($idUser);
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $bills = $req->billsService->getBillByUser($idUser, $status);
    }
    return view("orders", ["categories" => $categories, 'bills' => $bills]);
}

function controller_order_detail(Req $req)
{
    $listStatus = [1, 2, 3, 4, 5];
    isset($_GET['id']) ? $id = $_GET['id'] : header('location: /');
    $categories = $req->categoriesService->getAll();
    $bill = $req->billsService->findOne($id);
    if (empty($bill))
        header('location: /');
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

function controller_cancel_order(Req $req)
{
    if (isset($_GET['id']) && $_GET['id']) {
        $id = $_GET['id'];
        $req->billsService->updateOne([
            'status' => 0
        ], $id);
        header("location: ?act=order&id=$id");
    } else
        header('location: /');
}
