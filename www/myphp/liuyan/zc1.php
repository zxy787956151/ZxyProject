<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<style type="text/css">
			a{text-decoration: none;}
		</style>

		<script type="text/javascript">
			//alert(1);
		</script>
	</head>

	<body>
		<h1>用户注册:</h1>
		<form action="" method="post">

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

	if(@$_POST['hid']=='hidd'){

		$c='1';
		//echo @$_GET['radio'];

		//echo 'enter!';
		//var_dump(@$_GET['user']);
	$name=$_POST['user'];
	$pwd=$_POST['pwd'];
	$pwd2=$_POST['pwd2'];
	$email=$_POST['email'];	

		if (@$_POST['pwd']!==@$_POST['pwd2']) {
			echo "<script type='text/javascript'>
					alert('2次密码输入不一致!');
					</script>";	
					$c='-1';
		}
		if((@$_POST['pwd']==NULL)||(@$_POST['pwd2']==NULL)||(@$_POST['user']==NULL)){
			echo "<script type='text/javascript'>alert('有必选项未填!');</script>";
			$c='-1';
		}
		if($c=='1'){
			$qx=@$_POST['radio'];
			if($qx=="管理员"){
				$qx='1';
			}
			else{
				$qx='-1';
			}
			$pdo -> exec("	
							use liuyan;
							insert into user1(name,pwd,email,qx)values('$name','$pwd','$email','$qx');
							");
			$a='0';
			$_SESSION['qx']=$qx;
			// var_dump("pwd:".@$_POST['pwd']);
			// var_dump("user:".@$_POST['user']);
			// var_dump("pwd2:".@$_POST['pwd2']);
			header('Location:dl.php?a=1');
			
		}	
	}
?>
