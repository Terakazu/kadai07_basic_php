


<?php
$name       = $_POST["name"];
$matchCount = $_POST["matchCount"];
$hit        = $_POST["hit"];
$atbat      = $_POST["atbat"];
$memo       = $_POST["memo"];
$lastName   = $_POST["lastName"];
$c      =",";
$str    =$name.$c.$matchCount.$c.$hit.$c.$atbat.$c.$memo.$c.$lastName;

$file   =fopen("data.csv","a");
fwrite($file,$str."\n");
fclose($file);

header("Location: index.php" );
exit;

?>

// //文字作成
// $str = date("Y-m-d H:i:s");
// //File書き込み
// $file = fopen("data/data.txt","a");	// ファイル読み込み
// fwrite($file, $str."\n");
// fclose($file);
// ?>


<html>
<head>
<meta charset="utf-8">
<title>File書き込み</title>
</head>
<body>

<h1>書き込みしました。</h1>
<h2>./data/data.txt を確認しましょう！</h2>

<ul>
<li><a href="input.php">戻る</a></li>
</ul>
</body>
</html>