<?php 
	include("base.php");
	//session_start();
	//echo '1';
	//echo '$_SESSION[pd]='.$_SESSION['pd'];
?>
<html>
	<head></head>
	<body>
		<table>
			<tr>
				<td><a href="#">普通用户</a></td>	
				<td><a href="#">普通用户</a></td>
				<td><a href="#">普通用户</a></td>
				<td><a href="#">普通用户</a></td>
				<?php 
				//echo "enter!";
				if(@$_SESSION['pd']=='1'){ //session大小写错误!

					//echo "right!";
					echo '<td><a href="#">管理员</a></td>';

				 } ?>
			</tr>
		</table>
	</body>
</html>
