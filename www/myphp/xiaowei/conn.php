<?php
	header("Content-Type:text/html;charset=utf-8");
	mysql_connect("localhost","root","")or die("数据库连接失败");
	mysql_select_db("dd") or die("连接失败");
	function htmtocode($content){
		$content=str_replace("\n", "<br>",str_replace("", "&nbsp",$content));
		return $content;
	}