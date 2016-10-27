<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>综合测评管理/登录</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/login.css">
	<script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/shuffling.js"></script>
</head>
<body>
	<div class="content_first">
		<div class="title">
			<img src="__PUBLIC__/img/title.jpg">
			<h3>学生综合测评管理系统</h3>
		</div>
		<div class="content_second">
			<form action="<?php echo U(GROUP_NAME .'/Index/submit');?>" method="post">
			   <div class="content-h3">
			   	<h3>用户登录</h3>
			   </div>
			   <div class="content-input" id="input1">
			   	<img src="__PUBLIC__/img/user.png">
			   	<input type="text" name="username" class="input_first" placeholder="账号/学号"/>
			   </div>
               <div class="content-input" id="input2">
               	<img src="__PUBLIC__/img/password.png">
               	<input type="password" name="password" class="input_second" placeholder="用户密码"/>
               </div>
               <a href="<?php echo U(GROUP_NAME . '/Registered/index');?>">注册用户</a>
               <input type="submit" name="submit" value="登录" class="submit"/>
            </form> 
		</div>
		<div class="shuffling">
          <ul class="shuffling_box">
          <li style=" opacity: 1;filter:alpha(opacity=100);">
          	<img src="__PUBLIC__/img/1.png">
          </li>
          <li>
          	<img src="__PUBLIC__/img/2.png">
          </li>
          </ul>
        </div>
	</div>
</body>
</html>

<!-- <!doctype html>
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
			<form action="<?php echo U(GROUP_NAME .'/Index/submit');?>" method="post">
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
</html> -->