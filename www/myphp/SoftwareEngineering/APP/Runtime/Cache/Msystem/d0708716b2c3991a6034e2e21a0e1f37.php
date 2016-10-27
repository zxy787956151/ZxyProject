<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>综合测评管理/登录</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">
</head>
<body>
	<div class="content_first">
		<div class="information_bar">
			<img src="__PUBLIC__/img/information_bar.png">
		</div>
		<div class="content_second">
			<h1>综合测评管理系统</h1>
			<form action="<?php echo U(GROUP_NAME .'/Login/submit');?>" method="post">
               <span class="User_name">User name</span>
               <input type="text" name="username" class="input_first"/>
               <br/>
               <span class="Password">Password</span>
               <input type="password" name="password" class="input_second"/>
               <a href="<?php echo U(GROUP_NAME . '/Registered/index');?>">注册</a>
               <input type="submit" name="submit" value="登录" class="submit"/>
            </form>
		</div>
	</div>
</body>
</html>