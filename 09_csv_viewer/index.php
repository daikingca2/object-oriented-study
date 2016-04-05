<?php
// CSVを読み込んでHTMLのtableとして出力する

class csvUtil
{
    private $file;
    private $dataArray;
    private $csvEnc;

    // こんすとらくた
    function __construct($input)
    {
        $this->file = $input;
        var_dump($input); // debug

    }

    // .csvファイルを配列に変換する処理
    function CsvToArray()
    {
        $res = false;
        var_dump($this->file); // debug
        // SplFileObject::READ_CSV ←これは PHP 5.2系でも使えるらしい(らしい)
        $originalFile = new SplFileObject($this->file);
        $originalFile->setFlags(SplFileObject::READ_CSV);

        // ファイル内のデータループ
        foreach ($originalFile as $key => $line) {
            // 空行があったら飛ばす
            if (empty($key)) {
                continue;
            } else {
                foreach( $line as $str ){
                    $records[ mb_convert_encoding($key, "UTF-8", "SJIS-win") ][] = mb_convert_encoding($str, "UTF-8", "SJIS-win");
                    // $records[ convertEnc($key) ][] = convertEnc($str);
                }
            }
        }
        if(isset($records))
        {
            $res = true;
            $this->dataArray = $records;
        }
        return $res;
    }

    // 配列をtableに整形する処理
    function ArrayToTable()
    {
        $res = true;
        // echoしちゃう
        $outputArray = $this->dataArray;
        echo '<table class="table table-bordered">' . "\n";
        for ($i=1; $i < count($outputArray) ; $i++) {
            echo '<tr>';
            for ($j=0; $j < count($outputArray[$i]) ; $j++) {
                echo '<td>';
                echo $outputArray[$i][$j];
                echo '</td>';
            }
            echo '</tr>' . "\n";
        }
        echo '</table>' . "\n";

        return $res;
    }

    function convertEnc($str)
    {
        $resStr = "";
        // 見る
        $originEnc = mb_detect_encoding($str);
        var_dump($originEnc); // debug
        if ($originEnc == "UTF-8") {
            $resStr = $str;
        }
        elseif ($originEnc == "SJIS") {
            // mb_convert_encoding($key, "UTF-8", "SJIS-win")
            $resStr = mb_convert_encoding($str, "UTF-8", "SJIS-win");
        }
        else
        {
            $resStr = mb_convert_encoding($str, "UTF-8");
        }

        return $resStr;
    }
}

function main()
{
    // ファイル取得(inputから)
    if (is_uploaded_file($_FILES["csvfile"]["tmp_name"])) {
        $tmp = $_FILES["csvfile"]["tmp_name"];
        $file_name = $_FILES["csvfile"]["name"];
        $current_path = dirname(__FILE__) . "\\";
        move_uploaded_file($tmp, $current_path . $file_name);
    }
    $filepath = $current_path . $file_name;

    // コンストラクタにファイルパス渡す。。。
    $CSV = new csvUtil($filepath);
    // csv→array変換
    if (!$CSV->CsvToArray())
    {
        echo "なにかしらのエラー(多分変換系)";
    }
    else
    {
        // array→table
        if (!$CSV->ArrayToTable())
        {
            echo "なにかしらのエラー(多分出力系)";
        }
    }
}
 ?>

<!-- ここよりした表示部分 -->
<!DOCTYPE html>
<style media="screen">
    body {
        background-color: #fef8dd;
    }
</style>
<html>
	<head>
        <meta charset="utf-8">
		<title>008-009 Practice</title>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
        <link href="dropzone.css" rel="stylesheet">
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha384-0mSbJDEHialfmuBBQP6A4Qrprq5OVfW37PRR3j5ELqxss1yVqOtnepnHVP9aJ7xS" crossorigin="anonymous"></script>
        <script src="dropzone.js"></script>
        <script type="text/javascript">
            var Dropzone = require("dropzone");
            // jQuery
            $("div#fallback").dropzone({ url: "./" });
        </script>
	</head>
	<body>
		<h2>CSVを入れてね</h2>
		<form action="./" method="post" enctype="multipart/form-data">
		  <input type="file" name="csvfile" size="30" /><br />
		  <input class="btn btn-primary" type="submit" value="アップロード" />
		</form>
        <form action="./" class="dropzone">
          <div id="fallback">
            <input name="file" type="file" multiple />
          </div>
        </form>
		<hr>
		<?php main(); ?>
	</body>
</html>
