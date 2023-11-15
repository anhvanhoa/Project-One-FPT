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
    public function __construct($categoriesService, $productsService, $usersService)
    {
        $this->categoriesService = $categoriesService;
        $this->productsService = $productsService;
        $this->usersService = $usersService;
    }
}

function error()
{
    header('location: /');
}

function uploadImage($file)
{
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $path = './asset/images/';
    $isSuccess = move_uploaded_file($tmp, $path . $name);
    return $isSuccess ? $name : '';
}
