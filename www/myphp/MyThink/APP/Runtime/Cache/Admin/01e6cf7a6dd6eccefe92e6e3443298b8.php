<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__STYLE__/css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>内容</th>
			<th>操作</th>
		</tr>
		
		<?php if(is_array($menu)): foreach($menu as $key=>$v): ?><tr>
				<td width="8%"><?php echo ($v["uid"]); ?></td>
				<td width="12%"><?php echo ($v["content"]); ?></td>
				<td width="12%">
					[<a href="<?php echo U(GROUP_NAME . '/Menu/menu_update', array('menu_content'=> $v['content']));?>">修改</a>]
					[<a href="<?php echo U(GROUP_NAME . '/Menu/deleteMenu', array('menu_content'=> $v['content']));?>">删除</a>]
				</td>
			</tr><?php endforeach; endif; ?>


		<!-- 内层循环里的item不能等于外层循环的item -->
	</table>
</body>
</html>