<?php

class saisenBox
{
    private $coin = array(
        '1yen' => 1
        ,'5yen' => 5
        ,'10yen' => 10
        ,'50yen' => 50
        ,'100yen' => 100
        ,'500yen' => 500
        ,'1000yen' => 1000
    );

    function __construct()
    {
        // こんすとらくた
    }

    // main() からは以下の2つの関数が呼ばれる
    function InputCoin($input)
    {
        // 受け付けるかどうかの判定
        // SortingCoin() と SaveCoin() を呼ぶ
        $bResult = true;
        $coinIndex = '10yen'; // デフォルト10円
        $coinIndex = array_search($input, $this->coin);
        if($this->SortingCoinTop($coinIndex))
        {
            $RejectMsg = 'でかい';
            $this->DispMsg($RejectMsg);
            $bResult = false;
        }
        elseif ($this->SortingCoinBottom($coinIndex))
        {
            $RejectMsg = 'ちいさい';
            $this->DispMsg($RejectMsg);
            $bResult = false;
        }
        else {
            $this->SaveCoin($coinIndex);
        }
        return $bResult;
    }

    function DispCoin()
    {
        // 表示
        $coin = $this->coin;
        foreach ($coin as $key => $value) {
            echo $key . 'は' . $_SESSION[$key] . "枚\r\n";
        }

    }

    function ClearCoin()
    {
        // クリア
        $bResult = false;
        if( session_destroy())
        {
            $bResult = true;
        }
        return $bResult;
    }

    private function SortingCoinTop($input)
    {
        // 上限選別
        $bResult = false;
        if($input == $this->coin['1000yen'])
        {
            $bResult = true;
        }
        return $bResult;
    }

    private function SortingCoinBottom($input)
    {
        // 下限選別
        $bResult = false;
        if($input == $this->coin['1yen'] || $input == $this->coin['5yen'])
        {
            $bResult = true;
        }
        return $bResult;
    }

    private function SaveCoin($coinIndex)
    {
        $bResult = false;
        // session変数への保存
        if(isset($_SESSION[$coinIndex]))
        {
            $_SESSION[$coinIndex]++;
            $bResult = true;
        }
        else {
            $_SESSION[$coinIndex] = 1;
            $bResult = true;
        }
        return $bResult; 
    }

    private function DispMsg($msg)
    {
        // メッセージの表示
        $bResult = false;
        if(isset($msg))
        {
            echo $msg . "\r\n";
            $bResult = true;
        }
        return $bResult;
    }

}

 ?>
