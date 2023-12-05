<?php
function controller_categories(Req $req)
{
    $categories = $req->categoriesService->getAll();
    if (isset($_GET['q'])) {
        $categories = $req->categoriesService->search($_GET['q']);
    }
    return viewAdmin("categories", ['categories' => $categories]);
}
function controller_bin_categories(Req $req)
{
    $categories = $req->categoriesService->getAll(true);
    return viewAdmin("store/categories", ['categories' => $categories]);
}
function controller_add_category(Req $req)
{
    $error = '';
    if (isset($_POST['btn-add']) &&  $_POST['name'] && $_FILES['image']['name']) {
        $file = $_FILES['image'];
        $name_category = $_POST['name'];
        $image = uploadImage($file);
        if (!$image[0]) {
            $error = $image[1];
        } else {
            $category = $req->categoriesService->insertOne(['name_category' => $name_category, 'image' => $image[1]]);
            if ($category) header('location: ?act=categories');
        }
    }
    return viewAdmin("addCategory", ['error' => $error]);
}
function controller_update_category(Req $req)
{
    if (isset($_POST['update'])) {
        $file = $_FILES['image'];
        $id = $_POST['id'];
        $name_category = $_POST['name'];
        $image = uploadImage($file);
        $imageOld = $_POST['image-old'];
        if (!$image[0] && $file['name']) {
            header("location: ?act=edit-category&id=$id&error=$image[1]");
            $image[1] = $imageOld;
        } else {
            $category = $req->categoriesService->updateOne([
                'name_category' => $name_category,
                "image" => $image[1]
            ], $id);
            if ($category) header('location: ?act=categories');
            if (!$category) header("location: ?act=edit-category&id=$id");
        }
    }
}
function controller_edit_category(Req $req)
{
    $error = '';
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $category = $req->categoriesService->findOne($id);
    }
    if (isset($_GET['error'])) {
        $error = $_GET['error'];
    }
    return viewAdmin("editCategory", ['category' => $category, 'error' => $error]);
}

function controller_delete_category(Req $req)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $req->categoriesService->deleteOne($id);
        //fix
        $req->categoriesService->updateOne(['is_deleted' => true], $id);
        //fix end
        header('location: ?act=categories');
    }
    if (isset($_POST['delete-many'])) {
        $ids = $_POST['category-id'];
        foreach ($ids as $id) {
            // $req->categoriesService->deleteOne($id);
            $req->categoriesService->updateOne(['is_deleted' => true], $id);
        }
        header('location: ?act=categories');
    }
}
function controller_restore_category(Req $req)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $req->categoriesService->updateOne(['is_deleted' => false], $id);
        header('location: ?act=categories');
    }
    if (isset($_POST['delete-many'])) {
        $ids = $_POST['category-id'];
        foreach ($ids as $id) {
            $req->categoriesService->updateOne(['is_deleted' => false], $id);
        }
        header('location: ?act=categories');
    }
}
