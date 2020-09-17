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
<div class="container">
<form method="post">
    <h1 style="color: white">Edit wallet</h1>
    <table class="table">
        <tr>
            <th>Wallet name</th>
            <td><input type="text" name="name" value="<?php echo $wallet['name'] ?>"></td>
        </tr>
        <tr>
            <th>Initial balance</th>
            <td><input type="number" name="money" value="<?php echo $wallet['money'] ?>"></td>
        </tr>
        <tr>
            <td><input class="btn btn-success" type="submit" value="Submit"></td>
            <td><a class="btn btn-secondary" href="index.php">Cancel</a> </td>
        </tr>
    </table>
</form>
</div>