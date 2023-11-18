<?php
function controller_products(Req $req)
{
    return viewAdmin("products", []);
}
function controller_add_products(Req $req)
{
    return viewAdmin("addProduct", []);
}
function controller_add_product_detail(Req $req)
{
    return viewAdmin("addProductDetail", []);
}
function controller_edit_products(Req $req)
{
    return viewAdmin("editProduct", []);
}
