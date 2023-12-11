<?php
include("../core.php");
include("../controllers/admin/HomeController.php");
include("../controllers/admin/ProductsController.php");
include("../controllers/admin/CategoriesController.php");
include("../controllers/admin/AccountsController.php");
include("../controllers/admin/BillsController.php");
include("../controllers/admin/VouchersController.php");
include("../controllers/admin/AnalyticsController.php");


$routes = [
    route('', "controller_home"),
    route('products', "controller_products"),
    route('add-product', "controller_add_products"),
    route('edit-product', "controller_edit_products"),
    route('delete-product', "controller_delete_products"),
    route('add-detail-product', "controller_add_product_detail"),
    route('edit-detail-product', "controller_edit_product_detail"),
    route('bin-products', "controller_bin_products"),
    route('restore-product', "controller_restore_products"),
    route('categories', "controller_categories"),
    route('bin-categories', "controller_bin_categories"),
    route('add-category', "controller_add_category"),
    route('edit-category', "controller_edit_category"),
    route('update-category', "controller_update_category"),
    route('delete-category', "controller_delete_category"),
    route('restore-category', "controller_restore_category"),
    route('accounts', "controller_accounts"),
    route('add-account', "controller_add_account"),
    route('detail-account', "controller_detail_account"),
    route('delete-account', "controller_delete_account"),
    route('bin-accounts', "controller_bin_account"),
    route('restore-account', "controller_restore_account"),
    route('bills', "controller_bills"),
    route('status', "controller_status"),
    route('detail-bill', "controller_detail_bill"),
    route('vouchers', "controller_vouchers"),
    route('add-voucher', "controller_add_voucher"),
    route('edit-voucher', "controller_edit_voucher"),
    route('analytic-revenue', "controller_analytic_revenue"),
    route('analytic-product', "controller_analytic_product"),
    route('delete-image', "controller_image"),
    route('reviews', "controller_reviews"),
    route('hidden-review', "controller_hidden_review"),
];
