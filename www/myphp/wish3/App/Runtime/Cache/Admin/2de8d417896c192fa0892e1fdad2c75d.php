<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table>
		<tr>
			<th>ID</th>
			<th>角色名称</th>
			<th>角色描述</th>
			<th>开启状态</th>
			<th>操作</th>
		</tr>

		<?php if(is_array($role)): foreach($role as $key=>$v): ?><tr>
				<td align="right"><?php echo ($v["id"]); ?></td>
				<td align="right"><?php echo ($v["name"]); ?></td>
				<td align="right"><?php echo ($v["remark"]); ?></td>
				<td align="right">
					<!-- think里的if else标签 -->
					<?php if($v["status"]): ?>开启<?php else: ?>关闭<?php endif; ?>
					<!-- 后不能用点语法$v.status -->
				</td>
				<td align="right">
					<a href="<?php echo U('Admin/Rbac/access', array('rid' => $v['id']));?>">配置权限</a>
				</td>
			</tr><?php endforeach; endif; ?>	
	</table>
</body>
</html>