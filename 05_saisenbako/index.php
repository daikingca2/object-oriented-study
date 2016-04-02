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
        <title></title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="style.css" media="screen" title="no title" charset="utf-8">
        <script src="https://code.jquery.com/jquery-2.2.0.js"></script>
        <script src="https://code.jquery.com/ui/jquery-ui-git.js"></script>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script type="text/javascript">
        $(function() {
          $(".jyuen, .gojyuen, .hyakuen, .gohyakuen").draggable({
            revert: "invalid",
            scope: "ikeru",
            helper: "clone"
          });

          $(".saisenbako").droppable({
            accept: ".jyuen, .gojyuen, .hyakuen, .gohyakuen" ,
            scope: "ikeru",
            drop: function(event, ui) {
              var dragId = ui.draggable.attr("id");
              // if($(this).find(".drop" + dragId).length == 0) {
                $(this).append('<span class="drop' + dragId + '">' + "ちゃりん♪" + '</span>');
                $.post(
                  './index.php',
                  {
                    'action': 'input', // ひとまずcoinのtextを投げてphp側で判別
                    'coin': ui.draggable.text() // ひとまずcoinのtextを投げてphp側で判別
                  }
                );
                setTimeout(function(){
                  $(".drop" + dragId).fadeOut();
                }, 1000);
              // }
            } ,
            out: function (event, ui) {
              var dragId = ui.draggable.attr("id");
              $(this).find(".drop" + dragId).remove();
            }
          });
        });

        </script>
    </head>
    <body>
        <!-- 鳥居start -->
        <div id="top"></div>
        <div id="subtop"><h1>アロバ神社</h1></div>
        <div id="migihasira"></div>
        <div id="hidarihasira"></div>
        <!-- 鳥居end -->
        <div class="base">
            <div class="saisenbako"><p>賽銭箱</p></div>
          <div id="coinList">
            <p id="jyu" class="jyuen"><a href="#">10</a></p>
            <p id="gojyu" class="gojyuen"><a href="#">50</a></p>
            <p id="hyaku" class="hyakuen"><a href="#">100</a></p>
            <p id="gohyaku" class="gohyakuen"><a href="#">500</a></p>
          </div>
          <div id="result">
            <a class="btn btn-default" href="./index.php?action=disp">なかを見る</a>
            <a class="btn btn-default" href="./index.php?action=hoge">なかを捨てる</a>
          </div>
        </div>

        <hr>
        <div id="result-view">
            <?php main($_REQUEST); ?>
        </div>
    </body>
</html>
