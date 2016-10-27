<?php
	header("Content-Type:text/html;charset=utf-8");
	Class IndexAction extends Action {
		Public function index() {
			// dump(GROUP_NAME);
			// die();
			// echo APP_PATH;
			$this->display();
			echo($_GET['u']);
			//var_dump(GROUP_NAME);
		}

		Public function verify() {
			// echo "11";
			import('Class.Image', APP_PATH);
			Image::verify();
		}

		Public function forget() {
			$this->display();
		}
		Public function forget_skip() {
			// var_dump($_POST);
			$u = $_POST['name'];
			redirect("http://my.php.com/inside_system/index.php/Index/Index/forget_find?u=$u");
		}
		Public function forget_find() {
			$this->display();
			// var_dump($_GET['u']);
		}
		Public function forget_deal(){
			// var_dump($_SESSION['que']);
			$user = M('user')->where(array('protect_question' => $_SESSION['que']))->find();
			// var_dump($user['protect_answer']);
			if ($user['protect_answer']==$_POST['ans']) {
				$_SESSION['pwd']=$user['password'];
				$this->success("找回成功!" , "
					http://my.php.com/inside_system/index.php/Index/Index/forget_ok");
			}
			else{
				$this->error("密保答案错误!");
			}
		}

		Public function forget_ok() {
			echo "成功找回! 您的密码是: ".$_SESSION['pwd'];
		}
	}
?>