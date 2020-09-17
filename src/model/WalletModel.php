<?php


namespace Wallet\model;


class WalletModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `wallets` ORDER BY id";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $wallet = new Wallet($item['name'],$item['money'],$item['currency_id'],$item['create_date']);
            $wallet->setId($item['id']);
            array_push($arr,$wallet);
        }
        return $arr;
    }

    public function addWallet($wallet)
    {
        $sql = "INSERT INTO `wallets`( `name`, `money`, `currency_id`,`create_date`) VALUES (:name,:money,:currency_id,:create_date)";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$wallet->getName());
        $stmt->bindParam(":money",$wallet->getMoney());
        $stmt->bindParam(":currency_id",$wallet->getCurrency_id());
        $stmt->bindParam(":create_date",$wallet->getCreateDate());
        $stmt->execute();
    }

    public function getMoneyById($id)
    {
        $sql = "SELECT money FROM wallets WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['money'];
    }

    public function getWalletById($id)
    {
        $sql = "SELECT * FROM `wallets` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        return $stmt->fetch();
    }

    public function edit($wallet)
    {
        $sql = "UPDATE `wallets` SET `name`= :name,`money`= :money WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$wallet->getName());
        $stmt->bindParam(":money",$wallet->getMoney());
        $stmt->bindParam(":id",$wallet->getId());
        $stmt->execute();
    }

    public function delete($id)
    {
        $sql = "DELETE FROM `transactions` WHERE wallet_id = :id;
                DELETE FROM `wallets` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
    }

    public function getMoneyTransaction($input,$id)
    {
        $sql = "SELECT SUM(transactions.money)
                FROM transactions
                INNER JOIN categories
                ON categories.id = transactions.category
                WHERE transactions.wallet_id = :id
                AND categories.type = :out";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":out",$input);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['SUM(transactions.money)'];
    }

    public function search($key)
    {
        $sql = "SELECT * FROM `wallets` WHERE name LIKE :key";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":key",$key);
        $stmt->execute();
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $wallet = new Wallet($item['name'],$item['money'],$item['currency_id'],$item['create_date']);
            $wallet->setId($item['id']);
            array_push($arr,$wallet);
        }
        return $arr;
    }
}