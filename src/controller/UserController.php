<?php


namespace Wallet\controller;


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
}