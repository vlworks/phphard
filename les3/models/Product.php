<?php

namespace app\models;

class Product extends Model
{
    public $id;
    public $img;
    public $name;
    public $description;
    public $price;

    public function __construct()
    {
        $this->img = $img;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName()
    {
        return 'products';
    }




}