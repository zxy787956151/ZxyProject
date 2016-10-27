<?php
	header("Content-Type:text/html;charset=utf-8");
	$pdo = new PDO("mysql:host=localhost;dbname=phpmysql","root","");
	if($pdo -> exec("insert into biao1(link)values('1');")){
	echo "数据库插入成功!"; 
	// echo "<script type='text/javascript'>
	// 				alert('数据库插入成功!');
	// 				</script>";
	$pdo -> exec("delete from biao1 where link='1';");
	} 
	//session_destroy();
?>