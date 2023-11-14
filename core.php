<?php
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
function route($path, $fun)
{
    array_push($_SESSION['paths'], $path);
    return [
        "view" => $fun,
        "path" => $path,
    ];
}

class Req
{
    public $categoriesService;
    public $productsService;
    public function __construct($categoriesService, $productsService)
    {
        $this->categoriesService = $categoriesService;
        $this->productsService = $productsService;
    }
}
