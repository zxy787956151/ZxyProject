<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" type="text/css" href="__STYLE__/css/public.css" />
	<script type="text/javascript">location:reload();</script>
</head>
<body>
	<form action="<?php echo U(GROUP_NAME . '/Menu/upfile');?>" method="post" enctype="multipart/form-data">

		<table class="table">
			<tr>
				<th colspan="2">更改Logo</th>
			</tr>

			<tr>
				<td align="right">当前Logo: </td>
				<td>
					<img style="width:185px;height:47px" src="/MyThink/APP/Modules/Admin/Action/Upfile/logo.png"/>
				</td>
			</tr>

			<tr>
				<td align="right">上传Logo: </td>
				<td>
					<input type="file" name="file" id="file" /> 
					<label for="file" style="color:green">※注:支持任意格式的图片</label>
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