<?php 
	namespace Home\Controller;
	use Think\Controller;
	Class AjaxController extends Controller{
		Public function index(){
			$this->display();
		}
		Public function run(){
			session_start();
			if(@$_GET['action']=='demo'){
				$arr['success']=1;
				if ($_POST['user']=='zxy') {
					$arr['userResult']='用户名正确';
				}
				else{
					$arr['userResult']='用户名错误!';
				}

				if ($_POST['pass']=='zxy') {
					$arr['passResult']='密码正确';
				}
				else{
					$arr['passResult']='密码错误!';
				}
				echo json_encode($arr);	//将数值转换成json数据存储格式
			}
		}
	}



 ?>
