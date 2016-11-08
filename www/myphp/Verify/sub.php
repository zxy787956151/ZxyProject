<?php 
header("Content-Type:text/html;charset=utf-8");

	session_start();

	if (@$_POST[check]) {
		if (@$_POST[check]==@$_SESSION[check_pic]) {
			echo "验证码正确".@$_SESSION[check_pic];
		}else{
			echo "验证码错误".@$_SESSION[check_pic];
		}
	}

	var_dump($_SESSION['check_pic']);
	
 ?>

 <form action="" method="post">
 	<img src="Verify.php"><br/>

 	<input type="text" name="check"><br/>

 	<input type="submit" value="提交"><br/>
 </form>