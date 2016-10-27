<?php
include('base.php');
//session_start();
header("Content-Type:text/html;charset=utf-8");
$qx='0';
$link=mysql_connect("localhost","root","");
mysql_select_db("users"); //选择操作库为test
$query="select * from user1"; //定义sql
$result=mysql_query($query,$link); //发送sql查询
?>
<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<script src="jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
			alert("登录成功!");
			function del(){

					alert("enter!");
					<?php
					$f=$_POST['user'];
					$pdo -> exec("use suers;delete from user1 where name=\"$f\";");
					if ($pdo) {
						echo "删除成功!";
					};
					?>
					alert("finish!")
				}

			// $(function(){
				
			// })
		</script>

		<style type="text/css">
			a{text-decoration: none;}
		</style>
	</head>

	<body>
		<h1>
			<?php
				if (@$_GET['out']=='1') {
					echo "<p>已注销请您重新登录!</p>";
				}

				else{
					echo "<p>欢迎您!&nbsp;";
				
					//var_dump(@$_SESSION[qx]);

					if (@$_SESSION[qx]=='1') {
						echo "管理员!".@$_SESSION[user];
						$d='1';
					}
					else if(@$_SESSION[qx]=='-1'){
						echo "普通用户!".@$_SESSION[user];
						$d='-1';
					}
					echo "</p>";
				}
			?>
			
		</h1>

		<a href="out.php">退出账号</a>

		<form action="" method="post">
			<table border="1">

				<tr>
					<td>name</td>
					<td>pwd</td>
					<td>email</td>
					<td>权限</td>
					
						<?php if (@$d=="1") {
							echo "<td><a href='delete.php?id=1'>全部删除</a></td>";
						}
						?>
					
				</tr>	

				<?php
					while($rows=mysql_fetch_array($result))
					{
						echo "<tr>";

						echo "<td>".@$rows['name']."</td>";
						
						echo "<td>".@$rows['pwd']."</td>";
					
						echo "<td>".@$rows['email']."</td>";
					
						if (@$rows['qx']=='1') {
							echo "<td>"."管理员"."</td>";
						}
						else{
							echo "<td>"."普通用户"."</td>";
						}

						if (@$d=='1') {
							$e=@$rows['id'];
							//var_dump($e);
							echo "<td>"."<a href='delete.php?id=$e'>删除</a>"."</td>";
						}
								
						echo "</tr>";
					}
				?>
			</table>
			<br />
			<a href="dl.php">回登录界面</a>
		</form>	
	</body>
</html>
<?php
// 	if(){
// 		$f=@$_POST['user'];
// 		if ($pdo -> exec("use suers;delete from user1 where name=\"$f\";")) {
// 			echo "删除成功!";
// 		};
// 	}
?>