<?php

ini_set( 'display_errors', 1 );
include 'anyclass.php';

main();

function main()
{
    $wordList = array('撫でる', '叩く', 'くすぐる' );
    $katoClass = createInstance();

	for ($i = 0; $i < 3; $i++) {
		$n = mt_rand(0, count($wordList) - 1);
		$selectedWord = $wordList[$n];
	}

    $res = $katoClass->sound($selectedWord);
    echo $res;

}



 ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
	<head>
		<meta http-equiv="content-type" content="text/html;charset=utf-8">
		<title>とりあえず呼ぶ</title>
	</head>
	<body>
	<hr>
	<?php main(); ?>
	</body>
</html>
