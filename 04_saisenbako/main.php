<?php
// 別ファイル読み込み
include_once("util.php");
include_once("saisen.php");


main();

function main(){

  session_start();

  // post取得
  $postCoin = $_POST['coin'];
  $saisenbox = new SaisenBox();
  $saisenbox->dispCoin;
  $coinCommit = $saisenbox->setCoin($postCoin);
  $saisenbox->saveCoin($coinCommit);

  util::debugLog($coinCommit);

  $saisenbox->dispCoin;




}


 ?>
