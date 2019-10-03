<?php


namespace app\controllers;

use app\engine\Request;
use app\models\User;

class UserController extends Controller
{
    public function actionLogin() {
        if (isset($_POST['submit'])) {
//            $login = $_POST['login'];
//            $pass = $_POST['pass'];
            $login = (new Request())->getParams()['login'];
            $pass = (new Request())->getParams()['pass'];
            if (!User::auth($login, $pass)) {
                Die("Не верный пароль!");
            } else
                header("Location: /");
            exit();
        }
    }
    public function actionLogout() {
        session_destroy();
        header("Location: /");
        exit();
    }
}