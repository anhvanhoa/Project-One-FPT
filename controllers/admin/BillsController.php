<?php
function controller_bills(Req $req)
{
    $bills = $req->billsService->getAll();
    if (isset($_GET['status'])) {
        $status = $_GET['status'];
        $bills = $req->billsService->getAll($status);
    }
    if (isset($_GET['q'])) {
        $bills = $req->billsService->search($_GET['q']);
    }
    return viewAdmin('orders', ['bills' => $bills]);
}
function controller_detail_bill(Req $req)
{
    $id = $_GET['id'];
    if (!$id)
        header('location: ?act=bills');
    $bill = $req->billsService->getDetail($id);
    if (!$bill)
        header('location: ?act=bills');
    $idsProduct = $req->productsBillService->getProductsByBill($bill['id']);
    foreach ($idsProduct as $key => $idProduct) {
        extract($idProduct);
        $products[$key] = $req->productsService->getProductDetailInBill($id_product_detail);
        $products[$key]['amount_buy'] = $amount_buy;
    }
    return viewAdmin('detailOrder', ['bill' => $bill, 'products' => $products]);
}

function controller_status(Req $req)
{
    if (!isset($_GET['id']))
        return header("location: ?act=");
    $id = $_GET['id'];
    $status = $_GET['status'];
    if (!$id || !$status)
        header("location: ?act=bills");
    if ($status == 5 || $status == 0) {
        $time = date('Y-m-d H:i:s');
        $req->billsService->updateOne(['status' => $status, 'end_date' => $time], $id);
        $products = $req->productsBillService->getProductsByBill($id);
        foreach ($products as $product) {
            extract($product);
            $proDetail = $req->productsDetailService->findOne($id_product_detail);
            $pro = $req->productsService->findOne($proDetail['id_product']);
            $setAmount = $proDetail['amount'] - $amount_buy;
            $sold = $pro['sold'] + 1;
            $req->productsDetailService->updateOne(['amount' => "$setAmount",], $id_product_detail);
            $req->productsService->updateOne(['sold' => $sold,], $proDetail['id_product']);
        }
    } else {
        $req->billsService->updateOne(['status' => $status], $id);
    }
    echo "<script>history.back()</script>";
    // header("location: ?act=detail-bill&id=$id");
}
