<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

function controller_account(Req $req)
{
    $error = '';
    $categories = $req->categoriesService->getAll();
    $user = $_SESSION['user'];
    if (isset($_POST['update'])) {
        $idUser = $user['id'];
        $email = $_POST['email'];
        $birthday = $_POST['birthday'];
        $fullName = $_POST['full-name'];
        $tell = $_POST['tell'];
        $address = $_POST['address'];
        if (!$_FILES['avatar']['name']) {
            $image[0] = true;
            $image[1] = $user['avatar'];
        } else {
            $image = uploadImage($_FILES['avatar']);
        }
        if (!$image[0] && $_FILES['avatar']['name']) {
            $error = $image[1];
            $image[1] = $user['avatar'];
        }
        $isTell = preg_match('/(84|0[3|5|7|8|9])+([0-9]{8})\b/', $tell);
        if (!$isTell) {
            $error = 'Định dạng số điện thoại sai';
            return view("account", ["categories" => $categories, 'user' => $user, 'error' => $error]);
        }
        $isSuccess = $req->usersService->update($image[1], $email, $birthday, $fullName, $address, $tell, $idUser);
        if ($isSuccess) {
            $count_cart = $_SESSION['user']['count_cart'];
            $id_cart = $_SESSION['user']['id_cart'];
            $user = $_SESSION['user'] = $req->usersService->findOne($idUser);
            $_SESSION['user']['count_cart'] = $count_cart;
            $_SESSION['user']['id_cart'] = $id_cart;
        }
    }
    return view("account", ["categories" => $categories, 'user' => $user, 'error' => $error]);
}

function controller_login(Req $req)
{
    $error = '';
    if (isset($_POST['login'])) {
        $email = $_POST['email'];
        $password = $_POST['password'];
        $user = $req->usersService->login($email, $password);
        if (is_array($user)) {
            $countCart = $req->cartsService->countProductInCart($user['id_cart']);
            $user['count_cart'] = $countCart[0];
            $_SESSION['user'] = $user;
            header('location: /');
        } else
            $error = 'Email hoặc mật khẩu không đúng !';
    }
    return view("login", ['error' => $error]);
}

function controller_register(Req $req)
{
    $error = '';
    if (isset($_POST['register'])) {
        $fullName = $_POST['full-name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $confirmPassword = $_POST['confirm-password'];
        if ($password != $confirmPassword)
            $error = 'xác nhận mật khẩu không chính xác !';
        $uniqueEmail = $req->usersService->uniqueEmailOrTell($email);
        if ($uniqueEmail)
            $error = 'Email đã tồn tại !';
        if (strlen($password) < 6)
            $error = 'Mật khẩu phải lớn hơn 6 ký tự';
        if (!$error) {
            $req->usersService->register($email, $password, $fullName);
            header('location: /?act=login');
        }
    }
    return view("register", ["error" => $error]);
}

function controller_forgot_password(Req $req)
{
    $error = "";
    if (isset($_POST['forgot'])) {
        $email = $_POST['email'];
        $uniqueEmail = $req->usersService->uniqueEmailOrTell($email);
        if (!$uniqueEmail)
            $error = 'Email không tồn tại !';
        else {
            $user = $req->usersService->findByEmail($email);
            sendMail($user['email'], $user['password']);
        }
    }
    return view("forgotPassword", ['error' => $error]);
}

function controller_logout(Req $req)
{
    if (isset($_POST['logout'])) {
        $_SESSION['user'] = null;
        header('location: /');
    }
}
function controller_change_pass(Req $req)
{
    $error = '';
    if (isset($_POST['update-pass'])) {
        $passCurrent = $_POST['pass-current'];
        $passNew = $_POST['pass'];
        $passConfirm = $_POST['pass-confirm'];
        if ($passCurrent !== $_SESSION['user']['password'])
            $error = 'Mật khẩu hiện tại không đúng !!';
        if (strlen($passNew) < 6)
            $error = 'Mật khẩu phải lớn hơn 6 ký tự !!';
        if ($passNew != $passConfirm)
            $error = 'Mật khẩu không trùng khớp !!';
        if (!$error) {
            $idUser = $_SESSION['user']['id'];
            $isSuccess = $req->usersService->changePass($passNew, $idUser);
            if ($isSuccess) {
                $_SESSION['user'] = $req->usersService->findOne($idUser);
                $count_cart = $_SESSION['user']['count_cart'];
                $id_cart = $_SESSION['user']['id_cart'];
                header('location: /');
                $_SESSION['user']['id_cart'] = $id_cart;
                $_SESSION['user']['count_cart'] = $count_cart;
            } else
                $error = 'Không thành công !!';
        }
    }
    $categories = $req->categoriesService->getAll();
    return view("changePassword", ["categories" => $categories, "error" => $error]);
}
