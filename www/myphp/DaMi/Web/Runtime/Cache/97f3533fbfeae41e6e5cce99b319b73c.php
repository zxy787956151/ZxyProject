<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml2/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" >
<head>
<meta http-equiv="X-UA-Compatible" content="IE=7">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php if(($title) != ""): echo ($title); ?>-<?php endif; echo ($config["sitetitle"]); ?>-<?php echo ($config["sitetitle2"]); ?></title>
<meta name="keywords" content="<?php echo ($config["sitekeywords"]); ?>" />
<meta name="description" content="<?php echo ($config["sitedescription"]); ?>" />
<link href="__TMPL__/css/style.css" rel="stylesheet" type="text/css" />
<link href="__TMPL__/css/common.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__TMPL__/css/functions.js"></script>
<script type="text/javascript" src="__TMPL__/js/jquery.min.js"></script>
<script type="text/javascript" src="__TMPL__/js/FocusSlide.js"></script>
<script type="text/javascript" src="__TMPL__/js/ScrollPic.js"></script>
</head>

<body>
<div id="wrapper">
<!--head start-->
<div id="head">

<!--top start -->
<div class="top">
<div class="TopLogo">
<div class="logo"><a href="__ROOT__/"><img src="__PUBLIC__/Uploads/logo/<?php echo ($config["sitelogo"]); ?>" alt="<?php echo ($config["sitetitle"]); ?>"></a></div>
</div>
<div class="TopInfo">
<div class="link"><script src="<?php echo U('Api/login_js');?>"></script> | <a href="<?php echo U('Guestbook/index');?>">留言反馈</a></div>
<div class="clearfix"></div>
<div class="tel"><p class="telW">热线电话</p><p class="telN">400-800-888</p></div>
<div class="juhaoyongTopSearchClass">
	<form id="globalsearchform" method="post" action="<?php echo U('s/search');;?>">
	<span class="SearchBar">
	<input type="text" name="k" id="search-text" size="15" onBlur="if(this.value=='') this.value='请输入关键词';" onfocus="if(this.value=='请输入关键词') this.value='';" value="请输入关键词" />
	<input type="submit" id="search-submit" value="搜索" />
	</span>
	</form>
</div>
</div>
</div>
<!--top end-->

<!--nav start-->
<div id="NavLink">
<div class="NavBG">
<!--头部菜单-->
<ul id="headermenu_nav">
<li><a href='__ROOT__/'>首页</a></li>
<?php if(is_array($menu)): $k = 0; $__LIST__ = array_slice($menu,0,7,true);if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li><a href="<?php if(($vo["url"]) == ""): echo (url(lists,$vo["typeid"])); else: ?>__ROOT__<?php echo ($vo["url"]); endif; ?>" target="<?php if(($vo["target"]) == "1"): ?>_self<?php else: ?>_blank<?php endif; ?>"><?php echo ($vo["typename"]); ?></a>
<!--第二级-->
<?php if($vo[submenu]){ ?>
<!--[if lte IE 6]><table><tr><td><![endif]-->
<ul>
<?php if(is_array($vo[submenu])): $m = 0; $__LIST__ = $vo[submenu];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$sub): $mod = ($m % 2 );++$m;?><li><a href="<?php echo (url(lists,$sub["typeid"])); ?>"><?php echo ($sub["typename"]); ?></a>
<!--第三级-->
<?php if(have_child($sub[typeid])){ ?>
<!--[if lte IE 6]><table><tr><td><![endif]-->
<ul>
<?php $m=new Model("dami_type",NULL);$ret=$m->field("")->where("fid=$sub[typeid]")->order("drank asc")->limit("")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$tree):++$i;?><li><a href='<?php echo (url(lists,$tree["typeid"])); ?>'><?php echo ($tree["typename"]); ?></a></li><?php endforeach;endif; ?>
</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
<?php } ?>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
<?php } ?>
</li><?php endforeach; endif; else: echo "" ;endif; ?>
<!--单页调用-->
<li><a href='<?php echo U('Public/single',array('aid'=>133));?>'>售后服务</a></li>
</ul>
</div>
<div class="clearfix"></div>
</div>
<!--头部菜单结束-->
<!--幻灯片左右箭头onmouseover="jhyLunboShowPreNextBut(1)" onmouseout="jhyLunboShowPreNextBut(2)"-->
<div id="Focus">
<ul>
<?php $m=new Model("dami_flash",NULL);$ret=$m->field("")->where("status=1")->order("rank asc")->limit("")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><li><a href='<?php echo ($vo["url"]); ?>' target='_blank'><img src='__PUBLIC__/Uploads/hd/<?php echo ($vo["pic"]); ?>' /></a></li><?php endforeach;endif; ?>
</ul>
</div>
<!--幻灯结束-->
<div class="HeightTab clearfix"></div>
</div>        
<div id="body">
<!--MainBlock start-->
<div class="MainBlock">
<!--left start-->
<div class="right">
<div class="topic">
<div class="TopicTitle"><a href="<?php echo url(articles,55);?>">关于公司</a></div>
<div class="TopicMore"> <a  href='<?php echo url(articles,55);?>'><img src="__TMPL__/images/more.png"></a></div>
</div>
<div class='img'><a href='<?php echo url(articles,55);?>' target='_blank'><img src='__TMPL__/images/2012521212111.jpg' width='242' height='100' alt='关于公司'></a></div><div class='txt ColorLink'><p><?php echo msubstr(strip_tags(get_field('article','aid=55','content')),0,115);?><a href='<?php echo url(articles,55);?>' target='_blank'>【详细】</a></p></div>
<div class=" clearfix"></div>

</div>
<!--left end-->
<div class='WidthTab2'></div>

<!--right start-->
<div class="left">
<div class="topic">
<div class="TopicTitle"><a  href='#'>最近更新</a></div>
<div class="TopicMore"></div>
</div>
<div class='clearfix'></div>
<table class="MBlockTable" width="100%" border="0" cellspacing="0" cellpadding="0">
<?php $m=new Model("dami_article",NULL);$ret=$m->field("")->where("")->order("ishot desc,addtime desc")->limit("9")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><tr><td width='80%' class='ListTitle'><a href='<?php echo (url(articles,$vo["aid"])); ?>' target='_blank' ><?php echo ($vo["title"]); ?></a></td><td width='20%'><span><?php echo (date('Y-m-d',strtotime($vo["addtime"]))); ?></span></td></tr><?php endforeach;endif; ?>

  </table>
</div>
<!--right end-->

<!--right2 start-->
<div class="right2">
<div class="topic">
<div class="TopicTitle"><a  href='<?php echo url('lists',35);?>'>联系我们</a></div>
<div class="TopicMore"> <a  href='<?php echo url('lists',35);?>'><img src="__TMPL__/images/more.png"></a></div>
</div>
<div class='img'><a href='<?php echo url('lists',35);?>' target='_blank'><img src='__TMPL__/images/contactus.jpg' width='242' height='100' alt='联系我们'></a></div><div class="txt ColorLink" style="line-height:23px;">
<?php echo ($config["sitelx"]); ?>
</div>

<div class=" clearfix"></div>


</div>
<!--right2 end-->
<div class="clearfix"></div>

</div>
<!--MainBlock end-->
<div class="HeightTab2 clearfix"></div>
<div class='productIndexTuijian'><div class='topic'><div class='TopicTitle'><a href='<?php echo url('lists',22);?>'>公司产品</a></div><div class='TopicMore'> <a href='<?php echo url('lists',22);?>'><img src='__TMPL__/images/more.png'></a></div></div></div><!--MainBlock3 start--><div class='MainBlock3'><!--left start--><div class='left'><div class='TabBlock'><div id='tabcontent1'><DIV class='blk_29'><DIV class='LeftBotton' id='LeftArr1'></DIV><DIV class='Cont' id='ISL_Cont_1'>
<?php $product_ids=get_children(22); ?>
<?php $m=new Model("dami_article",NULL);$ret=$m->field("")->where("typeid in($product_ids)")->order("ishot desc,addtime desc")->limit("16")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><DIV class='box'><A class='imgBorder'  href='<?php echo (url(articles,$vo["aid"])); ?>' target='_blank' title='<?php echo ($vo["title"]); ?>'><IMG alt='' src='__ROOT__<?php echo ($vo["imgurl"]); ?>' border="0"><?php echo ($vo["title"]); ?></A> </DIV><?php endforeach;endif; ?>
</DIV><DIV class='RightBotton' id='RightArr1'></DIV></DIV><SCRIPT language='javascript' type='text/javascript'>var scrollPic_02 = new ScrollPic();scrollPic_02.scrollContId   = 'ISL_Cont_1';scrollPic_02.arrLeftId      = 'LeftArr1';scrollPic_02.arrRightId     = 'RightArr1'; scrollPic_02.frameWidth     = 888;scrollPic_02.pageWidth      = 888; scrollPic_02.speed          = 3; scrollPic_02.space          = 50; scrollPic_02.autoPlay       = true; scrollPic_02.autoPlayTime   = 3; scrollPic_02.initialize(); </SCRIPT><div class='clearfix'></div> </div> </div></div><!--left end--><div class='clearfix'></div></div><!--MainBlock end-->
<div class='jhyArticleListMainBlock'><!--行业新闻开始--><div class='juhaoyongALCommonUnit2'><div class='topic'><div class='TopicTitle'><a  href='<?php echo url('lists',19);?>' target='_blank'>行业新闻</a></div><div class='TopicMore'> <a  href='<?php echo url('lists',19);?>' target='_blank'><img src='__TMPL__/images/more.png'></a></div></div><div class='juhaoyongCommonUnitArticleList'><table class='JHYBlockTable' width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php $m=new Model("dami_article",NULL);$ret=$m->field("")->where("typeid=19")->order("ishot desc,addtime desc")->limit("16")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><tr><td width='75%' class='ListTitle'><a href='<?php echo (url(articles,$vo["aid"])); ?>' target='_blank' title='<?php echo ($vo["title"]); ?>'><?php echo (msubstr($vo["title"],0,14)); ?></a></td><td width='25%'><span><?php echo date('Y-m-d',strtotime($vo['addtime']));?></span></td></tr><?php endforeach;endif; ?></table></div></div><!--行业新闻结束-->
<div class='WidthTab2'></div>
<div class='juhaoyongALCommonUnit1'><div class='topic'><div class='TopicTitle'><a  href='<?php echo url('lists',20);?>' target='_blank'>公司新闻</a></div><div class='TopicMore'> <a  href='<?php echo url('lists',20);?>' target='_blank'><img src='__TMPL__/images/more.png'></a></div></div><div class='juhaoyongCommonUnitArticleList'><table class='JHYBlockTable' width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php $m=new Model("dami_article",NULL);$ret=$m->field("")->where("typeid=20")->order("ishot desc,addtime desc")->limit("16")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><tr><td class='ListTitle'><a href='<?php echo (url(articles,$vo["aid"])); ?>' target='_blank' title='<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></td><td width='65'><span><?php echo date('Y-m-d',strtotime($vo['addtime']));?></span></td></tr><?php endforeach;endif; ?>
</table></div></div><!--公司新闻结束--><div class='WidthTab2'></div><!--公司案例开始-->

<div class='juhaoyongALCommonUnit2'><div class='topic'><div class='TopicTitle'><a  href='<?php echo url('lists',27);?>' target='_blank'>案例展示</a></div><div class='TopicMore'> <a  href='<?php echo url('lists',27);?>' target='_blank'><img src='__TMPL__/images/more.png'></a></div></div><div class='juhaoyongCommonUnitArticleList'><table class='JHYBlockTable' width='100%' border='0' cellspacing='0' cellpadding='0'>
<?php $anli_ids=get_children(27); ?>
<?php $m=new Model("dami_article",NULL);$ret=$m->field("")->where("typeid in($anli_ids)")->order("ishot desc,addtime desc")->limit("16")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><tr><td width='75%' class='ListTitle'><a href='<?php echo (url(articles,$vo["aid"])); ?>' target='_blank' title='<?php echo ($vo["title"]); ?>'><?php echo ($vo["title"]); ?></a></td><td width='25%'><span><?php echo date('Y-m-d',strtotime($vo['addtime']));?></span></td></tr><?php endforeach;endif; ?>
</table></div></div><!--案例列表结束--></div>
<div class="HeightTab2 clearfix"></div>

<!--links start-->
<div id="Links">
<span>友情链接：</span>
<?php $m=new Model("dami_link",NULL);$ret=$m->field("")->where("status=1")->order("rank asc")->limit("")->select();if(is_array($ret)):$i = 0;foreach($ret as $key=>$vo):++$i;?><a href='<?php echo ($vo["url"]); ?>' target='_blank' ><?php echo ($vo["title"]); ?></a><?php endforeach;endif; ?>
</div>
<!--links end-->

</div>
<script type="text/javascript" src="__TMPL__/js/TabShow.js" ></script>
<div class="HeightTab clearfix"></div>
<!--footer start-->
<div id="footer">
<div class="inner">
<div class='BottomNav'>
<a href="<?php echo url(lists,15);?>" target="_self">关于我们</a>|
<a href="<?php echo url(lists,18);?>" target="_self">新闻动态</a>|
<a href="<?php echo url(lists,17);?>" target="_self">公司荣誉</a>|
<a href="<?php echo url(lists,35);?>" target="_self">联系我们</a>|
<a href="<?php echo url(lists,35);?>" target="_self">售后服务</a>|
<a href="<?php echo url(lists,25);?>" target="_self">人力资源</a></div>
<div class='HeightTab'></div>
<p>公司地址：成都建设路241号 联系电话：029-00000000 电子邮件：admin@damicm.com</p>
<p>Power By <a href="http://www.damicms.com/" target="_blank">大米CMS</a>&nbsp;&nbsp;<?php echo ($config["sitetcp"]); ?><script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1257137'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s13.cnzz.com/stat.php%3Fid%3D1257137%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script></p>
</div>
</div>
<!--footer end -->
</div>
</body>
</html>