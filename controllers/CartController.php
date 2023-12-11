<?php
function controller_cart(Req $req)
{
    if (isset($_GET['id']) && isset($_GET['amount']) && $_GET['amount'] && $_GET['id']) {
        $id = $_GET['id'];
        $amountBuy = $_GET['amount'];
        $req->cartsService->updateOne([
            'amount_buy' => $amountBuy,
        ], $id);
    }
    $cartUser = ['total' => 0];
    $categories = $req->categoriesService->getAll();
    $idCart = $_SESSION['user']['id_cart'];
    $carts = $req->cartsService->getAllProductInCart($idCart);
    $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
    foreach ($carts as $cart) {
        $cartUser['total'] += $cart['price'] * $cart['amount_buy'];
    }
    return view("cart", ["categories" => $categories, 'carts' => $carts, 'cartUser' => $cartUser]);
}
function controller_delete_cart(Req $req)
{
    if (isset($_GET['id'])) {
        $idCart = $_GET['id'];
        $req->cartsService->deleteOne($idCart);
        header('location: ?act=cart');
        return;
    }
    if (isset($_POST['btn-delete'])) {
        $idCarts = $_POST['id-cart-detail'];
        foreach ($idCarts as $idCart) {
            $req->cartsService->deleteOne($idCart);
        }
        header('location: ?act=cart');
        return;
    } else {
        header('location: /');
    }
}
function controller_checkout(Req $req)
{
    $error = '';
    header('Cache-Control: no cache');
    $cartUser = [
        'total' => 0,
        'total_sub' => 0,
        'payment_method' => 1,
        'transfer_method' => 'Giao hàng tiêu chuẩn',
        'status' => 1,
        'date' => date('Y-m-d H:i:s'),
        'id_voucher' => null,
        'id_user' => $_SESSION['user']['id'],
        'discount' => 0,
        'code' => '',
        'carts' => []
    ];
    $categories = $req->categoriesService->getAll();
    $user = $_SESSION['user'];
    $products = [];
    if (isset($_POST['btn-checkout']) && $_POST['id-cart-detail']) {
        $idCarts = $_POST['id-cart-detail'];
        $listAmount = $_POST['amount-buy'];
        $i = -1;
        foreach ($idCarts as $idCart) {
            $product = $req->cartsService->getProductById($idCart);
            $i++;
            $product['amount_buy'] = $listAmount[$i];
            array_push($cartUser['carts'], ['id_cart_detail' => $idCart, 'amount_buy' => $listAmount[$i]]);
            array_push($products, $product);
            $cartUser['total_sub'] = $cartUser['total'] += $product['price'] * $listAmount[$i];
        }
    } else
        header('location: ?act=cart');
    if (isset($_GET['code-discount'])) {
        $code = $_GET['code-discount'];
        $voucher = $req->vouchersService->getVoucherByCode($code);
        if (!$voucher) {
            $error = "Mã giảm giá không hợp lệ";
        }
        if ($voucher) {
            $discount = $cartUser['total'] * $voucher['discount'] / 100;
            $cartUser['total'] -= $discount;
            $cartUser['code'] = $code;
            $cartUser['discount'] = $discount;
            $cartUser['id_voucher'] = $voucher['id'];
        }
    }
    return view("checkout", [
        "categories" => $categories,
        'user' => $user,
        'products' => $products,
        'cartUser' => $cartUser,
        'error' => $error
    ]);
}

function controller_success_order(Req $req)
{
    if (!isset($_POST['btn-payment']))
        return header('location: /');
    $categories = $req->categoriesService->getAll();
    $keys = [
        'total' => 0,
        'payment_method' => 1,
        'transfer_method' => '',
        'status' => 1,
        'date' => '',
        'discount' => 0,
        'id_voucher' => null,
        'id_user' => 0,
        'carts' => []
    ];
    $carts = [];
    foreach ($keys as $key => $_) {
        if ($key == 'carts') {
            $carts = json_decode($_POST[$key]);
            unset($info[$key]);
        } elseif ($key == 'id_voucher') {
            $info[$key] = json_decode($_POST[$key]);
        } else
            $info[$key] = $_POST[$key];
    }
    $idBill = $req->billsService->insertOne($info);
    if ($idBill) {
        foreach ($carts as $value) {
            $product = $req->cartsService->getProductById($value->id_cart_detail);
            $req->cartsService->deleteOne($value->id_cart_detail);
            $idProductDetail = $product['id_product_detail'];
            $idCart = $_SESSION['user']['id_cart'];
            $carts = $req->cartsService->getAllProductInCart($idCart);
            $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
            $req->productsBillService->insertOne([
                'id_product_detail' => $idProductDetail,
                'amount_buy' => $value->amount_buy,
                "id_bill" => $idBill
            ]);
        }
    }
    return view("successOrder", ["categories" => $categories]);
}

function controller_vnpay(Req $req)
{
    if (!isset($_POST['btn-payment']))
        return header('location: /');
    $keys = [
        'total' => 0,
        'payment_method' => 1,
        'transfer_method' => '',
        'status' => 1,
        'date' => '',
        'discount' => 0,
        'id_voucher' => null,
        'id_user' => 0,
        'carts' => []
    ];
    $carts = [];
    foreach ($keys as $key => $_) {
        if ($key == 'carts') {
            $carts = json_decode($_POST[$key]);
            unset($info[$key]);
        } elseif ($key == 'id_voucher') {
            $info[$key] = json_decode($_POST[$key]);
        } else
            $info[$key] = $_POST[$key];
    }
    $idBill = $req->billsService->insertOne($info);
    if (!$idBill)
        return header('location: /');
    if ($idBill) {
        foreach ($carts as $value) {
            $product = $req->cartsService->getProductById($value->id_cart_detail);
            $req->cartsService->deleteOne($value->id_cart_detail);
            $idProductDetail = $product['id_product_detail'];
            $idCart = $_SESSION['user']['id_cart'];
            $carts = $req->cartsService->getAllProductInCart($idCart);
            $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
            $req->productsBillService->insertOne([
                'id_product_detail' => $idProductDetail,
                'amount_buy' => $value->amount_buy,
                "id_bill" => $idBill
            ]);
        }
    }
    error_reporting(E_ALL & ~E_NOTICE & ~E_DEPRECATED);
    date_default_timezone_set('Asia/Ho_Chi_Minh');
    require_once("./config.php");
    $vnp_TxnRef = $idBill;
    $vnp_Amount = $_POST['total'];
    $vnp_Locale = 'vi';
    $vnp_BankCode = '';
    $vnp_IpAddr = $_SERVER['REMOTE_ADDR'];
    $inputData = array(
        "vnp_Version" => "2.1.0",
        "vnp_TmnCode" => $vnp_TmnCode,
        "vnp_Amount" => $vnp_Amount * 100,
        "vnp_Command" => "pay",
        "vnp_CreateDate" => date('YmdHis'),
        "vnp_CurrCode" => "VND",
        "vnp_IpAddr" => $vnp_IpAddr,
        "vnp_Locale" => $vnp_Locale,
        "vnp_OrderInfo" => "Thanh toan GD:" . $vnp_TxnRef,
        "vnp_OrderType" => "other",
        "vnp_ReturnUrl" => $vnp_Returnurl,
        "vnp_TxnRef" => $vnp_TxnRef,
        "vnp_ExpireDate" => $expire
    );
    if (isset($vnp_BankCode) && $vnp_BankCode != "") {
        $inputData['vnp_BankCode'] = $vnp_BankCode;
    }
    ksort($inputData);
    $query = "";
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData .= '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData .= urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
        $query .= urlencode($key) . "=" . urlencode($value) . '&';
    }
    $vnp_Url = $vnp_Url . "?" . $query;
    if (isset($vnp_HashSecret)) {
        $vnpSecureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret); //  
        $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
    }
    header('Location: ' . $vnp_Url);
    die();
}

function controller_vnpay_return(Req $req)
{
    $categories = $req->categoriesService->getAll();
    require_once("./config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }
    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }
    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    if ($secureHash != $vnp_SecureHash)
        header('location: /');
    $idBill = $_GET['vnp_TxnRef'];
    if ($_GET['vnp_ResponseCode'] != '00')
        return header("location: ?act=cancel-order&id=$idBill");
    $dataVnPay = [
        'vnp_ResponseCode' => $_GET['vnp_ResponseCode'],
        'vnp_TxnRef' => $_GET['vnp_TxnRef'],
        'vnp_Amount' => $_GET['vnp_Amount'],
        'vnp_OrderInfo' => $_GET['vnp_OrderInfo'],
        'vnp_TransactionNo' => $_GET['vnp_TransactionNo'],
        'vnp_BankCode' => $_GET['vnp_BankCode'],
        'vnp_PayDate' => $_GET['vnp_PayDate'],
    ];
    view('payReturn', [
        'categories' => $categories,
        'vnp_SecureHash' => $vnp_SecureHash,
        'secureHash' => $secureHash,
        'dataVnPay' => $dataVnPay
    ]);
}