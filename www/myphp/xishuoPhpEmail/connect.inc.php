<?php 
	/**
	 * file:conn.inc.php
	 */
	header("Content-Type:text/html;charset=utf-8");

	define("DSN","mysql:host=127.0.0.1;bdname=xishuoPHP");

	define("DBUSER", "root");

	define("DBPASS", "");

	try{
		$pdo = new PDO(DSN,DBUSER,DBPASS);
		echo "连接成功!";
	}catch(PDOException $e){
		die("连接失败：".$e->getMessage());
	}
 ?>
 <!-- create table user(id int(11) unsigned NOT NULL auto_increment,username varchar(20) NOT NULL default "",userpwd varchar(32) NOT NULL default "",PRIMARY KEY (id)); -->
 <!-- create table mail(id int(11) unsigned NOT NULL auto_increment,uid mediumint(8) unsigned NOT NULL DEFAULT '0',mailtitle varchar(20) NOT NULL default "",maildt int(10) unsigned NOT NULL DEFAULT '0',PRIMARY KEY (id)); -->