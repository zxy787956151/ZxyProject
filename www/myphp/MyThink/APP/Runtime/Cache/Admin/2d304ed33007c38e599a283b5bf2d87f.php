<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__STYLE__/css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME . '/Move/runMoveUpdate');?>" method="post">
		
		<table class="table">
			<tr>
				<th colspan="2">修改图片名称</th>
			</tr>

			<tr>
				<td align="right">UID: </td>
				<td>
					<input type="text" name="lost_uid" value="<?php echo $_GET['move_uid']; ?>" disabled/>
				</td>
			</tr>
			<tr>

				<td align="right">新UID: </td>
				<td>
					<input type="text" name="new_uid" />
				</td>
			</tr>

			<tr>
				<td align="right">标题: </td>
				<td>
					<input type="text" name="lost_title" value="<?php echo $_GET['move_title']; ?>" disabled/>
				</td>
			</tr>

			<tr>
				<td align="right">新标题: </td>
				<td>
					<input type="text" name="new_title" />
				</td>
			</tr>

			<tr>
				<td align="right">图片内容: </td>
				<td>
					<input type="text" name="lost_content" value="<?php echo $_GET['move_content']; ?>" disabled/>
				</td>
			</tr>

			<tr>
				<td align="right">新图片内容: </td>
				<td>
					<input type="text" name="new_content" />
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