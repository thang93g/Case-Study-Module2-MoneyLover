<?php


namespace Wallet\model;


class Wallet
{
    protected $id;
    protected $name;
    protected $money;
    protected $currency_id;
    protected $create_date;

    /**
     * Wallet constructor.
     * @param $name
     * @param $money
     * @param $currency_id
     * @param $create_date
     */
    public function __construct($name, $money, $currency_id, $create_date)
    {
        $this->name = $name;
        $this->money = $money;
        $this->currency_id = $currency_id;
        $this->create_date = $create_date;
    }

    /**
     * @return mixed
     */
    public function getCreateDate()
    {
        return $this->create_date;
    }

    /**
     * @param mixed $create_date
     */
    public function setCreateDate($create_date): void
    {
        $this->create_date = $create_date;
    }


    public function getCurrency_id()
    {
        return $this->currency_id;
    }

    public function setCurrency_id($currency): void
    {
        $this->currency_id = $currency;
    }

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param mixed $id
     */
    public function setId($id): void
    {
        $this->id = $id;
    }

    /**
     * @return mixed
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param mixed $name
     */
    public function setName($name): void
    {
        $this->name = $name;
    }

    /**
     * @return mixed
     */
    public function getMoney()
    {
        return $this->money;
    }

    /**
     * @param mixed $money
     */
    public function setMoney($money): void
    {
        $this->money = $money;
    }


}