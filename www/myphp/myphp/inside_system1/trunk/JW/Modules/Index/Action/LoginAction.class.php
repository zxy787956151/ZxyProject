<?php
Class LoginAction extends Action {
	/*前台登陆页控制器*/
	Public function index(){
		$this->display();
	}
	// 登录表单操作
	Public function login(){
        if(!IS_POST) halt('页面不存在');
        if(I('code','','md5')!=session('verify'))
            $this->error('验证码错误，请重新输入');
	        $db=M('user');
	        $user=$db->where(array('username'=>I('username')))->find();
	        
	       if(!$user||$user['password']==I('password','','md5')){
    		$this->error('用户名和密码有误，请重新输入');
    	}
    	//更新最有一次登陆的时间和ip
    	$data=array(
            'id'=>$user['id'],
            'logintime'=>time(),
            'loginip'=>get_client_ip()
    		);
    	$db->save($data);

    	session('uid',$user['id']);
    	session('username',$user['username']);
    	session('logintime',date('Y-m-d H:i:s',$user['logintime']));
    	session('loginip',$user['loginip']);
    }
	// 验证码
	Public function verify(){
		import('ORG.Util.Image');
		Image::buildImageVerify(1,1,'png');
		//Image::verify();
	}
}

?>