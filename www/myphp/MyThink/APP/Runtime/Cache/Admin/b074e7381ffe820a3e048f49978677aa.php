<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<title></title>
</head>
<body>
	<form action="__GROUP__/Index/do_update" method="post">
		原密码:<input type="password" name="pwd1"/>
			<br/><br/>
		新密码:<input type="password" name="pwd2"/>
			<br/><br/>
		确认新密码:<input type="password" name="pwd3"/>
			<br/><br/>

			<input type="submit" name="sub" value="修改密码"/>
	</form>
</body>
</html>