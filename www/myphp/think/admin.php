<?php
//(后台)单入口文件
	define('APP_NAME', 'Admin');//Admin叫项目名称(前台的)
	define('APP_PATH','./Admin/');//项目路径 后斜线必须加上.
	define('APP_DEBUG', TRUE);//开启调试模式,以保证开发阶段网页是及时性的,开启后-runtime.php(缓存文件会消除)
	// include './ThinkPHP/ThinkPHP.php';//引入ThinkPHP核心运行文件,或如下:
	require './ThinkPHP/ThinkPHP.php';
?>