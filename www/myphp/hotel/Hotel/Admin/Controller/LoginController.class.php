<?php
namespace Admin\Controller;
use Think\Controller;
class LoginController extends Controller {
    public function index(){
       $this->display();
    }
    public function verify(){
	   $config = array(
	   'fontSize'   =>    25,    // 验证码字体大小
	   'length'     =>    3,     // 验证码位数
	   'useNoise'   =>    false, // 关闭验证码杂点
       );
       $Verify =     new \Think\Verify($config);
       $Verify->entry();
    }
    public function login(){
       if(!IS_POST) {
           $this->error('页面不存在');
           }
           $code=I('code');
           if(!check_code($code)){
               $this->error('验证码错误');
           }else{  
	           $where=array('username'=>I('username'));
	           $admin=M('admin')->where($where)->find();
	           if(!$admin||$admin['password']!=I('password'))
	           $this->error('用户名和密码输入错误,请重输');
	        }
	    redirect(U('Admin/Index/index'));
    }
}