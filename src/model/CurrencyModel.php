<?php


namespace Wallet\model;


class CurrencyModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `Currency`";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $currency = new Currency($item['name']);
            $currency->setId($item['id']);
            array_push($arr,$currency);
        }
        return $arr;
    }

    public function getIdByName($name)
    {
        $sql = "SELECT id FROM `Currency` WHERE name = :name";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        $item = $stmt->fetch();
        return $item['id'];
    }

    public function getNameById($id)
    {
        $sql = "SELECT name FROM `Currency` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $item = $stmt->fetch();
        return $item['name'];
    }

}