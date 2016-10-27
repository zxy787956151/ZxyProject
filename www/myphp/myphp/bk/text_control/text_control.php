<?php
	include("base.php");
?>
<html>
	<head>
		<style type="text/css">
			div{border: 1px solid #000; text-align:center;}
			a{text-decoration: none;}
			#hid{display: none;}
			td{text-align:center;}
		</style>

		<script src="jquery-1.4.2.min.js"></script>
		<script type="text/javascript">
			$(function(){
				$("#clk").click(function(){
					$("#hid").css("display","block");
				})

				$("#add").click(function(){
					$("#add_text").css("display","block");
					$("#kind_text").css("display","none");
					$("#list_text").css("display","none");
				})

				$("#list").click(function(){
					$("#kind_text").css("display","none");
					$("#list_text").css("display","block");
					$("#add_text").css("display","none");
				})

				$("#kind").click(function(){
					$("#kind_text").css("display","block");
					$("#add_text").css("display","none");
					$("#list_text").css("display","none");
				})
			})
		</script>
	</head>

	<body>
		<div style="width:100%;height:10%">

		</div>

		<div style="width:30%;height:90%;float:left;">
			<div style="width:100%;height:5%;">
				<div style="float:left;margin:10px 0 0 40px;">
					<a href="../index">进入博客</a>/
					<a href="../ht/ht.php">退出</a>
				</div>

				<div style="float:left;width:100%;height:1000%;margin:20px 0 0 0;">
					<ul>
						<li><a href="#">个人管理</a></li><br />
						<li><a href="#" id="clk">文章管理</a>
							<ul id="hid"><br />
								<li><a href="#" id="add">添加文章</a></li><br />
								<li><a href="#" id="list">文章列表</a></li><br />
								<li><a href="#" id="kind">文章类别</a></li>
							</ul>	
						</li><br />
						<li><a href="#">相册管理</a></li><br />
						<li><a href="#">好友管理</a></li><br />
						<li><a href="#">留言管理</a></li><br />
						<li><a href="#">小纸条</a></li>
					</ul>
				</div>

			</div>
		</div>

		<div style="width:69.4%;height:90%;float:left">

<!-- add -->
					<form id="add_text" action='' method='post' style='display:none'>

						<div style='width:100%;height:5%'>
							<span style='float:left;margin:10px 0 0 190px'>添加博客文章</span>
						</div>
						<div style='width:20%;height:5%;float:left;'>文章标题</div>
						<div style='width:79%;height:5%;float:left;'>
							<input type='text' name='title' style='width:100%;'>
						</div>

						<div style='width:20%;height:5%;float:left;'>文章类别</div>
						<div style='width:79%;height:5%;float:left;'>
							<select style='margin:5px 0 0 40%'>
								<option>日记</option>
								<option>新版</option>
								<option>更多</option>
							</select>
						</div>

						<div style='width:20%;height:5%;float:left;'>文字编程区</div>
						<div style='width:79%;height:5%;float:left;font-size:8px'>
							<input type='button' name='btn1' value='B'>
							<input type='button' name='btn1' value='I' style='font-style:italic;'>
							<input type='button' name='btn1' value='U'>
							
							字体
							<select>
								<option>宋体</option>
								<option>赵体</option>
								<option>草上飞体</option>
							</select>

							学号
							<select>
								<option>01</option>
								<option>02</option>
								<option>03</option>
							</select>

							颜色
							<select style='width:10%'>
								<option>默认颜色</option>
								<option>red</option>
								<option>yellow</option>
							</select>
						</div>

						<div style='width:20%;height:75%;float:left;'>
							<span style='float:left;margin:200% 0 0 20%'>文章内容:</span>
						</div>
						<div style='width:79%;height:75%;float:left;'>
							<input type='text' name='text' style='width:100%;height:100%'>
						</div>

						<div style='width:100%;height:3%;float:left;'>
							
								<input style='margin:auto; margin-left:45%' type='submit' name='sub' value='提交'>
							
						</div>
					</form>

<!-- list -->

					<form id="list_text" action="" method="post" style='display:none'>
						<div style="width:100%;height:5%"><span style="float:left;margin:5px 0 0 200px">文章列表</span></div>
						<table border="1" style="width:100%;height:50%">
							<tr style="height:10%">
								<td style="width:10%;"></td>
								<td style="width:20%;">类别</td>
								<td style="width:50%;">标题</td>
								<td style="width:20%;">点击率</td>
							</tr>

							<tr>
								<td style="width:10%;"><input type="checkbox" name="chbox"></td>
								<td style="width:20%;"></td>
								<td style="width:50%;"></td>
								<td style="width:20%;"></td>
							</tr>

							<tr>
								<td style="width:10%;"><input type="checkbox" name="chbox"></td>
								<td style="width:20%;"></td>
								<td style="width:50%;"></td>
								<td style="width:20%;"></td>
							</tr>

							<tr>
								<td style="width:10%;"><input type="checkbox" name="chbox"></td>
								<td style="width:20%;"></td>
								<td style="width:50%;"></td>
								<td style="width:20%;"></td>
							</tr>

							<tr>
								<td style="width:10%;"><input type="checkbox" name="chbox"></td>
								<td style="width:20%;"></td>
								<td style="width:50%;"></td>
								<td style="width:20%;"></td>
							</tr>

							
						</table>
						<div style="width:100%;height:3%;">
							<a href="#">全选</a>
							<a href="#">反选</a>
							<input type="button" name="delete" value="删除选择">
							&nbsp;&nbsp;
							<a href="#">首页</a>
							<a href="#">上一页</a>
							<a href="#">下一页</a>
							<a href="#">尾页</a>
							当前页是第几页/共几页几条记录&nbsp;跳转到:
							<select>
								<option>1页</option>
							</select>	
							页
						</div>	
					</form>

<!-- kind -->					
					<form action="" method="post" id="kind_text" style="display:none">
						<div style="width:100%;height:5%"><span style="float:left;margin:5px 0 0 200px">文章类别管理</span></div>
					
						<table border="1" style="width:100%;height:15%">
							<tr style="height:5%">
								<td>日记</td>
								<td>
									<input type="button" name="delect" value="删除">
								</td>
							</tr>

							<tr style="height:5%">
								<td>新版</td>
								<td>
									<input type="button" name="delect" value="删除">
								</td>
							</tr>

							<tr style="height:5%">
								<td>
									<input type="text" name="add_kind_text">
								</td>
								<td>
									<input type="button" name="add_kind_btn" value="添加新类">
								</td>
							</tr>
						</table>
					</form>	
			
		</div>
	</body>
</html>