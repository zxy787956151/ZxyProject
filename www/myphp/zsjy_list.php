﻿<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<title>{dede:field.title/}_{dede:global.cfg_webname/}</title>
    <meta name="keywords" content="{dede:field name='keywords'/}" />
    <meta name="description" content="{dede:field name='description' function='html2text(@me)'/}" />
    
   <link href="{dede:global.cfg_templets_skin/}/style/list.css" rel="stylesheet" media="screen" type="text/css" />
 	 <script type="text/javascript" src="{dede:global.cfg_templets_skin/}/js/jquery-1.10.2.min.js"></script>
	 <script type="text/javascript" src="{dede:global.cfg_templets_skin/}/js/nav.js"></script>
	 <style>
	 	#par_list li{text-align:center;}
	 	#page{
	 	width:287px;
	 	margin-left:182.5px;}
	 	
	 	#page li{
	 		
	 		float:left;
	 		margin-right:10px;
	 		height:39px;
	 		line-height:39px;
	 	}
	 	
	 	#page li a{
	 		color:black;
	 		}
	 		
	 #page li a:hover{
	 	 color:red;
	 	}		
	 	</style>
	</head>
	
	
	
	<body>
		<div id="container">
			<div id="header"></div>
			<div id="content">
				<!--start nav-->
				<div id="nav">
			<ul>
						<li class="current"><a href="{dede:global.cfg_basehost/}" style="color:#FFF;">首页</a></li>
						<li>
							<a href="#">学院概况</a>
							<ul style="display:none;">
								<li><a href="/xueyuanjianjie/2015/0915/18.html?1446438695">学院简介</a></li>
								<li><a href="/plus/list.php?tid=3">学院领导</a></li>
								<li><a href="/jigoushezhi/2015/0922/96.html?1446439185">机构设置</a></li>
								<li style="border:0;position:relative;">
									<a href="/plus/list.php?tid=6">专业介绍</a>
									<div style="display:none;position:absolute;top:0px;left:114px;z-index:3;width:114px;background-color:#fcedbe ;">
										<span><a href="/faxue/2015/0922/92.html?1446438954"  style="border-bottom:1px dotted #b70403;">法学</a></span>
										<span><a href="/shehuixue/2015/0922/93.html?1446438915">社会学</a></span>
									</div>
								</li> 
							</ul>
						</li>
						<li>
							<a href="#">师资队伍</a>
							<ul style="display:none;">
								<li><a href="/plus/list.php?tid=11">法学</a></li>
								<li style="border: 0;"><a href="/plus/list.php?tid=12">社会学</a></li> 
							</ul>
						</li>
						<li>
							<a href="#">教学科研</a>
							<ul style="display:none;">
								<li><a href="/plus/list.php?tid=10">教学工作</a></li>
								<li><a href="/plus/list.php?tid=13">科研工作</a></li>
								<li style="border: 0;"><a href="/plus/list.php?tid=14">学术交流</a></li> 
							</ul>
						</li>
						<li>
							<a href="#">党务工作</a>
							<ul style="display:none;">
								<li><a href="/plus/list.php?tid=16">党建汇萃</a></li>
								<li ><a href="/plus/list.php?tid=17" style="font-size:15px;margin-left:0px;padding-right:2px;width:98px;">思想政治工作</a></li>
								<li style="border: 0;"><a href="/plus/list.php?tid=18">工会活动</a></li> 
							</ul>
						</li>
						<li>
							<a href="#">学团工作</a>
							<ul style="display:none;">
								<li><a href="/plus/list.php?tid=20">学生管理</a></li>
								<li style="border: 0;"><a href="/plus/list.php?tid=21">学团活动</a></li> 
							</ul>
						</li>
						<li>
							<a href="#">招生就业</a>
							<ul style="display:none;">
								<li><a href="/plus/list.php?tid=23">招生工作</a></li>
								<li style="border: 0;"><a href="/plus/list.php?tid=24">就业工作</a></li>  
							</ul>
						</li>
					</ul>
					<div style="margin:-3px auto 0;width:907px;height:4px;background-color:#c40000;"></div>
				</div>
				<!--end nav-->
				<div style="background-color: #fff;">
					<!--start left_menu-->
					<div id="left_menu">
						<div class="menu" >
							<div style="height:51px;background:url({dede:global.cfg_templets_skin/}/images/lawImg/list_left_title.png);">
								<span style="">招生就业</span>
							</div>
							<div>
								<ul class="article" id="par_list">
									<li><a href="/plus/list.php?tid=23">招生工作</a></li>
									<li><a href="/plus/list.php?tid=24">就业工作</a></li>
									<li><a href="/plus/list.php?tid=31">毕业生风采</a></li>
									<li><a href="/plus/list.php?tid=32">法学优秀毕业生</a></li>

								</ul>
							</div>
						</div>
						<div class="menu" >
							<div style="height:51px;background:url({dede:global.cfg_templets_skin/}/images/lawImg/list_left_title.png);">
								<span style="">通知公告</span>
							</div>
							<div>
								<ul class="article">
									 {dede:arclist typeid='25' row='7' titlelen='16' orderby='pubdate'}
                                     <li>
                                     <a href="[field:arcurl/]">[field:title/]</a>
                                     <span>[field:pubdate function='strftime("%Y-%m-%d",@me)'/]</span>
                                     </li>
                                      {/dede:arclist}
								</ul>
							</div>
						</div>
					</div>
					<!--start left_menu-->
					
					<!--start right-->
					<div id="right">
						<div style="height:39px;background:url({dede:global.cfg_templets_skin/}/images/lawImg/list_right_title.png)">
							<span>当前位置：
								{dede:field name='position'/}
							</span>
							
						</div>
						<div id="right_content">
                        <h1 style="text-align:center;padding-top:30px;">{dede:field name='typename'/}</h1>

							<ul id="right_list">
                            {dede:list typeid='' row='10' orderby='pubdate'  pagesize='20'}
								<li>
                                     <a href="[field:arcurl/]">[field:title/]</a>
                                     <font style="display:block;float:right;">[field:pubdate function='strftime("%Y-%m-%d",@me)'/]</font>
                                     </li>
                                      {/dede:list}
							</ul>
							<div id="page">
								<span>{dede:pagelist listsize='10' listitem='index pre pageno next end'/}</span>
							</div>
						</div>
					</div>
				</div>
				
			</div>
			
			<div id="footer">
				<span>版权所有：北华大学法学院</span>
			</div>
		</div>
			
				
	</body>
</html>
