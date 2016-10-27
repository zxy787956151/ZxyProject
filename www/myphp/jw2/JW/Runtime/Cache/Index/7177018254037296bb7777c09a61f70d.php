<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/Css/base.css" rel="stylesheet" type="text/css">
<title>注册</title>
<script type="text/javascript" src="__PUBLIC__/Js/register.js"></script>
</head>

<body style="overflow:scroll"> 
<div class="topbg">
	<div class="topM">
    	<div class="logo"></div>
        <div class="Menubg">
        	<ul class="Menu">
            	<li class="cur"><a href="#">经纬主页</a></li>
                <li><a href="#">实验室概况</a></li>
                <li><a href="#">学习方向</a></li>
                <li><a href="#">历届风采</a></li>
                <li><a href="#">相关资讯</a></li>
            </ul>
        </div>
    </div>
</div>
<div class="room">
   <div class="topN">
   <form name="form2" method="post" action="<?php echo U(GROUP_NAME.'/Login/toregister');?>"  onsubmit="return chk()">
        <table border='0' align="80%" height="400">
        <tr>
            <td>用户名</td>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <td>密码</td>
            <td><input type="password" name="pwd"></td>
        </tr>
        <tr>
            <td>确认密码</td>
            <td><input type="password" name="rpwd"></td>
        </tr>
        <tr>
            <td>学习方向</td>
            <td><input type="text" name="direction"></td>
        </tr>
        <tr>
            <td>加入时间</td>
            <td><input type="text" name="time"></td>
        </tr>
        <tr>
            <td>职务</td>
            <td><input type="text" name="work"></td>
        </tr>
        <tr>
            <td>联系QQ</td>
            <td><input type="text" name="qq"></td>
        </tr>
        <tr>
            <td>上传头像</td>
            <td><input type="file" name="img"></td>
        </tr>
        <tr>
            <td><input type="submit" value="提交"></td>
            <td align="center"><input type="reset" value="重置"></td>
        </tr>
        </table>
  </form>
  </div>
</div>
<div class="endbg">
	<div class="endM">
    	<div class="end">
        	<div class="end_text">
            	<li><a href="#" target="_blank">经纬主页</a><em>|</em></li>
                <li><a href="#" target="_blank">站外导航</a><em>|</em></li>
                <li><a href="#" target="_blank">版权所有</a><em>|</em></li>
                <li><a href="#" target="_blank">常见问题</a><em>|</em></li>
                <li><a href="#" target="_blank">联系方式</a></li>
                <li>&nbsp;&nbsp;&nbsp;Copyright&nbsp;©2015&nbsp;&nbsp;京ICP备05045648&nbsp;网站制作：北华大学经纬工作室&nbsp;&nbsp;&nbsp;</li>
            </div>
        </div>
    </div>
</div>
</div>
</html>
</body>