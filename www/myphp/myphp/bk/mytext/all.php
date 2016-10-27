<?php
	session_start();
	//var_dump($_SESSION['name1']);
	include("base.php");
	$which=@$_GET['which'];
	$link=mysql_connect("localhost","root","");
	mysql_select_db("bk"); //选择操作库为test
	mysql_query("SET NAMES utf8");
	$query="select * from mytext where id=$which;"; //定义sql
	$result=mysql_query($query,$link); //发送sql查询
	$rows=mysql_fetch_array($result);
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	
		<style type="text/css">
			div{border: 1px solid #000}
			a{text-decoration: none;}
		</style>
	</head>

	<body>
		<div>
			<?php
				if ($_SESSION['name1']=="") {
					echo "<a href='../../dl/dl.php'>登录</a>";
				}
				else{
					echo "欢迎您!:".$_SESSION['name1']."<a href='../../dl/dl.php'>切换账号</a>";
				}
			?>
		</div>

		<div style='width:70%;height:30%; margin:auto'>	
			<h2 style='float:left'>文章标题:<?php echo $rows['title']; ?></h2>
			<h3 style='float:right'>发布时间:<?php echo $rows['time']; ?></h3>
			<br /><br /><br />
			<p>&nbsp;&nbsp;&nbsp;&nbsp;<?php echo $rows['content']; ?></p>
			<form action="" method="post">
				<?php
					$link1=mysql_connect("localhost","root","");
					mysql_select_db("users"); //选择操作库为test
					mysql_query("SET NAMES utf8");
					$query1="select * from user1 where name=$_SESSION[name1];";
					$result1=mysql_query($query1,$link1); //发送sql查询
					$rows1=mysql_fetch_array($result1);
					if (@$rows1['qx']=='1') {
						echo "<input type='submit' name='sub' value='修改文章' style='float:right'>
								<input type='submit' name='sub' value='删除文章' style='float:right'>";
					}
				?>
				<input type="submit" name="sub" value="引用此文章" style="float:right">
			</form>
		</div><br />

		
			<h3>评论:</h3>
			<table border="1">
			<tr>
				<td>访客:</td>
				<td>帖子内容:</td>
			</tr>

			<?php

					$link3=mysql_connect("localhost","root","");
					mysql_select_db("liuyan11"); //选择操作库为test
					mysql_query("SET NAMES utf8");
					$query3="select * from liuyan1;"; //定义sql
					$result3=mysql_query($query3,$link3); //发送sql查询
					$rows3=mysql_fetch_array($result3);
					while($rows3=mysql_fetch_array($result3))
					{
						echo "<tr>";

						echo "<td>".@$rows3['name']."</td>";
						
						echo "<td>".@$rows3['content']."</td>";

						if (@$rows3['qx']=='1') {
							echo "<td><form action='' method='post'>
								<input type='submit' name='sub' value='删除评论' >
							</form></td>";
						}
						echo "</tr>";
					}
				?>
		</table>
			
		<br />
		<form action="" method="post">
				<input type="text" name="text" style="width:40%;height:10%;margin: 0 0 0 100px">
				<input type="submit" name="sub" value="评论">
		</form>
		<?php
			if (@$_POST['sub']=='评论') {
				$which=@$_GET['which'];
				$name1=$_SESSION['name1'];
				$text=@$_POST['text'];
				$pdo -> exec("insert into liuyan1(name,qx,content)values('$name1','1','$text')");
				header("Location:all.php?which=$which");
			}

			if (@$_POST['sub']=='删除文章') {
				$which=@$_GET['which'];
	 				header("Location:delete.php?which=$which");
							
			}
		?>	
	</body>
</html>