<?php
function controller_vouchers(Req $req)
{
    $vouchers = $req->vouchersService->findAll();
    return viewAdmin('vouchers', ['vouchers' => $vouchers]);
}
function controller_add_voucher(Req $req)
{
    $error = "";
    if (isset($_POST['add-voucher'])) {
        $code = $_POST['code'];
        $discount = $_POST['discount'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        if (strtotime($start) > strtotime($end)) $error = 'Ngày kết thúc không được nhỏ hơn ngày bắt đầu';
        if (strtotime($start) < strtotime(date('d-m-Y'))) $error = 'Ngày bắt đầu không được trong khóa khứ !';
        $isVoucher = $req->vouchersService->getVoucherByCode($code);
        if ($isVoucher)  $error = "Mã voucher đã tồn tại !!";
        $isSuccess = $req->vouchersService->insertOne([
            'code' => $code,
            'discount' => $discount,
            'start' => $start,
            'end' => $end,
        ]);
        if ($isSuccess) header('location: ?act=vouchers');
    }
    return viewAdmin('addVoucher', ['error' => $error]);
}

function controller_edit_voucher(Req $req)
{
    $error = "";
    $id = $_GET['id'];
    if (!$id) header('location: ?act=vouchers');
    $voucher = $req->vouchersService->findOne($id);
    if (isset($_POST['update-voucher'])) {
        $code = $_POST['code'];
        $discount = $_POST['discount'];
        $start = $_POST['start'];
        $end = $_POST['end'];
        if (strtotime($start) > strtotime($end)) $error = 'Ngày kết thúc không được nhỏ hơn ngày bắt đầu';
        if (strtotime($start) < strtotime(date('d-m-Y'))) $error = 'Ngày bắt đầu không được trong khóa khứ !';
        $isVoucher = $req->vouchersService->getVoucherByCode($code);
        if ($isVoucher)  $error = "Mã voucher đã tồn tại !!";
        $isSuccess = $req->vouchersService->updateOne([
            'code' => $code,
            'discount' => $discount,
            'start' => $start,
            'end' => $end,
        ], $id);
        if ($isSuccess) header('location: ?act=vouchers');
    }
    return viewAdmin('editVoucher', ['voucher' => $voucher, 'error' => $error]);
}
