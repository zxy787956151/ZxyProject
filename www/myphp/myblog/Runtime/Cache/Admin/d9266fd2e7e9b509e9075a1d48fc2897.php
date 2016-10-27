<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML><HEAD>
<META http-equiv=Content-Type content="text/html; charset=utf-8">
<script type="text/javascript" src="/myblog/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/myblog/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	window.UEDITOR_HOME_URL='/myblog/Ueditor/';
	window.onload=function(){
	//window.UEDITOR_CONFIG.initialFrameHeight=800;
	window.UEDITOR_CONFIG.initialFrameWidth=800;
	UE.getEditor('content');
}
</script>
</head>
<body id="room">
<form action="<?php echo U('Blog/runaddBlog');?>" method="post"> 
       <table width="100%" border='0'>
	   	<tr>
	   		<th><h1>日记碎言碎语发布<h1></th>
	   	</tr>
	   	<tr>
	   		<td>博文标题：<input type="text" name="title" size="115px"/>
	   		</td>
	   	</tr>
	   	<tr>
		   	<td>博文出自：<input type="text" name="where"/>
		   	    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;上传图片：<input type="file" name="file"/>
		   	</td>
	   	</tr>
	   	<tr>
            <td colspan='2'>
            <textarea name="content" id="content"></textarea>
            </td>
	   	</tr>
	   	<tr><td colspan='2' align="center"><input type="submit" value="发表"/></td></tr>
	   	</table>
</form>
</body>
</html>