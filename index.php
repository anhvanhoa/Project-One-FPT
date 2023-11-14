<?php
session_start();
function bootstrap()
{
    include("./routes.php");
    include("./database/service.php");
    include("./models/categories.php");
    include("./models/products.php");
    $req = new Req($categories, $products);
    if (!isset($_GET['act'])) $act = check_path('');
    else $act = check_path($_GET['act']);
    foreach ($routes as $route) {
        if ($act == $route['path']) {
            return $route['view']($req);
        }
    }
}

bootstrap();
