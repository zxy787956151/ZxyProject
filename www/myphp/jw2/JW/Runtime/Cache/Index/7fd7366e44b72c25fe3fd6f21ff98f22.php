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
        <p class="tip_right"><a href="<?php echo U(GROUP_NAME.'/Forum/forum');?>">&lt;返回经纬吧&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><a><?php echo ($page); ?></a></p>
    </div>
   
    <div class="main">
     <?php if(is_array($user)): foreach($user as $key=>$v): ?><div class="main_left">
            <div class="main_left_top">
                <div class="main_left_top_left">      
                    <span>楼主：<?php echo ($v["username"]); ?></span> 
                </div>
                <div class="main_left_top_right">
                    <input type="button" value="只看楼主" class="btn"/>
                    <input type="button" value="收藏" class="btn" />
                    <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>1,'fid'=>$v['id']));?>"><input type="button" value="回复" class="btn" /></a>
                </div>
            </div>
            <div class="main_left_bottom">
                <div class="main_left_bottom_left house">
                    <img src="__PUBLIC__/Images/<?php echo ($v["img"]); ?>" />
                </div>
                <div class="main_left_bottom_right">
                    <p><?php echo ($v["content"]); ?></p>
                    <div class="lhand">
                        <div class="myshow" id="wrap">
                            <span class="lhands" >举报</span>
                        </div>
                        <img src="__PUBLIC__/Images/tip.png" /> |
                        来自
                        <a href="#">Android客户端</a>
                        &nbsp;&nbsp;&nbsp;
                        <?php echo (date('y-m-d H:i',$v["time"])); ?>
                        <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>1,'fid'=>$v['id']));?>">回复</a>
                    </div>
                </div>
            </div> 
        </div>
        <div class="main_right">
            <div class="main_right_top">
                <span>登录百度账号</span>
            </div>
            <div class="main_right_bottom">
                <input type="text" class="txt" placeholder="手机/邮箱/用户名"/>
                <input type="password" class="txtt" placeholder="密码" />
                <input type="checkbox" class="check" /><span>下次自动登录</span>
                <a href="#">忘记密码？</a>
                <input type="button" value="登录" class="login" />
                <a class="last" href="#">立即注册</a>
            </div>
        </div><?php endforeach; endif; ?>
    </div>
    <?php if(is_array($answer)): foreach($answer as $key=>$v): ?><div class="main_left_bottom">
    <div id="answer">
        <div class="main_left_bottom_left">
            <img src="__PUBLIC__/Images/<?php echo ($v["img"]); ?>" />
            <span id="username"><a>第<?php echo ($v["sort"]); ?>楼</a><?php echo ($v["username"]); ?></span> 
        </div>
        <div class="main_left_bottom_right">
            <p><?php echo ($v["content"]); ?></p>
            <div class="lhand">
                <div class="myshow" id="wrap">
                    <span class="lhands" >举报</span>
                    <ul class="myhide" id="show" style="display:none;">
                        <li><a href="#">个人企业举报</a></li>
                        <li><a href="#">垃圾信息举报</a></li>
                    </ul>
                </div>
                <img src="__PUBLIC__/Images/tip.png" /> |
                来自
                <a href="#">Android客户端</a>
                &nbsp;&nbsp;&nbsp;
                <?php echo (date('y-m-d H:i',$v["time"])); ?>
                <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>2,'id'=>1 ));?>">回复</a>
            </div>
        </div>
    </div>
    </div><?php endforeach; endif; ?>
    <div class="tip tip_btm">
        <p class="tip_right"><a href="<?php echo U(GROUP_NAME.'/Forum/forum');?>">&lt;返回经纬吧&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a><span>回复贴：共<a>5</a>个回复</sapan></p>
    </div>
    <div class="comment">
        <div class="say">
            <div class="comment_left">
                回复
            </div>
            <div class="comment_right">
                发帖请遵守<a href="#">贴吧协议及“七条底线”</a><a href="#">贴吧投诉</a>
            </div>
        </div>
        <div>
          <form action="<?php echo U(GROUP_NAME.'/Forum/runanswer');?>" method="POST">
            <a name="qwe"><textarea class="text" name="answer"></textarea></a>
            <p class="btn2"><input type="submit" value="回复" class="btn_left"/>
            <input type="hidden" name="flag" value="<?php echo ($flag); ?>"/>
            <input type="hidden" name="fid" value="<?php echo ($fid); ?>">
            <input type="button" value="保存至快速回帖" class="btn_right"/></p>
          </form>
        </div>
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