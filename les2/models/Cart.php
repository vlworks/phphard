<?php


namespace app\models;


class Cart extends Model

{
    public $id;
    public $goods = [];
    public $sum = 0;

    public function getTableName()
    {
        return 'cart';
    }

}