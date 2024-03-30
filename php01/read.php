<?php
// #1 ファイルの読み込み
$f = fopen("data.csv", "r");
// #2 テーブルのHTMLを生成
echo "<table border='1'> <!-- 枠線を追加 -->
        <tr>
            <th>名前</th>
            <th>試合数</th>
            <th>安打数</th>
            <th>打数</th>
            <th>打率</th>
            <th>特徴</th>
            <th>名字（ローマ字）</th>
        </tr>";
// #3 csvのデータを配列に変換し、HTMLに埋め込んでいる
while($line = fgetcsv($f)) {
    echo "<tr>";
    // 打率の計算
    $atBats = intval($line[3]); // 打数
    $hits = intval($line[2]); // 安打数
    $battingAverage = $atBats > 0 ? number_format(($hits / $atBats), 3) : "-"; // 打率
    for ($i=0;$i<count($line);$i++) {
        if ($i == 4) { // 打率を特徴の前に挿入
            echo "<td>" . $battingAverage . "</td>";
        }
        echo "<td>" . $line[$i] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// #4 ファイルを閉じる
fclose($f);
?>