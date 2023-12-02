<?php
session_start();
date_default_timezone_set('Asia/Ho_Chi_Minh');
function bootstrap()
{
    include("./routes.php");
    include("../database/service.php");
    include("../models/categories.php");
    include("../models/products.php");
    include("../models/users.php");
    include("../models/vouchers.php");
    include("../models/cartsDetail.php");
    include("../models/bills.php");
    include("../models/productsBill.php");
    include("../models/productsDetail.php");
    include("../models/images.php");
    include("../models/reviews.php");
    $role = $_SESSION["user"]["role"];
    if (!isset($_SESSION['user']) || $role == 0) header("Location: /");
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
    if (!isset($_GET['act'])) $act = check_path('');
    else $act = check_path($_GET['act']);
    foreach ($routes as $route) {
        if ($act == $route['path'] && $role >= 1 && $role <= 2) {
            return $route['view']($req);
        }
    }
}

bootstrap();
