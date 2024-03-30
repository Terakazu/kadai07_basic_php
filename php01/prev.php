<?php
    //lastNameをGETで取得する
    if (isset($_GET["lastName"])) {
        $lastName = $_GET["lastName"];

    //csvデータを読み込み、lastNameが一致したらそのデータを配列で表示
    //csvには名前、試合数、安打数、打数、特徴、名字の順番で入っている
    if (($handle = fopen("data.csv", "r")) !== FALSE) {
        while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

    if($lastName == $data[5]){
        $name=$data[0];
        $images="images/$data[5].jpg";
        $hits=$data[2];
        $atBats=$data[3];
        $feature=$data[4];
        $matches=$data[1];
        $number=$data[6];

        // 打率を計算する
        $battingAverage = $data[2] / $data[3];
        // 打率を小数点第三位までにフォーマットする 
        $formattedBattingAverage = number_format($battingAverage, 3);

                break;
            }
        }
        fclose($handle);
    }
} else {
    echo "No player selected!";
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/sample.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <title>選手詳細データ</title>
    <style>
        body {
            background-color: #16b3eb;
        }
        .container {
            display: flex;
        }
        .resultSpace {
            width: 600px;
        }
    </style>
</head>
<body>
<header>
    <h1 class="heading">
    <span style="color:white;"><?=$number?></span>   <?=$name?>
    </h1>
</header>
 
    <div class="container">
        <div class="resultSpace">
       
            <p><2024オープン戦成績></p><br>
            <p>■試合数：<span id="matches"><?=$matches?></span></p>
            <p>■打数：<span id="atBats"><?=$atBats?></span></p>
            <p>■安打数：<span id="hits"><?=$hits?></span></p>
            <p>■打率：<span id="battingAverage"><?=$formattedBattingAverage?></span></p>
            <p>■一言：<span id="feature"><?=$feature?></span></p>
        </div> 
        <img  class ="playerImage" src="<?=$images?>" alt="player image">
    </div>

    <div class="btn-wrapper2">
      <a href="read2.php" class="btn_back">一覧に戻る</a>
      <a href="index3.php" class="btn">ドラゴンズ<br>オンラインショップ</a>
  </div>
</body>
</html>