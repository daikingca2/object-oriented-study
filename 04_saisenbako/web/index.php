<?php
// クラス saisenbako
// クラス
session_start();

function main($args)
{
    if(isset($args))
    {
        if(isset($_SESSION['hoge']))
        {
            $_SESSION['hoge']++;
        }
        else {
            $_SESSION['hoge'] = 1;
        }
        echo $_SESSION['hoge'];
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
        <form action="./" method="get">
            <input type="input" name="coin" value="">
            <input type="submit" name="go" value="">
        </form>

        <hr>
        <?php main($_REQUEST); ?>
    </body>
</html>
