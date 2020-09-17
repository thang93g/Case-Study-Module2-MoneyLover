<?php


namespace Wallet\model;


class CategoryModel
{
    protected $database;

    public function __construct()
    {
        $db = new DBConnect();
        $this->database = $db->connect();
    }

    public function getAll()
    {
        $sql = "SELECT * FROM `categories` ORDER BY id";
        $stmt = $this->database->query($sql);
        $data = $stmt->fetchAll();
        $arr = [];
        foreach ($data as $item){
            $category = new Category($item['name'],$item['type']);
            $category->setId($item['id']);
            array_push($arr,$category);
        }
        return $arr;
    }

    public function getIdByName($name)
    {
        $sql = "SELECT id FROM `categories` WHERE name = :name";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":name",$name);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['id'];
    }

    public function getTypeById($id)
    {
        $sql = "SELECT type FROM `categories` WHERE id = :id";
        $stmt = $this->database->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->execute();
        $data = $stmt->fetch();
        return $data['type'];
    }
}