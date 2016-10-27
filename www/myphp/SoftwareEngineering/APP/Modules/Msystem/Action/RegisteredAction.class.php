<?php 
	
	include('base.php');

	Class RegisteredAction extends Action{

		Public function index() {
			$this->display();
			
		}

		Public function student() {
			
			$sel = M('user')->select();

			if($_POST['username']==''){
				$this->error('亲!用户名不能为空!');
			}
			if($_POST['password']==''){
				$this->error('亲!密码不能为空!');
			}

			if($_POST['password']!=$_POST['password2']){
				$this->error('两次密码不一致!');
			}

			foreach ($sel as $v) {
				if($v['username']==$_POST['username']){
					$this->error('此用户已注册!无需重复注册');
				}
			}

			$pwd = md5($_POST['password']);
		
			$data = array(
					'username' => $_POST['username'],
					'password' => $pwd,
					'identity' => '0',
				);
			
			$user = M('user');

			if($add = $user->data($data)->add()) {
				$this->success("注册成功!你开心吗?(*^__^*)","__GROUP__/Index/index");
			}	
			
		}

		Public function teacher() {

			$sel = M('user')->select();
			$tea = M('teacher')->select();
			$pd = '0';

			if($_POST['username']==''){
				$this->error('亲!用户名不能为空!');
			}
			if($_POST['password']==''){
				$this->error('亲!密码不能为空!');
			}

			if($_POST['password']!=$_POST['password2']){
				$this->error('两次密码不一致!');
			}

			if($_POST['tid']==''){
				$this->error('教师号不能为空!');
			}

			foreach ($sel as $v) {
				if($v['username']==$_POST['username']){
					$this->error('此用户已注册!无需重复注册');
				}
				
			}

			foreach ($tea as $v) {
				if($v['tid']==$_POST['tid']) {
					$pd = '1';
				}
				
			}
			
			if($pd=='0') {
				$this->error('教师号不存在!');
			}

			$pwd = md5($_POST['password']);

			$data = array(
					'username' => $_POST['username'],
					'password' => $pwd,
					'identity' => '1',
				);
		
			if($add = $user->data($data)->add()) {
				$this->success("注册成功!你开心吗?(*^__^*)","__GROUP__/Index/index");
			}
		}
	}
 ?>
