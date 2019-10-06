<?php


namespace app\models\entities;


class Order extends DataEntity
{
    public $id;
    public $name;
    public $phone;
    public $adres;
    public $session_id;
    public $status;

    /**
     * Order constructor.
     * @param $name
     * @param $phone
     * @param $adres
     * @param $status
     */
    public function __construct($name, $phone, $adres, $session_id, $status = null)
    {
        $this->name = $name;
        $this->phone = $phone;
        $this->adres = $adres;
        $this->session_id = $session_id;
        $this->status = $status;
    }


}