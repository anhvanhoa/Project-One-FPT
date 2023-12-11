<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function error()
{
    header('location: /');
}

function checkTypeImage($type)
{
    return strstr($type, 'image');
}

function checkSize($size)
{
    $mb = $size / (1024 * 1024);
    if ($mb > 4)
        return false;
    return true;
}

function uploadImage($file)
{
    $name = $file['name'];
    $tmp = $file['tmp_name'];
    $path = dirname(__FILE__) . "/asset/images/";
    $isType = checkTypeImage($file['type']);
    if (!$isType)
        return [false, "Định dạng file không đúng."];
    if (!checkSize($file['size']))
        return [false, 'File không vượt quá 4MB'];
    $isSuccess = move_uploaded_file($tmp, $path . $name);
    // return $isSuccess ? $name : '';
    return [true, $name];
}

function uploadImageMultiple($files)
{
    $names = $files['name'];
    $tmp_names = $files['tmp_name'];
    $types = $files['type'];
    $sizes = $files['size'];
    $linkImages = [];
    foreach ($names as $i => $name) {
        $tmp = $tmp_names[$i];
        $isType = checkTypeImage($types[$i]);
        if (!$isType)
            return false;
        // if (!checkSize($sizes[$i])) return false;
        $path = dirname(__FILE__) . "/asset/images/";
        $isSuccess = move_uploaded_file($tmp, $path . $name);
        if ($isSuccess)
            array_push($linkImages, $name);
    }
    if (empty($linkImages))
        return false;
    else
        return $linkImages;
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
                'color' => 'text-sky-700 ring-sky-600/20 bg-sky-50',
            ];
        default:
            return [
                'name' => 'Đơn hủy',
                'color' => 'text-red-700 ring-red-600/10 bg-red-50',
            ];
    }
}


function sendMail(string $email, string $pass)
{
    $name = 'Website Nha Xinh';
    $email = htmlentities($email);
    $subject = "Grant password";
    $message = "Cấp lại mật mẩu cho website nội thất. Mật khẩu của bạn là: $pass";
    $mail = new PHPMailer(true);
    $mail->isSMTP();
    $mail->Host = 'smtp.gmail.com';
    $mail->SMTPAuth = true;
    $mail->Username = 'toplaiphaiwin@gmail.com';
    $mail->Password = 'bncx wvnn dckt mldy';
    $mail->Port = 465;
    $mail->SMTPSecure = 'ssl';
    $mail->isHTML(true);
    $mail->setFrom($email, $name);
    $mail->addAddress($email);
    $mail->Subject = $subject;
    $mail->Body = $message;
    $mail->send();
    header("Location: ./index.php?act=login");
}

function method_payment(int $type)
{
    if ($type === 2)
        return "Chuyển khoản";
    return "Thanh toán khi nhận hàng";
}