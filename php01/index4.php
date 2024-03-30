<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/sample.css">
    <title>中日ドラゴンズファン投票</title>
</head>
<body>
<header>
    <img src="./images/Chunichi_Dragons.png">
    <h1>ドラゴンズファン投票</h1>
</header>
    
    <h2>選手プロフィール</h2>
    <p>※写真を押すとプロフィールが見られるよ！</p>
   
   <div class="wrap-container">
       <div class="playerlist">
           <a href="prev.php?lastName=hosokawa">
           <img class="playimg" src="images/hosokawa.jpg">
           </a>
           <p>細川成也</p>
       </div>
   
       <div class="playerlist">
           <a href="prev.php?lastName=okabayashi">
           <img class="playimg" src="images/okabayashi.jpg">
           </a>
           <p>岡林勇希</p>
       </div>
   
       <div class="playerlist">
           <a href="prev.php?lastName=ishikawa">
           <img class="playimg" src="images/ishikawa.jpg">
           </a>
           <p>石川昴弥</p>
       </div>
   
       <div class="playerlist">
           <a href="prev.php?lastName=viciedo">
           <img class="playimg" src="images/viciedo.jpg">
           </a>
           <p>ビシエド</p>
       </div>
   
       <div class="playerlist">
           <a href="prev.php?lastName=doala">
           <img class="playimg" src="images/doala.jpg">
           </a>
           <p>ドアラ</p>
       </div>
   </div>
   
      
   
    <form action="write2.php" method="post">
        名前  ：<input type="text" name="name"><br>
        Email ：<input type="text" name="email"><br>
        年齢  :<input type="number" name="age"><br>
        好きな選手  :<select type="text" name="players"><br>
            <option value="" disabled selected>選択してください</option>
            <option value = "細川成也">細川成也</option>
            <option value = "岡林勇希">岡林勇希</option>
            <option value = "石川昴弥">石川昴弥</option>
            <option value = "ビシエド">ビシエド</option>
            <option value = "ドアラ">ドアラ</option>
            </select><br>

        好きな理由:<textarea name="memo" cors ="50" rows="5"></textarea><br>

        <button class="btn_vote" type="submit">投票する</button>
    </form>
    

</body>
</html>