<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<style type="text/css">
</style>
</head>
<body id="room">
<form action="<?php echo U('Diary/runaddDiary');?>" method="post"> 
       <table width="100%" border='0'>
	   	<tr>
	   		<th><h1>日记碎言碎语发布<h1></th>
	   	</tr>
	   	<tr>
	   		<td>所属分类:&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
	   		<select width="30" name="cid">
              <option>===请选择分类===</option>
              <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>
	   		</td>
	   	</tr>
	   	<tr><td>内容：</td></tr>
	   	<tr>
            <td colspan='2'>
            <textarea name="content" style="width:700px;height:200px"></textarea>
            </td>
	   	</tr>
	   	<tr><td><input type="submit" value="发表"/></td></tr>
	   	</table>
</form>
</body>
</html>