<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class AccountController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0);
			$this->display();
		}

		Public function acc(){
			$Hu = D('homeuser');

			if (!$Hu->create()) {
				$this->error($Hu->getError());
                exit();
			}else{
				$where['email'] = $_POST['email'];
				$pwd = $Hu->where($where)->select();
				foreach ($pwd as $v) {}
				if (md5($_POST['pwd'])==$v['pwd']) {
					//用户跟随为什么不用会话!
					$_SESSION['user'] = $v['email'];
					$this->success("登录成功!",U('Index/index?user=',array("user"=>$v['email'])));
				}else{
					$this->error("账号或密码错误!");
				}
				
			}
		}

		Public function out(){
            unset($_SESSION['user']);
            if (!isset($_SESSION['user'])){
                $this->success('注销成功!');
            }
        }
	}
 ?>