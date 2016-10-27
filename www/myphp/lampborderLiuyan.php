<html>
<head>
	<title>网络留言板模式</title>
</head>
<body>
	<?php 
		$filename = "xishuoPHP/file.txt";
	 	
	 	

	 	if(file_exists($filename)){

	 		function writeMessage($filename,$message){
	 			$fp = fopen($filename,"a");
	 			if (flock($fp,LOCK_EX)) {
	 				fwrite($fp,$message);
	 				flock($fp,LOCK_UN);
	 			}else{
	 				echo "不能锁定文件!";
	 			}
	 			fclose($fp);
	 		}

	 		function readMessage($filename){
	 			$fp = fopen($filename,"r");
	 			flock($fp,LOCK_SH);
	 			$buffer="";
	 			while (!feof($fp)) {
	 			 	$buffer.=fread($fp,1024);
	 			 } 

	 			$data = explode("<|>",$buffer);

		 		foreach ($data as $line) {
		 			@list($username,$title,$message)=explode("||",$line);

		 			if ($username!=""&&$title!=""&&$message!="") {
		 				echo $username."说：";
		 				echo '&nbsp;'.$title.'，';
		 				echo $message."<br/>";
		 			}	
		 		}

		 		flock($fp,LOCK_UN);
		 		fclose($fp);
	 		}

	 		readMessage($filename);
	 			
	 	}

	 	if (isset($_POST['sub'])) {
	 		$message = $_POST['username']."||".$_POST['title']."||".$_POST['mess']."<|>";
	 		writeMessage($filename,$message);
	 	}
	 ?>

	 <form action="xishuoPHP.php" method="post">
	 	用户名: <input type="text" size=10 name="username"/><br/>
	 	标&nbsp;题 <input type="text" size=30 name="title"/><br/>
	 	<textarea name="mess" rows="4" cols=38>请在这里输入留言信息!</textarea>
	 	<input type="submit" name="sub" value="留言"/>
	 </form>
</body>
</html>