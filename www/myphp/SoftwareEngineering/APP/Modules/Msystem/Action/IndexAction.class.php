<?php 
	include('base.php');

	Class IndexAction extends Action{
		
		Public function index() {
			$this->display();
		}
		
		Public function submit() {
			$userpd = '0';
			$user = M('user')->select();
			$pwd = md5($_POST['password']);

			if($_POST['username']==''){
				$this->error('亲!用户名不能为空!');
			}
			if($_POST['password']==''){
				$this->error('亲!密码不能为空!');
			}

			foreach ($user as $v) {
				if($v['username']==$_POST['username']) {
					$userpd = '1';
					if($v['password']==$pwd) {
						session_start();
						session('uid', $v['id']);
						session('username', $user['username']);
						$username = $_POST['username'];
						$this->success("登录成功!你开心吗?(*^__^*)","__GROUP__/Main/index?username=$username");
					}
					else{
						$this->error('密码错误!');
					}
				}
			}

			if($userpd=='0'){
				$this->error('用户名不存在!');
			}
		}
	}
 ?>
