<?php
	Class CommonAction extends Action {
		//此函数为自动执行函数,任何方法被调用前都会先调用此方法
		Public function _initialize() {
			// if (!isset($_SESSION[C('USER_AUTH_KEY')])/*!isset($_SESSION['uid']) || !isset($_SESSION['username'])*/) {
			// //如果检查不到session里的用户的识别号	
			// //原为:如果不是通过登录界面登录,URL登录的话,跳回去
			// 	$this->redirect('Admin/Login/index');
			// }

			
			echo "<script type='text/javascript'>alert('弹框!');</script>";

			 
			//是否开启验证(配置项)
				// include("RBAC.class.php");
				// // var_dump(RBAC::AccessDecision(GROUP_NAME));//不出bool(true)	
				// RBAC::AccessDecision(GROUP_NAME) || $this->error('没有权限');
			
		}
	}
?> 