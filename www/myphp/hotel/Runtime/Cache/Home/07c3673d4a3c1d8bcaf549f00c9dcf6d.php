<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
<title>SEO酒店</title>
<meta name="keywords" content="CMS,企业,学校,政府,网站,内容,管理,建设,制作,建站,系统,模板,源码" />
<meta name="description" content="酒店管理公司网站模板是基于php的网站内容管理系统，以简单、灵活的特点被广泛用于学校、政府、企业单位的网站建设" />
<meta name="Author" content="SEO酒店管理公司" />
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link href="/hotel/Public/Home/Css/style.css" type="text/css" rel="stylesheet" />
<script src="/hotel/Public/Home/Js/jquery.min.js" type="text/javascript"></script>
<script src="/hotel/Public/Home/Js/comm.js" type="text/javascript"></script><script src="/hotel/Public/Home/Js/zh-cn/lang.js" type="text/javascript"></script>
<script type="text/javascript" src="/hotel/ueditor/ueditor.config.js"></script>
<script type="text/javascript" src="/hotel/ueditor/ueditor.all.min.js"></script>
<script type="text/javascript">
	window.UEDITOR_HOME_URL='/hotel/Ueditor/';
	window.onload=function(){
    //调整编辑器的高度和宽度
	window.UEDITOR_CONFIG.initialFrameHeight=200;
	window.UEDITOR_CONFIG.initialFrameWidth=730;
	UE.getEditor('content');
	window.UEDITOR_CONFIG.imageUrl=URL+"<?php echo U(GROUP_NAME.'/Blog/upload');?>";
	//window.UEDITOR_CONFIG.imagePath=URL+"php/";
}
</script>
</head>
<body>
<div class="page_style sublanmupage page_l62_sl564">
<div class="top_box">
 <div class="top_box_inner">
   <div class="topcontent">
    <?php if(session('username') == null): ?><a href="<?php echo U('Login/index');?>">登陆</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Login/register');?>">注册</a>
    <?php else: ?>
    <a href="#"><?php echo (session('username')); ?>在线</a>&nbsp;&nbsp;&nbsp;<a href="<?php echo U('Login/logout');?>">退出</a><?php endif; ?>
   </div>
   <div class="clear"></div>
   <div class="logo"><a href="<?php echo U('Index/index');?>"><img src="/hotel/Public/Home/Images/logo.jpg" border="0"></a>
   </div>
   <div class="menu_box" id="Menu"><ul>
		<li class="menu_style_homepage" id="MenuItem61" name="MenuItem"><a href="<?php echo U('Index/index');?>" class="menu">首页</a></li>
		
		<li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('/a_7');?>" class="menu">酒店简介</a></li>
        <li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('Room/index');?>" class="menu">酒店客房</a></li>
        <li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('News/index');?>" class="menu">酒店新闻</a></li>
        <li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('News/index');?>" class="menu">酒店预订</a></li>
        <li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('Hr/index');?>" class="menu">人力资源</a></li>
        <li class="menu_style menu_current" id="MenuItem62" name="MenuItem"><a href="<?php echo U('Contact/index');?>" class="menu">联系我们</a></li>
		</ul></div>
 </div>
</div>
<script type="text/javascript">var IsPageHome="";var Lanmu_Id="65";var Sublanmu_Id="534";ShowSubMenu(Lanmu_Id);</script>
<div class="banner"><p style="padding:0px 0 0px 0;width:960px;border:0px solid #bddbf5;background:url(/hotel/Public/Home/Images/banner/banner1.jpg) no-repeat 0px 0px;">
  <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" height="219" width="960">
    <param name="movie" value="/hotel/Public/Home/Images/banner/swf3.swf" />
<param name="quality" value="high" />
<param name="wmode" value="transparent" />
<embed src="/hotel/Public/Home/Images/banner/swf3.swf" quality="high" wmode="transparent" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" width="960" height="219" />
  </object>
</p></div>
<div class="main_box main_box_style1">
 <div class="main_box_inner">
   <div class="main_box_inner_left">

<div id="nav_108"  class="nav_box nav_box_menu">

<div  class="nav_title"><span  class="nav_sign">联系我们</span><span  class="nav_more"></span></div>
<div id="nav_menu_108"  class="nav_menu">
<ul id="rootul_108">
<li id="sl534"><a href="<?php echo U('Contact/index');?>" class="sla534">联系方式</a></li>
<li id="sl535"><a href="<?php echo U('Contact/contact');?>" class="sla535">在线留言</a></li>
<li id="sl534"><a href="<?php echo U('Contact/board');?>" class="sla534">留言板</a></li>
</ul>
</div></div>
<script type="text/javascript">
shut_allsubnav("rootul_108");
expand_subnav("sl534","0");
</script>
</div>
   <div class="main_box_inner_right">
<div class="current_location current_location_534"><ul><li class="current_location_1">当前位置：<a href=/>首页</a> &gt; <a href="../contact/">联系我们</a> &gt; <a href="../contact/contact">在线留言</a></li><li class="current_location_2">在线留言</li></ul></div>
<div class="sublanmu_box sublanmu_box_534">
<form action="<?php echo U('Contact/runContact');?>" method="post">
    <table>
     <tr><td>
    <textarea name="content" id="content"></textarea></td></tr>
    <tr><td align="center"><input type="submit" value="提交留言"/></td></tr>
    </table>
<form>
</div></div>
 </div>
 <div class="clear main_box_inner_bottom"></div>
</div>
<div class="bottom_box"><p>
	<a href="#" onclick="setHome(this,'http://www.pageadmin.net')">设为首页</a> | <a href="javascript:AddFavorite(location.href,'网站名称')">加入收藏</a> | <a href="#">留言反馈</a>&nbsp;|&nbsp;<a href="#">人才招聘</a>&nbsp;| <a href="#">联系我们</a>&nbsp;<br />
<span class="STYLE6">广东省中山市华拓网络版权所有&nbsp;Copyright <span style="font-family:Arial;">&copy;</span> 2008-2012</span>&nbsp;&nbsp;ICP备案号:粤ICP备xxxxxxxx号
</p>
<script type="text/javascript">
function AddFavorite(sURL, sTitle)
{
    try
    {
		if( typeof(sURL) =="undefined" || sURL.length==0) { sURL=window.location; }
		if( typeof(sTitle) =="undefined" || sTitle.length==0) { sTitle=document.title; } 
        window.external.addFavorite(sURL, sTitle);
    }
    catch (e)
    {
        try
        {
            window.sidebar.addPanel(sTitle, sURL, "");
        }
        catch (e)
        {
            alert("您使用的浏览器不支持此功能，请按“Ctrl + D”键手工加入收藏!");
        }
    }
}
function setHome(objid,urls) {
	var a = objid, b = urls, c = "unknown"; 
	try {
	    if( typeof(b) =="undefined" || b.length==0) { b=location.href; }		
		a.style.behavior = "url(#default#homepage)";
		var d = a.isHomePage(b);
		d = (d = d || a.isHomePage(b + "/")) || a.isHomePage(b + "/#");
		d = "" + d;
	   if (d != "true"){
			a.setHomePage(b);
	   }else{
			alert("您已经设为首页了!");
	   }
	} catch (e) {
		alert("您的浏览器不支持自动设置主页，请使用浏览器菜单手动设置!");
	}
};
</script></div></div></body>