<?php
	include("base.php");
	$link=mysql_connect("localhost","root","");
	mysql_select_db("bk"); //选择操作库为test
	mysql_query("SET NAMES utf8");
	$query="select * from mytext"; //定义sql
	$result=mysql_query($query,$link); //发送sql查询
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
		<?php
			while($rows=mysql_fetch_array($result))
					{
						echo "<div style='width:70%;height:30%; margin:auto'>	
							<h2 style='float:left'>文章标题:<a href='#'>".@$rows['title']."</a></h2>
							<h3 style='float:right'>发布时间:".@$rows['time']."</h3>
							<br /><br /><br />";
						echo"<p>&nbsp;&nbsp;&nbsp;&nbsp;";

						if (strlen(@$rows['content'])>23) {
							echo substr(@$rows['content'],0,23)."......";
						}

						echo"</p>";
						$which=@$rows['id'];
						
						echo "<a href='all.php?which=$which' style='float:right;'>|阅读全文|</a>
							</div>";
					}
		?>
		
	</body>
</html>