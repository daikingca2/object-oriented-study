// 01_objective-helloworld
<?php

class helloworld {
  // class helloworld
  public $strHelloworld = "Hello World";

  function getHelloworld() {
    echo $this->$strHelloworld;
  }

  $hello = new helloworld;
  $hello->getHelloworld();

}





























  ?>
