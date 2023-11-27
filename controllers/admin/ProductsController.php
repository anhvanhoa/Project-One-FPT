<?php
function controller_products(Req $req)
{
    $products = $req->productsService->getAll();
    return viewAdmin("products", ['products' => $products]);
}
function controller_bin_products(Req $req)
{
    $products = $req->productsService->getAll(true);
    return viewAdmin("store/products", ['products' => $products]);
}
function controller_add_products(Req $req)
{
    $categories = $req->categoriesService->getAll();
    if (isset($_POST['add-product'])) {
        $name_product = $_POST['name-product'];
        $price = $_POST['price'];
        $origin_price = $_POST['origin-price'];
        $material = $_POST['material'];
        $created_at = $_POST['date'];
        $id_category = $_POST['id-category'];
        $description = $_POST['description'];
        $thumbnail = $_FILES['thumbnail'];
        $product = [
            'name_product' => $name_product,
            'price' => $price,
            'origin_price' => $origin_price,
            'material' => $material,
            'created_at' => $created_at,
            'description' => $description,
            'id_category' => $id_category,
            'thumbnail' => $thumbnail,
        ];
        $_SESSION['product'] = $product;
        header('location: ?act=add-detail-product');
    }
    return viewAdmin("addProduct", ['categories' => $categories]);
}
function controller_add_product_detail(Req $req)
{
    $product = $_SESSION['product'];
    $id = isset($_GET['id']) ? $_GET['id'] : 0;
    if ($id) $product = $req->productsService->findOne($id);
    if (!$product) header('location: ?act=products');
    if (isset($_POST['add-product']) || isset($_POST['save&add-new'])) {
        $productDetail = [
            'amount' => $_POST['amount'],
            'size' => $_POST['size'],
            'color' => $_POST['color'],
            'code_color' => $_POST['code-color'],
            'image' => uploadImage($_FILES['image']),
            'id_product' => null,
        ];
    }
    if (isset($_POST['add-product'])) {
        if (!$id) {
            $product['thumbnail'] = uploadImage($product['thumbnail']);
            $id = $req->productsService->insertOne($product);
        }
        $productDetail['id_product'] = $id;
        header("location: ?act=add-detail-product&id=$id");
        $idDetail =  $req->productsDetailService->insertOne($productDetail);
        $listImage = uploadImageMultiple($_FILES['images']);
        foreach ($listImage as $image) {
            $req->imagesService->insertOne([
                'image' => $image,
                'id_product_detail' => $idDetail,
            ]);
        }
        $_SESSION['product'] = null;
        header('location: ?act=products');
    }
    if (isset($_POST['save&add-new'])) {
        if (!$id) {
            $product['thumbnail'] = uploadImage($product['thumbnail']);
            $id = $req->productsService->insertOne($product);
        }
        $productDetail['id_product'] = $id;
        $idDetail =  $req->productsDetailService->insertOne($productDetail);
        $listImage = uploadImageMultiple($_FILES['images']);
        foreach ($listImage as $image) {
            $req->imagesService->insertOne([
                'image' => $image,
                'id_product_detail' => $idDetail,
            ]);
        }
        $_SESSION['product'] = null;
        header("location: ?act=add-detail-product&id=$id");
    }
    return viewAdmin("addProductDetail", ['pro' => $product]);
}
function controller_edit_products(Req $req)
{
    $id = $_GET['id'];
    if (!$id) error();
    $categories = $req->categoriesService->getAll();
    $product = $req->productsService->findOne($id);
    $productsDetail = $req->productsDetailService->getAllProduct($id);
    if (isset($_POST['update-product'])) {
        $name_product = $_POST['name-product'];
        $price = $_POST['price'];
        $origin_price = $_POST['origin-price'];
        $material = $_POST['material'];
        $created_at = $_POST['date'];
        $id_category = $_POST['id-category'];
        $description = $_POST['description'];
        $thumbnail = uploadImage($_FILES['thumbnail']) ? uploadImage($_FILES['thumbnail']) : $product['thumbnail'];
        $productNew = [
            'name_product' => $name_product,
            'price' => $price,
            'origin_price' => $origin_price,
            'material' => $material,
            'description' => $description,
            'id_category' => $id_category,
            'thumbnail' => $thumbnail,
        ];
        $isSuccess = $req->productsService->updateOne($productNew, $id);
        header('location: ?act=products');
    }
    return viewAdmin("editProduct", [
        'product' => $product,
        'categories' => $categories,
        'productsDetail' => $productsDetail
    ]);
}
function controller_edit_product_detail(Req $req)
{
    $id = $_GET['id'];
    $idPro = $_GET['id-pro'];
    if (!$id || !$idPro) header('location: ?act=products');
    $product = $req->productsService->findOne($idPro);
    $productDetail = $req->productsDetailService->findOne($id);
    $images = $req->imagesService->getAll($id);
    if (isset($_POST['update-product'])) {
        $productDetail = [
            'amount' => $_POST['amount'],
            'size' => $_POST['size'],
            'color' => $_POST['color'],
            'code_color' => $_POST['code-color'],
            'image' => uploadImage($_FILES['image']) ? uploadImage($_FILES['image']) : $productDetail['image'],
            'id_product' => $product['id'],
        ];
        $isSuccess = $req->productsDetailService->updateOne($productDetail, $id);
        $listImage = uploadImageMultiple($_FILES['images']);
        if ($listImage) {
            foreach ($listImage as $image) {
                $req->imagesService->insertOne([
                    'image' => $image,
                    'id_product_detail' => $id,
                ]);
            }
            foreach ($images as $image) {
                extract($image);
                $req->imagesService->deleteOne($id_product_detail);
            }
        }
        header('location: ?act=products');
    }
    return viewAdmin("editProductDetail", [
        'pro' => $product,
        'productDetail' => $productDetail,
        'listImage' => $images
    ]);
}
function controller_delete_products(Req $req)
{
    if (isset($_GET['id']) && $_GET['id']) {
        $id = $_GET['id'];
        $req->productsService->updateOne([
            'is_deleted' => true,
        ], $id);
    }
    if (isset($_POST)) {
        $ids = $_POST['product-id'];
        var_dump($ids);
        foreach ($ids as $id) {
            $req->productsService->updateOne([
                'is_deleted' => true,
            ], $id);
        }
    }
    header("location: ?act=products");
}
function controller_restore_products(Req $req)
{
    if (isset($_GET['id']) && $_GET['id']) {
        $id = $_GET['id'];
        $req->productsService->updateOne([
            'is_deleted' => false,
        ], $id);
    }
    if (isset($_POST)) {
        $ids = $_POST['product-id'];
        var_dump($ids);
        foreach ($ids as $id) {
            $req->productsService->updateOne([
                'is_deleted' => false,
            ], $id);
        }
    }
    header("location: ?act=products");
}
