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
	//别忘加:ALTER TABLE `test` CHANGE `id` `id` INT(11) NOT NULL AUTO_INCREMENT;
	//mysql_query("set names 'GBK' ");说是解决乱码
	//create table user1(id int,name char(20),pwd int,qx char(20),primary key (id));
	//create table liuyan1(id int,name char(20),qx char(20),content char(50),primary key (id));
	//create table liuyan1(id int,name char(20),qx int,content char(50),primary key (id))charset utf8;
	//create table page1(id int,content char(50),primary key (id))charset utf8_general_ci;
?>
<!-- insert into page1(content)values("1条");
insert into page1(content)values("2条");
insert into page1(content)values("3条");
insert into page1(content)values("4条");
insert into page1(content)values("5条");
insert into page1(content)values("6条");
insert into page1(content)values("7条");
insert into page1(content)values("8条");
insert into page1(content)values("9条");
insert into page1(content)values("10条");
insert into page1(content)values("11条");
insert into page1(content)values("12条");
insert into page1(content)values("13条");
insert into page1(content)values("14条");
insert into page1(content)values("15条"); -->