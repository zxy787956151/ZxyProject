<?php
/**
 * 后台首页控制器
 */
	Class IndexAction extends CommonAction {
		//Class没有()

		//首页视图
		Public function index () {
			// echo __ROOT__;
			$this->display();
		}

		//退出登录
		Public function logout() {
			session_unset();
			session_destroy();
			$this->redirect(GROUP_NAME . '/Login/index');
		}
	}
		
?>
<!-- create database blog default charset utf8;
create table hd_user (id int unsigned not null primary key auto_increment, username char(20) not null default '' unique, password char(32) not null default '', logintime int(10) unsigned not null default 0, loginip char(20) not null default '');
insert into hd_user set username='admin', password = md5('admin'), logintime = unix_timestamp(now()), loginip = '127.0.0.1'; -->