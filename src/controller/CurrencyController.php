<?php


namespace Wallet\controller;


use Wallet\model\CurrencyModel;

class CurrencyController
{
    protected $currencyModel;

    public function __construct()
    {
        $this->currencyModel = new CurrencyModel();
    }

}