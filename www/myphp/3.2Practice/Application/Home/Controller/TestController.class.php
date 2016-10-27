<?php 
	namespace Home\Controller;
	use Think\Controller;

	class TestController extends Controller{
		Public function index(){
			$this->display();
		}

		Public function find(){

			// phpinfo();
			// $db = new mysqli("localhost","root","","tppractice");

			// $id = md5(uniqid(rand(),1));

			// $address = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

			// $stmt = $db->prepare("UPDATE logins SET hash=? WHERE email=?");

			// $stmt->bind_param('ss', $id, $address);

			// $stmt->execute();
		}

		Public function sendEmail(){
			mail("787956151@qq.com", "subject", "body");
		}

		Public function  speed(){
			$data = file_get_contents("wstmall_v1.4.4_160308.rar");
			$fsize = filesize("wstmall_v1.4.4_160308.rar") / 1024;
			$start = time();
			echo "<!-- $data -->";
			$stop = time();
			$duration = $stop - $start;
			$speed = round($fsize / $duration,2);
			echo "Your network speed: $speed KB/sec";
		}
	}
 ?> 
<!--  create table logins(
 id tinyint unsigned not null auto_increment primary key,
 email varchar(55) not null,
 username varchar(16) not null,
 pswd char(32) not null,
 hash char(32) not null
 ); -->