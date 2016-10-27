<?php
	session_start();
	header("Content-Type:text/html;charset=utf-8");
	$pd='0';
	$qx='0';
	$pdo = new PDO("mysql:host=localhost;dbname=phpmysql","root","");
	if($pdo -> exec("insert into biao1(link)values('1');")){ 
	echo "数据库插入成功！";
	$pdo -> exec("delete from biao1 where link='1';"); 
	}
	//create table user1(name char(20),pwd int,email char(20),qx char(20));
	//create table user1(id int,name char(20),pwd int,email char(20),qx char(20),primary key (id));
	//ALTER TABLE `test` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
?>