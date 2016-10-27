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
<div id='room'>
	<form action="<?php echo U(GROUP_NAME.'/Person/update');?>" method="post">
	<?php if(is_array($user)): foreach($user as $key=>$v): ?><table border='0' align="center" height="400">
        <tr>
            <td>个性头像:</td>
            <td><img src="__PUBLIC__/Images/<?php echo ($v["img"]); ?>"/></td>
        </tr>
        <tr>
            <td>用户名:</td>
            <td align="center"><input type="text" name="username" value="<?php echo ($v["username"]); ?>"></td>
        </tr>
        <tr>
            <td>密码:</td>
            <td align="center"><input type="password" name="pwd" value="<?php echo ($v["password"]); ?>"></td>
        </tr>
        <tr>
            <td>确认密码:</td>
            <td align="center"><input type="text" name="rpwd" value="<?php echo ($v["password"]); ?>"></td>
        </tr>
        <tr>
            <td>学习方向:</td>
            <td align="center"><input type="text" name="direction" value="<?php echo ($v["direction"]); ?>"></td>
        </tr>
        <tr>
            <td>加入时间:</td>
            <td align="center"><input type="text" name="time" value="<?php echo ($v["time"]); ?>"></td>
        </tr>
        <tr>
            <td>职务:</td>
            <td align="center"><input type="text" name="work" value="<?php echo ($v["work"]); ?>"></td>
        </tr>
        <tr>
            <td>联系QQ:</td>
            <td align="center"><input type="text" name="qq" value="<?php echo ($v["qq"]); ?>"></td>
        </tr>
        <tr>
            <td><input type="submit" value="修改"></td>
            <td align="center"><input type="reset" value="重置"></td>
        </tr>
        </table><?php endforeach; endif; ?>
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
</body>
</html>