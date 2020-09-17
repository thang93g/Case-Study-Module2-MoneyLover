<?php


namespace Wallet\model;


class TransactionModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll($id)
    {
        $sql = "SELECT a.money,a.date,categories.name,a.description,categories.type,a.wallet_id
                FROM `transactions` AS a
                INNER JOIN categories
                ON a.category = categories.id
                WHERE wallet_id = :id
                ORDER BY a.id DESC";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id", $id);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item) {
            $transaction = new Transaction($item['money'], $item['date'], $item['name'], $item['description'], $item['type'], $item['wallet_id']);
            $transaction->setId($item['id']);
            array_push($arr, $transaction);
        }
        return $arr;
    }

    public function add($balance, $transaction)
    {
        $sql = "INSERT INTO `transactions`( `money`, `date`, `category`, `description`, `wallet_id`) VALUES (:money,:date,:category,:description,:wallet_id);
                UPDATE `wallets` SET `money`= :balance  WHERE id = :wallet_id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":money", $transaction->getMoney());
        $stmt->bindParam(":date", $transaction->getDate());
        $stmt->bindParam(":balance", $balance);
        $stmt->bindParam(":category", $transaction->getCategory());
        $stmt->bindParam(":description", $transaction->getDescription());
        $stmt->bindParam(":wallet_id", $transaction->getWalletId());
        $stmt->execute();
    }

    public function edit($transaction)
    {
        $sql = "UPDATE `transactions` SET `money`=:money,`date`=:date,`category`=:category,`description`=:description WHERE wallet_id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name", $transaction->getName());
    }

    public function search($id,$from,$to)
    {
        $sql = "SELECT a.money,a.date,categories.name,a.description,categories.type,a.wallet_id
                FROM `transactions` AS a 
                INNER JOIN categories
                ON categories.id = a.category
                WHERE :from <= date AND date <= :to AND wallet_id = :id
                ORDER BY a.id DESC";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":from",$from);
        $stmt->bindParam(":to",$to);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $data =  $stmt->fetchAll();
        $array = [];
        foreach ($data as $item){
            $transaction = new Transaction($item['money'], $item['date'], $item['category'], $item['description'], $item['type'], $item['wallet_id']);
            $transaction->setId($item['id']);
            array_push($array, $transaction);
        }
        return $array;
    }
}