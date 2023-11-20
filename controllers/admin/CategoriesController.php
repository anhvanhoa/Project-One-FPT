<?php
function controller_categories(Req $req)
{
    $categories = $req->categoriesService->findAll();
    return viewAdmin("categories", ['categories'=>$categories]);
}

function controller_add_categories(Req $req)
{

    return viewAdmin("addCategory", []);
}

function controller_edit_categories(Req $req)
{
    
    return viewAdmin("editCategory", []);
}
