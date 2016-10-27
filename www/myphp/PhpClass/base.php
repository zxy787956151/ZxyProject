<?php
	
	// echo "<script>alert('已经包含了base.php这个文件!')</script>";

	header("Content-Type:text/html;charset=utf-8");
//发送http标头到页面上,来设置字符集,优先级大于meta
	session_start();
	// session_destroy();
	//单独删unset($_SESSION['']);

	$nameError = "";
	$pwdError = "";
	$sexError = "";
 ?>