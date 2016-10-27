<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 系统RBAC认证

    @Filename CommonAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 14:57:09 $
*************************************************************/
class CommonAction extends Action
{
	function _initialize() 
	{
	header("Content-type: text/html; charset=utf-8"); 
//模拟关闭magic_quotes_gpc 不关闭有时视频用不起
if(get_magic_quotes_gpc()){
$_GET = stripslashesRecursive($_GET);
$_POST = stripslashesRecursive($_POST);
$_COOKIE = stripslashesRecursive($_COOKIE);
}
import ('ORG.Util.Cookie');
//先检查cookie
		if(!Cookie::is_set($_SESSION['cookietime']))
		{
			redirect (PHP_FILE .C('USER_AUTH_GATEWAY'));
		}
		else
		{
			//保存cookie信息
			Cookie::set($_SESSION['cookietime'],'1',60*60*3);
		}
		
		// 用户权限检查
		if (C('USER_AUTH_ON') && !in_array(MODULE_NAME,explode(',',C('NOT_AUTH_MODULE')))) 
		{
			import ('ORG.Util.RBAC');
			if (!RBAC::AccessDecision()) 
			{
				//检查认证识别号
				if (! $_SESSION [C('USER_AUTH_KEY')]) 
				{
					//跳转到认证网关
					redirect (PHP_FILE .C('USER_AUTH_GATEWAY'));
				}
				// 没有权限 抛出错误
				if (C('RBAC_ERROR_PAGE')) 
				{
					// 定义权限错误页面
					redirect (C('RBAC_ERROR_PAGE') );
				}
				else
				{
					if (C('GUEST_AUTH_ON')) 
					{
						$this->assign ( 'jumpUrl', PHP_FILE .C('USER_AUTH_GATEWAY') );
					}
					// 提示错误信息
					$this->error (L('_VALID_ACCESS_'));
				}
			}
		}
	}
}
?>