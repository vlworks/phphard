<?php


namespace app\controllers;

use app\engine\Request;
use app\models\repositories\UserRepository;
use app\models\entities\User;

class UserController extends Controller
{
    public function actionLogin() {
        if (isset($_POST['submit'])) {
            $login = (new Request())->getParams()['login'];
//            $login = $_POST['login'];
//            $pass = $_POST['pass'];
            $pass = (new Request())->getParams()['pass'];
            if (!(new UserRepository())->auth($login, $pass)) {
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