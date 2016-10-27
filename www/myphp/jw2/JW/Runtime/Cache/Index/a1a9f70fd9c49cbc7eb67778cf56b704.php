<?php if (!defined('THINK_PATH')) exit();?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

<link href="/jw2/PUBLIC/Css/base.css" rel="stylesheet" type="text/css">
<title>经纬实验室首页</title>
<script src="/jw2/PUBLIC/Js/jquery-1.7.1.min.js" type="text/javascript">
</script>
<script src="/jw2/PUBLIC/Js/login.js" type="text/javascript"></script>
<script type="text/javascript">
var URL='<?php echo U(GROUP_NAME."/Login/verify");?>/';
</script>
<script type="text/javascript">
//滚动插件
(function($){
$.fn.extend({
        Scroll:function(opt,callback){
                //参数初始化
                if(!opt) var opt={};
                var _this=this.eq(0).find("ul:first");
                var        lineH=_this.find("li:first").height(), //获取行高
                        line=opt.line?parseInt(opt.line,10):parseInt(this.height()/lineH,10), //每次滚动的行数，默认为一屏，即父容器高度
                        speed=opt.speed?parseInt(opt.speed,10):500, //卷动速度，数值越大，速度越慢（毫秒）
                        timer=opt.timer?parseInt(opt.timer,10):3000; //滚动的时间间隔（毫秒）
                if(line==0) line=1;
                var upHeight=0-line*lineH;
                //滚动函数
                scrollUp=function(){
                        _this.animate({
                                marginTop:upHeight
                        },speed,function(){
                                for(i=1;i<=line;i++){
                                        _this.find("li:first").appendTo(_this);
                                }
                                _this.css({marginTop:0});
                        });
                }
                //鼠标事件绑定
                _this.hover(function(){
                        clearInterval(timerID);
                },function(){
                        timerID=setInterval("scrollUp()",timer);
                }).mouseout();
        }        
})
})(jQuery);

$(document).ready(function(){
        $("#scrollDiv").Scroll({line:4,speed:3000,timer:1000});
});
</script></head>


<body style="overflow:scroll;overflow-x:hidden"> 
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
<div class="banbg">
	<div class="banM">
    	<div class="banleft"></div>
        <div class="banright">
            <div class="ban">
            	<div class="bantitle">学习方向</div>
                <div class="ban_tu">
                	<img src="/jw2/public/Images/class.jpg">
                </div>
            </div>
            <div class="ban2">
            	<div class="ban_text1">1、网站前端</div>
                <div class="ban_text1">2、PHP</div>
                <div class="ban_text2">3、.NET</div>
                <button class="btn_red">了解详情</button>
            </div>
            <div class="ban2">
            	<div class="bantitle2">学长赠言</div>
                <div class="ban_text3">没有学不到，只有做不到</div>
                <div class="ban_text3">天道酬勤，学海无涯</div>
                <button class="btn_red">加入我们</button>
            </div>
        </div>
    </div>
</div>
<div class="loginbg">
	<div class="loginM">
        <form action="<?php echo U(GROUP_NAME.'/Login/login');?>" method="post" id="login">
    	用户名：<input type="text" value="" class="username" name="username">
        密码：<input type="password" value="" class="password" name="password">
        验证码：<input type="code" name="code" style="width:80px;height:25px"/><img src="<?php echo U(GROUP_NAME.'/Login/verify');?>" id="code"/><a href="javascript:void(change_code(this));">看不清</a>
        <a href="#">&nbsp;&nbsp;&nbsp;忘记密码</a>
        <input type="submit" class="btn" value="登录"/>
        <a href="<?php echo U(GROUP_NAME.'/Login/register');?>"><input type="button" class="btn" value="注册"/></a>
        </form>
    </div>
</div>
<div class="center">
	<div class="center_M">
    	<div class="cen_lt">
        	<div class="cen_title_lt">最新答疑解惑内容</div>
            <div id="scrollDiv">
                <?php if(is_array($forum)): foreach($forum as $key=>$v): ?><ul style="margin-top: -28.799900796287px;">
                <li>
                	<p>
                    	<strong><?php echo ($v["title"]); ?></strong>
                        <span>
                        	<em>发帖：<?php echo ($v["louzhu"]); ?></em>
                            <button class="btn_red_small">查看</button>
                        </span>
                    </p>
                    <p>
                    	<b><?php echo ($v["content"]); ?></b>
                        <span><?php echo (date('y-m-d H:i',$v["time"])); ?></span>
                    </p>
                </li>
            </ul><?php endforeach; endif; ?>
			</div>
        </div>
        <div class="cen_rt">
        	<div class="cen_title_rt">历届负责人风采</div>
            <div class="prog_text"><strong>学习路上的指路人</strong></div>
            <div class="prog_reply">
            	<li>潘宝石</li><li>2012年</li>
                <li>马莹</li><li>2013年</li>
                <li>王迪</li><li>2014年</li>
                <li>殷展鹏</li><li>2015年</li>
            </div>
            <div class="cen_title_rt2">IT最新快讯&nbsp;<span><a href="#" target="_blank">更多 &gt;&gt;</a></span></div>
            <div class="prog_news">
            	<li><a href="http://news.itxinwen.com/2015/1008/563489.shtml" target="_blank">美团合并点评，又是个然并卵的故事</a></li>
                <li><a href="http://cio.itxinwen.com/2015/0911/563455.shtml" target="_blank">华为跻身全球IT主流厂商</a></li>
                <li><a href="http://news.itxinwen.com/2015/0709/563363.shtml" target="_blank">微软宣布将对手机硬件部门重组 最多裁员7800人</a></li>
                <li><a href="http://news.itxinwen.com/2015/0709/563360.shtml" target="_blank">《财富》中国500强发布 阿里新入榜排名81位</a></li>
                <li><a href="http://cio.itxinwen.com/2015/0610/563270.shtml" target="_blank">聚焦云计算产业未来发展</a></li>
            </div>
        </div>
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
</html>
</body>