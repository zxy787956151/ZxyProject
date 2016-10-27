<?php
	//此为项目入口文件
	//加载框架入口文件


	//定义项目名称
	define('APP_NAME', 'APP');


	//定义项目路径
	//项目路径是Common,Lib所在位置
	define('APP_PATH', './APP/temp/');
	//自定义编译缓存目录



	define('RUNTIME_FILE', './APP/temp/runtime_cache.php');
	//自定义编译缓存文件名



	//加载框架入文件
	/*以上两个define是为了让单一入口文件index.php
	可以拿到[App]文件夹的外面*/
//	require './ThinkPHP/ThinkPHP.php';
	//上一行是调ThinkPHP系统目录的存放位置


	//替换入口文件为编译缓存文件
	require './APP/Runtime/~runtime.php';
	/*再次执行后运行依然正常，这个时候其实入口已经被编译缓存文件接管了，跳过了框架的入口文件ThinkPHP/ThinkPHP.php。
	接下来，见证奇迹的时刻到来了^_^，我们把项目的入口文件index.php删除，并且把编译缓存文件拷贝到项目目录下面，更名为index.php，再次执行运行正常，说明我们已经跳过了入口文件，直接以编译缓存文件为项目运行入口了。*/
?>