
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
    <form method="post" action="index.php?page=search-transaction&wid=<?php echo $wallet['id'] ?>">
        <div style="color: white">From:</div><input type="date" name="from">
        <div style="color: white">To:</div><input type="date" name="to">
        <input class="btn btn-light" type="submit" value="Search">
    </form>
<table class="table table-striped">
    <thead>
    <tr>
        <th>No</th>
        <th>Date</th>
        <th>Money</th>
        <th>Category</th>
        <th>Note</th>
    </tr>
    </thead>
    <tbody>
    <?php if (empty($transactions)): ?>
        <tr>
            <td colspan="6">No Transaction</td>
        </tr>
    <?php else: ?>
        <?php foreach ($transactions as $key=>$transaction): ?>
            <tr>
                <td><?php echo ++$key?></td>
                <td><?php echo $transaction->getDate() ?></td>
                <?php if ($transaction->getType() == "In"): ?>
                    <td style="color: #00A000"><?php echo "+". $transaction->getMoney() ?></td>
                <?php else: ?>
                    <td style="color: red"><?php echo "-".$transaction->getMoney() ?></td>
                <?php endif; ?>
                <td><?php echo $transaction->getCategory() ?></td>
                <td><?php echo $transaction->getDescription() ?></td>
            </tr>
        <?php endforeach; ?>
    <?php endif; ?>
    </tbody>
</table>
<a class="btn btn-light" href="index.php?">Back</a>
</div>