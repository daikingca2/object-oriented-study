<?php
  session_start();

 ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>php</title>
    <link rel="stylesheet" href="style.css" charset="utf-8">
    <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
    <script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
    <script type="text/javascript">
    $(function() {
      $(".jyuen, .gojyuen, .hyakuen, .gohyakuen").draggable();
      $(".saisenbako").droppable({
        drop: function(event, ui) {
          $(this)
          .addClass("poke")
          .html("poke!");
        }
      });
    });

    </script>
  </head>
  <body>

    <!-- 鳥居start -->
    <div id="top"></div>
    <div id="subtop"><h1>アロバ神社</h1></div>
    <div id="migihasira"></div>
    <div id="hidarihasira"></div>
    <!-- 鳥居end -->
    <div class="base">
        <div class="saisenbako"><p>賽銭箱</p></div>
      <div id="coinList">
        <p class="jyuen"><a href="#">10円</a></p>
        <p class="gojyuen"><a href="#">50円</a></p>
        <p class="hyakuen"><a href="#">100円</a></p>
        <p class="gohyakuen"><a href="#">500円</a></p>
      </div>
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
