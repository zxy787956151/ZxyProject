<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<style>
		*{padding:0px;margin: 0px;font-size:14px;}
ul,ol{list-style:none;}
a{ text-decoration: none;color:#3361AD;}
iframe{width:100%;height:100%;border:none;}
table{width:100%;}
table,th,td{ border-collapse: collapse;background:#fff;}
th{ text-align: right;}
th,td{padding:8px 8px;}
input,button{ border:solid 1px #dcdcdc;height:30px;padding:3px 6px;color:#999;background:#fff; vertical-align: middle;}
select{border:solid 1px #ccc;}
img{border:none; vertical-align: middle;}
.len100{width:100px;}
.len150{width:159px;}
.len200{width:200px;}
.len250{width:250px;}
.len300{width:300px;}
.len350{width:350px;}
.len400{width:400px;}
.l{float:left;}
.r{float:right;}
.c{clear: both;}
em{color:#f00;font-style:normal;line-height:1.8em;border-collapse:collapse;}/**红星**/
.submit{background:#255E9C;height:30px;padding:0px 30px;line-height:1.8em;color:#fff;font-size:16px; cursor: pointer;}
.error{padding:3px;line-height: 1.2em;margin-top:8px; font-size:12px;color:#f00;}
span.msg{color:#666;border:solid 1px #eee;padding:6px;margin-left:10px;}
.content{padding:10px;}

/****表格样式1********/
.table{width:100%;}
.table,.table td{border:solid 1px #ccc;}
.table th{border:solid 1px #ccc;width:100px;}
.table thead tr td{background: #eee;color:#333;}

/******按钮*******/
.bt1{padding:8px 15px;margin-right:6px; background: #ccc;color:#000;border-radius: 3px; text-align: center;float:left;display: block;cursor: pointer;}
.bt2{padding:8px 15px;margin-right:6px; background: #4884D5;color:#fff;border-radius: 3px; text-align: center;float:left;display: block;cursor: pointer;}
	</style>
</head>
<body>
	<form action='<?php echo U(GROUP_NAME . "/Index/Index/forget_skip");?>' method="post">
		
		<table class="table">
			<tr>
				<th colspan="2" style="text-align:center">密码找回</th>
			</tr>

			<tr>
				<td align="right">用户名: </td>
				<td>
					<input id="un" type="text" name="name" />
				</td>
			</tr>

			

			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="pid" value='<?php echo ($pid); ?>' />
					<input id="sub" type="submit" value="找回密码" />
				</td>
			</tr>
		</table>

	</form>
</body>
</html>