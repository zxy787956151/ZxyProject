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

<link href="/hotel/Public/Home/Css/normalize.css" rel="stylesheet"/>
<link href="/hotel/Public/Home/Css/jquery-ui.css" rel="stylesheet"/>
<link href="/hotel/Public/Home/Css/jquery.idealforms.min.css" rel="stylesheet" media="screen"/>
<style type="text/css">
body{font:normal 15px/1.5 Arial, Helvetica, Free Sans, sans-serif;color: #222;overflow-y:scroll;padding:60px 0 0 0;}
#my-form{width:755px;margin:0 auto;border:1px solid #ccc;padding:3em;border-radius:3px;box-shadow:0 0 2px rgba(0,0,0,.2);}
</style>
</head>
<body>
<h2 style="color:white">SEO酒店会员注册中心</h2>
<div class="row">
  <div class="eightcol last">
    <form id="my-form" action="<?php echo U('Login/runreg');?>" method="post">
        <section name="第一步">
          <div><label>用户名:</label><input id="username" name="username" type="text"/></div>
          <div><label>密码:</label><input id="pass" name="password" type="password"/></div>
          <div><label>邮箱:</label><input id="email" name="email" data-ideal="required email" type="email"/></div>
          <div><label>出生日期:</label><input name="date" class="datepicker" data-ideal="date" type="text" placeholder="月/日/年"/></div>
          <div><label>上传头像:</label><input id="file" name="file" multiple type="file"/></div>
        </section>
      <div><hr/></div>
      <div>
        <button type="submit">提交</button>
        <button id="reset" type="button">重置</button>
      </div>

    </form>
  </div>
</div>
<script type="text/javascript" src="/hotel/Public/Home/Js/jquery-1.8.2.min.js"></script>
<script type="text/javascript" src="/hotel/Public/Home/Js/jquery-ui.min.js"></script>
<script type="text/javascript" src="/hotel/Public/Home/Js/jquery.idealforms.js"></script>
<script type="text/javascript">
var options = {

	onFail: function(){
		alert( $myform.getInvalid().length +' invalid fields.' )
	},

	inputs: {
		'password': {
			filters: 'required pass',
		},
		'username': {
			filters: 'required username',
			data: {
			//ajax: { url:'validate.php' }
			}
		},
		'file': {
			filters: 'extension',
			data: { extension: ['jpg'] }
		},
		'comments': {
			filters: 'min max',
			data: { min: 50, max: 200 }
		},
	}
	
};

var $myform = $('#my-form').idealforms(options).data('idealforms');

$('#reset').click(function(){
	$myform.reset().fresh().focusFirst()
});

$myform.focusFirst();
</script>
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