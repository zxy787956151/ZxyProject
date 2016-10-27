<?php
	header("Content-Type:text/html;charset=utf-8");
	Class LoginAction extends Action {
		Public function index () {
	        // $this->display();

			$user = M('user')->where(array('username' => $_POST['username']))->find();

			// var_dump(I('password', '', 'md5'));

			if (!$user || $user['password'] != $_POST['password']) {
				$this->error('账号或密码错误');
			}

			if (I('code', '', 'strtolower') != session('verify')) 
				$this->error('验证码错误');

			else{
				$u=$user['username'];
				$this->success('登录成功', U(GROUP_NAME . "/Index/index?u=$u&pd=1"));
				
			}

			// var_dump($user['username']);
			// var_dump($_POST['username']);
			// var_dump($user['password']);
			// var_dump($_POST['password']);

			// var_dump(GROUP_NAME) ;
			//echo __GROUP__;
			// echo $_POST;
		}

		Public function login() {
			$this->display();
			// var_dump(GROUP_NAME);
		}

		Public function login_dispose() {

			$db = M('user');
			$user = M('user')->where(array('username' => $_POST['name']))->find();

			if (preg_match('/^\w{1,20}$/',$_POST['name'])) {
				$this->error("用户名只能用汉字,写你名字就好!");
			}

			if($_POST['pwd1']!==$_POST['pwd2']){
				$this->error("两次输入密码不一致!");
			}
			
			
			// var_dump(GROUP_NAME);
			if (I('code', '', 'strtolower') != session('verify')) 
				$this->error('验证码错误');
			else{

				$data = array(
					'username' => $_POST['name'],
					'password' => $_POST['pwd1'],
					'logintime' => time(),
					'loginip' => get_client_ip(),
					'protect_question' => $_POST['que'],
					'protect_answer' => $_POST['ans'],
				);
				

				$db->add($data);

				session('uid', $user['id']);
				session('username', $user['username']);
				session('logintime', date('Y-m-d H:i:s', $user['logintime']));
				session('loginip', $user['loginip']);
				// U(GROUP_NAME . '/Index/Index/index');{
				$this->success('注册成功!' , "http://my.php.com/inside_system/index.php/Index/Login/login_display");
			}
	}

Public function login_display() {

			// $this->display();
			// var_dump($_GET);
			var_dump(time());
			
			//是字母数字下划线返回 int 1;汉字返回 int 0
		}
			
		}
	
	
?>