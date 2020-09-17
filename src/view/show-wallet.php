<style>
    body{
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;    }
    table{
        background-color: white;
    }
</style>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<style>
    body{
        background-image: url('http://getwallpapers.com/wallpaper/full/a/5/d/544750.jpg');
        background-size: cover;
        background-repeat: no-repeat;
        height: 100%;
        font-family: 'Numans', sans-serif;    }
    table{
        background-color: white;
    }
</style>
<body>
<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#">MoneyLover</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php?page=view-user">My Account <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item active">
                <a class="nav-link" href="index.php?page=show-wallet">My Wallets</a>
            </li>
            <li class="nav-item ">
                <a class="nav-link" href="index.php?page=add-wallet">Add a wallet</a>
            </li>
            <li class="nav-item">
                <a class="nav-link " href="index.php?page=log-out" >Log out</a>
            </li>
        </ul>
        <form class="form-inline my-2 my-lg-0" method="post" action="index.php?page=search-wallet">
            <input name="search" class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
        </form>
    </div>
</nav>
<table class="table table-sm">
    <tbody>
    <?php if (empty($wallets)): ?>
        <tr>
            <td><a href="index.php?page=add-wallet">Add a wallet first!</a></td>
        </tr>
    <?php else: ?>
        <?php foreach ($wallets as $wallet): ?>
            <tr>
                <td scope="row"><img src="image/icon.png" height="30" width="30"></td>
                <td width="300px"><a href="index.php?page=view-wallet&id=<?php echo $wallet->getId() ?>"><?php echo $wallet->getName() ?></a> </td>
                <td><?php echo $wallet->getMoney() + $sum ?></td>
                <td width="500px"><?php foreach ($currencies as $currency) {
                        if ($wallet->getCurrency_id() == $currency->getId())
                            echo $currency->getName();
                    }
                    ?>
                </td>
                <td width="200px"><a class="btn btn-outline-primary" href="index.php?page=show-transaction&wid=<?php echo $wallet->getId() ?>">View transactions</a>
                </td>
                <td><a class="btn btn-outline-success" href="index.php?page=add-transaction&wid=<?php echo $wallet->getId() ?>">Add transaction</a></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
</body>
</html>