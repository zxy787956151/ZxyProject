<?php 
	/**
	 * fiel:login.php 提供用户登录表单和处理用户登录
	 */

	// var_dump(md5(user));
	// die();
	header("Content-Type:text/html;charset=utf-8");

	session_start();

	// require "connect.inc.php";
	$dsn = "mysql:dbname=xishuoPHP;host=127.0.0.1";

		$user = "root";

		$password = "";

		try{
			$dbh = new PDO($dsn,$user,$password);
			// $dbh = new PDO('xishuoPHP/dbcontent.txt',$user,$password);	q
			echo "<br/>连接成功!<br/>";
		}catch(PDOException $e){
			echo '数据库连接失败！：'.$e->getMessage();
		}

	if (isset($_POST['sub'])) {

		$query = 'select username,userpwd from user where username=:name and userpwd=:pwd';

		$stmt = $dbh->query($query);
		
		$stmt->bindParam(':name',$name);
		$stmt->bindParam(':pwd',$pwd);  
		$name = $_POST['username'];
		$pwd = $_POST['password'];
		$stmt->execute();
		
		// $stmt = $pdo->prepare("insert into user(username,userpwd)values(:username,:pwd)");


 	// 	$stmt->bindParam(':username',$username);
 	// 	$stmt->bindParam(':pwd',$pwd);
 	// 	$username = $_POST['username'];
 	// 	$pwd = $_POST['password'];
		// // $stmt->bindParam(':name',$name);  
		// $stmt->execute();

		foreach ($stmt as $v) {
			var_dump($v['username']);
		}

		if ($stmt->rowCount()>0) {
			$_SESSION = $stmt->fetch(PDO::FETCH_ASSOC);	
			$_SESSION["isLogin"]=1;
			header("Location:index.php");
		}else{
			echo '<font color="red">用户名或密码错误！</font>';
		}
	}
 ?>
 <html>
 <head>
 	<title>邮件系统登录</title>
 </head>
 <body>
 	<p>欢迎光临邮件系统,Session ID;<?php echo session_id();?></p>
 	<form action="login.php" method="post">
 		用户名：<input type="text" name="username"><br/>
 		密&nbsp;&nbsp;&nbsp;码：<input type="password" name="password"><br/>
 		<input type="submit" name="sub" value="登录" />	
 	</form>
 </body>
 </html>