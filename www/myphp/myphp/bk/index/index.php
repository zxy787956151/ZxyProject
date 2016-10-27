<?php
 include("base.php");
?>

<html>
	<head>
		<style type="text/css">
			div{border: 1px solid #000; text-align:center;}
			a{text-decoration: none;}
		</style>
	</head>

	<body style="width:60%;height:100%;margin:auto">
		<form>
			<div style="width:100%;height:3%">
				<a href="#" style="margin-left:500px">登录</a>&nbsp;|&nbsp;<a href="#">注册</a>

				<?php
					if (1) {
						echo "|&nbsp;<a href='../ht/ht.php'>进入后台</a>";
					}
				?>
			</div>

			<div style="width:100%;height:20%"></div>

			<div style="width:100%;height:4%">
				<span style="float:right;margin:5px 0 0 0;">
					<a href="../mytext/mytext.php">我的文章</a>&nbsp;|
					<a href="#">我的相册</a>&nbsp;|
					<a href="#">我的资料</a>&nbsp;|
					<a href="#">我的好友</a>&nbsp;
				</span>	
			</div>

			<div style="width:25%;height:35%;float:left">
				<div style="width:100%;height:10%;">
					<div style="width:15%;height:100%;float:left">pho</div>
					<span style="float:left;margin: 3px 0 0 0">个人信息</span>
				</div>

				<div style="width:50%;height:40%; margin: 5% 0 0 25%">
					<br /><br />picture
				</div>
				<br />
				<span><b>博主:赵修宇</b></span><br />
				<span><b>博客点击率:</b>几次</span>

				<div><span>pho加为好友</span></div>
				<div><span>pho发送小纸条</span></div>
			</div>

			<div style="width:44%;height:70%;float:left">
				<div style="width:100%;height:7%;border-bottom:1px dashed #000000;">
					<span style="float:left;margin:8px 0 0 0">pho文章列表</span>
				</div>

				<div style="border:0px;width:100%;height:5%">
					<span style="float:left;margin:5px 0 0 0;">文章标题:</span>
					<span style="float:right;margin:5px 100px 0 0;">发表时间:</span>
				</div>

				<div style="border-bottom:1px dashed #000000;width:100%;height:20%">
					text
				</div>


				<br />
				<div style="width:100%;height:7%;border-bottom:1px dashed #000000;">
					<span style="float:left;margin:8px 0 0 0">pho文章列表</span>
				</div>

				<div style="border:0px;width:100%;height:5%">
					<span style="float:left;margin:5px 0 0 0;">文章标题:</span>
					<span style="float:right;margin:5px 100px 0 0;">发表时间:</span>
				</div>

				<div style="border-bottom:1px dashed #000000;width:100%;height:20%">
					text
				</div>

				<div style="width:100%;height:5%">
					<span>
						<a href="#" style="float:left;margin:3px 0 0 0">首页</a>
						<a href="#" style="float:left;margin:3px 0 0 5px">上一页</a>
						<a href="#" style="float:left;margin:3px 0 0 5px">下一页</a>
						<a href="#" style="float:left;margin:3px 0 0 5px">尾页</a>
						当前是第几页|共几页几条记录&nbsp;跳转到:
						<select>
							<option>1</option>
							<option>more</option>
						</select>页
					</span>
				</div>

				<br /><input type="text" name="liuyan" style="width:50%;height:20%">
				<br /><input type="submit" name="sub" value="留言">
			</div>

			<div style="width:30%;height:70%;float:left">
				<div style="width:100%;height:5%">
					<span style="float:left;margin:3px 0 0 0">pho热门文章</span>
					
				</div>

				<div style="width:100%;height:10%;">
						<ul>
							<li><a href="#">公司概况</a></li>
							<li><a href="#">公司标语</a></li>
						</ul>
				</div>


				<br /><br />
				<div style="width:100%;height:5%">
					<span style="float:left;margin:3px 0 0 0">pho文章分类</span>
					
				</div>

				<div style="width:100%;height:10%;">
						<ul>
							<li><a href="#">日记(0)</a></li>
							<li><a href="#">员工手册(0)</a></li>
							<li><a href="#">明日科技(0)</a></li>
						</ul>
				</div>


				<br /><br />
				<div style="width:100%;height:5%">
					<span style="float:left;margin:3px 0 0 0">pho照片分类</span>
					
				</div>

				<div style="width:100%;height:10%;">
						<ul>
							<li><a href="#">我的相册(0)</a></li>
						</ul>
				</div>

				<br /><br />
				<div style="width:100%;height:5%">
					<span style="float:left;margin:3px 0 0 0">pho好友连接</span>
					
				</div>

				<div style="width:100%;height:10%;">
					<br />还没有好友连接
				</div>
			</div>

			<div style="float:left;width:25%;height:25%;margin:-30% 0 0 0">
				日历
			</div>

			<div style="float:left;width:25%;height:5%;margin:-70px 0 0 0">
				<span>pho留言列表</span>
				<br />暂时没有留言
			</div>
		</form>	
	</body>
</html>