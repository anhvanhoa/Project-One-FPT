<?php
include('utils.php');
$_SESSION['paths'] = [];
function view($view, $values = [])
{
    foreach ($values as $key => $value) $$key = $value;
    return include("./views/$view.php");
}
function viewAdmin($view, $values = [])
{
    foreach ($values as $key => $value) $$key = $value;
    return include("../views/admin/$view.php");
}
function check_path($path)
{
    foreach ($_SESSION['paths'] as $value) {
        if ($value == $path) return $path;
    }
    return '';
}
function route($path, $fun, $role = 0)
{
    array_push($_SESSION['paths'], $path);
    return [
        "view" => $fun,
        "path" => $path,
        "role" => $role
    ];
}

class Req
{
    public $categoriesService;
    public $productsService;
    public $usersService;
    public $vouchersService;
    public $cartsService;
    public $billsService;
    public $productsBillService;
    public $productsDetailService;
    public $imagesService;
    public $reviewsService;
    public function __construct(
        Categories $categoriesService,
        Products $productsService,
        Users $usersService,
        Vouchers $vouchersService,
        CartsDetail $cartsService,
        Bills $billsService,
        ProductsBill $productsBillService,
        ProductDetail $productsDetailService,
        Images $imagesService,
        Reviews $reviewsService,
    ) {
        $this->categoriesService = $categoriesService;
        $this->productsService = $productsService;
        $this->usersService = $usersService;
        $this->vouchersService = $vouchersService;
        $this->cartsService = $cartsService;
        $this->billsService = $billsService;
        $this->productsBillService = $productsBillService;
        $this->productsDetailService = $productsDetailService;
        $this->imagesService = $imagesService;
        $this->reviewsService = $reviewsService;
    }
}
