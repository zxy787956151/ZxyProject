<?php
return array(
	//'配置项'=>'配置值'
	//开启应用分组
	'APP_GROUP_LIST' => 'Index,Admin',//项目分组
	'DEFAULT_GROUP' => 'Index',//默认分组

	//数据库配置
	'DB_HOST' => 'my.php.com',
	'DB_USER' => 'root',
	'DB_PWD' =>'',
	//本机这么写,放到服务器得改
	'DB_NAME' =>'think',
	'DB_PREFIX' => 'hd_',
	//点语法默认解析
	'TMPL_VAR_IDENTIFY' => 'array',
	//模板路径说
	'TMPL_FILE_DEPR' => '_',//模板文件目录过深,改为Index_index.php

	//默认过滤函数
	'DEFAULT_FILTER' => 'htmlspecialchars',

	// 'SESSION_TYPE' => 'Db',//将session存储由文件改为数据库
	'SESSION_TYPE' => 'Redis',

	//REDIS服务器地址
	'REDIS_HOST' => 'my.php.com',
	//REDIS端口
	'REDIS_PORT' => 6379,

	//Modules
	'APP_GROUP_MODE' => '1',//开启独立分组
	'APP_GROUP_PATH' => 'Modules',//指定默认分组文件夹名称,改它的时候css映射也要改
);
?>

<!-- create table hd_wish(id int unsigned not null primary key auto_increment, username char(20) not null default '', content varchar(255) not null default '', time int(10) not null default 0) engine myisam charset utf8 -->