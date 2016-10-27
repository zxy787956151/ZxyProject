<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="/hotel/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/hotel/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	window.UEDITOR_HOME_URL='/hotel/Ueditor/';
	window.onload=function(){
    //调整编辑器的高度和宽度
	//window.UEDITOR_CONFIG.initialFrameHeight=800;
	window.UEDITOR_CONFIG.initialFrameWidth=1390;
	UE.getEditor('content');
	window.UEDITOR_CONFIG.imageUrl=URL+"<?php echo U(GROUP_NAME.'/Blog/upload');?>";
	//window.UEDITOR_CONFIG.imagePath=URL+"php/";
}
</script>
</head>
<body>
	<form action="<?php echo U('List/runList');?>" method="post"> 
       <table>
	   	<tr bgcolor="#d5f4fe">
	   		<th colspan='2'>简介管理</th>
	   	</tr>
	   	<tr>
	   		<td align="right">所属分类：</td>
	   		<td>
            <select name="cid">
              <option>===请选择分类===</option>
              <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><option value="<?php echo ($v["id"]); ?>"><?php echo ($v["name"]); ?></option><?php endforeach; endif; ?>
            </select>
	   		</td>
	   	</tr>
	   	<tr>
	        <td colspan='2'>
            <textarea name="content" id="content"></textarea>
	        </td>
	   	</tr>
	   	<tr>
	   		<td align="center" colspan='2'><input type="submit" value="发布"/></td>
	   	</tr>
   	</table>
	</form>
</body>
</html>