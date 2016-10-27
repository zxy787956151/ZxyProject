<?php
  include("base.php");
?>
<!doctype html>
<html>
<head>
<!-- <meta http-equiv="Content-type" content="text/html; charset=utf-8" /> -->
<title>黑色の雪</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/base.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/sliders.js"></script>
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<!-- ·µ»Ø¶¥²¿µ÷ÓÃ begin -->
<script type="text/javascript" src="js/up/jquery.js"></script>
<script type="text/javascript" src="js/up/js.js"></script>
<!-- ·µ»Ø¶¥²¿µ÷ÓÃ end-->
</head>
<body>
<header>
  <div class="logo f_l"> <a href="/"><img src="images/logo.png"></a> </div>
  <nav id="topnav" class="f_r">
    <ul>
      <a href="index.html" target="_blank">主页</a> <a href="#" target="_blank">关于我</a> <a href="#" target="_blank">文章</a> <a href="a.html" target="_blank">心情</a> <a href="c.html" target="_blank">相册</a> <a href="b.html" target="_blank">留言</a>
    </ul>
    <script src="js/nav.js"></script> 
  </nav>
</header>
<article>
  <div class="l_box f_l">
    <div class="banner">
      <div id="slide-holder">
        <div id="slide-runner"> 
          <?php
            $sql="select * from move where in_id='1'";

            $res=$pdo->query($sql);

            foreach ($res as $rows) {
              echo "
               <a href='' target='_blank'>
                <img id='slide-img-1' src='images/$rows[img]'  alt='' />
               </a> ";

               $title1=@$rows['title'];
               $miaoshu1=@$rows['miaoshu'];
            }

            $sql="select * from move where in_id='2'";

            $res=$pdo->query($sql);

            foreach ($res as $rows) {
              echo "
               <a href='' target='_blank'>
                <img id='slide-img-2' src='images/$rows[img]'  alt='' />
               </a> ";

               $title2=@$rows['title'];
               $miaoshu2=@$rows['miaoshu'];
            }

            $sql="select * from move where in_id='3'";

            $res=$pdo->query($sql);

            foreach ($res as $rows) {
              echo "
               <a href='' target='_blank'>
                <img id='slide-img-3' src='images/$rows[img]'  alt='' />
               </a> ";

               $title3=@$rows['title'];
               $miaoshu3=@$rows['miaoshu'];
            }

            $sql="select * from move where in_id='4'";

            $res=$pdo->query($sql);

            foreach ($res as $rows) {
              echo "
               <a href='' target='_blank'>
                <img id='slide-img-4' src='images/$rows[img]'  alt='' />
               </a> ";

               $title4=@$rows['title'];
               $miaoshu4=@$rows['miaoshu'];
            }
            
            
              echo "<script>
                        if(!window.slider) {
                            var slider={};
                          }

                          slider.data= [
                            {
                                'id':'slide-img-1',
                                'client':'$title1',
                                'desc':'$miaoshu1'
                            },
                             {
                                'id':'slide-img-2',
                                'client':'$title2',
                                'desc':'$miaoshu2'
                            },
                             {
                                'id':'slide-img-3',
                                'client':'$title3',
                                'desc':'$miaoshu3'
                            },
                             {
                                'id':'slide-img-4',
                                'client':'$title4',
                                'desc':'$miaoshu4'
                            }
                          ];
              </script>";
            


          ?>
          <div id="slide-controls">
            <p id="slide-client" class="text"><strong></strong><span></span></p>
            <p id="slide-desc" class="text"></p>
            <p id="slide-nav"></p>
          </div>
        </div>
      </div>
      <script>
  //   if(!window.slider) {
  //   var slider={};
  // }

  // slider.data= [
  //   {
  //       "id":"slide-img-1", // Óëslide-runnerÖÐµÄimg±êÇ©id¶ÔÓ¦
  //       "client":"±êÌâ1",
  //       "desc":"ÕâÀïÐÞ¸ÄÃèÊö ÕâÀïÐÞ¸ÄÃèÊö ÕâÀïÐÞ¸ÄÃèÊö" //ÕâÀïÐÞ¸ÄÃèÊö
  //   },
  //   {
  //       "id":"slide-img-2",
  //       "client":"±êÌâ2",
  //       "desc":"add your description here"
  //   },
  //   {
  //       "id":"slide-img-3",
  //       "client":"±êÌâ3",
  //       "desc":"add your description here"
  //   },
  //   {
  //       "id":"slide-img-4",
  //       "client":"±êÌâ4",
  //       "desc":"add your description here"
  //   } 
  // ];

    </script> 
    </div>
    <!-- banner´úÂë ½áÊø -->
    <div class="topnews">
      <h2><span><a href="/" target="_blank">栏目标题</a><a href="/" target="_blank">栏目标题</a><a href="/" target="_blank">栏目标题</a></span><b>文章</b>推荐</h2>
      
      <?php
        $sql="select * from img a,mytext b where a.id=b.img_id limit 0,7";

        $res=$pdo->query($sql);

        foreach ($res as $rows) {
          echo"  
            <div class='blogs'>
              <figure><img src='$rows[href]'></figure>
              <ul>
                <h3><a href=''></a>$rows[title]</h3>
                <p>$rows[content]</p>
                <p class='autor'><span class='lm f_l'><a href=''>个人博客</a></span><span class='dtime f_l'>2014-02-19</span><span class='viewnum f_r'>浏览（<a href=''>459</a>）</span><span class='pingl f_r'>评论（<a href=''>30</a>）</span></p>
              </ul>
            </div>";
        }
                  
              
      ?>

     
      

    </div>
  </div>
  <div class="r_box f_r">
    <div class="tit01">
      <h3>关注我</h3>
      <div class="gzwm">
        <ul>
          <li><a class="xlwb" href="#" target="_blank">新浪微博</a></li>
          <li><a class="txwb" href="#" target="_blank">腾讯微博</a></li>
          <li><a class="rss" href="portal.php?mod=rss" target="_blank">RSS</a></li>
          <li><a class="wx" href="mailto:admin@admin.com">邮箱</a></li>
        </ul>
      </div>
    </div>
    <!--tit01 end-->
    <div class="ad300x100"> <img src="images/ad300x100.jpg"> </div>
    <div class="moreSelect" id="lp_right_select"> 
      <script>
window.onload = function ()
{
  var oLi = document.getElementById("tab").getElementsByTagName("li");
  var oUl = document.getElementById("ms-main").getElementsByTagName("div");
  
  for(var i = 0; i < oLi.length; i++)
  {
    oLi[i].index = i;
    oLi[i].onmouseover = function ()
    {
      for(var n = 0; n < oLi.length; n++) oLi[n].className="";
      this.className = "cur";
      for(var n = 0; n < oUl.length; n++) oUl[n].style.display = "none";
      oUl[this.index].style.display = "block"
    } 
  }
}
</script>
      <div class="ms-top">
        <ul class="hd" id="tab">
          <li class="cur"><a href="/">点击排行</a></li>
          <li><a href="/">最新文章</a></li>
          <li><a href="/">站长推荐</a></li>
        </ul>
      </div>
      <div class="ms-main" id="ms-main">
        <div style="display: block;" class="bd bd-news" >
          <ul>
            <?php

              $sql="select * from djph limit 0,6";
              $res=$pdo->query($sql);
              foreach ($res as $rows) {
                echo "<li><a href='' target='_blank'>
                          $rows[title]
                </a></li>";
              }
            ?>
          </ul>
        </div>
        <div  class="bd bd-news">
          <ul>
            <?php

              $sql="select * from zxwz limit 0,6";
              $res=$pdo->query($sql);
              foreach ($res as $rows) {
                echo "<li><a href='' target='_blank'>
                          $rows[title]
                </a></li>";
              }
            ?>
          </ul>
        </div>
        <div class="bd bd-news">
          <ul>
            <?php

              $sql="select * from zztj limit 0,6";
              $res=$pdo->query($sql);
              foreach ($res as $rows) {
                echo "<li><a href='' target='_blank'>
                          $rows[title]
                </a></li>";
              }
            ?>
          </ul>
        </div>
      </div>
      <!--ms-main end --> 
    </div>
    <!--ÇÐ»»¿¨ moreSelect end -->
    
    <div class="cloud">
      <h3>标签云</h3>
      <ul>
        <?php
            $sql="select * from bqy";
            $res=$pdo->query($sql);
            foreach ($res as $rows) {
              echo "<li><a href=''>
                $rows[content]
              </a></li>";
            }
            
        ?>
          
      </ul>
    </div>
    <div class="tuwen">
      <h3>图文推荐</h3>
      <ul>

        <?php
            $sql="select * from twtj limit 0,5";
            $res=$pdo->query($sql);
            foreach ($res as $rows) {
              echo "
              <li><a href=''><img src='$rows[img]'><b>$rows[title]</b></a>
                <p><span class='tulanmu'><a href=''>$rows[kind]</a></span><span class='tutime'>$rows[time]</span></p>
              </li>";
            }
        ?>
        <!-- <li><a href="/"><img src="images/01.jpg"><b>×¡ÔÚÊÖ»úÀïµÄÅóÓÑ</b></a>
          <p><span class="tulanmu"><a href="/">ÊÖ»úÅä¼þ</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/02.jpg"><b>½ÌÄãÔõÑùÓÃÇ··ÑÊÖ»ú²¦´òµç»°</b></a>
          <p><span class="tulanmu"><a href="/">ÊÖ»úÅä¼þ</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/" title="ÊÖ»úµÄ16¸ö¾ªÈËÐ¡ÃØÃÜ£¬¾ÝËµ99.999%µÄÈË¶¼²»Öª"><img src="images/03.jpg"><b>ÊÖ»úµÄ16¸ö¾ªÈËÐ¡ÃØÃÜ£¬¾ÝËµ...</b></a>
          <p><span class="tulanmu" style="margin-left:80px"><a href="/">ÊÖ»úÅä¼þ</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/06.jpg"><b>×¡ÔÚÊÖ»úÀïµÄÅóÓÑ</b></a>
          <p><span class="tulanmu"><a href="/">ÊÖ»úÅä¼þ</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/04.jpg"><b>½ÌÄãÔõÑùÓÃÇ··ÑÊÖ»ú²¦´òµç»°</b></a>
          <p><span class="tulanmu"><a href="/">ÊÖ»úÅä¼þ</a></span><span class="tutime">2015-02-15</span></p>
        </li> -->
      </ul>
    </div>
    <div class="ad"> <img src="images/03.jpg"> </div>
    <div class="links">
      <h3><span>[<a href="/">申请友情链接</a>]</span>友情链接</h3>
      <ul>
        <?php
            $sql="select * from yqlj limit 0,7";
            $res=$pdo->query($sql);
            foreach ($res as $rows) {
              echo "
              <li><a href='#'>$rows[title]</a></li>
              ";
            }
        ?>
        
      </ul>
    </div>
  </div>
  <!--r_box end --> 
</article>
<footer>
  <p class="ft-copyright">兔小白博客 Design by DanceSmile 蜀ICP备11002373号-1</p>
  <div id="tbox"> <a id="togbook" href="/"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
</footer>
</body>
</html>

