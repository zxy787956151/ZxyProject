<?php
	include("base.php");

	$g=@$_GET['id'];

	//var_dump($g);

	if(!($pdo -> exec("use users;delete from user1 where id=$g;"))){
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
		<a href="content.php">返回</a>
	</body>
</html>