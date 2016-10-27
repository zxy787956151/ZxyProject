<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__STYLE__/css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME . '/Menu/runMenuUpdate');?>" method="post">
		
		<table class="table">
			<tr>
				<th colspan="2">修改菜单名称</th>
			</tr>

			<tr>
				<td align="right">原名: </td>
				<td>
					<input type="text" name="lost_menu" value="<?php echo $_GET[menu_content]; ?>" disabled/>
				</td>
			</tr>

			<tr>
				<td align="right">新菜单名称: </td>
				<td>
					<input type="text" name="new_menu" />
				</td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="保存修改" />
				</td>
			</tr>
		</table>

	</form>
</body>
</html>