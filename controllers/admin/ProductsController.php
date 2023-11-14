<?php
function controller_products($req)
{
    return viewAdmin("products", []);
}
function controller_add_products($req)
{
    return viewAdmin("addProduct", []);
}
function controller_add_product_detail($req)
{
    return viewAdmin("addProductDetail", []);
}
function controller_edit_products($req)
{
    return viewAdmin("editProduct", []);
}
