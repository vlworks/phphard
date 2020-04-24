<?php
namespace app\models;

use app\engine\App;
use app\models\entities\DataEntity;

/**
 * Class Model
 * @package app\models
 */

abstract class Repository extends Models
{


    public function deleteByIdWhere($id, $field, $value) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id  AND `$field`=:$field";
        return App::call()->db->execute($sql, ['id' => $id, "$field" => $value]);
}

    public function getCountWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT count(*) as count FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryOne($sql, ["$field"=>$value])['count'];
    }

    public function getLimit($from, $to) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} LIMIT :from, :to";
        return App::call()->db->queryLimit($sql, $from, $to);
}

    public function getWhere($field, $value) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE `$field`=:$field";
        return App::call()->db->queryObject($sql, ["$field"=>$value], $this->getEntityClass());
    }

    public function insert(DataEntity $entity) {
        $params = [];
        $columns = [];
        $tableName = $this->getTableName();
        //TODO переделать цикл по state чтобы избавиться от условия
        foreach ($entity as $key => $value) {
            if ($key === "id" || $key == 'db') continue;
            $params[":{$key}"] = $value;
            $columns[] = "`$key`";
        }
        $columns = implode(", ", $columns);
        $values = implode(", ", array_keys($params));

//INSERT INTO `products`(`id`, `name`, `description`, `price`) VALUES (:name, ,[value-4])

        $sql = "INSERT INTO {$tableName} ({$columns}) VALUES ($values);";

        App::call()->db->execute($sql, $params);
        $entity->id = App::call()->db->lastInsertId();
    }

    public function delete($entity) {
        $tableName = $this->getTableName();
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return App::call()->db->execute($sql, ['id' => $entity->id]);
    }


    public function update($entity) {
        $tableName = static::getTableName();

        $params = [];
        $alter = [];

        foreach ($entity as $key => $value) {
            if ($key == 'id' || $key == 'db') continue;

            $params[":{$key}"] = $value;
            $alter[] .= "`" . $key . "` = :" . $key;
        }
        $alter = implode(", ", $alter);
        $params[':id'] = $entity->id;

        $sql = "UPDATE `{$tableName}` SET {$alter} WHERE `id` = :id";

        App::call()->db->execute($sql, $params);
    }

    public function save($entity) {
        if (is_null($entity->id)) {
            $this->insert($entity);
        } else {
            $this->update($entity);
        }

    }

    public function getOne($id) {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return App::call()->db->queryObject($sql, ['id' => $id], static::class);
    }
    public function getAll() {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return App::call()->db->queryAll($sql);
    }

}