<?php
/*
・saisenbako
  賽銭を保持する機能→標準機能というかメンバ変数
  賽銭を分類する機能→saisenSort
  賽銭を表示するインターフェース→saisenDisp
*/


class SaisenBox
{
  // private $count_jyuen;
  // private $count_gojyuen;
  // private $count_hyakuen;
  // private $count_gohyakuen;
  // $_SESSION['coin_10'];
  // $_SESSION['coin_50'];
  // $_SESSION['coin_100'];
  // $_SESSION['coin_500'];

  public function setCoin($strCoin) {
    $nCoin = 10; // デフォルト10円
    if( $this->checkCoin($strCoin) ) {
      $nCoin = $this->sortCoin($coin);
    } else {
        $nCoin = 0;
    }
    return $nCoin;
  }

  // ↓ミス 分類しないと
  public function checkCoin($coin) {
    $bResult = false;

    // const JYUEN = '10円';
    // const GOJYUEN = '50円';
    // const HYAKUEN = '100円';
    // const GOHYAKUEN = '500円';

    if( $coin == '10円' || $coin == '50円' || $coin == '100円' || $coin == '500円' )
    {
      $bResult = true;
    }
    return $bResult;
  }

  // public function sortCoin extends checkCoin($coin) {
  public function sortCoin($coin) {
    $nResult = jyuen; // デフォルト10円

    if( $coin == '10円' ) {
      $nResult = 10;
    } elseif( $coin == '50円' ) {
      $nResult = 50;
    } elseif( $coin == '100円' ) {
        $nResult = 100;
    } else {
        $nResult = 500;
      }
    return $nResult;
  }

  public function saveCoin($coin) {
    // それぞれのセッション変数に保存したい。。。
    $bResult = false;
    $_SESSION['coin_' + $coin]++;
    $_SESSION['coin_' + $coin]++;
    $_SESSION['coin_' + $coin]++;
    $_SESSION['coin_' + $coin]++;

    return $bResult;

  }

  public function dispCoin() {

    $bResult = false;

    // $coinList = [
    //   // "jyuen" => $this->$count_jyuen,
    //   // "gojyuen" => $this->$count_gojyuen,
    //   // "hyakuen" => $this->$count_hyakuen,
    //   // "gohyakuen" => $this->$count_gohyakuen,
    //   "jyuen" => $_SESSION['coin_10'],
    //   "gojyuen" => $_SESSION['coin_50'],
    //   "hyakuen" => $_SESSION['coin_100'],
    //   "gohyakuen" => $_SESSION['coin_500'],
    // ];

    echo $_SESSION['coin_10'];
    echo $_SESSION['coin_50'];
    echo $_SESSION['coin_100'];
    echo $_SESSION['coin_500'];

    ob_start();
    var_dump($_SESSION);
    $result =ob_get_contents();
    ob_end_clean();

    $debug = date("Ymd H:i:s")."/"."debug"."/".$result."\r\n";
    file_put_contents(dirname(__FILE__) . '/env.log', $debug, FILE_APPEND);

    return $bResult;

  }

}

?>
