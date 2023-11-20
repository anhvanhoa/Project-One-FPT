<?php
session_start();
function bootstrap()
{
    include("./routes.php");
    include("../database/service.php");
    include("../models/categories.php");
    include("../models/products.php");
    include("../models/users.php");
    include("../models/vouchers.php");
    include("../models/cartsDetail.php");
    if (!isset($_SESSION['user'])) header("Location: /");
    $role = $_SESSION["user"]["role"];
    $req = new Req($categories, $products, $users, $vouchers, $cartsDetail);
    if (!isset($_GET['act'])) $act = check_path('');
    else $act = check_path($_GET['act']);
    foreach ($routes as $route) {
        if ($act == $route['path'] && $role == 1) {
            return $route['view']($req);
        }
    }
}

bootstrap();
