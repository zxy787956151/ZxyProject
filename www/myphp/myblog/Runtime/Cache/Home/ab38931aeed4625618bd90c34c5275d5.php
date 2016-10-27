<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html lang="zh-CN">
<head>
<meta charset="UTF-8">
<title>赵修宇的博客</title>
<meta name="keywords" content="个人博客" />
<meta name="description" content="" />
<link rel="stylesheet" href="/myblog/Public/Home/Css/index.css"/>
<link rel="stylesheet" href="/myblog/Public/Home/Css/style.css"/>
<script type="text/javascript" src="/myblog/Public/Home/Js/jquery1.42.min.js"></script>
<script type="text/javascript" src="/myblog/Public/Home/Js/jquery.SuperSlide.2.1.1.js"></script>
<!--[if lt IE 9]>
<script src="js/html5.js"></script>
<![endif]-->
</head>

<body>
    <!--header start-->
    <div id="header">
      <h1>赵修宇的博客</h1>
      <p>青春是打开了,就合不上的书。人生是踏上了，就回不了头的路，爱情是扔出了，就收不回的赌注。</p>    
    </div>
     <!--header end-->
    <!--nav-->
     <div id="nav">
        <ul>
         <li><a href="/myblog">首页</a></li>
         <?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li><a href="<?php echo U($v['alias'].'/'.$v['id']);?>"><?php echo ($v["name"]); ?></a></li><?php endforeach; endif; ?>
         <div class="clear"></div>
        </ul>
      </div>
       <!--nav end-->
    <!--content start-->
    <div id="content">
       <!--left-->
         <div class="left" id="learn">
           <div class="weizi">
           <div class="wz_text">当前位置：<a href="#">首页</a>><h1>学无止境</h1></div>
           </div>
           <div class="l_content">
              <!--wz-->
          <?php if(is_array($study)): foreach($study as $key=>$v): ?><div class="wz">
            <h3><a href="<?php echo U('/'.$v['id']);?>" title="浅谈：html5和html的区别"><?php echo ($v["title"]); ?></a></h3>
             <dl>
               <dt><img src="/myblog/Public/Home/Images/<?php echo ($v["photo"]); ?>" width="200"  height="123" alt=""></dt>
               <dd>
                 <div class="dd_text_1"><?php echo ($v["content"]); ?></div>
               <p class="dd_text_2">
               <span class="left author"><?php echo ($v["where"]); ?></span><span class="left sj">时间:<?php echo (date("y-m-d",$v["time"])); ?></span>
               <span class="left fl">分类:<a href="#" title="学无止境">学无止境</a></span><span class="left yd"><a href="<?php echo U('/'.$v['id']);?>" title="阅读全文">阅读全文</a>
               </span>
                <div class="clear"></div>
               </p>
               </dd>
               <div class="clear"></div>
             </dl>
            </div>
           <!--wz end--><?php endforeach; endif; ?>
           </div>
         </div>
         <!--end left -->
         <!--right-->
         <div class="right" id="c_right">
         <?php echo W('Show/show');?>
         <?php echo W('News/news');?>
         <?php echo W('Tip/tip');?>
         </div>
         <!--right end-->
         <div class="clear"></div>
         
    </div>
    <!--content end-->
    <!--footer start-->
    <div id="footer">
     <p>Design by:<a href="http://www.duanliang920.com" target="_blank">少年</a> 2016-3-30</p>
    </div>
<!--footer end-->
    <script type="text/javascript">jQuery(".lanmubox").slide({easing:"easeOutBounce",delayTime:400});</script>
    <script  type="text/javascript" src="/myblog/Public/Home/Js/nav.js"></script>
</body>
</html>