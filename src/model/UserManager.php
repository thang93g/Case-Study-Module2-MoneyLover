<?php


namespace Wallet\model;


class UserManager
{
    protected $databaseUser;

    public function __construct()
    {
        $db = new DBConnect();
        $this->databaseUser = $db->connect();
    }

    function getUser($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username AND password = :password";
        $statement = $this->databaseUser->prepare($sql);
        $statement->bindParam(':username', $username);
        $statement->bindParam(':password', $password);
        $statement->execute();
        return $statement->fetch();
    }

    public function changePassword($id,$password)
    {
        $sql = "UPDATE `users` SET `password`=:password WHERE id = :id";
        $stmt = $this->databaseUser->prepare($sql);
        $stmt->bindParam(":id",$id);
        $stmt->bindParam(":password",$password);
        $stmt->execute();
    }

}