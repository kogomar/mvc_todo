<?php

include_once APP.'/models/AuthModel.php';

class AuthController extends Controller
{
    public function actionLogin(){

        $email = '';
        $pass  = '';

        if(isset($_POST['email'])){
            $email = $_POST['email'];
            $pass = $_POST['pass'];

            $errors = false;

            if(!AuthModel::checkPass($pass)){
                $errors[] = 'Password must be more then 6 symbols';
            }
            if(!AuthModel::checkEmail($email)){
                $errors[] = 'Wrong Email';
            }

            $userData = AuthModel::checkUserData($email, $pass);

            if($userData == false){
                $errors[] = 'Wrong user data';
            }else{
                AuthModel::successAuth($userData);

                 header('Location: /');
            }
        }

        require_once  APP.'/views/LoginView.php';

    }
    public function actionRegistration(){

        $login = '';
        $pass  = '';
        $email = '';

        if(isset($_POST['email'])){
            $login = $_POST['login'];
            $pass = $_POST['pass'];
            $email = $_POST['email'];

            $errors = false;

            if(!AuthModel::checkLogin($login)){
                $errors[] = 'Login must be more then 3 symbols';
            }
            if(!AuthModel::checkPass($pass)){
                $errors[] = 'Password must be more then 6 symbols';
            }
            if(!AuthModel::checkEmail($email)){
                $errors[] = 'Wrong Email';
            }
            if(AuthModel::checkEmailExist($email)){
                $errors[] = 'This email is already use';
            }
            if($errors == false){
                AuthModel::Register($login, $pass, $email);
                $message = "Registration complete! Please Log in";
                $login = '';
                $pass  = '';
                $email = '';
            }

        }

        require_once  APP.'/views/RegisterView.php';

    }
}