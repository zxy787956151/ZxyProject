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
			<th>UID</th>
			<th>文章图片名</th>
			<th>文章标题</th>
			<th>文章内容</th>
			<th>文章分类</th>
			<th>发布时间</th>
			<th>评论数</th>
			<th>浏览量</th>
			<th>操作</th>
		</tr>
		
		<?php if(is_array($article)): foreach($article as $key=>$v): ?><tr>
				<td width="8%"><?php echo ($v["id"]); ?></td>
				<td width="8%"><?php echo ($v["imgname"]); ?></td>
				<td width="8%"><?php echo ($v["title"]); ?></td>
				<td width="8%"><?php echo ($v["content"]); ?></td>
				<td width="8%"><?php echo ($v["category"]); ?></td>
				<td width="8%"><?php echo (date('H:i 	y-m-d', $v["time"])); ?></td>
				<td width="8%"><?php echo ($v["discuss"]); ?></td>
				<td width="8%"><?php echo ($v["browse"]); ?></td>
				<td width="8%">
					[<a href="<?php echo U(GROUP_NAME . '/Move/move_update', array('move_uid'=> $v['uid'],'move_title'=>$v['title'],'move_content'=>$v['content']));?>">修改文字</a>]
					[<a href="<?php echo U(GROUP_NAME . '/Move/img_update', array('move_uid'=> $v['uid']));?>">修改图片</a>] <br/>
					[<a href="<?php echo U(GROUP_NAME . '/Move/deleteMove', array('move_content'=> $v['content']));?>">删除整行</a>]
				</td>
			</tr><?php endforeach; endif; ?>


		<!-- 内层循环里的item不能等于外层循环的item -->
	</table>
</body>
</html>