<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sample.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.2.0/dist/chart.umd.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-adapter-date-fns/dist/chartjs-adapter-date-fns.bundle.min.js"></script>
    <title>中日ドラゴンズ選手名鑑</title>
    <style>
        body {
            text-align: center;
            background-color: #16b3eb ;
        }
    </style>
</head>

<body>
<header style="text-align: center;">
    <img src="./images/Chunichi_Dragons.png" style="width:50px;height:50px;">
    <h1>中日ドラゴンズ選手名鑑</h1>
</header>

    <h2>野手編</h2>
    <h3>選手紹介</h3>

<?php

//csvデータを一行ずつ読み込みhtmlとして書き出す。
//画像は、imagesフォルダに「選手名字 + .jpg」で保存している。 
//選手画像をクリックで、GETにてprev.phpにIDを渡す。

if (($handle = fopen("data.csv", "r")) !== FALSE) {
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {

echo <<<eof

<div style="display: inline-block; text-align: center; margin: 50px;">
<a href="prev.php?lastName={$data[5]}" style="width:200px; height:320px; object-fit: cover;">
<img src="images/{$data[5]}.jpg" width="200" height="320" style="object-fit: cover;">
</a>
<div>{$data[0]}</div>
</div>


eof;
    }
}

fclose($handle);

// data.csv の内容を配列として読み込む
$lines = file('data.csv', FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
// 各行を連想配列に変換する
$result = array_map('str_getcsv', $lines);
$JSON =json_encode($result);    

?>

<div id="playerList">
    <!-- JSONデータで生成される選手リスト -->
</div>

<!-- グラフを作成 -->
<h3>オープン戦安打数&打率グラフ</h3>
<div style="position: relative;">
    <canvas id="myChart"></canvas>
    <div style="position: absolute; bottom: 0; left: 0;"></div>
</div>

<script>
    const data = <?=$JSON?>;
    console.log(data);

</script>

<script>
    // 全員の名前を格納する配列を初期化
const names = [];
const hits  = [];
const atBats =[];

// 各要素から名前を取り出して配列に追加
for (let i = 0; i < data.length; i++) {
  names.push(data[i][0]);
  hits.push(data[i][2]);
  atBats.push(data[i][3]);
}

console.log(names);
console.log(hits);
console.log(atBats);

// 打率を計算する関数
const calculateBattingAverage = (hits, atBats) => {
    // 打数が0の場合は打率を0とする（ゼロ除算を防ぐ）
    if (atBats === 0) {
        return 0;
    }
    // 安打数を打数で割って打率を計算
    return hits / atBats;
};

// 各選手の打率を計算
const battingAverages = [];
for (let i = 0; i < hits.length; i++) {
    const battingAverage = calculateBattingAverage(hits[i], atBats[i]);
    battingAverages.push(battingAverage);
}

console.log(battingAverages);

        const data2 = {
            labels: names,
            datasets: [{
                label: '安打数',
                data: hits,
                backgroundColor: "rgba(0, 53, 149, 0.6)",     
                type: 'bar' // 折れ線グラフとして表示する
            },
            {
                label: '打率', // 新しいデータセットのラベル
                data: battingAverages, // battingAverages配列を使用
                borderColor: 'red', // 折れ線の色を指定
                fill: false, // 線を塗りつぶさないように設定
                type: 'line', // 折れ線グラフとして表示する
                yAxisID: 'y2', // y2軸を使用する
            }
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
                        beginAtZero: true
                    },
                    y2: {
                position: 'right', // 右側に配置する
                min: 0, // 最小値
                max: 1, // 最大値
                ticks: {
                    stepSize: 0.1 // 刻み幅
                },
                grid: {
                    display: false // グリッド線を非表示にする
                },
                scaleLabel: {
                    display: true,
                    fontColor: "red",
                    fontSize: 18,
                    labelString: '打率'
                }
            }
        },
    }
});
    </script>

</body>
</html>