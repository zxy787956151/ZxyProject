<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><script src="__PUBLIC__/js/jquery.js"></script><title>无标题文档</title><style type="text/css"><!--
body {
	margin-left: 0px;
	margin-top: 0px;
	margin-right: 0px;
	margin-bottom: 0px;
	overflow:hidden;
}
.sidebar .btn{ width:5px; height:39px; background:url(__PUBLIC__/Admin/images/sidebar-on.gif);display:block;}
.sidebar .btn:hover{ background-position:0 -39px;display:block;}
--></style><SCRIPT>var status = 1;
function switchSysBar(){
     if (1 == window.status){
		  window.status = 0;
          document.all("frmTitle").style.display="none"
     }
     else{
		  window.status = 1;
          document.all("frmTitle").style.display=""
     }
}
$(function(){
	//setMenuHeight
	$('.page_frame').height($(window).height()-5);
	//$('.page_frame iframe').width($(window).width()-15-168);
})
</SCRIPT></head><body><table width="100%" height="100%" border="0" cellpadding="0" cellspacing="0" ><tr><td style="width:0px;"></td><td width="180" id="frmTitle" style="border-right:solid 1px #2178b0;"><iframe name="I2" height="100%" width="180" border="0" frameborder="0" src="__URL__/left">		浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe></td><td style="width:5px;background:#1C8DCA;" valign="middle"><div class="sidebar"><div class="btn" onClick="switchSysBar()" id="switchPoint" title="关闭/打开左栏" ></div></div></td><td valign="top"><div class="page_frame"><iframe name="main" id="main_frame" src="__URL__/main" frameborder="false" allowtransparency="true" style="border: medium none;"  width="100%" height="100%">		浏览器不支持嵌入式框架，或被配置为不显示嵌入式框架。</iframe></div></td><td  style="width:3px;">&nbsp;</td></tr></table></body></html>