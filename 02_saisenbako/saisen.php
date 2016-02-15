<?php
/*
・coin
  10円
  50円
  100円
  500円
・saisenbako
  賽銭を保持する機能→標準機能というかメンバ変数
  賽銭を分類する機能→saisenSort
  賽銭を表示するインターフェース→saisenDisp
*/

class coin
{
  private $count;
}

class jyuen extends coin
{
}

class gojyuen extends coin
{
}

class hyakuen extends coin
{
}

class gohyakuen extends coin
{
}

class SaisenBox
{
  public $count_jyuen;
  public $count_gojyuen;
  public $count_hyakuen;
  public $count_gohyakuen;

  public function setCoin($coin)
  {


  }

  // ↓ミス 分類しないと
  public function checkCoin($coin)
  {

    $bResult = false;
    const jyuen = 10;
    const gojyuen = 50;
    const hyakuen = 100;
    const gohyakuen = 500;

    if( $coin == jyuen || $coin == gojyuen || $coin == hyakuen || $coin == gohyakuen )
    {
      $bResult = true;
    }
    return $bResult;
  }

  public function sortCoin extends checkCoin($coin)
  {

    $bResult = jyuen; // デフォルト10円 

    if( $coin == jyuen || $coin == gojyuen || $coin == hyakuen || $coin == gohyakuen )
    {
      $bResult = true;
    }
    return $bResult;
  }

  public function dispCoin()
  {
    $coinList = [
      "jyuen" => $this->$count_jyuen,
      "gojyuen" => $this->$count_gojyuen,
      "hyakuen" => $this->$count_hyakuen,
      "gohyakuen" => $this->$count_gohyakuen,
    ];
  }

}

?>
