<?php
	/**
	 * 后台登录控制器
	 */
	Class LoginAction extends Action {
		//Class没有()

		//登录页面视图
		Public function index() {
			// echo GROUP_NAME;
			$this->display();
		}

		//登录表单操作
		Public function login() {
			// p($_POST);
			//think函数dump($_POST);

			if (!IS_POST) halt('页面不存在');

			if (I('code', '', 'strtolower') != session('verify')) 
				$this->error('验证码错误');

			$db = M('user');
			$user = $db->where(array('username' => I('username')))->find();	
		
			if (!$user || $user['password'] != I('password', '', 'md5')) {
				$this->error('账号或密码错误');
			}

			//更新最后一次登录时间与IP
			$data = array(
					'id' => $user['id'],
					'logintime' => time(),
					'loginip' => get_client_ip()
				);
			$db->save($data);

			session('uid', $user['id']);
			session('username', $user['username']);
			session('logintime', date('Y-m-d H:i:s', $user['logintime']));
			session('loginip', $user['loginip']);

			// p($_SESSION);
			redirect(__GROUP__);
			//redirect跳转,参数为URL地址
			// p(__GROUP__);
			// __GROUP__///blog/index.php/Admin
		}


		Public function verify() {
			import('Class.Image', APP_PATH);
			//由ThinkPHP/Extend/Library...改为APP/Class...
			//@代表当前项目 : ./APP/Modules/Admin/Class/Image.class.php
			//第二个参数APP_PATH : ./APP/Class/Image.class.php
			// Image::buildImageVerify();

			Image::verify();
		}
	}
?>