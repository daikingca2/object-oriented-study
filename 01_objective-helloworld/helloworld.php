<?php
//  2016/02/03 Dev-study
// 01_objective-helloworld

// print_backtrace(debug_backtrace());
// debug
// var_dump("hoge");
class helloworld
{
  // class helloworld
  public $strHelloworld;
  // ↑外部から書き換えられるようになってしまっている
  // こうかいにするべきではない

  function getHelloworld()
  {
    // echo ($this->$strHelloworld);
    // echo $this->$strHelloworld;
    echo "hellohoge";
  }

}

  $hello = new helloworld;
  $hello->getHelloworld = "Hello World!";
  $hello->getHelloworld();
// echo "hoge";

  ?>
