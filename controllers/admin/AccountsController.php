<?php
function controller_accounts(Req $req)
{
    $idUser = $_SESSION['user']['id'];
    $user = $req->usersService->findOne($idUser);
    $accounts = $req->usersService->getAccountsByRole($user['role']);
    if (isset($_GET['q'])) {
        $accounts = $req->usersService->search($_GET['q']);
    }
    return viewAdmin('accounts', ['accounts' => $accounts, 'user' => $user]);
}
function controller_bin_account(Req $req)
{
    $idUser = $_SESSION['user']['id'];
    $user = $req->usersService->findOne($idUser);
    $accounts = $req->usersService->getAccountsByRole($user['role'], true);
    return viewAdmin('store/accounts', ['accounts' => $accounts]);
}
function controller_detail_account(Req $req)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        if (
            isset($_POST['update'])
            && isset($_POST['email'])
            && isset($_POST['password'])
            && isset($_POST['tell'])
        ) {
            $email = $_POST['email'];
            $password = $_POST['password'];
            $tell = $_POST['tell'];
            $req->usersService->updateOne([
                'email' => $email,
                'password' => $password,
                'tell' => $tell
            ], $id);
        }
        $account = $req->usersService->findOne($id);
    }
    return viewAdmin('detailAccount', ['account' => $account]);
}
function controller_add_account(Req $req)
{
    $error = '';
    if (
        isset($_POST['btn-add'])
        && isset($_POST['full-name'])
        && isset($_POST['email'])
        && isset($_POST['password'])
        && isset($_POST['role'])
    ) {
        $fullName = $_POST['full-name'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $role = $_POST['role'];
        $uniqueEmail = $req->usersService->uniqueEmailOrTell($email);
        if ($uniqueEmail) $error = 'Email đã tồn tại !';
        if (strlen($password) < 6) $error = 'Mật khẩu phải lớn hơn 6 ký tự';
        if (!$error) {
            $req->usersService->insertOne([
                'full_name' => $fullName,
                'email' => $email,
                'password' => $password,
                'role' => $role
            ]);
            header('location: ?act=accounts');
        }
    }
    return viewAdmin('addAccount', ['error' => $error]);
}

function controller_delete_account(Req $req)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $req->usersService->deleteOne($id);
        // fix
        $req->usersService->updateOne(['is_deleted' => true], $id);
        //end fix
        header('location: ?act=accounts');
    }
    if (isset($_POST['delete-many'])) {
        $ids = $_POST['user-id'];
        foreach ($ids as $id) {
            // $req->usersService->deleteOne($id);
            $req->usersService->updateOne(['is_deleted' => true], $id);
        }
        header('location: ?act=accounts');
    }
}
function controller_restore_account(Req $req)
{
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        // $req->usersService->deleteOne($id);
        // fix
        $req->usersService->updateOne(['is_deleted' => false], $id);
        //end fix
        header('location: ?act=accounts');
    }
    // if (isset($_POST['delete-many'])) {
    //     $ids = $_POST['user-id'];
    //     foreach ($ids as $id) {
    //         // $req->usersService->deleteOne($id);
    //         $req->usersService->updateOne(['is_deleted' => true], $id);
    //     }
    //     header('location: ?act=accounts');
    // }
}

function controller_logout(Req $req)
{
    if (isset($_POST['logout'])) {
        $_SESSION['user'] = null;
        header('location: /');
    }
}
