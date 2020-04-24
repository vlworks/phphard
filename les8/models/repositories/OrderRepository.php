<?php


namespace app\models\repositories;

use app\engine\App;
use app\engine\Db;
use app\models\entities\Order;
use app\models\Repository;

class OrderRepository extends Repository
{
    public function getTableName()
    {
        return 'orders';
    }

    public function getEntityClass()
    {
        return Order::class;
    }

    public function changeStatus($id, $status){
        $tableName = static::getTableName();
        $sql = "UPDATE {$tableName} SET `status` = :status WHERE `id` = :id";
        return App::call()->db->execute($sql, ['status' => $status, 'id' => $id]);
    }
}