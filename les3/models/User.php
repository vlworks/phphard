<?php

namespace app\models;

class User extends Model
{
    public $login;
    public $pass;
    public $hash;

    public function __construct($login, $pass, $hash)
    {
        parent::__construct();
        $this->login = $login;
        $this->pass = md5($pass); // md5 для примера
        $this->hash =$hash;
    }

    public function getTableName() {
        return 'users';
    }


}