<?php
namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    private function prepareSET(){
        $set = ' ';
        foreach ($this as $key => $value){
            $params[$key] = $value;
        }
        $params = array_slice($params, 1, -1);

        foreach ($params as $key => $value){
            $set .= "`" . $key . "` = :" . $key . ", ";
        }
        $set = substr($set, 0, -2);
        return $set;
    }

    public function insert() {
        foreach ($this as $key => $value)
            $params[$key] = $value;
        $params = array_slice($params, 1, -1);
        $sql = "INSERT INTO {$this->getTableName()} SET" . $this->prepareSET();
        $this->db->execute($sql, $params);
       // $this->id = lastinsertId;
    }

    public function delete() {

    }
    public function update() {

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return $this->db->queryOne($sql, ['id' => $id]);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return $this->db->queryAll($sql);
    }

}