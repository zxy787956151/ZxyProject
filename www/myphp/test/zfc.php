<?php
header("Content-Type:text/html;charset=utf-8");
	echo "aaa\rbbb\nccc\tddd";

	echo "<br />";//readfile('file.txt');

	// echo $file_dq;

	file_put_contents("file.txt", "写入的原有内容!");

	file_put_contents("file.txt", "\r",FILE_APPEND);

	file_put_contents("file.txt", "这是我后写入的内容!",FILE_APPEND);

	echo "<br />";readfile('file.txt');

	$mlarr=scandir('D:/JWroom/wamp/www/myphp');

	foreach ($mlarr as $k => $v) {
		echo $k.$v."<br />";
	}


?>