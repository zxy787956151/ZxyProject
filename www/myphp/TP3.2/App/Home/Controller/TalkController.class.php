<?php 
	namespace Home\Controller;	//防止命名冲突,应用于大项目
	use Think\Controller;		//控制器 use,在命名空间下要书写 ,找到Think下的Controller类,去继承
	class TalkController extends Controller{
		public function index(){			
			$this->display();
		}

		public function ajax(){
			$arr['success']=1;
			$arr['user'] = $_POST['user'];
			$arr['aaa'] = $_POST['aaa'];
			$arr['bbb'] = $_POST['bbb'];
			$arr['ccc'] = $_POST['ccc'];

			// $arr['pass'] = $_POST['pass'];

			// $user = M('user')->select();
			// foreach ($user as $v) {}
			// $arr['success']=1;
			// if ($_POST['user']==$v['username']) {
			// 	if (md5($_POST['pass'])==$v['password']) {
			// 		$arr['header'] = "http://www.baidu.com";
			// 		$arr['sub']=1;
			// 	}else{
			// 		$arr['result']="密码错误!";
			// 		$arr['sub']=0;
			// 	}
			// }else{
			// 	$arr['result']="用户名错误!";
			// 	$arr['sub']=0;				
			// }
			// $arr['user'] = $_POST['user'];
			echo json_encode($arr);

			// $this->ajaxReturn($arr);
		}
	}
 ?>