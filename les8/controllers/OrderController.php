<?php


namespace app\controllers;

use app\engine\App;
use app\engine\Request;
use app\models\Basket;
use app\models\entities\Order;


class OrderController extends Controller
{
    public function actionIndex() {
        echo $this->render('manager' ,[
            'orders' => App::call()->orderRepository->getAll(),
            'user' => App::call()->userRepository->getName(),
            'details' => App::call()->basketRepository->getBasket(App::call()->request->getParams()['order_session'])
        ]);
    }
    public function actionCreate() {
        App::call()->orderRepository->save(
            new Order(
                App::call()->request->getParams()['name'],
                App::call()->request->getParams()['phone'],
                App::call()->request->getParams()['adres'],
                session_id(),
                0
            )
        );
        echo $this->render('order', []);
    }
}