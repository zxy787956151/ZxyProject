<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<style type="text/css">
			a{text-decoration: none;}
		</style>
	</head>

	<body>
		<h1>用户注册:</h1>
		<form action="" method="get">

			权限选项:<input type="radio" name="radio" value="普通用户">普通用户
					<input type="radio" name="radio" value="管理员">管理员<br /><br />

			用户名:<input type="text" name="user"><br/><br />

			密码:<input type="password" name="pwd"><br />

			确认密码:<input type="password" name="pwd2"><br />

			联系邮箱:<input type="text" name="email"><br />

			<input type="hidden" name="hid" value="hidd"><br />

			<input type="submit" name="sub" value="点击注册"><br /><br />

			<a href="dl.php">登录页面</a>  
		</form>
	</body>
</html>
<?php
	include('base.php');

	$link=mysql_connect("127.0.0.1","root","") or die("连接失败!".mysql_error());
	if($link){
		echo "数据库连接!";
	}
	if(@$_GET['hid']=='hidd'){
		//echo @$_GET['radio'];
		//echo 'enter!';
		//var_dump(@$_GET['user']);
		if (@$_GET['pwd']!==@$_GET['pwd2']) {
			echo "<script type='text/javascript'>
					alert('2次密码输入不一致!');
					</script>";	
		}
		else if(@$_GET['user']==""&&@$_GET['pwd']==""&&@$_GET['pwd2']==""){
			echo "<script type='text/javascript'>
					alert('有必填项未填!');
					</script>";
		}
		else{
			$name=$_GET['user'];
			$pwd=$_GET['pwd'];
			$email=$_GET['email'];
			$qx=$_GET['radio'];
			mysql_query("use users;
							insert into user1(name,pwd,email,qx)values('$name','$pwd','$email','$qx');
							",$link);
			echo "<script type='text/javascript'>
					alert('注册成功');
					</script>";
		}	
	}
?>