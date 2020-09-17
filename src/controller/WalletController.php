<?php

namespace Wallet\controller;

use Wallet\model\CurrencyModel;
use Wallet\model\TransactionModel;
use Wallet\model\Wallet;
use Wallet\model\WalletModel;

class WalletController
{
    protected $walletModel;
    protected $currencyModel;
    protected $transactionModel;

    public function __construct()
    {
        $this->walletModel = new WalletModel();
        $this->currencyModel = new CurrencyModel();
        $this->transactionModel = new TransactionModel();
    }

    public function show()
    {
        $wallets = $this->walletModel->getAll();
        $currencies = $this->currencyModel->getAll();
        include_once "src/view/show-wallet.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $currencies = $this->currencyModel->getAll();
            include_once "src/view/add-wallet.php";
        } else {
            $name = $_REQUEST['name'];
            $currency = $this->currencyModel->getIdByName($_REQUEST['currency']);
            $money = $_REQUEST['money'];
            $createDate = date("yy/m/d");
            $wallet = new Wallet($name, $money, $currency, $createDate);
            $this->walletModel->addWallet($wallet);
            header("location:index.php");
        }
    }

    public function view()
    {
            $id = $_REQUEST['id'];
            $wallet = $this->walletModel->getWalletById($id);
            $moneyIn = $this->walletModel->getMoneyTransaction("In",$id);
            $moneyOut = $this->walletModel->getMoneyTransaction("Out",$id);
            $currency = $this->currencyModel->getNameById($wallet['currency_id']);
            include_once "src/view/view-wallet.php";
    }

    public function edit()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET"){
            $id = $_REQUEST['id'];
            $wallet = $this->walletModel->getWalletById($id);
            include_once "src/view/edit-wallet.php";
        } else {
            $id = $_REQUEST['id'];
            $wallet = $this->walletModel->getWalletById($id);
            $name = $_REQUEST['name'];
            $money = $_REQUEST['money'];
            $wl = new Wallet($name,$money,$wallet['currency_id'],$wallet['create_date']);
            $wl->setId($id);
            $this->walletModel->edit($wl);
            header("location:index.php");
        }
    }

    public function delete()
    {
        $id = $_REQUEST['id'];
        $this->walletModel->delete($id);
        header("location:index.php");
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST"){
            $search = "%".$_REQUEST['search']."%";
            $wallets = $this->walletModel->search($search);
            $currencies = $this->currencyModel->getAll();
            include_once "src/view/show-wallet.php";
        }
    }
}