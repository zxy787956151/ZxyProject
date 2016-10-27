<?php
// session_destroy();
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$pdo = new PDO("mysql:host=localhost;dbname=bk","root","");
	if($pdo -> exec("insert into link(link)values('1');")){ 
	echo "数据库插入成功！";
	$pdo -> exec("delete from link where link='1';"); 
	}
?>
