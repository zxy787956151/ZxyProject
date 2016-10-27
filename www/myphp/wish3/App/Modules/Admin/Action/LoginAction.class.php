<?php
	Class LoginAction extends Action{
		/**
		 * 登录视图
		 */

		Public function index(){
			// var_dump(C('SESSION_AUTO_START'));

			// echo session_id();

			// $_SESSION['username'] = 'admin';
			// // echo C('username');//输出配置项用C
			// die();
			$this->display();
		}

		Public function verify(){
			import('ORG.Util.Image');
			Image::buildImageVerify(1, 1, 'png');
		}

		Public function login(){
			if (!IS_POST) halt('页面不存在!');
			// echo $_SESSION['verify']."<br/>";
			// echo md5($_POST['code'])."<br/>";
			// p($_POST);

			//判断验证码对不对
			// if (I('code', '', 'md5') != session('verify')) {
			// 	$this->error('验证码错误')
			// }

			$username = I('username');
			$pwd = I('password', '', 'md5');

			$user = M('user')->where(array('username' => $username))->find();
			//查找看看有没有这个用户
			// var_dump($user);

			if (!$user || $user['password'] != $pwd) {
				$this->error('账号或密码错误');
			}

			if ($user['lock']) $this->error('用户被锁定!');

			$data = array(
					'id' => $user['id'],
					'logintime' => time(),
					'loginip' => get_client_ip(),			
					);
			// p($data);
			M('user')->save($data);//在数据库更新记录

			//将信息写入session
			session(C('SUER_AUTH_KEY'), $user['id']);
			session('username', $username['username']);
			session('logintime',date('Y-m-d H:i:s', $user['logintime']));
			session('loginip', $user['loginip']);


			//超级管理员识别
			if ($user['username'] == C('RBAC_SUPERADMIN')) {
				session(C('ADMIN_AUTH_KEY'), true);
			}
			//读取用户权限
			import('ORG.Util.RBAC');
			RBAC::saveAccessList();
			// p($_SESSION);
			// die();

			$this->redirect('Admin/Index/index');
			//跳转到wish3/index.php/Admin/Index/index
		}
	}
?>
<!-- create table hd_user(id int unsigned not null primary key auto_increment, username char(20) not null default '', password char(32) not null default '', logintime int(10) unsigned not null, loginip varchar(30) not null, `lock` tinyint(1) unsigned not null default 0,unique(username)) engine myisam default charset utf8; -->
<!-- insert into hd_user set username = 'admin', password = md5('admin'), logintime = unix_timestamp(now()), loginip = 'my.php.com'; -->
