<?php
// require "../../models/products.php";
// require "./database/service.php";
function controller_products($req)
{
    //San pham
    $products = $req->productsService->findAll();
    return viewAdmin("products", ['products' => $products]);
}


function controller_add_products($req)
{
    if (isset($_POST['btn_add'])) {
        // print_r($_POST);
        // die();
        $name_products = $_POST['name_products'];
        // $origin_price =  $_POST['origin_price'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $material = $_POST['material'];
        $thumbnail = $_FILES['thumbnail'];
        $id_category = $_POST['id_category'];
        $date = $_POST['date'];
        $upFile = uploadImage($_FILES['thumbnail']);
        $req->productsService->addProducts(
            $name_products,
            $description,
            $price,
            $material,
            $upFile,
            $date,
            $id_category
        );
    }
    return viewAdmin("addProduct", []);
}
function controller_add_product_detail($req)
{
    return viewAdmin("addProductDetail", []);
}
function controller_edit_products($req)
{
    $product = $req->productsService->getProduct();
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $name_products = $_POST['name_products'];
        $price = $_POST['price'];
        $description = $_POST['description'];
        $material = $_POST['material'];
        $oldThumbnail = $_POST['oldThumbnail'];
        $id_category = $_POST['id_category'];
        $date = $_POST['date'];

        $fileupload = $_FILES['thumbnail']['name'];
        $dir = "img/";
        $upFile = $dir . basename($fileupload);
        if (move_uploaded_file($_FILES['thumbnail']['tmp_name'], $upFile)) {
        }
        if($upFile !== "" && $upFile != $dir){
             $oldThumbnail = $upFile;
        }
        $req->productsService->editProduct(
            $id,
            $name_products,
            $description,
            $price,
            $material,
            $oldThumbnail,
            $date,
            $id_category,
        );
    }
    return viewAdmin("editProduct", $product);
}
function controller_delete_products($req)
{
    // return viewAdmin("editProduct", []);
    $req->productsService->delete_products();

    header("Location: ?act=products");
}
