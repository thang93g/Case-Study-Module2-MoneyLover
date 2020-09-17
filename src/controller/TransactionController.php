<?php


namespace Wallet\controller;


use Wallet\model\CategoryModel;
use Wallet\model\Transaction;
use Wallet\model\TransactionModel;
use Wallet\model\WalletModel;

class TransactionController
{
    protected $transactionModel;
    protected $categoryModel;
    protected $walletModel;

    public function __construct()
    {
        $this->transactionModel = new TransactionModel();
        $this->categoryModel = new CategoryModel();
        $this->walletModel = new WalletModel();
    }

    public function show()
    {
        $id = $_REQUEST['wid'];
        $wallet = $this->walletModel->getWalletById($id);
        $transactions = $this->transactionModel->getAll($id);
        include_once "src/view/show-transaction.php";
    }

    public function add()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            $categories = $this->categoryModel->getAll();
            include_once "src/view/add-transaction.php";
        } else {
            $id = $_REQUEST['wid'];
            $money = $_REQUEST['money'];
            $description = $_REQUEST['description'] == "" ? "No description" : $_REQUEST['description'];
            $category = $this->categoryModel->getIdByName($_REQUEST['category']);
            $date = date("yy/m/d");
            $wm = $this->walletModel->getMoneyById($id);
            $type = $this->categoryModel->getTypeById($category);
            $balance = $type == "In" ? $wm + $money : $wm - $money;
            $transaction = new Transaction($money, $date, $category, $description, $type, $id);
            $this->transactionModel->add($balance, $transaction);
            header("location:index.php");
        }
    }

    public function search()
    {
        if ($_SERVER['REQUEST_METHOD'] == "POST") {
            $id = $_REQUEST['wid'];
            $wallet = $this->walletModel->getWalletById($id);
            $from = $_REQUEST['from'];
            $to = $_REQUEST['to'];
            $transactions = $this->transactionModel->search($id, $from, $to);
            include_once "src/view/show-transaction.php";
        }
    }
}