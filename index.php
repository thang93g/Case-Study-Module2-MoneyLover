<?php
session_start();
require __DIR__ . "/vendor/autoload.php";
$auth = new \Wallet\mid\Auth();
$auth->isLogin();

$walletController = new \Wallet\controller\WalletController();
$transactionController = new \Wallet\controller\TransactionController();
$categoryController = new \Wallet\controller\CategoryController();
$userController = new \Wallet\controller\UserController();
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css"
          integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</head>
<body>
<?php
$page = isset($_REQUEST["page"]) ? $_REQUEST["page"] : NULL;
switch ($page) {
    case "add-wallet":
        $walletController->add();
        break;
    case "show-transaction":
        $transactionController->show();
        break;
    case "add-transaction":
        $transactionController->add();
        break;
    case "view-wallet":
        $walletController->view();
        break;
    case "edit-wallet":
        $walletController->edit();
        break;
    case "delete-wallet":
        $walletController->delete();
        break;
    case "search-transaction":
        $transactionController->search();
        break;
    case "search-wallet":
        $walletController->search();
        break;
    case "log-out":
        $userController->logOut();
        break;
    case "view-user":
        $userController->view();
        break;
    case "change-password":
        $userController->changePassword();
        break;
    case "create-user":
        $userController->create();
        break;
    default:
        $walletController->show();
}
?>
</body>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
        crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"
        integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN"
        crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"
        integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV"
        crossorigin="anonymous"></script>
</html>
