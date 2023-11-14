<?php
function controller_categories($req)
{
    return viewAdmin("categories", []);
}
function controller_add_categories($req)
{
    return viewAdmin("addCategory", []);
}
function controller_edit_categories($req)
{
    return viewAdmin("editCategory", []);
}
