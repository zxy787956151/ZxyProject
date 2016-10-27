<?php
	header("Content-Type:text/html;charset=utf-8");
	include("conn.php");

?>
<table width="500" border="0" align="center" cellpadding="5"
cellspacing="1" bgcolor="#add3ef">
	<?php
		$sql="select * from xiaowei order by id desc limit 5";
		$query=mysql_query($sql);
		while($rows=mysql_fetch_array($query)){

	?>
	<tr bgcolor="#1ff3ff">
		<td>标题：<?php echo $rows['title']?>  用户：<?php echo $rows['user']?>  </td>
	</tr>
	<tr bgcolor="#ffffff">
		<td>内容：<?php echo htmtocode($rows['content']);?> </td>
	</tr>
	<?php  } ?>
</table>