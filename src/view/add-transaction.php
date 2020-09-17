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
    <table class="table">
        <tr>
            <th>Money:</th>
            <td><input type="number" name="money"></td>
        </tr>
        <tr>
            <th>Category</th>
            <td>
                <select name="category">
                <?php foreach ($categories as $category): ?>
                        <option><?php echo $category->getName() ?></option>
                <?php endforeach; ?>
                </select>
            </td>
        </tr>
        <tr>
            <th>Note</th>
            <td><input type="text" name="description"></td>
        </tr>
        <tr>
            <td><input type="submit" value="Submit"></td>
            <td><input type="button" value="Cancel" href="index.php"></td>
        </tr>
    </table>
</form>