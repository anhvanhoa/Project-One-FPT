<?php
session_start();
function bootstrap()
{
    include("./routes.php");
    include("./database/service.php");
    include("./models/categories.php");
    include("./models/products.php");
    include("./models/users.php");
    $act = '';
    $user = isset($_SESSION['user']) ? true : false;
    $req = new Req($categories, $products, $users);
    if (!isset($_GET['act'])) $act = check_path('');
    else $act = check_path($_GET['act']);
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
