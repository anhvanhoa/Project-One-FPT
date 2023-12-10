<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function bootstrap()
{
    require './PHPMailer/src/Exception.php';
    require './PHPMailer/src/PHPMailer.php';
    require './PHPMailer/src/SMTP.php';
    include("./routes.php");
    include("./database/service.php");
    include("./models/categories.php");
    include("./models/products.php");
    include("./models/users.php");
    include("./models/vouchers.php");
    include("./models/cartsDetail.php");
    include("./models/bills.php");
    include("./models/productsBill.php");
    include("./models/productsDetail.php");
    include("./models/images.php");
    include("./models/reviews.php");
    $act = '';
    $user = isset($_SESSION['user']) ? true : false;
    $req = new Req(
        $categories,
        $products,
        $users,
        $vouchers,
        $cartsDetail,
        $bills,
        $productsBill,
        $productsDetail,
        $images,
        $reviews,
    );
    if (!isset($_GET['act']))
        $act = check_path('');
    else
        $act = check_path($_GET['act']);
    foreach ($routes as $route) {
        if ($act == $route['path'] && $user) {
            if ($route['role'] == 2) {
                header('location: /');
            } else {
                return $route['view']($req);
            }
        }
        if ($act == $route['path'] && !$user) {
            if ($route['role'] != 1) {
                return $route['view']($req);
            } else {
                header('location: /');
            }
        }
    }
}

bootstrap();
