<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>送信画面</title>
</head>
<body>
    <form action="write.php" method="post">
        名前  ：<input type="text" name="name"><br>
        試合数：<input type="number" name="matchCount"><br>
        安打  :<input type="number" name="hit"><br>
        打数  :<input type="number" name="atbat"><br>
        特徴  :<textarea name="memo" cors ="30" rows="10"></textarea><br>
        名字  :<input type="text" name="lastName"><br>
        <button type="submit">送信</button>
    </form>
    
</body>
</html>