<?php

namespace app\controllers;


use app\engine\App;
use app\engine\Request;
use app\models\entities\Basket;
use app\models\entities\Order;
use app\models\repositories\BasketRepository;
use app\models\repositories\OrderRepository;

class ApiController extends Controller
{
    public function actionAddBasket()
    {

       // (new BasketRepository())->save(new Basket(session_id(), (new Request())->getParams()['id']));

        App::call()->basketRepository->save(new Basket(
                session_id(),
                App::call()->request->getParams()['id'])
        );


        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', session_id())
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }

    public function actiondelFromBasket()
    {

        $id = App::call()->request->getParams()['id'];
        $session = session_id();
        /*
        $basket = Basket::getOne($id);
        if ($session == $basket->session_id)
            $basket->delete();
        */
//DELETE FROM basket WHERE id=1 AND session_id='23123';
        //Вариант оптимальный

        App::call()->basketRepository->deleteByIdWhere($id, 'session_id', $session);


        $response = [
            'result' => 1,
            'count' => App::call()->basketRepository->getCountWhere('session_id', $session)
        ];

        header('Content-Type: application/json');
        echo json_encode($response);

        exit;
    }

    public function actionChangeOrder(){
        $id = App::call()->request->getParams()['id'];
        App::call()->orderRepository->changeStatus($id, 1); // можно передавать различные состояния через второй параметр
        $response = [
            'result' => 1,
        ];
        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}