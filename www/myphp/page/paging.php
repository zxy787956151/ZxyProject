<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

		<style type="text/css">
			a{text-decoration: none;}
		</style>
	</head>

	<body>
		<a href="paging.php">首页</a>&nbsp;

		<?php
			//header('Location:paging.php?page=1');
			if (@$_GET['page']=="3") {
				echo "<a href='paging.php?page=2'>";
			}
			if (@$_GET['page']=='2') {
				echo "<a href='paging.php'>";
			}
			if (@$_GET['page']=="") {
				echo "<a href='paging.php?page=3'>";
			}
		?>
		|上一页|</a>&nbsp;
		<?php

			//header('Location:paging.php?page=1');
			if (@$_GET['page']=="") {
				echo "<a href='paging.php?page=2'>";
			}
			if (@$_GET['page']=='2') {
				echo "<a href='paging.php?page=3'>";
			}
			if (@$_GET['page']=='3') {
				echo "<a href='paging.php'>";
			}
		?>
		|下一页|</a>&nbsp;
		<a href="paging.php?page=3">尾页</a>&nbsp;
		共3页
		<p>当前是第

		<?php
			if (@$_GET['page']=="") {
				echo "一";
			}
			if (@$_GET['page']=="2") {
				echo "二";
			}
			if (@$_GET['page']=="3") {
				echo "三";
			}
		?>

		页</p>
		<div style="float:left;margin: 20px 0 0 0; width:100%;height:20%;">
			<?php

				//include("base.php");

				$link=mysql_connect("localhost","root","");
				mysql_select_db("page"); //选择操作库为test
				mysql_query("SET NAMES utf8");
				if (@$_GET['page']=="") {
					$query="select * from page1 limit 0,5;"; //定义sql
				}
				if (@$_GET['page']=='2') {
					$query="select * from page1 limit 5,5;"; //定义sql
				}
				if (@$_GET['page']=='3') {
					$query="select * from page1 limit 10,5;"; //定义sql
				}
				$result=mysql_query($query,$link); //发送sql查询


				while($rows=mysql_fetch_array($result))
					{
						echo "<hr>".$rows['content'];
					}
				echo "<hr>";
			
				
			?>	
		</div>	
	</body>

</html>