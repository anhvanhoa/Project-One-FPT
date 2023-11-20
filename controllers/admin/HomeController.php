<?php
function controller_home(Req $req)
{
    $overview['count_product']  = count($req->productsService->findAll());
    $overview['count_user']  = count($req->usersService->getAccountsByRole($_SESSION['user']['role'])) + 1;
    $overview['count_voucher']  = count($req->vouchersService->findAll());
    $overview['count_bill']  = count($req->billsService->findAll());
    $billsToday = $req->billsService->getAllToday();
    $analyticCategory = $req->categoriesService->analytic();
    return viewAdmin("home", ['overview' => $overview, 'billsToday' => $billsToday, 'analyticCategory' => $analyticCategory]);
}
