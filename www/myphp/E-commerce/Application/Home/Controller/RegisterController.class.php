<?php 
	namespace Home\Controller;
	use Think\Controller;
	include 'base.php';
	Class RegisterController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0);
			$this->display();
		}

		Public function reg(){
			// var_dump($_POST);
			//此功能进入模型
			// if (!preg_match("/^[\x{4e00}-\x{9fa5}]{1,2}+$/u",$_POST['first'])) {
			// 	$this->error("名字不能为空!,切必须为1或2个汉字!");
			// }

			// if (!preg_match("/^[\x{4e00}-\x{9fa5}]{1,2}+$/u",$_POST['last'])) {
			// 	$this->error("姓氏不能为空!,切必须为1或2个汉字!");
			// }

			// if (!preg_match("/^[0-9a-zA-Z]+@(([0-9a-zA-Z]+)[.])+[a-z]{2,4}$/i",$_POST['email'])) {
			// 	$this->error("邮箱空或邮箱格式错误!");
			// }

			// if (!preg_match("/^[\w]{6,8}$/u",$_POST['pwd'])) {
			// 	$this->error("密码必须为6~8位任意字母数字下划线组合!");
			// }

			$Hu = D('homeuser');
			if (!$Hu->create()) {
				$this->error($Hu->getError());
                exit();
			}else{
				// $data = "firstname=$_POST[first]&lastname=$_POST[last]&email=$_POST[email]&pwd=$_POST[pwd]";
				$data = array(
						'firstname' => $_POST['first'],
						'lastname' => $_POST['last'],
						'email' => $_POST['email'],
						'pwd' => md5($_POST['pwd']),
					);
				$Hu->data($data)->add();

				$this->success("注册成功!",U('Account/index'));
			}

			
		}
	}
 ?>
<!-- create table HomeUser(id int unsigned not null primary key auto_increment,firstname char(20),lastname char(20),email char(40),pwd char(30));
create table Contact(id int unsigned not null primary key auto_increment,name char(30),email char(30),subject char(30),message char(50));
create table product(id int unsigned not null primary key auto_increment,photo char(20),name char(20),price char(20),color char(20),size char(20),TAG char(20),SKU char(20),cid int,description char(50),reviews char(40));
create table car(id int unsigned not null primary key auto_increment,cid int,stock_status char(20)); -->

<!--  
$User = D("User"); // 实例化User对象
if (!$User->create()){ // 创建数据对象
// 如果创建失败 表示验证没有通过 输出错误提示信息
exit($User->getError());
}else{
// 验证通过 写入新增数据
$User->add();
}
 -->