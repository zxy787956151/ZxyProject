<?php
Class LoginAction extends Action {
	//后台登陆
	Public function index(){
		$this->display();
		
	}
	//后台登陆验证码
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(1,1,'png');
	}
	//后台登陆验证表单处理
	Public function login(){
        if(!IS_POST) halt('页面不存在');
        if(I('code','','md5')!=session('verify'))
            $this->error('验证码错误，请重新输入');
	        $db=M('admin');
	        $admin=$db->where(array('username'=>I('username')))->find();
	        if(!$admin||$admin['password']!=I('password')){
    		$this->error('用户名和密码有误，请重新输入');
    	}
    	//更新最有一次登陆的时间和ip
    	$data=array(
            'id'=>$admin['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip()
    		);
    	$db->save($data);

    	session('uid',$admin['id']);
    	session('username',$admin['username']);
    	session('logintime',date('Y-m-d H:i:s',$admin['logintime']));
    	session('loginip',$admin['loginip']);
        redirect(__GROUP__);
    }
}
?>