<?php

namespace app\controllers;


use app\engine\Request;
use app\models\Basket;

class ApiController extends Controller
{
    public function actionAddBasket() {

        (new Basket(session_id(), (new Request())->getParams()['id']))->save();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id()),
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actionDelBasket() {

        (new Basket(session_id(), 'заглушка', (new Request())->getParams()['id']))->delete();

        $response = [
            'result' => 1,
            'count' => Basket::getCountWhere('session_id', session_id()),
            'sum' => Basket::getSumBasket(session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}