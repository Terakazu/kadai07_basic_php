<?php
// #1 ファイルの読み込み
$f = fopen("data2.csv", "r");
// #2 テーブルのHTMLを生成
echo "<table border='1'> <!-- 枠線を追加 -->
        <tr>
            <th>名前</th>
            <th>Email</th>
            <th>年齢</th>
            <th>好きな選手</th>
            <th>理由</th>
        </tr>";
// #3 csvのデータを配列に変換し、HTMLに埋め込んでいる
while($line = fgetcsv($f)) {
    echo "<tr>";
    // 打率の計算

    for ($i=0;$i<count($line);$i++) {
        echo "<td>" . $line[$i] . "</td>";
    }
    echo "</tr>";
}
echo "</table>";

// #4 ファイルを閉じる
fclose($f);
?>