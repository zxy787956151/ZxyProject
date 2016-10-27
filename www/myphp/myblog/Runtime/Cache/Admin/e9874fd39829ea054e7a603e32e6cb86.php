<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>博客后台登录</title>
<link rel="stylesheet" type="text/css" href="/myblog/Public/Admin/Css/style.css" />
<link rel="stylesheet" type="text/css" href="/myblog/Public/Admin/Css/body.css"/> 
</head>
<body>
<div class="container">
	<section id="content">
		<form action="<?php echo U('Admin/Login/login');?>" method="post">
			<h1>博客后台登录</h1>
			<div>
				<input type="text" placeholder="邮箱" required="" id="username" name="username"/>
			</div>
			<div>
				<input type="password" placeholder="密码" required="" id="password" name="password"/>
			</div>
			<div>
                <p><input type="code" placeholder="验证码" id="code" name="code"/> <img src="<?php echo U('Login/verify');?>" id="code" onclick="this.src=this.src+'?'+Math.random()"/></p>
			</div>
			 <div class="">
				<span class="help-block u-errormessage" id="js-server-helpinfo">&nbsp;</span>			</div> 
			<div>
				<!-- <input type="submit" value="Log in" /> -->
				<input type="submit" value="登录" class="btn btn-primary" id="js-btn-login"/>
				<a href="#">忘记密码?</a>
				<!-- <a href="#">Register</a> -->
			</div>
		</form><!-- form -->
	</section><!-- content -->
</div>
<!-- container -->


<br><br><br><br>
</body>
</html>