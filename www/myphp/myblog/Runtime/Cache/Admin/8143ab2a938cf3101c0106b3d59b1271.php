<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<style type="text/css">
</style>
</head>
<body id="room">
<form action="<?php echo U('List/answer');?>" method="post"> 
       <table width="100%" border='0'>
	   	<tr>
	   		<th><h1>留言回复<h1></th>
	   	</tr>
	   	<tr><td>内容：</td></tr>
	   	<tr>
            <td colspan='2'>
            <textarea name="content" style="width:700px;height:200px"></textarea>
            </td>
	   	</tr>
	   	<tr><td>
	   	<input type="hidden" name="aid" value="<?php echo ($aid); ?>"/>
	   	<input type="submit" value="回复"/></td></tr>
	   	</table>
</form>
</body>
</html>