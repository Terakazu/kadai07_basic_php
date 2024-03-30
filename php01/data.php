<?php 
require_once'menu.php';

$towel   = new Menu('選手名入りタオル',1000,'images/towel.jpg');
$uniform = new Menu('レプリカユニフォーム',13000,'images/uniform.jpg');
$cap     = new Menu('キャップ',3300,'images/cap.jpg');
$bat     = new Menu('マスコットバット',700,'images/bat.jpg');

// タオルを2個注文と仮定
$towel->setOrderCount(2);

$menus =array ($towel,$uniform,$cap,$bat);



?>