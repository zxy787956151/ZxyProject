<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TALK</title>
    <!-- Bootstrap -->
    <link href="/TP3.2/App/Home/View/Public/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/TP3.2/App/Home/View/Public/css/reed.css">
    <script type="text/javascript" src="/TP3.2/App/Home/View/Public/JQ/jquery-2.1.4.js"></script>
    <script type="text/javascript" src="/TP3.2/App/Home/View/Public/Ajax/Talk.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="//cdn.bootcss.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="//cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>   
      <header id="head">
  		 	   <ul class="headlist" id="headlist">        <!-- 导航条 -->
  		 	      <li>TALK</li>
  		 	   	  <li><a href="#">问答</a></li>
  		 	   	  <li><a href="#">技术</a></li>
  		 	   	  <li><a href="#">成果</a></li>
  		 	   	  <li><a href="#"><span>心路</a></li>
  		 	   	  <li><span class="glyphicon glyphicon-align-justify" id="adjust"></span></li>
  		 	   </ul>
  		 	   <div  class="newsact">      <!-- 消息提醒 -->
  		 	   	   <ul>         
    			 	       <li><span class="glyphicon glyphicon-send" ></span></li>
    			 	       <li>1</li>
  		 	       </ul> 
  		 	   </div>
             <!-- 未登录状态 -->
           <div class="nopic" id="nopic"></div>   <!-- 用户头像 -->
  		 	   <div class="warnland" id="warnland">         <!-- 提示登陆 -->
                <p>请登陆！</p>
                <span class="glyphicon glyphicon-user onland"></span>
           </div>  
             <!-- 登陆状态 -->          
           <div class="userpic" id="userpic"></div>   <!-- 用户头像 -->
  		 	   <div class="userwel" id="userwel">         <!-- 用户信息 -->
  		 	   	    <p>欢迎登陆！</p>
  		 	   	    <p>尹恩惠</p>
  		 	   </div>   
  		 	   <div class="listcontrol" id="listcontrol"> <!-- 二级菜单 -->
  			 	    <ul class="listul">
  			 	    	<li><a href="#">问答</a></li>
  			 	   	    <li><a href="#">技术</a></li>
  			 	   	    <li><a href="#">成果</a></li>
  			 	   	    <li><a href="#"><span>心路</a></li>
  			 	    </ul>
  		 	   </div>
	  	</header>
      <img src="/TP3.2/App/Home/View/Public/images/index.gif" class="headimg">          <!-- 页头大图 -->
	  	<div class="row">
		       <div class="col-md-9 col-md-offset-1 picfont"> <!-- 图上字 -->
		   	   	  <p>在这里，我们交流，学习，探索，互助。</p>
		   	   </div>
	    </div>
      <!-- 登陆界面 -->
      <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12 landing">
              <div class="camera"><img src="/TP3.2/App/Home/View/Public/images/camera.png"></div>
              <form >
                <input type="text" id="user"  placeholder="input username">
                <!-- <input type="password" id="pass" placeholder="input userpass"> -->
                <input class="btn" type="submit" value="Sign in">
              </form>
      </div>

        
        
	   
	      

   <script src="http://cdn.bootcss.com/jquery/1.11.3/jquery.min.js"></script> <!--没网直接爆炸。-->
   <script src="js/bootstrap.min.js"></script>
   <script type="text/javascript">
	 	window.onscroll=function (){
              var head=document.getElementById("head");
              var headlist=document.getElementById("headlist");
              var t = document.documentElement.scrollTop;//滑动了多少像素。
              var listcontrol=document.getElementById("listcontrol");
              if(t>0){
                 head.className="onscroll";
                 headlist.className="headlistturn";
                 listcontrol.className="turncontrol";
              }
              else{
               	 head.className="noscroll";
               	 headlist.className="headlist";
               	 listcontrol.className="listcontrol";
               	 
              }
        }

        
        $(function(){
        	 $(".listul").hide();
             $("#adjust").click(function(){
             $(".listul").slideToggle(300);}
                                           ); })

        $(function(){
             $(".onland").click(function(){
             $(".landing").show(300);}
                                           ); })
	 </script>
 </body>
</html>