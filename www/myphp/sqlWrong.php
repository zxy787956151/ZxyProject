<?php

	mysql_query("SET NAMES utf8"); //这里?那是哪!!
	
	session_start();
	header("Content-Type:text/html;charset=utf-8");


	$link=mysql_connect("localhost","root","");
	mysql_select_db("page"); //选择操作库为test
	mysql_query("SET NAMES utf8");
	$query="select * from page1"; //定义sql
	$result=mysql_query($query,$link); //发送sql查询
	


	echo "马莹你好!";

	while($rows=mysql_fetch_array($result))
					{
						var_dump(@$rows['id']);
						var_dump(@$rows['content']);
					}
?>