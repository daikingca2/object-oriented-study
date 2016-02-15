<?php
  session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php</title>
    <link rel="stylesheet" href="style.css" charset="utf-8">
  </head>
  <body>

    <div class="base">
      <form class="coin_input" action="index.php" method="post">
        <p id="info1">金額を入力して下さい。</p>
        <input type="text" name="coin">
        <input type="submit" value="投げる">
      </form>
      <div class="recove">
        <button type="button" name="button">回収</button>
      </div>
      <div id="coinList">
        <p class="jyuen"><a href="#">10円</a></p>
        <p class="gojyuen"><a href="#">50円</a></p>
        <p class="hyakuen"><a href="#">100円</a></p>
        <p class="gohyakuen"><a href="#">500円</a></p>
      </p>
    </div>
  </body>
</html>

<?php
// 別ファイルの読み込み
require_once('saisen.php');

// sessionにcoinの枚数を保存してみる
if (!isset($_SESSION["all_coin_count"])){
  $_SESSION["all_coin_count"] = $_POST['coin'];
}
else
{
  $coin = $_SESSION["all_coin_count"];
  // $coin++;
  $coin = $coin + $_POST['coin'];
  print($coin);

  // 最後にsessionに値を再度戻す
  $_SESSION["all_coin_count"] = $coin;

}
echo "<br>";
var_dump($_SESSION["all_coin_count"]);
// test
$uri = $_SERVER['HTTP_REFERER'];
header("Location: ".$uri);
 ?>
