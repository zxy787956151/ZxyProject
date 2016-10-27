<?php
	/**
	 * 自制session处理机制
	 */
	header("Content-Type:text/html;charset=utf-8");

	ini_set("session.save_handler","user");
	define("FIX","ZXY");
	function start($path,$session_name){
		echo "start<br/>";
		global $session_path;
		$session_path = $path;
		echo $path."<br/>";
		echo session_id()."<br/>";
	}

	function read($sid){
		echo "read<br/>";
		global $session_path;
		$file = $session_path.DIRECTORY_SEPARATOR.FIX.$sid;
		global $session_file;
		$session_file = $file;
		// echo $session_file."<br/>";
		// echo session_id()."<br/>";
		return @file_get_contents($session_file);
	}

	function write($sid,$data){//写操作会一直运行,以防止用户丢失session
		echo "write<br/>";
		var_dump($data);
		global $session_path,$session_file;
		file_put_contents($session_file,$data);//创建文件
		// echo $session_file."<br/>";
		return file_put_contents($session_file, $data)?true:false;
		/*写然是不return的话,后存入的session会直接覆盖所有session变量,
		return了就会往上加*/
	}

	function destroy($sid){
		echo "destroy<br/>";
		global $session_file;
		unlink($session_file);

	}

	function close(){
		echo "close<br/>";
		return true;
	}

	function gc($max_time){
		echo "gc<br/>";
		global $session_path;
		foreach (glob($session_path."/*") as $file) {
			if (fileatime($file)+$max_time<time()) {
				unlink($file);
			}
		}
		return true;
	}
	
	session_set_save_handler("start","close","read","write","destroy","gc");
	session_start();
	$_SESSION['WRITENAME']="赵修宇";
	$_SESSION['URL'] = '787956151@qq.com';
?>