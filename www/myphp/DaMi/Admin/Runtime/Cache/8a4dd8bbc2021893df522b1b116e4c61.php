<?php if (!defined('THINK_PATH')) exit();?><html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"><title></title><style type="text/css"><!--
body,td,th,div,a,h3,textarea,input{
	font-family: "宋体", "Times New Roman", "Courier New";
	font-size: 12px;
	color: #333333;
}
html{
	overflow-x:hidden;
	overflow-y:hidden;
}
.menuHtml{
	overflow-y:auto;
}
body {
	background-color: ##E6F4FA;
	margin: 0px;
}
img{
	border: none;
}
form{
	margin: 0px;
	padding: 0px;
}
input{
	color: #000000;
	height: 22px;
	vertical-align: middle;
}
textarea{
	width: 80%;
	font-weight: normal;
	color: #000000;
}
a{
	text-decoration: none;
	color: #666666;
}
a:hover{
	text-decoration: none;
}
.menuDiv,.menuDiv1{
	background-color: #FFFFFF;
}
.menuDiv1{
	postion:relative;bottom:0px;top:50;
}
.menuDiv h3,.menuDiv1 h3{
	font:bold 12px "Microsoft Yahei",sans-serif;color:#000;
	padding-top: 5px;
	padding-right: 5px;
	padding-bottom: 5px;
	padding-left: 10px;
	background:url(__PUBLIC__/Admin/images/tab_05.gif);
	margin: 0px;cursor:pointer;
}
.menuDiv1 h3 {color:#ff0000;}
.menuDiv ul,.menuDiv1 ul{
	margin: 0px;
	padding: 0px;
	list-style-type: none;
}
.menuDiv ul li,.menuDiv1 ul li{
	color: #666666;
	background:url(__PUBLIC__/Admin/images/arrow_082.gif) 14px 6px no-repeat;background-color:#bce2fc;
	padding: 5px 5px 5px 30px;
	font-size: 12px;
	height: 16px;border-bottom:1px solid #fff;
}
.menuDiv ul li a,.menuDiv1 ul li a{
	color: #666666;
	text-decoration: none;
}
.menuDiv ul li a:hover,.menuDiv1 ul li a:hover{	
	color: #ff0000;text-decoration: underline;
}
.red{
	color:#FF0000;
}
--></style><script type="text/javascript" src="/DaMi/Public/Admin/js/menuswitch.js"></script></head><body><table width="180" height="100%" border="0" cellpadding="0" cellspacing="0"><tr><td valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="0" style="table-layout:fixed"><tr><td height="28"><img src="__PUBLIC__/Admin/images/main_21.gif" border="0" usemap="#Map" /></td></tr><tr><td style="background:url(__PUBLIC__/Admin/images/main_23.gif) left top repeat-x;height:80px"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0"><tr><td height="45"><div align="center"><a href="__APP__/Config/index" target="main"><img src="__PUBLIC__/Admin/images/main_26.gif" name="Image1" width="40" height="40" border="0" /></a></div></td><td><div align="center"><a href="__APP__/Admin/index" target="main"><img src="__PUBLIC__/Admin/images/main_28.gif" name="Image2" width="40" height="40" border="0" id="Image2" /></a></div></td><td><div align="center"><a href="__APP__/Guestbook/index" target="main"><img src="__PUBLIC__/Admin/images/main_31.gif" name="Image3" width="40" height="40" border="0" id="Image3" /></a></div></td></tr><tr><td height="25"><div align="center" class="STYLE2"><a href="__APP__/Config/index" target="main">网站配置</a></div></td><td><div align="center" class="STYLE2"><a href="__APP__/Admin/index" target="main">管理员</a></div></td><td><div align="center" class="STYLE2"><a href="__APP__/Guestbook/index" target="main">留言管理</a></div></td></tr></table></td></tr><tr><td ><div class="menuDiv"><h3>系统核心</h3><ul><li><a href="__APP__/Fields/index" target="main">扩展字段</a></li><li><a href="__APP__/Type/index" target="main">栏目管理</a></li><li><a href="__APP__/Article/index" target="main">内容管理</a></li><?php $m=new Model("dami_extend_menu",NULL);$ret=$m->field("")->where("enable=1")->order("")->limit("")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i; if(($vo["typeid"]) > "0"): ?><li><a href="__APP__/Article/index/typeid/<?php echo ($vo["typeid"]); ?>" target="main"><?php echo ($vo["menu_name"]); ?></a></li><?php else: ?><li><a href="__APP__/<?php echo ($vo["action_name"]); ?>/index" target="main"><?php echo ($vo["menu_name"]); ?></a></li><?php endif; endforeach;endif; ?></ul></div><div class="menuDiv"><h3>基本管理</h3><ul><li><a href="__APP__/Config/index" target="main">网站配置</a> | <a href="__APP__/Admin/index" target="main">管 理 员</a></li><li><a href="__APP__/Flash/index" target="main">幻灯管理</a> | <a href="__APP__/Clear" target="main">附件清理</a></li><li><a href="__APP__/Label/index" target="main">单页标签</a> | <a href="__APP__/Ad/index" target="main">广告管理</a></li></ul></div><div class="menuDiv"><h3>插件工具</h3><ul><li><a href="__APP__/Guestbook/index" target="main">留言管理</a> | <a href="__APP__/Pl/index" target="main">评论管理</a></li><li><a href="__APP__/Link/index" target="main">友情链接</a> | <a href="__APP__/Vote/index" target="main">投票管理</a></li><li><a href="__APP__/Key/index" target="main">文章内链</a> | <a href="__APP__/Tpl/index" target="main">模板管理</a></li><li><a href="__APP__/Backup/index" target="main">数据备份</a> | <a href="__APP__/Backup/restore" target="main">数据还原</a></li><li><a href="__APP__/Caiji/caiji" target="main">数据采集</a><a href="__APP__/Build/index" target="main">生成静态页</a></li><li><a href="__APP__/Mtable/index" target="main">万能表格</a></li></ul></div><div class="menuDiv"><h3>APK配置</h3><ul><li><a href="__APP__/Apk/config" target="main">APK基础配置</a><a href="__APP__/Apk/down" target="main">在线生成APK</a></li><li><a href="__APP__/Apk/vip_config" target="main">VIP账户配置</a><a href="http://www.damicms.com/Public/donate" target="main">升级VIP</a></li></li></ul></div><div class="menuDiv"><h3>会员系统</h3><ul><li><a href="__APP__/Member/wx_set" target="main">微信基础配置</a></li><li><a href="__APP__/Member/wx_menu" target="main">微信自定义菜单</a></li><li><a href="__APP__/Member/ap_set" target="main">支付宝配置</a></li><li><a href="__APP__/Member/qq_set" target="main">QQ快捷登陆</a></li><li><a href="__APP__/Member/cartlist" target="main">订单管理</a></li><li><a href="__APP__/Member/usergroup" target="main">会员分组</a></li><li><a href="__APP__/Member/userlist" target="main">会员管理</a></li><li><a href="__APP__/Member/tixianlist" target="main">用户提现</a></li></ul></div></td></tr></table></td></tr></table><map name="Map" id="Map"><area shape="rect" coords="26,5,91,22" href="__URL__/main" target="main" alt="后台首页" /><area shape="rect" coords="94,5,157,24" href="__APP__/Public/loginout" target="_top" alt="安全退出" /></map><script language="javascript">	var mSwitch = new MenuSwitch("menuDiv");
	mSwitch.setDefault(0);
	mSwitch.setPrevious(false);
	mSwitch.init();
</script></body></html>