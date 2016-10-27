<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
	
    @function 认证模块

    @Filename PublicAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 15:14:43 $
*************************************************************/
class PublicAction extends Action 
{	
	public function index()
	{
		//dump($_SESSION);
	//如果通过认证跳转到首页
		redirect(__APP__.'/Index/index');
	}
	
    public function login()
	{
		$this->display('login');
	}
	
	//返回所有类型
	function type_tree(){
		$type = M('type');
		$where ='';
		//echo 'ff'.$_SESSION[C('USER_CONTENT_KEY')];
		if(!$_SESSION[C('ADMIN_AUTH_KEY')] && $_SESSION[C('USER_CONTENT_KEY')]!=''){
		$where = ('typeid in('.$_SESSION[C('USER_CONTENT_KEY')].') and ');	
		}
		$where .= 'islink=0';
		$oplist = $type->where($where)->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->order('bpath')->select();
		//echo $type->getLastSql();
		$this->assign('type_tree',$oplist);
		}
	
	function checkLogin()
	{
		if(empty($_POST['username']))
		{
			$this->error("帐号错误");
		}
		elseif (empty($_POST['password']))
		{
			$this->error("密码必须!");
		}
		elseif (empty($_POST['verify']))
		{
			$this->error('验证码必须!');
		}
		if(md5($_POST['verify']) != $_SESSION['verify'])
		{
			$this->error('验证码错误!');
		}
		
        //生成认证条件
        $map            =   array();
		// 支持使用绑定帐号登录
		$map['username']	= inject_check($_POST['username']);
		$map["status"]	= array('gt',0);
		import ('ORG.Util.RBAC' );
        $authInfo = RBAC::authenticate($map);
        //使用用户名、密码和状态的方式进行认证
        if(false === $authInfo)
		{
			$this->error('帐号不存在!');
        }
		if(empty($authInfo))
		{
			$this->error('帐号不存在或已禁用!');
		}
		$pwdinfo = strcmp($authInfo['password'],md5('wk'.trim($_POST['password']).'cms'));
		if($pwdinfo <> 0)
		{
			$this->error('密码错误!');
        }
        $_SESSION[C('USER_AUTH_KEY')]	=	$authInfo['id'];
		$_SESSION['username']		=	$_POST['username'];
		$_SESSION['cookietime'] = time();
		$role = M('role_admin');
		$authInfo['role_id'] = $role->where('user_id='.$authInfo['id'])->getField('role_id');
        if($authInfo['role_id'] == '1')
		{
            $_SESSION[C('ADMIN_AUTH_KEY')]		=	true;
			
        }
		//保存登录信息
		$admin	=	M('admin');
		$ip		=	get_client_ip();
		$time	=	time();
        $data = array();
		$data['id']	=	$authInfo['id'];
		$data['lastlogintime']	=	$time;
		$data['lastloginip']	=	$ip;
		$admin->save($data);
		// 缓存访问权限
        RBAC::saveAccessList();
		//保存cookie信息
		import ('ORG.Util.Cookie');
		Cookie::set($_SESSION['cookietime'],'1',60*60*3);
		//dump($_SESSION);
		$this->index();
	}
	
	function loginout()
	{
		if(isset($_SESSION[C('USER_AUTH_KEY')]))
		{
			unset($_SESSION[C('USER_AUTH_KEY')]);
			unset($_SESSION);
			session_destroy();
			$this->assign("jumpUrl",U('Public/login'));
			$this->success('登出成功!');
        }
		$this->assign("jumpUrl",U('Public/login'));
		$this->error('已经登出!');
	}
	
	public function verify()
	{
		import('ORG.Util.Image');
		ob_end_clean();
		Image::buildImageVerify(5,1,'png',78,18,'verify');	
	}
}
?>