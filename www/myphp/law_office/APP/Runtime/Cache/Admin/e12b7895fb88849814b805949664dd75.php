<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="zh">
<head>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"> 
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>demo</title>

<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/styles1.css">

</head>
<body>


<div class="wrapper">

	<div class="container">
		<h1>律师事务所信息管理系统</h1>
		<form class="form" action="<?php echo U(GROUP_NAME . '/Login/login');?>" method="post">
			<input type="text" placeholder="用户名">
			<input type="password" placeholder="密码">
			<button type="submit" id="login-button">登录</button>
			<button type="submit" id="login-button">注册</button>
		</form>
	</div>
	
	<ul class="bg-bubbles">
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
		<li></li>
	</ul>
	
</div>

<script type="text/javascript" src="__PUBLIC__/js/jquery-2.1.1.min.js"></script>
<script type="text/javascript">
$('#login-button').click(function(event){
	event.preventDefault();
	$('form').fadeOut(500);
	$('.wrapper').addClass('form-success');
});
</script>

</body>
</html>