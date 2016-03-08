<?php

class util
{
  function __construct() {
    // こんすとらくた
  }

  function __destruct() {
    // ですとらくた
  }

  public static function sessionClear(){
    $bResult = false;
    if( session_destroy() ){
      $bResult = ture;
    }
    return $bResult;
  }

  public static function debugLog($debugPramList){
    if(is_array($debugPramList))
    {
      $result = implode('/', $debugPramList);
    } else{
      $result = $debugPramList;
    }
    $debug = date("Ymd H:i:s")."/"."debug"."/".$result."\r\n";
    file_put_contents(dirname(__FILE__) . '/output.log', $debug, FILE_APPEND);
  }
}

 ?>
