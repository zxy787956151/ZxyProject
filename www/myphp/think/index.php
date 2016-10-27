<?php
header("Content-Type:text/html;charset=utf-8");
//(前台)单入口文件
	
// 	// echo '<pre>';
// 	// print_r($_GET);

// 	$control=isset($_GET['m']) ? $_GET['m'] : 'IndexAction';//isset:是否存在
// 	// echo $control;
// 	$action = isset($_GET['a']) ? $_GET['a'] : 'index';

// 	$obj = new $control();
// 	$obj -> $action();//此处为调用类里的一个方法->※这里是->不是实例化


// 	class IndexAction{
// //后缀名为Action意为控制器类 Model意为操作数据库类
// //被实例化
// 		// function __construct(){
// 		// 	echo "我被实例化了!";
// 		// }

// 		function index(){
// 			echo "This is Index index";
// 		}

// 		function handle(){
// 			echo "This is Index handle";
// 		}
// 	}


	// die();
	define('APP_NAME', 'Index');//Index叫项目名称(前台的)
	define('APP_PATH','./Index/');//项目路径 后斜线必须加上.

	define('APP_DEBUG', TRUE);//开启调试模式,以保证开发阶段网页是及时性的,开启后-runtime.php(缓存文件会消除)

	define('RUNTIME_PATH',APP_PATH.'Temp/');//定义编译目录位置
	include './ThinkPHP/ThinkPHP.php';//引入ThinkPHP核心运行文件
?>