<?php
namespace app\models;

use app\interfaces\IModel;
use app\engine\Db;

abstract class Model implements IModel
{
    public $id;
    protected $db;


    public function __construct()
    {
        $this->db = Db::getInstance();
    }

    private function getParams(){
        foreach ($this as $key => $value){
            $params[$key] = $value;
        }
        $params = array_slice($params, 0, -1);
        return $params;
    }

    private function prepareSET(){
        $set = ' ';
        foreach ($this->getParams() as $key => $value){
            $set .= "`" . $key . "` = :" . $key . ", ";
        }
        $set = substr($set, 1, -2);
        return $set;
    }

    public function insert() {
        $sql = "INSERT INTO {$this->getTableName()} SET" . $this->prepareSET();
        $this->db->execute($sql, $this->getParams());
        $this->id = $this->db->getLastId();
        echo "Добавили элемент с id = {$this->id} <br>";
    }

    public function delete() {
        $sql = "DELETE FROM {$this->getTableName()} WHERE id = :id";
        $this->db->execute($sql, ['id' => $this->id]);
        echo "Удалили элемент с id = {$this->id} <br>";
    }
    public function update() {
        $sql = "UPDATE {$this->getTableName()} SET" . $this->prepareSET() . " WHERE id = :id";
        $this->db->execute($sql, $this->getParams());
        echo "Изменили элемент с id = {$this->id} <br>";
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