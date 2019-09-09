<?php

class Article {
    public static $id = 0;
    public $title;
    public $text;
    public $author;

    public function __construct($title = null, $text = null, $author = null)
    {
        $this->title = $title;
        $this->text = $text;
        $this->author = $author;
    }

    public function display(){
        echo $this->getTitle()
            . $this->getText()
            . $this->getAuthor()
            . $this->getId();
    }

    private function getTitle(){
        return "<h1>{$this->title}</h1>";
    }
    private function getText(){
        return "<p>{$this->text}</p>";
    }
    private function getAuthor(){
        return "<p>{$this->author}</p>";
    }
    private function getId(){
        return "<small>Статья №" . ++static::$id . "</small><br>";
    }

}

class News extends Article {
    public $date;

    public function __construct($title = null, $text = null, $author = null, $date = null)
    {
        parent::__construct($title, $text, $author);
        $this->date = $date;
    }

    public function display()
    {
        parent::display();
        echo $this->getDate();
    }

    private function getDate(){
        return "<small>Дата создания статьи: {$this->date}</small>";
    }
}


$article1 = new Article("Заголовок 1", "Текст 1 Текст 1 Текст 1 Текст 1 Текст 1", "Иванов");
$article2 = new Article("Заголовок 2", "Текст 2 Текст 2 Текст 2 Текст 2 Текст 2", "Петров");
$article3 = new Article("Заголовок 3", "Текст 3 Текст 3 Текст 3 Текст 3 Текст 3", "Сидоров");
$news1 = new News("Заголовок новости 1", "Текст новости 1", "Николаев", date("Y-m-d"));
$news2 = new News("Заголовок новости 2", "Текст новости 2", "Смирнов", date("Y-m-d"));

$article1->display();
$article2->display();
$article3->display();
$news1->display();
$news2->display();