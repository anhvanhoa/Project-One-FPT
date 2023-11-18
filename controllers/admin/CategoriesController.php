<?php
function controller_categories(Req $req)
{
    return viewAdmin("categories", []);
}
function controller_add_categories(Req $req)
{
    return viewAdmin("addCategory", []);
}
function controller_edit_categories(Req $req)
{
    return viewAdmin("editCategory", []);
}
