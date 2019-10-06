<?php


namespace app\models\repositories;


use app\models\entities\User;
use app\models\Repository;

class UserRepository extends Repository
{

    public function getTableName() {
        return 'users';
    }

    public function auth($login, $pass) {
        $user = $this->getWhere('login', $login);
        if ($pass == $user->pass) {
            $_SESSION['login'] = $login;
            return true;
        }
        return false;
    }

    public function isAuth() {
        return isset($_SESSION['login']) ? true: false;
    }

    public function getName() {
        if (isset($_SESSION['login'])) return $_SESSION['login'];
        else return "Guest";
    }

    public function getEntityClass()
    {
        return User::class;
    }

}