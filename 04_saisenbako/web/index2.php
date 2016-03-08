<?php
session_start();

function main($args)
{
    $coin = array(
        '1yen' => 1
        ,'5yen' => 5
        ,'10yen' => 10
        ,'50yen' => 50
        ,'100yen' => 100
        ,'500yen' => 500
        ,'1000yen' => 1000
    );

    if(isset($args))
    {
        $coinIndex = '10yen'; // デフォルト10円
        $coinIndex = array_search(array_shift($args), $coin);

        if(isset($_SESSION[$coinIndex]))
        {
            $_SESSION[$coinIndex]++;
        }
        else {
            $_SESSION[$coinIndex] = 1;
        }


        foreach ($coin as $key => $value) {
            echo $key . 'は' . $_SESSION[$key] . "枚\r\n";
        }
    }
}


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>賽銭箱</h1>
        <form action="./index2.php" method="get">
            <input type="input" name="name" value="">
            <input type="submit" name="go" value="入れる">
        </form>
        <hr>
        <?php main($_REQUEST); ?>
    </body>
</html>
