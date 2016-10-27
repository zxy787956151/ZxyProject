<html>
<head>
	<title></title>
</head>
<body>
	<form action="" method="post">
		<input  type="text" />

		<input type="submit"  value="sub"/>
	</form>
</body>
</html>

<?php 
	/**
	 * init.inc.php Smarty 对象的实例化及初始化文件
	 */

	// define("ROOT",str_replace("\\","/",dirname(__FILE__)).'/');

	// require 'blog/ThinkPHP/Extend/Vendor/Smarty/Smarty.class.php';

	// $smarty = new Smarty();

	// $smarty->assign("title","测试用的网页标题");

	// $smarty->display();

	$body = file_get_contents('php://input');

fread($body, 100) ;
?>

