<?php 
	echo "success!";

	session_start();
	$_SESSION['isLong']=1;

	if (isset($_SESSION['isLong'])&&$_SESSION['isLong']===1) {
		echo "<p>当前用户为：<b>".@$_SESSION['username']."</b>,&nbsp;";
		echo "<a href='logout.php'>退出</a></p>";
	}else{
		header("Location:login.php");
		exit;
	}
 ?>
 <html>
 <head>
 	<title>邮件系统</title>
 </head>
 <body>
 	<?php 
 		require "connect.inc.php";

 		$stmt = $pdo->prepare("SELECT id,mailtitle,maildt FROM MAIL WHERE uid=?");
 		$stmt->execute(array(@$_SESSION['id']));
 	 ?>

 	 <p>你的信箱中有<b><?php echo $stmt->rowCount(); ?></b>邮件</p>
 	 <table border="0" cellspacing="0" cellpadding="0" width="380">
 	 	<tr><th>编号</th><th>邮件标题</th><th>接收时间</th></tr>
 	 	<?php 
 	 		while (list($id,$mailtitle,$maildt)=$stmt->fetch(PDO::FETCH_NUM)) {
 	 			echo '<tr align="center">';
 	 			echo '<td>'.$id.'</td>';
 	 			echo '<td>'.$mailtitle."</td>";
 	 			echo '<td>'.date("Y-m-d H:i:s",$maildt).'</td>';
 	 			echo '</tr>';
 	 		}
 	 	 ?>
 	 </table>
 </body>
 </html>