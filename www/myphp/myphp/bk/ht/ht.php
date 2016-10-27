<?php
	include("base.php");
?>
<html>
	<head>
		<style type="text/css">
			div{border: 1px solid #000; text-align:center;}
			a{text-decoration: none;}
			#menu span a{color:#fff}
			td{text-align:center;}
		</style>

		<script src="jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#usergl").click(function(){
					$(".hid").css("display","block");
				})
			})
		</script>
	</head>

	<body>

		<form action="" method="post">
			<div style="width:100%;height:10%"></div>
			<div id="menu" style="width:100%;height:5%;background-color:blue">
				<span style="float:left;margin:8px 0 0 80px;color:#fff"> 
					|&nbsp;<a href="../text_control/text_control.php" id="textgl">文章管理</a>&nbsp;|
					&nbsp;<a href="#" id="usergl">用户管理</a>&nbsp;|
					&nbsp;<a href="#">图片管理</a>&nbsp;|
					&nbsp;<a href="#">管理员设置</a>&nbsp;|
					&nbsp;<a href="#">系统日志</a>&nbsp;|
					&nbsp;<a href="#">数据备份</a>&nbsp;|
					&nbsp;<a href="../index">退出后台管理</a>&nbsp;
				</span>
			</div>

			<div style="width:100%;height:20%;">
				<div style="width:100%;height:40%">
					查询:&nbsp;
					<select>
						<option>编号</option>
						<option>more</option>
					</select>&nbsp;&nbsp;

					<select>
						<option>大于</option>
						<option>more</option>
					</select>

					<input type="text" name="cx_text" style="width:35%">
					<input type="submit" name="sub" value="查询">
				</div>

				<div class="hid" style="margin:60px 0 0 0;display:none">账号管理中心</div>
			</div>

			<table class="hid" border="1" style="width:100%;height:30%;display:none;" >
				<tr style="height:15%">
					<td></td>
					<td>编号</td>
					<td>用户账号</td>
					<td>email</td>
					<td>真实姓名</td>
					<td>性别</td>
					<td>生日</td>
					<td>博客点击率</td>
					<td>推荐</td>
					<td>冻结/解冻</td>
					<td>详细资料</td>
				</tr>

				<tr>
					<td><input type="checkbox" name="chbox"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="chbox"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="chbox"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>

				<tr>
					<td><input type="checkbox" name="chbox"></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
				</tr>
			</table>

			<div class="hid" style="width:100%;height:5%;display:none">
				<span style="float:left">
					<a href="#">全选</a>&nbsp;<a href="#">反选</a>&nbsp;&nbsp;
					<input type="button" name="delete" value="删除选择">
				</span>
				
				<span>
					<a href="">首页</a>
					<a href="">上一页</a>
					<a href="">下一页</a>
					<a href="">尾页</a>
					当前是第几页/共几页几条记录&nbsp;跳转到:
					<select>
						<option>1</option>
						<option>more</option>
					</select>
					页
				</span>
			</div>
		</form>	
	</body>	
</html>