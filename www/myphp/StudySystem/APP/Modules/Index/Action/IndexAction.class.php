<?php 

session_start();
	Class IndexAction extends Action{
		Public function index(){
			$this->display();
		}

		Public function ajax(){
				$user = M('user')->select();
				foreach ($user as $v) {}
				$arr['success']=1;
				if ($_POST['user']==$v['username']) {
					if (md5($_POST['pass'])==$v['password']) {
						$arr['sub']=1;
					}else{
						$arr['result']="密码错误!";
						$arr['sub']=0;
					}
				}else{
					$arr['result']="用户名错误!";
					$arr['sub']=0;				
				}
				$arr['user'] = $_POST['user'];
				echo json_encode($arr);
			
			
		}
	}
 ?>