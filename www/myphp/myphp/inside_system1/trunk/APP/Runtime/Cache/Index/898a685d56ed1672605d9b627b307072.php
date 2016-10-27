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
<script src="__INDEX__/jw/jquery-1.7.1.min.js" type="text/javascript"></script>
	<script type="text/javascript">
    
   	 	var URL = '<?php echo U(GROUP_NAME . "/Index/verify");?>/';

    
        function change_code(obj){
        $("#code").attr("src",URL+Math.random());
        	return false;
        }
</script>
<script type="text/javascript">
	$(function(){
		// // alert($("#un").val());
		// var zz = /^\w{1,20}$/;
		// var tx = $("#un").val();

		// // var pdd=-1;

		// // $("#un").focus(function(){
		// // 	if(tx.match(/[^\u4e00-\u9fa5]/g)!=null){
		// // 		pdd = 1;
		// // 	}
		// // })

		// $("#sub").click(function(){
		// 	// if(tx.match(/w)==null)
		// 	// 	{
		// 	// 		alert("用户名不能为汉字,可以为字母数字下划线!");
		// 	// 		$(this).val('');
		// 	// 		// tx.match(/[^\u4e00-\u9fa5]/g)=1;
		// 	// 	}
		// 	alert(zz.test(tx));
		// })
	})
</script>
</head>
<body>
	<!-- 这里是Index(前台下的)Login控制器里的login方法 -->
	<form action="<?php echo U(GROUP_NAME . '/Index/Login/login_dispose');?>" method="post">
		
		<table class="table">
			<tr>
				<th colspan="2" style="text-align:center">实验室成员注册</th>
			</tr>

			<tr>
				<td align="right">用户名: </td>
				<td>
					<input id="un" type="text" name="name" />
				</td>
			</tr>

			<tr>
				<td align="right">密码: </td>
				<td>
					<input type="password" name="pwd1" value="100" />
				</td>
			</tr>

			<tr>
				<td align="right">确认密码: </td>
				<td>
					<input type="password" name="pwd2" value="100" />
				</td>
			</tr>

			<tr>
				<td align="right">邮箱: </td>
				<td>
					<input type="text" name="sort" value="100" />
				</td>
			</tr>

			<tr>
				<td align="right">密保问题: </td>
				<td>
					<input type="text" name="que" value="100" />
					<span>
						请您自主定义您的密保问题
					</span>
				</td>
			</tr>

			<tr>
				<td align="right">密保答案: </td>
				<td>
					<input type="text" name="ans" value="100" />
					<span>
						请您自主定义您的密保答案
					</span>
				</td>
			</tr>

			<tr>
				<td align="right">验证码: </td>
				<td>
					<img src='http://my.php.com/inside_system/index.php/Index/Index/verify' id='code'/> 
            <input id='code_text' type='code' name='code'/>
            <a href='javascript:void(change_code(this));'>看不清</a>

			<span style="color:red">&nbsp;&nbsp;</span>
				</td>
			</tr>

			<tr>
				<td colspan="2" align="center">
					<input type="hidden" name="pid" value='<?php echo ($pid); ?>' />
					<input id="sub" type="submit" value="成员注册" />
				</td>
			</tr>
		</table>

	</form>
</body>
</html>