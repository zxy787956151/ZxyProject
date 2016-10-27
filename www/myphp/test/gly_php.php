
<html>
	<head></head>
	<form action="" medoth="get">
		用户名:<input type="text" name="user">
		<br /><br />
		密码:<input type="password" name="pwd">

		<input type="submit" name="sub">
		<input type="hidden" name="hid" value="hidd"> 
	</form>

</html>

<?php
include('base.php');
echo '$_SESSION[pd]='.$_SESSION['pd'];
	//echo "111";
	//var_dump(@$_GET['hid']);
	if(@$_GET['hid']=='hidd'){
		//echo "<br />1";
		@$_SESSION['user']=$_GET['user'];
		@$_SESSION['pwd']=$_GET['pwd'];
		@var_dump($_SESSION['user']);
		echo $_SESSION['user'];

		if($_SESSION['user']==" "){
			echo '2';
			echo "<script type='text/javascript'>alert('请输入用户名!');</script>";
		}

		if($_SESSION['user']=='zxy' & $_SESSION['pwd']=='123'){
			$pd='1';
			$_SESSION['pd']=$pd;
			header("location:gly_html.php");
		}

		else if($_SESSION['user']=='zxy1' & $_SESSION['pwd']=='123'){
			$pd='-1';
			$_SESSION['pd']=$pd;
			header("location:gly_html.php");
		}

		else{
			echo "<script type='text/javascript'>alert('用户名或密码错误!');</script>";
		}
		//echo $pd;
	}

	else
	{
		echo "wrong";
	}
	
?>