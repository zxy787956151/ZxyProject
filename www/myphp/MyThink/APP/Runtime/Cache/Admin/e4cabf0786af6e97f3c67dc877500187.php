<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__STYLE__/css/public.css" />
</head>
<body>
	<form action="<?php echo U(GROUP_NAME . '/Article/RunaddArticle');?>" method="post">
		
		<table class="table">
			<tr>
				<th colspan="2">修改图片名称</th>
			</tr>

			<tr>

				<td align="right">排序: </td>
				<td>
					<input type="text" name="article_uid" />
				</td>
			</tr>

			<tr>
				<td align="right">文章标题: </td>
				<td>
					<input type="text" name="article_title" />
				</td>
			</tr>

			<tr>
				<td align="right">文章内容: </td>
				<td>
					<input type="text" name="article_content" />
				</td>
			</tr>

			<tr>
				<td align="right">文章分类: </td>
				<td>
					<input type="text" name="article_category" />
				</td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="submit" value="保存添加" />
				</td>
			</tr>
		</table>

	</form>
</body>
</html>