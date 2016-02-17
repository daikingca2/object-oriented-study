<?php

session_start();
// sessionにcoinの枚数を保存してみる
if (!isset($_SESSION["all_coin_count"])){
  $_SESSION["all_coin_count"] = 0;
}
else
{
  $coin = $_SESSION["all_coin_count"];
  // $coin++;
  $coin = $coin + 1;
  // 最後にsessionに値を再度戻す
  $_SESSION["all_coin_count"] = $coin;

}

$hoge = $_SESSION["all_coin_count"];

debugLog($hoge);

function sessionClear(){
  $bResult = flase;
  if( session_destroy() ){
    $bResult = ture;
  }
  return $bResult;
}

function debugLog($debugPramList){
  if(is_array($debugPramList))
  {
    $result = implode('/', $debugPramList);
  } else{
    $result = $debugPramList;
  }
  $debug = date("Ymd H:i:s")."/"."debug"."/".$result."\r\n";
  file_put_contents(dirname(__FILE__) . '/output.log', $debug, FILE_APPEND);
}

?>
