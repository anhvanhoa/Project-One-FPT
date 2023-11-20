<?php
function controller_cart(Req $req)
{
    $cartUser = ['total' => 0];
    $categories = $req->categoriesService->findAll();
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
    header('Cache-Control: no cache');
    $cartUser = [
        'total' => 0,
        'total_sub' => 0,
        'payment_method' => 'Thanh toán khi nhận hàng',
        'transfer_method' => 'Giao hàng tiêu chuẩn',
        'status' => 1,
        'date' => date('Y-m-d H:i:s'),
        'id_voucher' => null,
        'id_user' => $_SESSION['user']['id'],
        'discount' => 0,
        'code' => '',
        'carts' => []
    ];
    $categories = $req->categoriesService->findAll();
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
        if (isset($_GET['code-discount'])) {
            $code = $_GET['code-discount'];
            $voucher = $req->vouchersService->getVoucherByCode($code);
            if ($voucher) {
                $discount = $cartUser['total'] * $voucher['discount'] / 100;
                $cartUser['total'] -= $discount;
                $cartUser['code'] = $code;
                $cartUser['discount'] = $discount;
                $cartUser['id_voucher'] = $voucher['id'];
            }
        }
    } else header('location: ?act=cart');
    return view("checkout", ["categories" => $categories, 'user' => $user, 'products' => $products, 'cartUser' => $cartUser]);
}

function controller_success_order(Req $req)
{
    $categories = $req->categoriesService->findAll();
    $keys = [
        'total' => 0,
        'payment_method' => '',
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
        } else $info[$key] = $_POST[$key];
    }
    $isSuccess = $req->billsService->insertOne($info);
    if ($isSuccess) {
        foreach ($carts as $value) {
            $product = $req->cartsService->getProductById($value->id_cart_detail);
            $req->cartsService->deleteOne($value->id_cart_detail);
            $idProductDetail = $product['id_product_detail'];
            $idCart = $_SESSION['user']['id_cart'];
            $carts = $req->cartsService->getAllProductInCart($idCart);
            $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
            $req->productsBillService->insertOne(['id_product_detail' => $idProductDetail, 'amount_buy' => $value->amount_buy]);
        }
    }
    return view("successOrder", ["categories" => $categories]);
}
