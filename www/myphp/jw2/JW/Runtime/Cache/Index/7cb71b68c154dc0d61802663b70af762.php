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
	<div class="pic">
    	<img src="__PUBLIC__/Images/beihua.jpg" />
        <h3>经纬工作室吧</h3>
    </div>
	<div class="nav">
    	<ul>
        	  <li><a href="#">看帖</a></li>
            <li><a href="#">图片</a></li>
            <li><a href="#">精品</a></li>
            <li><a href="#">视频</a></li>
            <li><a href="#">玩乐</a></li>
        </ul>
    </div>
    <div class="tip">
        <div class="tip_right"><a href="#">&lt;返回经纬吧</a></div>
    </div>
    <div id="answer1">
    	<hr>
    	<?php if(is_array($forum)): foreach($forum as $key=>$v): ?><table width="780px" border="0" height="80px">
           <tr height="40px">
           	   <th style="width:60px;background:gray;border:1px">1</th>
           	   <th width="500px" align="left">&nbsp;&nbsp;&nbsp;<a href="<?php echo U('/'.$v['id']);?>" target='_blank'><?php echo ($v["title"]); ?></a></th>
           	   <th><img src="__PUBLIC__/Images/ren.jpg"/><?php echo ($v["louzhu"]); ?></th>
           </tr>
           <tr>
           	   <td>&nbsp;</td>
           	   <td align="left">&nbsp;&nbsp;&nbsp;<?php echo ($v["content"]); ?></td>
           	   <td><?php echo (date('H:i',$v["time"])); ?></td>
           </tr>
        </table>
        <hr><?php endforeach; endif; ?>
    </div>
    <div class="item">
         <p>
            <div id="answerNum"></div>
            <div id="title"></div>
            <div id="louzhu"></div>
         </p>
         <p>
         	<div id="content"></div>
         	<div id="time"></div>
         </p>
    </div>
</div>
    <div class="tip tip_btm">
        <p class="tip_right"><a href="#">&lt;返回经纬吧&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><span>经纬发贴：共<a><?php echo ($count); ?></a>个帖子</sapan></p>
    </div>
    <div class="comment">
    	<div class="say">
            <div class="comment_left">
                发表新帖|发起投票
            </div>
            <div class="comment_right">
                发帖请遵守<a href="#">贴吧协议及“七条底线”</a><a href="#">贴吧投诉</a>
            </div>
        </div>
        <div>
          <form action="<?php echo U(GROUP_NAME.'/Forum/runaddforum');?>" method="POST">
          	<input type="text" class="text" name=" title" size="113px" value="请填写标题"/><br>
        	<a name="qwe"><textarea class="text" name="content"></textarea></a>
        	<p class="btn2"><input type="submit" value="发表" class="btn_left"/>
            <input type="button" value="保存至快速回帖" class="btn_right"/></p>
          </form>
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