<?php
include("../core.php");
include("../controllers/admin/HomeController.php");
include("../controllers/admin/ProductsController.php");
include("../controllers/admin/CategoriesController.php");


$routes = [
    route('', "controller_home"),
    route('products', "controller_products"),
    route('add-product', "controller_add_products"),
    route('edit-product', "controller_edit_products"),
    route('delete-product', "controller_delete_products"),

    route('add-detail-product', "controller_add_product_detail"),
    route('categories', "controller_categories"),
    route('add-category', "controller_add_categories"),
    route('edit-category', "controller_edit_categories"),
    
];
