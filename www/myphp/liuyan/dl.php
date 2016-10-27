<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		
		<style type="text/css">
			a{text-decoration: none;}
		</style>

		
			<?php 
				include('base.php');
				// var_dump(@$a);
				@$a=@$_GET['a'];
				if(@$a=='1'){
					echo "<script type='text/javascript'>alert('注册成功');</script>";
				}
			?>
		
	</head>

	<body>
		<h1>宇宙无敌乱七八糟二货自制留言板</h1>
		<h2>用户登录:</h2>
		<form action="" method="post">
			<input type="text" name="user"><br/>

			<input type="password" name="pwd">

			<input type="hidden" name="hid" value="hidd">

			<input type="submit" name="sub" value="登录"><br /><br />

			<a href="zc1.php">注册账户</a>  
		</form>
	</body>
</html>
<?php
	//var_dump(@$user.":".@$pwd);

	if(@$_POST['hid']=='hidd'){
		//echo @$_GET['radio'];
		//echo 'enter!';
		//var_dump(@$_GET['user']);
		if((@$_POST['user']=='')&&(@$_POST['pwd']=='')){
			echo "<script type='text/javascript'>
					alert('有必填项未填!');
					</script>";
		}
		else{
			$name=$_POST['user'];
			$pwd=$_POST['pwd'];

			$link=mysql_connect("localhost","root","");
			mysql_select_db("liuyan"); //选择操作库为test
			$query="select * from user1"; //定义sql
			$result=mysql_query($query,$link); //发送sql查询
			$w='1';

			while($rows=mysql_fetch_array($result))
					{
						//var_dump($rows['name']);
						if(@$rows['name']==$name){
							if(@$rows['pwd']==$pwd) {
								$w='-1';
								$b=$rows['qx'];
								$_SESSION['qx']=$b;
								break;
							}
						}		
					}

			if($w=='1'){
				echo "<script type='text/javascript'>alert('没有此用户,请注册!');</script>";
			}
			else{
				$_SESSION['user']=@$_POST['user'];
				header('Location:content.php');
			}
								
			// if($qx=="管理员"){
			// 	$qx='1';
			// }
			// else{
			// 	$qx='-1';
			// }
		}	
	}
?>