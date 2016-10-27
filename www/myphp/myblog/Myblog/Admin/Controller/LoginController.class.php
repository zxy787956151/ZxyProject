<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller{
	public function  index(){
	    $this->display();
	}
	public function verify(){
        $config = array(
	   'fontSize'   =>    25,    // 验证码字体大小
	   'length'     =>    3,     // 验证码位数
	   'useNoise'   =>    true, // 关闭验证码杂点
        );
        $Verify =     new \Think\Verify($config);
        $Verify->entry();
	}
	public function login(){
    	if(!IS_POST)
        $this->error('页面不存在'); 
        $username=I('username');
        $password=I('password');
        $code=I('code');
        if(!check_code($code)){
            $this->error('验证码错误，请重输');
        }else{
             $admin=M('admin')->where(array('username'=>$username))->select();
             if(!$admin){
                $this->error('用户名不存在，请注册');
             }else{
                   if($admin[0]['password']!=$password){
                   $this->error('密码错误，请重输');
                   }else{
                   $this->redirect('Index/index');
                   }
             }
        }
	}
}

?>