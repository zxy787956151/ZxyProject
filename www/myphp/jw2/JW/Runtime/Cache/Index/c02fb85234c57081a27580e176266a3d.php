<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>经纬工作室</title>
<link href="/jw2/Public/Css/ys.css" rel="stylesheet" type="text/css" />
<link href="/jw2/Public/Css/lt.css" rel="stylesheet" type="text/css" />
<script type="text/JavaScript" src='/jw2/Public/Js/jquery-1.7.2.min.js'></script>
<script type="text/JavaScript" src='/jw2/Public/Js/common.js'></script>
</head>
<body>
 <div id="logo">
 <a href="<?php echo U(GROUP_NAME.'/Index/show');?>" target="_self"><?php echo $_SESSION["username"];?>在线</a>
 <a href="<?php echo U(GROUP_NAME.'/Index/logout');?>" target="_self">退出</a>
 </div>
 <div id='home'>
<div class='top-nav-wrap'>
    <ul class='nav-lv1'>
      <li class='nav-lv1-li'>
        <a href="<?php echo U(GROUP_NAME.'/Index/index');?>" class='top-cate'>经纬首页</a>
      </li>
      <li class='nav-lv1-li'>
        <a href="<?php echo U(GROUP_NAME.'/System/advice');?>" class='top-cate'>学长建议</a>
      </li>
      <li class='nav-lv1-li'>
        <a href="<?php echo U(GROUP_NAME.'/System/index');?>" class='top-cate'>建议列表</a>
        <ul>
          <li><a href="<?php echo U(GROUP_NAME.'/List/index',array('direction'=>php));?>">php</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/List/index',array('direction'=>'.NET'));?>">.NET</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/List/index',array('direction'=>'前端方面'));?>">前端方向</a></li>
          <li><a href="<?php echo U(GROUP_NAME.'/List/index',array('direction'=>'其他'));?>">其他</a></li>
        </ul>
      </li>
      <li class='nav-lv1-li'>
        <a href="<?php echo U(GROUP_NAME.'/Forum/forum');?>" class='top-cate'>交流论坛</a>
        <ul>
          <li><a href="">jQuery</a></li>
          <li><a href="">Ajax</a></li>
        </ul>
      </li>
      <li class='nav-lv1-li'>
        <a href="" class='top-cate'>答疑提问</a>
        <ul>
          <li><a href="">字符串</a></li>
          <li><a href="">数组</a></li>
          <li><a href="">对象</a></li>
        </ul>
      </li>
      <li class='nav-lv1-li'>
        <a href="" class='top-cate'>历届风采</a>
        <ul>
          <li><a href="">存储引擎</a></li>
          <li><a href="">事务</a></li>
          <li><a href="">视图</a></li>
          <li><a href="">存储过程</a></li>
        </ul>
      </li>
      <li class='nav-lv1-li'>
        <a href="<?php echo U(GROUP_NAME.'/Person/person');?>" class='top-cate'>个人信息</a>
        <ul>
          <li><a href="">基本命令</a></li>
          <li><a href="">网络配置</a></li>
        </ul>
      </li>
      <li class='nav-lv1-li'>
        <a href="" class='top-cate'>其他</a>
      </li>
    </ul>
  </div>
 <div id="room">
	 <div id="left">
   <ul>
     <li><a href="#">北华大学电子图书、运动场地...(11-14) </a></li>
     <li><a href="#">关于北华大学东校区消防井阀...(11-13) </a></li>
     <li><a href="#">关于北华大学东校区三教地面...(11-12) </a></li>
     <li><a href="#">关于北华大学东校区院系楼教...(11-12) </a></li>
     <li><a href="#">关于北华大学北校区三教窗护...(11-12) </a></li>
     <li><a href="#">关于北华大学东校区美术学院...(11-12) </a></li>
     <li><a href="#">关于北华大学南校区播音室、...(11-12) </a></li>
     <li><a href="#">关于拟采用单一来源方式对图...(11-12) </a></li>
     <li><a href="#">北华大学运动场地广播设备...  (11-07) </a></li>
     <li><a href="#">北华大学东校区消防井阀门...  (11-04) </a></li> 
    </ul>  
   </div>
   <div id="right"></div>
   <div id="buttom">
    <p><marquee scrolldelay="150" direction="left">争创全国文明单位　共建和谐文明北华</marquee></p>
    <p><span><img src="/jw2/Public/Images/1.jpg" border="0"></span>
       <span><img src="/jw2/Public/Images/2.jpg" border="0"></span>
       <span><img src="/jw2/Public/Images/3.jpg" border="0"></span>
       <span><img src="/jw2/Public/Images/3.jpg" border="0"></span>
       <span><img src="/jw2/Public/Images/3.jpg" border="0"></span>
    </p>
   </div>
 </div>
 <div id="footer">
	<li><a href="#" target="_blank">经纬主页</a>|</li>
	<li><a href="#" target="_blank">&nbsp;站外导航</a>|</li>
	<li><a href="#" target="_blank">&nbsp;版权所有</a>|</li>
	<li><a href="#" target="_blank">&nbsp;常见问题</a>|</li>
	<li><a href="#" target="_blank">联系方式</a></li><br/>
	<li>Copyright&nbsp;©2015&nbsp;京ICP备05045648&nbsp;北华大学经纬工作室</li>
</div>
</body>
</html>