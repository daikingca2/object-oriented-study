<?php
include 'saisen.php';

session_start();

function main($args)
{
    $objectSaisenBox = new saisenBox();

    if(isset($args))
    {
        $actionType = $args['action'];
        switch ($actionType) {
            case 'input':
                $param = $args['coin'];
                $objectSaisenBox->InputCoin($param);
                break;
            case 'disp':
                $objectSaisenBox->DispCoin();
                break;

            default:
                $objectSaisenBox->ClearCoin();
                break;
        }
    }
    else {
        return;
    }
}


 ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
        <title></title>
    </head>
    <body>
        <h1>賽銭箱</h1>
        <form action="./index.php" method="get">
            <input type="hidden" name="action" value="input">
            <input type="input" name="coin" value="">
            <input type="submit" value="入れる">
        </form>
        <form action="./index.php" method="get">
            <input type="hidden" name="action" value="disp">
            <input type="submit" value="見る">
        </form>
        <form action="./index.php" method="get">
            <input type="hidden" name="action" value="reset">
            <input type="submit" value="リセット">
        </form>
        <hr>
        <?php main($_REQUEST); ?>
    </body>
</html>
