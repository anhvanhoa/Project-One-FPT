<?php
include("./core.php");
include("./controllers/HomeController.php");
include("./controllers/ProductsController.php");
include("./controllers/CartController.php");
include("./controllers/AccountController.php");

/* 
    Role
    0: not required login (default)
    1: required login
    2: login success => not access
*/

$routes = [
    route('', "controller_home"),
    route('products', "controller_product"),
    route('product', "controller_detail_product"),
    route('search', "controller_search"),

    route('login', "controller_login", 2),
    route('forgot-password', "controller_forgot_password", 2),
    route('register', "controller_register", 2),

    route('logout', "controller_logout", 1),
    route('change-password', "controller_change_pass", 1),
    route('cart', "controller_cart", 1),
    route('delete-cart', "controller_delete_cart", 1),
    route('add-cart', "controller_add_cart", 1),
    route('checkout', "controller_checkout", 1),
    route('account', "controller_account", 1),
];
