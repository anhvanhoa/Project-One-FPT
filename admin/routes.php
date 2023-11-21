<?php
include("../core.php");
include("../controllers/admin/HomeController.php");
include("../controllers/admin/ProductsController.php");
include("../controllers/admin/CategoriesController.php");
include("../controllers/admin/AccountsController.php");


$routes = [
    route('', "controller_home"),
    route('products', "controller_products"),
    route('add-product', "controller_add_products"),
    route('edit-product', "controller_edit_products"),
    route('add-detail-product', "controller_add_product_detail"),
    route('categories', "controller_categories"),
    route('add-category', "controller_add_category"),
    route('edit-category', "controller_edit_category"),
    route('update-category', "controller_update_category"),
    route('delete-category', "controller_delete_category"),
    route('accounts', "controller_accounts"),
    route('add-account', "controller_add_account"),
    route('detail-account', "controller_detail_account"),
    route('delete-account', "controller_delete_account"),
    // route('logout', "controller_logout"),
];
