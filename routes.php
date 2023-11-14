<?php
include("./core.php");
include("./controllers/HomeController.php");
include("./controllers/ProductsController.php");
include("./controllers/DetailProductController.php");
include("./controllers/LoginController.php");
include("./controllers/CartController.php");
include("./controllers/AccountController.php");


$routes = [
    route('', "controller_home"),
    route('products', "controller_product"),
    route('product', "controller_detail_product"),
    route('login', "controller_login"),
    route('cart', "controller_cart"),
    route('account', "controller_account"),
];
