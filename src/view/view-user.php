
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
    <table class="table">
        <tr>
            <th>Username:</th>
            <td><?php echo $user->getUsername() ?></td>
        </tr>
        <tr>
            <th>Create Date:</th>
            <td><?php echo $user->getCreateDate() ?></td>
        </tr>
        <tr>
            <td><a href="index.php?page=change-password">Change password?</a> </td>
        </tr>
    </table>
    <a class="btn btn-light" href="index.php">Back</a>
</div>