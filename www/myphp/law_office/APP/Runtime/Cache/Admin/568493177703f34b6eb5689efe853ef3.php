<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>博文列表</title>
		<link rel="stylesheet" href="__PUBLIC__/Css/law.css" type="text/css"/>
		<link rel="stylesheet" href="__PUBLIC__/Css/public2.css" type="text/css"/>
	</head>
	<body>
			<table class="table">
			<tr>
				<th>ID</th>
				<th>标题</th>
				<th>作者</th>
				<th>时间</th>
			</tr>

			<?php if(is_array($list)): foreach($list as $key=>$v): ?><tr>
					<td><?php echo ($v["id"]); ?></td>

					<td><a href="<?php echo U(GROUP_NAME . '/Blog/content', array('id' => $v['id']));?>"><?php echo ($v["title"]); ?></a></td>
					<td><?php echo ($v["author"]); ?></td>
					<td><?php echo ($v["time"]); ?></td>					

					<td style="text-align:center;width:30%">
						[<a href="<?php echo U(GROUP_NAME . '/Blog/update', array('id' => $v['id']));?>">修改</a>]
						[<a href="<?php echo U(GROUP_NAME . '/Blog/delete', array('id' => $v['id']));?>">删除</a>]
					</td>
				</tr><?php endforeach; endif; ?>

		</table>
	</body>
</html>