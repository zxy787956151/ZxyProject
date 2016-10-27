<?php
	include("base.php");

	//session_start();

	header("Content-Type:text/html;charset=utf-8");
	$qx='0';
	$link=mysql_connect("localhost","root","");
	mysql_select_db("liuyan"); //选择操作库为test
	$query="select * from liuyan1"; //定义sql
	$result=mysql_query($query,$link); //发送sql查询
?>

<html>
	<head>
		<script type="text/javascript">
			$(function(){
				alert("登录成功!");
			})
		</script>
	</head>
	<body>
		<table border="1" style="background-color:#FFA042">
			<tr>
				<td>楼主:</td>
				<td>帖子内容:</td>
			</tr>

			<tr>
				<td>修宇先森</td>
				<td>这里是内容,快发表回复呀!!!!!</td>
			</tr>
		</table><br />

		<table border="1" style="background-color:#80FFFF">
			<tr>
				<td>访客:</td>
				<td>帖子内容:</td>
			</tr>

			<?php
					while($rows=mysql_fetch_array($result))
					{
						echo "<tr>";

						echo "<td>".@$rows['name']."</td>";
						
						echo "<td>".@$rows['content']."</td>";
					
						echo "</tr>";
					}
				?>
		</table><br /><br /><br />

		<form action="content.php" method="post">
			<?php
				echo "<p>欢迎您!&nbsp;";
					
				echo @$_SESSION['user'];

				echo "</p>";
			?>
			<input type="text" name="text" style="width:500px;height:200px;">

			<br /><input type="submit" name="sub" value="发表" style="float:right;margin-right:160px;margin-top:-20px;">
		</form>			
	</body>
</html>
<?php
	if (@$_POST['sub']=="发表") {
		$name=@$_SESSION['user'];
		$qx=@$_SESSION['qx'];
		$content=@$_POST['text'];
		$pdo -> exec("use liuyan;insert into liuyan1(name,qx,content)values('$name','$qx','$content');");
	
		header('Location:content.php');
	}


?>