<?php
function controller_cart(Req $req)
{
    $cartUser = ['total' => 0];
    $categories = $req->categoriesService->findAll();
    $idCart = $_SESSION['user']['id_cart'];
    $carts = $req->cartsService->getAllProductInCart($idCart);
    $_SESSION['user']['count_cart'] = $req->cartsService->countProductInCart($idCart)[0];
    foreach ($carts as $cart) {
        $cartUser['total'] += $cart['price'];
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
        $idCarts = $_POST['id-product-detail'];
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
    $cartUser = [
        'total' => 0,
        'total_sub' => 0,
        'payment_method' => 'Thanh toán khi nhận hàng',
        'transfer_method' => 'Giao hàng tiêu chuẩn',
        'status' => 0,
        'date' => date('d-m-Y'),
        'id_voucher' => 0,
        'id_user' => $_SESSION['user']['id'],
        'discount' => 0,
        'code' => ''
    ];
    $categories = $req->categoriesService->findAll();
    $user = $_SESSION['user'];
    $products = [];
    if (isset($_POST['btn-checkout']) && $_POST['id-product-detail']) {
        $idCarts = $_POST['id-product-detail'];
        foreach ($idCarts as $idCart) {
            $product = $req->cartsService->getProductById($idCart);
            array_push($products, $product);
            $cartUser['total_sub'] = $cartUser['total'] += $product['price'];
        }
        if (isset($_GET['code-discount'])) {
            $code = $_GET['code-discount'];
            $voucher = $req->vouchersService->getVoucherByCode($code);
            if ($voucher) {
                $discount = $cartUser['total'] * $voucher['discount'] / 100;
                $cartUser['total'] -= $discount;
                $cartUser['code'] = $code;
                $cartUser['discount'] = $discount;
            }
        }
    } else header('location: ?act=cart');
    return view("checkout", ["categories" => $categories, 'user' => $user, 'products' => $products, 'cartUser' => $cartUser]);
}
