<?php


namespace app\models;


class News extends Model
{

    public $id;
    public $description;
    public $text;
    public $author;
    public $date;

    public function getTableName()
    {
        return 'news';
    }

}