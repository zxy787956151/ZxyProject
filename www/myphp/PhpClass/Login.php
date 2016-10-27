<html>
<head>
	<title></title>
	<meta charset="utf-8"/>
</head>
<body>
	<form action="" method="get">
		<!-- action不写post不能夸页面  -->
		账号：<input type="text" name="user"/>
			<br/><br/>
		密码：<input type="password" name="pwd"/>
			<br/><br/>
		邮箱：<input type="text" name="email" />
			<br/><br/>

		<!-- <input type="hidden" name="hid" value="hid"/> -->
		<input type="submit" name="submit" value="登陆"/>
	</form>
</body>

</html>

<?php 
	include 'base.php';

	// var_dump($_GET['submit']);

	$myfile = @fopen("user.txt", "r") or die("Unable to open file!");
	$user_f = fgets($myfile);
	fclose($myfile);

	$myfile = fopen("pwd.txt", "r") or die("Unable to open file!");
	$pwd_f = fgets($myfile);
	fclose($myfile);


	if(@$_GET['submit']=="登陆"){

		var_dump($_GET['user']);
		if(@$_GET['user']==""){

			echo "<script type='text/javascript'>alert('请输入账号');</script>";

		}

		else if(@$_GET['pwd']==""){
			echo "<script type='text/javascript'>alert('请输入密码');</script>";
		}	

		else if(!preg_match("/^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.com)+/",@$_GET['email'])){
			echo "<script type='text/javascript'>alert('邮箱格式错误！必须为：\"字符或数字@字母或数字.com\"，不区分大小写');</script>";
		}

		else if($_GET['user']!=$user_f||md5($_GET['pwd'])!=$pwd_f){
			echo "<script type='text/javascript'>alert('用户名或密码错误！');</script>";
		}

		else{
			$_GET['pwd'] = md5($_GET['pwd']);
			$_GET['email'] = md5($_GET['email']);
			header('Location: liuyan.php?user='.$_GET['user'].'&pwd='.$_GET['pwd'].'&email='.$_GET['email']);
		}
	
	}
 ?>