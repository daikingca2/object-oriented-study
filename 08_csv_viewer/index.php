<?php

// csv → テーブル

function main()
{
    // csvを読み込むテスト
    // SplFileObject::READ_CSV ←これは PHP 5.2系でも使えるらしい(らしい)
    // ファイル取得
    $current_path = dirname(__FILE__);
    $filepath = $current_path . '/test.csv';
    $file = new SplFileObject($filepath);
    $file->setFlags(SplFileObject::READ_CSV);

    // ファイル内のデータループ
    foreach ($file as $key => $line) {

        // 空行があったら飛ばす
        if (empty($key)) {
            continue;
        } else {
            foreach( $line as $str ){
                $records[ $key ][] = $str ;
            }
        }

    }


    echo '<table border=1 class="csvtable">';
    for ($i=0; $i < count($records) ; $i++) {
        echo '<tr>';
        for ($j=0; $j < count($records[$i]) ; $j++) {
            echo '<td>';
            echo $records[$i][$j];
            echo '</td>';
        }
        echo '</tr>';
    }
    echo '</table>';
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>008 Practice</title>
	</head>
	<body>
		<h2>csv</h2>
		<form action="./" method="post" enctype="multipart/form-data">
		  CSVファイル：<br />
		  <input type="file" name="csvfile" size="30" /><br />
		  <input type="submit" value="アップロード" />
		</form>
		<hr>
		<?php main(); ?>
	</body>
</html>
