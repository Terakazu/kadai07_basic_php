<?php
// datadata.csv の内容を配列として読み込む
$lines = file('data2.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// 各行を連想配列に変換する
$result = array_map('str_getcsv', $lines);
$JSON=json_encode($result);

// 3番目の要素をカウントするための連想配列を初期化
$countArray = array();
// 4番目の要素を表示するための連想配列を初期化
$elementArray = array();

// 各要素の3番目と4番目を取り出してカウントおよび表示
foreach ($result as $item) {
    // 3番目の要素を取得
    $name = $item[3];
    // 4番目の要素を取得
    $element = $item[4];
    
    
    // 3番目の要素をカウントするための配列に要素が存在するかチェックし、存在する場合はカウントを増やす
    if (isset($countArray[$name])) {
        $countArray[$name]++;
    } else {
        // 存在しない場合は、カウントを1として新たに追加
        $countArray[$name] = 1;
    }

    // 4番目の要素を表示するための配列に追加
    $elementArray[$name][] = $element;
}

// 各要素の3番目のカウントを出力
foreach ($countArray as $name => $count) {
    // echo "$name の投票数: $count 票<br>";
}

// 各要素の4番目の要素を出力
foreach ($elementArray as $name => $elements) {
    // echo "<br>$name の4番目の要素:<br>";
    foreach ($elements as $element) {
        // echo "$element<br>";
    }
    // echo "<br>";
}
?>


<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sample.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <title>中日ドラゴンズファンサイト</title>
    <style>
        body {
            text-align: center;
            background-color: #16b3eb ;
        }
    </style>
</head>

<body>
<header style="text-align: center;">
    <img src="./images/Chunichi_Dragons.png" style="width:50px;height:50px;margin: 0 auto;">
    <h1>ファン投票結果発表</h1>
</header>
   
<div class="wrap-container">
    <div class="playerlist">
        <img class="playimg" src="images/hosokawa.jpg">
        <p>細川成也</p>
        <p><?php echo "投票数: " . $countArray['細川成也']; ?> 票</p>
    <div class="comment">
    <?php
    // $elementArray から細川成也のコメントと0番目の要素を取得し、表示する
    $comments = $elementArray['細川成也'];
    foreach ($comments as $comment) {
        echo "<p>●$comment</p>";
    }
    ?>
    </div>
</div>

    <div class="playerlist">   
        <img class="playimg" src="images/okabayashi.jpg">
        <p>岡林勇希</p>
        <p><?php echo "投票数: " . $countArray['岡林勇希']; ?> 票</p>
        <div class="comment">
    <?php
    $comments = $elementArray['岡林勇希'];
    foreach ($comments as $comment) {
        echo "<p>●$comment</p>";
    }
    ?>
    </div>
    </div>

    <div class="playerlist">
        <img class="playimg" src="images/ishikawa.jpg">
        <p>石川昴弥</p>
        <p><?php echo "投票数: " . $countArray['石川昴弥']; ?> 票</p>
        <div class="comment">
    <?php
    $comments = $elementArray['石川昴弥'];
    foreach ($comments as $comment) {
        echo "<p>●$comment</p>";
    }
    ?>
    </div>
    </div>

    <div class="playerlist">
        <img class="playimg" src="images/viciedo.jpg">
        <p>ビシエド</p>
        <p><?php echo "投票数: " . $countArray['ビシエド']; ?> 票</p>
        <div class="comment">
    <?php
    $comments = $elementArray['ビシエド'];
    foreach ($comments as $comment) {
        echo "<p>●$comment</p>";
    }
    ?>
    </div>
    </div>

    <div class="playerlist">
        <img class="playimg" src="images/doala.jpg">
        <p>ドアラ</p>
        <p><?php echo "投票数: " . $countArray['ドアラ']; ?> 票</p>
        <div class="comment">
    <?php
    $comments = $elementArray['ドアラ'];
    foreach ($comments as $comment) {
        echo "<p>●$comment</p>";
    }
    ?>
    </div>
    </div>
</div>

<div class="btn-wrapper2">
      <a href="index4.php" class="btn_back2">投票に戻る</a>
  </div>

  <!-- グラフを作成 -->
<div class="chart">
<h3>得票数グラフ</h3>
<div style="position: relative;">
    <canvas id="myChart"></canvas>
    <div style="position: absolute; bottom: 0; left: 0;"></div>
</div>
</div>


<script>
const data = <?=$JSON?>;

// 表示する選手の名前のリスト
const playerNamesInOrder = ['細川成也', '岡林勇希', '石川昴弥', 'ビシエド', 'ドアラ'];

// 指定された選手の名前に関連するデータのみをフィルタリング
const filteredData = data.filter(item => playerNamesInOrder.includes(item[3]));

// 各選手の名前をカウントする
const playerNameCounts = {};
for (let i = 0; i < filteredData.length; i++) {
    const playerName = filteredData[i][3];
    if (playerNameCounts[playerName]) {
        playerNameCounts[playerName]++;
    } else {
        playerNameCounts[playerName] = 1;
    }
}

// 指定された順序で選手の名前と対応するカウントを配列に格納する
const countsInOrder = [];
for (let playerName of playerNamesInOrder) {
    countsInOrder.push(playerNameCounts[playerName] || 0);
}

console.log(countsInOrder);



        const data2 = {
            labels: playerNamesInOrder,
            datasets: [{
                label: '投票数',
                data: playerNameCounts,
                backgroundColor: "rgba(0, 53, 149, 0.6)",     
                type: 'bar' 
            },
            ]
        };

        const ctx = document.getElementById('myChart').getContext('2d');
const myChart = new Chart(ctx, {
    data: data2,
    options: {
        title: {                           // タイトル
            display: true,                     // 表示設定
            fontSize: 18,                      // フォントサイズ
            fontFamily: "sans-serif",
            text: '安打数と打率'                   // タイトルのラベル
        },
        scales: {
            x: {
                ticks: {
                    font: {
                        family: 'Arial', // フォントファミリーをArialに設定
                        size: 18,        // フォントサイズを14に設定
                        style: 'normal', // フォントスタイルをnormalに設定
                        weight: 'bold' // フォントのウェイトをnormalに設定
                    }
                },
                scaleLabel: {                 // 軸ラベル
                    display: true,                // 表示設定
                    fontColor: "black",             // 文字の色
                    fontSize: 40,                 // フォントサイズ
                },
            },
            y: {
                beginAtZero: true,
                max:20
            },
       
        }
    }
});

    </script>

</body>
</html>

</body>
</html>


