<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"><html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>大米CMS后台管理</title><link href="__PUBLIC__/Admin/images/login.css" rel="stylesheet" type="text/css" /><script type="text/javascript" src="__PUBLIC__/js/jquery.js"></script><script type="text/javascript">	$(function(){
		$('.captcha').focus(function(){
			$('.yzm-box').show();
			});
			
		$('.captcha').focusout(function(){
			$('.yzm-box').hide();
			});
		})
		
function show(obj){
obj.src="__URL__/verify/random/"+Math.random();
}
function chk(){
		if(document.getElementById('AdminName').value==""){
		alert('用户名不能为空!');
		document.getElementById('AdminName').focus();
		return false;
	}
	if(document.getElementById('adminpwd').value==""){
		alert('密码不能为空!');
		document.getElementById('adminpwd').focus();
		return false;
	}
	if(document.getElementById('verify').value==""){
		alert('验证码不能为空!');
		document.getElementById('verify').focus();
		return false;
	}
}
</script></head><body><div id="message-box"> 用户名或密码错误！ </div><div id="wrap"><div id="header"></div><div id="content-wrap"><div class="space"></div><form name="form1" method="post" action="__URL__/checklogin" onsubmit="return chk();"><div class="content"><div class="field"><label>账　户：</label><input class="username" name="username" id="AdminName" value="" type="text" /></div><div class="field"><label>密　码：</label><input class="password" name="password" id="adminpwd" type="password" /><br /></div><div class="field"><label>验证码：</label><input class="captcha" maxlength="6" name="verify" id="verify" value="" type="text" /><br /><div class="yzm-box"><img src="__URL__/verify/" border="0" alt="看不清楚请点击刷新验证码" style="cursor : pointer;width:150px;height:30px;" onclick="show(this)"/></div></div><div class="btn"><input name="" type="submit" class="login-btn" value="" /></div></div></form></div><div id="footer"></div></div></body></html>