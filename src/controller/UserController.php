<?php


namespace Wallet\controller;


use Wallet\model\User;
use Wallet\model\UserManager;

class UserController
{
    protected $userManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
    }

    function login($username, $password)
    {
        $result = $this->userManager->getUser($username, $password);
        if (is_array($result)) {
            $_SESSION['isLogin'] = true;
            $_SESSION['userLogin'] = $result;
            $_SESSION['username'] = $username;
            $_SESSION['password'] = $password;
            header('location:../../../index.php');
        } else {
            echo "Try again!!";
            header('location:loginFail.php');
        }
    }

    function logOut()
    {
        session_destroy();
        header('location:index.php');
    }

    public function view()
    {
        $username = $_SESSION['username'];
        $password = $_SESSION['password'];
        $item = $this->userManager->getUser($username,$password);
        $user = new User($username,$password);
        $user->setCreateDate($item['create_date']);
        include_once "src/view/view-user.php";
    }

    public function changePassword()
    {
        if ($_SERVER['REQUEST_METHOD'] == "GET") {
            include_once "src/view/change-password.php";
        } else {
            $username = $_SESSION['username'];
            $password = $_SESSION['password'];
            $newPass = $_REQUEST['password'];
            $user = $this->userManager->getUser($username,$password);
            $this->userManager->changePassword($user['id'],$newPass);
            header("location:index.php?page=log-out");
        }
    }

}