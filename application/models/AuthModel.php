<?php


class AuthModel extends Model
{
    public static function Register($login, $pass, $email)
    {
        $db = DB::getConnection();
        $sql = 'INSERT INTO users (login, pass, email) VALUES (:login, :pass, :email)';
        $result = $db->prepare($sql);
        $result->bindParam(':login', $login, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();

    }
    public static function checkLogin($login)
    {
        if (strlen($login) >=3){
            return true;
        }
        return false;
    }

    public static function checkPass($pass)
    {
        if (strlen($pass)>=6){
            return true;
        }
        return false;
    }

    public static function checkEmail($email)
    {
        if (filter_var($email, FILTER_VALIDATE_EMAIL) ){
            return true;
        }
        return false;
    }
    public static function checkEmailExist($email)
    {
        $db = DB::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->execute();
        $row = $result->fetch();
        if($row){
            return true;
        }else{
            return false;
        }

    }
    public static function checkUserData($email, $pass)
    {
        $db = DB::getConnection();
        $sql = 'SELECT * FROM users WHERE email = :email AND pass = :pass';
        $result = $db->prepare($sql);
        $result->bindParam(':email', $email, PDO::PARAM_STR);
        $result->bindParam(':pass', $pass, PDO::PARAM_STR);
        $result->execute();
        $user = $result->fetch();
        if($user){
            return $user;
        }else{
            return false;
        }
    }
    public static function successAuth($userData)
    {
        $_SESSION['user_name'] = $userData['login'];
        header("Location: /");
    }
}