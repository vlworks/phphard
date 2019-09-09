<?php

class Transport {
    public $name;
    public $fuelTank;
    public $currentFuel = 0;

    public function __construct($name, $fuelTank)
    {
        $this->name = $name;
        $this->fuelTank = $fuelTank;
    }

    public function fill($var = "full"){
        $this->who();
        if($var < 0){
            echo "<p>Укажите положительно число!</p>";
        } else {
            if($var === "full"){
                $this->currentFuel = $this->fuelTank;
            } else {
                if ($var <= $this->fuelTank){
                    $this->currentFuel = $var;
                } else {
                    $this->currentFuel = $this->fuelTank;
                    echo "<p>Максимальная вместимость бака {$this->fuelTank}.</p>";
                }
            }
            echo "<p>Топлива заправлено {$this->currentFuel} \ {$this->fuelTank}</p>";
        }

    }

    public function startEngine(){
        $this->who();
        if($this->currentFuel <= 0){
            echo "<p>Заправьте транспорт!</p>";
        } else {
            $this->engineComplite();
        }
    }

    private function who(){
        echo "<h4>Транспорт: {$this->name}</h4>";
    }
    protected function engineComplite(){
        echo "<p>Двигатель запущен!</p>";
    }
}

class Aircraft extends Transport {
    public $maxAltitude;

    public function __construct($name, $fuelTank, $maxAltitude)
    {
        parent::__construct($name, $fuelTank);
        $this->maxAltitude = $maxAltitude;
    }

    protected function engineComplite()
    {
        parent::engineComplite();
        echo "Взлетаем на высоту {$this->maxAltitude} метров.";
    }
}

class Car extends Transport {
    public $maxSpeeds; // у самолета тоже может быть такой показатель, но для примера сделал это уникальным свойством для класса машины

    public function __construct($name, $fuelTank, $maxSpeeds)
    {
        parent::__construct($name, $fuelTank);
        $this->maxSpeeds = $maxSpeeds;
    }

    protected function engineComplite()
    {
        parent::engineComplite();
        echo "Разгоняемся до {$this->maxSpeeds} км\ч";
    }
}

$transport1 = new Aircraft("Самолет1", 500, 10000);
$transport1->fill();
$transport1->startEngine();

$transport2 = new Car("Автомобиль1", 60, 150);
$transport2->startEngine();
$transport2->fill(25);
$transport2->startEngine();