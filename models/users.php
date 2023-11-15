<?php
class Users extends  ServicePdo
{

    public function login($email, $password)
    {
        $dbName = $this->dbName;
        $sql = "SELECT * FROM $dbName WHERE EMAIL = '$email' AND PASSWORD = '$password'";
        $user = $this->pdo->query($sql)->fetch();
        if ($user && $user['email'] === $email && $password === $user['password']) return $user;
        return false;
    }
    public function register($email, $password, $fullName)
    {
        $dbName = $this->dbName;
        $sql = "INSERT INTO 
                $dbName(email, password, full_name)
                VALUES('$email', '$password','$fullName')";
        return $this->pdo->exec($sql);
    }

    public function uniqueEmailOrTell($emailOrTell, $type = 'email')
    {
        $dbName = $this->dbName;
        $sql = '';
        if ($type == "email") $sql = "SELECT ID FROM $dbName WHERE EMAIL = '$emailOrTell'";
        if ($type == "tell") $sql = "SELECT ID FROM $dbName WHERE TELL = '$emailOrTell'";
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
        if (!$user) return $this->pdo->prepare($sqlUpdate)->fetch();
        if ($user['id'] != $idUser) return false;
        else return $this->pdo->prepare($sqlUpdate)->execute();
    }

    public function changePass($pass, $id)
    {
        $dbName = $this->dbName;
        $sql = "UPDATE $dbName SET PASSWORD = '$pass' WHERE ID = $id";
        return $this->pdo->prepare($sql)->execute();
    }
    // handle
}
$users = new Users("users");
