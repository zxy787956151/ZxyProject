<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table class="table">
		<tr>
			<th>ID</th>
			<th>标题</th>
			<th>所属分类</th>
			<th>点击次数</th>
			<th>发布时间</th>
			<th>操作</th>
		</tr>
		
		<?php if(is_array($blog)): foreach($blog as $key=>$v): ?><tr>
				<td width="8%"><?php echo ($v["id"]); ?></td>
				<td>
					<?php echo ($v["title"]); if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color:<?php echo ($value["color"]); ?>;padding:0 5px">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?>
					<!-- 缩到一行,以免出空格 -->
				</td>
				<td width="12%"><?php echo ($v["cate"]); ?></td>
				<td width="12%"><?php echo ($v["click"]); ?></td>
				<td width="12%"><?php echo (date('y-m-d H:i', $v["time"])); ?></td>
				<td width="12%">
					[<a href="">修改</a>]
					[<a href="<?php echo U(GROUP_NAME . '/Blog/toTrach', array('id' => $v['id']));?>">删除</a>]
				</td>
			</tr><?php endforeach; endif; ?>


		<!-- 内层循环里的item不能等于外层循环的item -->
	</table>
</body>
</html>