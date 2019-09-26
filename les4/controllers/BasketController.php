<?php

namespace app\controllers;

use app\models\Basket;

class BasketController extends Controller
{

    public function actionIndex() {
        echo $this->render('index');
    }

    public function actionCatalog() {
        $basket = Basket::getAll();
        echo $this->render('basket', ['basket' => $basket]);
    }

//    public function actionCard() {
//        $id = $_GET['id'];
//        $product = Basket::getOne($id);
//        echo $this->render('card', ['product' => $product]);
//    }



}