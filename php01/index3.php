<?php require_once('data.php') ?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="css/stylesheet.css">
</head>
<body>
    <div class="menu-wrapper container">
        <h1 class="logo">Dragons online shop</h1>
        <form action="confirm.php" method="post">
        <div class="menu-items">
            <?php foreach ($menus as $menu):?>
            <div class="menu-item">
            <img src="<?php echo $menu->getImage() ?>">        
            <h3 class="menu-item-name"><?php echo $menu->getName() ?></h3>
            <p class="price"><?php echo $menu->getTaxIncludedPrice().'円（税込）' ?></p>
            <input type="type" value="0" name="<?php echo $menu->getName() ?>">
            <span>個</span>
            </div>
            <?php endforeach?>    
        </div>
        <input type="submit" value="注文する"> 
        </form>
       
    </div>
</body>
</html>