<?php
function controller_categories($req)
{
    $categories = $req->categoriesService->findAll();
    return viewAdmin("categories", ['categories'=>$categories]);
}


function controller_add_categories($req)
{

    return viewAdmin("addCategory", []);
}


function controller_edit_categories($req)
{
    
    return viewAdmin("editCategory", []);
}
