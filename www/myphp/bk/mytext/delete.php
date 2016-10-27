<?php
	include("base.php");

	$which=@$_GET['which'];

	//var_dump($g);

	if(!($pdo -> exec("use bk;delete from mytext where id=$which;"))){
		echo "<br /><br />"."删除成功!";
	}
?>
<html>
	<head>
		<style type="text/css">
			a{text-decoration: none;}
		</style>
	</head>

	<body>
		<br /><br />
		<a href="mytext.php">返回</a>
	</body>
</html>