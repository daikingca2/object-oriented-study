<?php
/*
・saisenbako
  賽銭を保持する機能→標準機能というかメンバ変数
  賽銭を分類する機能→saisenSort
  賽銭を表示するインターフェース→saisenDisp
*/


class SaisenBox
{
  private $count_jyuen;
  private $count_gojyuen;
  private $count_hyakuen;
  private $count_gohyakuen;

  public function setCoin($strCoin) {
    $nCoin = 10; // デフォルト10円
    if( $this->checkCoin($strCoin) ) {
      $nCoin = $this->sortCoin($coin);
    } else {
        $nCoin = 0;
    }
  }

  // ↓ミス 分類しないと
  public function checkCoin($coin) {
    $bResult = false;
    const jyuen = "10円";
    const gojyuen = "50円";
    const hyakuen = "100円";
    const gohyakuen = "500円";

    if( $coin == jyuen || $coin == gojyuen || $coin == hyakuen || $coin == gohyakuen )
    {
      $bResult = true;
    }
    return $bResult;
  }

  public function sortCoin extends checkCoin($coin) {
    $nResult = jyuen; // デフォルト10円

    if( $coin == jyuen ) {
      $nResult = 10;
    } elseif( $coin == gojyuen ) {
      $nResult = 50;
    } elseif( $coin == hyakuen ) {
        $nResult = 100;
    } else( $coin == gohyakuen ) {
        $nResult = 500;
      }
    return $nResult;
  }

  public function saveCoin($coin) {
    // それぞれのセッション変数に保存したい。。。
    $_SESSION['coin_' + $coin] ++;
    $_SESSION['coin_' + $coin] ++;
    $_SESSION['coin_' + $coin] ++;
    $_SESSION['coin_' + $coin] ++;

  }

  public function dispCoin() {
    $coinList = [
      "jyuen" => $this->$count_jyuen,
      "gojyuen" => $this->$count_gojyuen,
      "hyakuen" => $this->$count_hyakuen,
      "gohyakuen" => $this->$count_gohyakuen,
    ];

  }

}

?>
