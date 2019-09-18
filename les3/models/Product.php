<?php

namespace app\models;

class Product extends Model
{
    public $image;
    public $name;
    public $description;
    public $price;

    public function __construct($image, $name, $description, $price)
    {
        parent::__construct();
        $this->image = $image;
        $this->name = $name;
        $this->description = $description;
        $this->price = $price;
    }

    public function getTableName()
    {
        return 'products';
    }




}