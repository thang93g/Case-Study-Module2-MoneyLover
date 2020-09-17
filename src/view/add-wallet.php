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
<form method="post">
    <div class="container">
    <table class="table">
    <tr>
        <th colspan="2"><h1>Add a wallet!</h1></th>
    </tr>
        <tr>
            <th>Enter Wallet Name:</th>
            <td><input type="text" name="name" placeholder="Your wallet name?"></td>
        </tr>
        <tr>
            <th>Initial Balance:</th>
            <td><input type="number" name="money" placeholder="0"></td>
        </tr>
        <tr>
            <th>Currency:</th>
            <td><select name="currency">
                    <?php foreach ($currencies as $currency): ?>
                        <option><?php echo $currency->getName() ?></option>
                    <?php endforeach; ?>
                </select></td>
        </tr>
    <tr>
        <th><input type="submit" value="Submit"></th>
    </tr>
    </table>
</div>
</form>