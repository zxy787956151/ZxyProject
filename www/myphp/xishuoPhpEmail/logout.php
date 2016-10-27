<?php 
	/**
	 * file:logout.php 注销用户的会话信息,用户退出
	 */
	header("Content-Type:text/html;charset=utf-8");

	session_start();

	$username = @$_SESSION['username'];

	$_SESSION[] = array();

	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(),"",time()-42000,'/');
	}

	session_destroy();
 ?>
 <html>
 <head>
 	<title>退出系统</title>
 </head>
 <body>
 	<p><?php echo $username ?>再见！</p>
 	<p><a href="login.php">从新登陆邮件系统</a></p>
 </body>
 </html>