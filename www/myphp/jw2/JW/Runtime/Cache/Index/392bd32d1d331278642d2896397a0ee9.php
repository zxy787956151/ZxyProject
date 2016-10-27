<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
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
     <form action="<?php echo U(GROUP_NAME.'/System/addAdvice');?>" method="post">
         <p><font color="#0066CC" size="4">标题： 
            <input name="title" type="text" id="text" size="132">
            </font>
            </p>
            <p>
            <font color="#0066CC" size="4">针对方向：
              <select name="direction">
                <option>PHP</option>
                <option>.NET</option>
                <option>前端方面</option>
                <option>其他</option>
              </select>
            </font>
            <font color="#0066CC" size="4">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;建议属性：
               <?php if(is_array($attr)): foreach($attr as $key=>$v): ?><lable style="">
                    <input type="checkbox" name='bid[]' value='<?php echo ($v["id"]); ?>'/>&nbsp;<?php echo ($v["name"]); ?>
                   </lable><?php endforeach; endif; ?>
            </font>
            <font color="#0066CC" size="4" style="align:right">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;学长姓名： 
            <input name="xzname" type="text" id="xzname">
            </font>
         </p>
         <p>&nbsp;</p>
         <p>&nbsp;</p>
         <p> 
         <!-- <textarea name="content" id="container">这里写你的初始化内容</textarea> -->
		 <script id="container" name="content" type="text/plain">
		 这里写你的初始化内容
		 </script>
         </p>
         <p align="center"> 
          <input type="submit" name="Submit" value="完 成">
          <input name="hidd" type="hidden" id="hidd" value="">
         </p>
      </form>
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
</div>
    <script type="text/javascript" src="/jw2/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" src="/jw2/ueditor/ueditor.all.js"></script>
    <script type="text/javascript">
        var editor = UE.getEditor('container');
    </script>
</body>
</html>