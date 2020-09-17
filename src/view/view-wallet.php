
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
<table class="table">
    <tr>
        <th colspan="3">Wallet details</th>
        <td><a href="index.php?page=edit-wallet&id=<?php echo $wallet['id'] ?>">Edit</a></td>
        <td><a href="index.php?page=delete-wallet&id=<?php echo $wallet['id'] ?>">Delete</a></td>
    </tr>
    <tr>
        <th rowspan="2"><img height="50" width="50" src="image/icon.png"></th>
        <td><?php echo $wallet['name'] ?></td>
    </tr>
    <tr>
        <td><?php echo $currency ?></td>
    </tr>
    <tr>
        <th>User</th>
        <td>ten user</td>
    </tr>
    <tr>
        <th>Inflow</th>
        <td style="color: #00A000"><?php if ($moneyIn !== null) echo"+". $moneyIn; else echo "0" ?></td>
    </tr>
    <tr>
        <th>Outflow</th>
        <td style="color: red"><?php if ($moneyOut !== null) echo "-". $moneyOut; else echo "0" ?></td>
    </tr>
    <tr>
        <th>Create Date</th>
        <td><?php echo $wallet['create_date'] ?></td>
    </tr>
</table>
<a class="btn btn-light" href="index.php">Back</a>