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
        switch ($args['action']) {
            case 'input':
                $coinIndex = '10yen'; // デフォルト10円
                $coinIndex = array_search($args['coin'], $coin);

                if(isset($_SESSION[$coinIndex]))
                {
                    $_SESSION[$coinIndex]++;
                }
                else {
                    $_SESSION[$coinIndex] = 1;
                }
                break;

            default:
                foreach ($coin as $key => $value) {
                    echo $key . 'は' . $_SESSION[$key] . "枚\r\n";
                }
                break;
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
        <form action="./index3.php" method="get">
            <input type="hidden" name="action" value="input">
            <input type="input" name="coin" value="">
            <input type="submit" value="入れる">
        </form>
        <form action="./index3.php" method="get">
            <input type="hidden" name="action" value="disp">
            <input type="submit" value="見る">
        </form>
        <hr>
        <?php main($_REQUEST); ?>
    </body>
</html>
