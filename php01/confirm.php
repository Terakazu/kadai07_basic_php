<?php require_once('data.php')?>

<!DOCTYPE html>
<html lang="jp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
    <link href='https://fonts.googleapis.com/css?family=Pacifico|Lato' rel='stylesheet' type='text/css'>
</head>
<body>
    <div class="order-wrapper">
    <h2>注文内容確認</h2>
    <?php $totalPayment = 0 ?>
    <?php foreach ($menus as $menu) : ?>
        <?php 
            $orderCount=$_POST[$menu->getName()];
            $menu->setOrderCount($orderCount);
            $totalPayment +=$menu->getTotalprice();
        ?>
        <p class="order-amount">  
            <?php echo $menu->getName() ?>
            ×
            <?php echo $orderCount ?>
            個
    </p>
    <p class="order-price"><?php echo $menu->getTotalprice()?>円</p>
 
    <?php endforeach ?>
    <h3>合計金額：<?php echo $totalPayment ?>円</h3>
    </div>  
</body>
</html>