<?php
class Users extends ServicePdo
{

    public function login($email, $password)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE EMAIL = '$email' AND PASSWORD = '$password' AND IS_DELETED = false";
        $user = $this->pdo->query($sql)->fetch();
        if ($user) {
            $idUser = $user['id'];
            $sqlCart = "SELECT id FROM carts WHERE ID_USER =  $idUser";
            $cartUser = $this->pdo->query($sqlCart)->fetch();
            if (!$cartUser) {
                $idUser = $user['id'];
                $sqlCart = "INSERT INTO carts(id_user) VALUES($idUser)";
                $this->pdo->exec($sqlCart);
                $cartUser = $this->pdo->query($sqlCart)->fetch();
            }
            $user['id_cart'] = $cartUser['id'];
        }
        if ($user && $user['email'] === $email && $password === $user['password'])
            return $user;
        return false;
    }
    public function register($email, $password, $fullName)
    {
        $dbName = $this->dbName;
        $sql = "INSERT INTO 
                $dbName(email, password, full_name)
                VALUES('$email', '$password','$fullName')";
        $user = $this->pdo->exec($sql);
        return $user;
    }

    public function uniqueEmailOrTell($emailOrTell, $type = 'email')
    {
        $dbName = $this->dbName;
        $sql = '';
        if ($type == "email")
            $sql = "SELECT ID FROM $dbName WHERE EMAIL = '$emailOrTell'";
        if ($type == "tell")
            $sql = "SELECT ID FROM $dbName WHERE TELL = '$emailOrTell'";
        $result = $this->pdo->query($sql)->fetch();
        return is_array($result) ? true : false;
    }

    public function update($image, $email, $birthday, $fullName, $address, $tell, $idUser)
    {
        $dbName = $this->dbName;
        $sql = "SELECT id FROM $dbName WHERE EMAIL = '$email'";
        $user = $this->pdo->query($sql)->fetch();
        $avatar = $image ? ",AVATAR = '$image'" : '';
        $sqlUpdate = "UPDATE $dbName SET EMAIL = '$email', BIRTHDAY = '$birthday', FULL_NAME = '$fullName', TELL = '$tell', ADDRESS = '$address' $avatar WHERE ID = $idUser";
        if (!$user)
            return $this->pdo->prepare($sqlUpdate)->fetch();
        if ($user['id'] != $idUser)
            return false;
        else
            return $this->pdo->prepare($sqlUpdate)->execute();
    }

    public function changePass($pass, $id)
    {
        $dbName = $this->dbName;
        $sql = "UPDATE $dbName SET PASSWORD = '$pass' WHERE ID = $id";
        return $this->pdo->prepare($sql)->execute();
    }
    public function getAccountsByRole($role = 1, $isDeleted = false)
    {
        $dbName = $this->dbName;
        if ($role == 1)
            $sql = "SELECT * FROM $dbName WHERE ROLE = 0";
        if ($role == 2)
            $sql = "SELECT * FROM $dbName WHERE ROLE <> $role AND IS_DELETED = '$isDeleted' ORDER BY ROLE DESC";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function search($q)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false AND FULL_NAME LIKE '%$q%' OR TELL LIKE '%$q%' OR EMAIL LIKE '%$q%'";
        return $this->pdo->query($sql)->fetchAll();
    }
    public function findByEmail(string $email)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE IS_DELETED = false AND EMAIL = '$email'";
        return $this->pdo->query($sql)->fetch();
    }
    // handle
}
$users = new Users("users");
