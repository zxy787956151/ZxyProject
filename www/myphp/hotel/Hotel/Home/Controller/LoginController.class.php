<?php
namespace Home\Controller;
use Think\Controller;
class LoginController extends Controller{
    //登陆视图
	Public function index(){
	    $this->display();
	}
	//注册视图
	Public function register(){
	    $this->display();
	}
	//登陆表单处理
	Public function runland(){
		if(!IS_POST){
			$this->error('页面不存在');
		}
		$username=I('username');
		$password=I('password');
		$user=M('user')->where(array('username'=>$username))->select();
		if(!$user){
			$this->error('用户名不存在,请注册');
		}else{
			if($user[0]['password']!=$password){
				$this->error('密码输入错误，请重试');
			}
		}
		session('id',$user[0]['id']);
    	session('username',$user[0]['username']);
    	redirect(U('Home/Index/index'));
	}
	//注册表单处理
	public function runreg(){
		$db=M('user');
		$data['username']=I('username');
	    $data['password']=I('password');
	    $data['email']=I('email');
	    $data['date']=I('date');
	    $data['file']=I('file');
	    $db->create($data);
	    if($db->add()){
	        $this->success('会员注册成功',U('Login/index'));
	        }else{
	        $this->error('注册失败，请重试');
	        }
		}
	//退出
	public function logout(){
        session('[destroy]');
        redirect('Index/index');
	}
}
?>