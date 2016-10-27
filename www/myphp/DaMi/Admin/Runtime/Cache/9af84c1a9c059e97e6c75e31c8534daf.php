<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'><!DOCTYPE html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title>页面提示</title><meta http-equiv='Refresh' content='<?php echo ($waitSecond); ?>;URL=<?php echo ($jumpUrl); ?>'><link href="__PUBLIC__/Admin/images/Admin_css.css" type=text/css rel=stylesheet></head><body><center><br><br><br><br><table width="100%" border="0" cellpadding="0" cellspacing="0" class="admintable1" style="width:500px;"><tr><td class="admintitle">操作信息</td></tr><?php if(isset($message)): ?><tr><td height="100" style="padding-left:100px;"><font color=red><?php echo ($message); ?></font><br><br><a href="javascript:history.back(-1)" style="text-decoration:none;"><u>返回上一页</u></a></td></tr><?php endif; if(isset($error)): ?><tr><td height="100" style="padding-left:100px;"><font color=red><?php echo ($error); ?></font></td></tr><?php endif; if(isset($closeWin)): ?><tr><td height="100" style="padding-left:100px;">系统将在 <span style="color:blue;font-weight:bold" id="wait"><?php echo ($waitSecond); ?></span> 秒后自动关闭，如果不想等待,直接点击 <a href="<?php echo ($jumpUrl); ?>" id="href" >这里</a> 关闭</td></tr><?php endif; if(!isset($closeWin)): ?><tr><td height="100" style="padding-left:100px;">系统将在 <span style="color:blue;font-weight:bold" id="wait"><?php echo ($waitSecond); ?></span> 秒后自动跳转,如果不想等待,直接点击 <a href="<?php echo ($jumpUrl); ?>" id="href" >这里</a> 跳转</td></tr><?php endif; ?><script type="text/javascript">(function(){
var wait = document.getElementById('wait'),href = document.getElementById('href').href;
var interval = setInterval(function(){
	var time = --wait.innerHTML;
	if(time <= 0) {
		location.href = href;
		clearInterval(interval);
	};
}, 1000);
})();
</script></table></body></html>