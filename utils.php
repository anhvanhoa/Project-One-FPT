<?php
function error()
{
    header('location: /');
}

function checkTypeImage($type)
{
    return strstr($type, 'image');
}

function uploadImage($file)
{
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $path = dirname(__FILE__) . "/asset/images/";
    $isType = checkTypeImage($file['type']);
    if (!$isType) return false;
    $isSuccess = move_uploaded_file($tmp, $path . $name);
    // return $isSuccess ? $name : '';
    return $name;
}

function uploadImageMultiple($files)
{
    $names = $files['name'];
    $tmp_names = $files['tmp_name'];
    $linkImages = [];
    foreach ($names as $i => $name) {
        $tmp = $tmp_names[$i];
        $path = dirname(__FILE__) . "/asset/images/";
        $isSuccess = move_uploaded_file($tmp, $path . $name);
        if ($isSuccess) array_push($linkImages, $name);
    }
    if (empty($linkImages)) return false;
    else return $linkImages;
}

function getRole($role = 0)
{
    switch ($role) {
        case 2:
            return 'Admin';
        case 1:
            return 'Quản lý';
        default:
            return 'Người dùng';
    }
}

function getStatus($status = 1)
{
    switch ($status) {
        case 5:
            return [
                'name' => 'Giao thành công',
                'color' => 'text-green-700 ring-green-600/20 bg-green-50',
            ];
        case 4:
            return [
                'name' => 'Vận chuyển',
                'color' => 'text-purple-700 ring-purple-700/10 bg-purple-50',
            ];
        case 3:
            return [
                'name' => 'Đóng gói',
                'color' => 'text-yellow-800 ring-yellow-600/20 bg-yellow-50',
            ];
        case 2:
            return [
                'name' => 'Xác nhận',
                'color' => 'text-blue-700 ring-blue-700/10 bg-blue-50',
            ];
        case 1:
            return [
                'name' => 'Đặt hàng',
                'color' => 'text-green-700 ring-green-600/20 bg-green-50',
            ];
        default:
            return [
                'name' => 'Đơn hủy',
                'color' => 'text-red-700 ring-red-600/10 bg-red-50',
            ];
    }
}
