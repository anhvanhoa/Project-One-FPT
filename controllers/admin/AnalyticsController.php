<?php
function controller_analytic_revenue(Req $req)
{
    $dataMoney = [];
    $listDay = [];
    $totalMoney = 0;
    $moneyMonth = $req->billsService->analyticMoneyMonth();
    $moneys = $req->billsService->analyticMoney();
    $moneysToday = $req->billsService->analyticMoneyToday();
    foreach ($moneyMonth as $value) {
        extract($value);
        $totalMoney += $doanh_thu;
        array_push($dataMoney, (int)$doanh_thu);
        array_push($listDay, $ngay);
    }
    return viewAdmin('analyticRevenue', [
        'dataMoney' => $dataMoney,
        'listDay' => $listDay,
        'totalMoney' => $totalMoney,
        'moneys' => $moneys,
        'moneysToday' => $moneysToday,
    ]);
}

function controller_analytic_product(Req $req)
{
    $productSold = $req->productsService->analyticSold();
    // echo json_encode($productSold);
    return viewAdmin('analyticProduct', [
        'productSold' => $productSold
    ]);
}
