<?php


namespace Wallet\model;


class Transaction
{
    protected $id;
    protected $money;
    protected $date;
    protected $category;
    protected $description;
    protected $type;
    protected $wallet_id;


    public function __construct($money, $date, $category, $description,$type,$wallet_id)
    {
        $this->money = $money;
        $this->date = $date;
        $this->category = $category;
        $this->description = $description;
        $this->type = $type;
        $this->wallet_id = $wallet_id;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type): void
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getWalletId()
    {
        return $this->wallet_id;
    }

    /**
     * @param mixed $wallet_id
     */
    public function setWalletId($wallet_id): void
    {
        $this->wallet_id = $wallet_id;
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
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date): void
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category): void
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * @param mixed $description
     */
    public function setDescription($description): void
    {
        $this->description = $description;
    }


}