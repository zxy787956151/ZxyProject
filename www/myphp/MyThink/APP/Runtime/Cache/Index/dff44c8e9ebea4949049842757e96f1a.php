<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
<head>
<meta charset="gb2312">
<title>��С�׸��˲���</title>
<meta name="keywords" content="" />
<meta name="description" content="" />
<link href="css/base.css" rel="stylesheet">
<link href="css/index.css" rel="stylesheet">
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/sliders.js"></script>
<!--[if lt IE 9]>
<script src="js/modernizr.js"></script>
<![endif]-->
<!-- ���ض������� begin -->
<script type="text/javascript" src="js/up/jquery.js"></script>
<script type="text/javascript" src="js/up/js.js"></script>
<!-- ���ض������� end-->
</head>
<body>
<header>
  <div class="logo f_l"> <a href="/"><img src="images/logo.png"></a> </div>
  <nav id="topnav" class="f_r">
    <ul>
      <a href="index.html" target="_blank">��ҳ</a> <a href="news.html" target="_blank">������</a> <a href="p.html" target="_blank">����</a> <a href="a.html" target="_blank">����</a> <a href="c.html" target="_blank">���</a> <a href="b.html" target="_blank">����</a>
    </ul>
    <script src="js/nav.js"></script> 
  </nav>
</header>
<article>
  <div class="l_box f_l">
    <div class="banner">
      <div id="slide-holder">
        <div id="slide-runner"> <a href="/" target="_blank"><img id="slide-img-1" src="images/a1.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-2" src="images/a2.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-3" src="images/a3.jpg"  alt="" /></a> <a href="/" target="_blank"><img id="slide-img-4" src="images/a4.jpg"  alt="" /></a>
          <div id="slide-controls">
            <p id="slide-client" class="text"><strong></strong><span></span></p>
            <p id="slide-desc" class="text"></p>
            <p id="slide-nav"></p>
          </div>
        </div>
      </div>
      <script>
	  if(!window.slider) {
		var slider={};
	}

	slider.data= [
    {
        "id":"slide-img-1", // ��slide-runner�е�img��ǩid��Ӧ
        "client":"����1",
        "desc":"�����޸����� �����޸����� �����޸�����" //�����޸�����
    },
    {
        "id":"slide-img-2",
        "client":"����2",
        "desc":"add your description here"
    },
    {
        "id":"slide-img-3",
        "client":"����3",
        "desc":"add your description here"
    },
    {
        "id":"slide-img-4",
        "client":"����4",
        "desc":"add your description here"
    } 
	];

	  </script> 
    </div>
    <!-- banner���� ���� -->
    <div class="topnews">
      <h2><span><a href="/" target="_blank">��Ŀ����</a><a href="/" target="_blank">��Ŀ����</a><a href="/" target="_blank">��Ŀ����</a></span><b>����</b>�Ƽ�</h2>
      <div class="blogs">
        <figure><img src="images/01.jpg"></figure>
        <ul>
          <h3><a href="/">ס���ֻ��������</a></h3>
          <p>ͨ��ʱ���������ǳ���������������ط꣬������ϵ��ʽ�������Ǳ˴˽�����Ƭ��Ȼ��֣�ػ��ǳ�����ò���ֻ����¶Է��ĵ绰���롣�ڿ�������������ǲ�֪�����оͳ�Ϊס�ڱ����ֻ�������ѡ�����ĳЩ���⣬����˱����ֻ����æ�Ĺ��ͣ����ֿ��ʽ������ ...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/02.jpg"></figure>
        <ul>
          <h3><a href="/">����������Ƿ���ֻ�����绰</a></h3>
          <p>������ʶ��ϲ�ã���������ƺ��ҵ���֪�������ǣ�����ͶԵ���ˣ���ʼ�˽�Ƶ���Ľ����������أ���ʶ��ϲ���˾������������ǽ�����������ϵ��ƽ����ż���ڽڼ�Ի�����Ż����ʺ�...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/03.jpg"></figure>
        <ul>
          <h3><a href="/">ԭ����Ϊ��һ���˵��¸��ǣ�ɾ�������ֻ�����...</a></h3>
          <p>ԭ����Ϊ��һ���˵��¸��ǣ�ɾ�������ֻ����롢QQ����ȵ�һ�У�Ŭ���������־��롣������һ�죬ϰ�߲���������ϰ������������,ϰ��ʱ��������Ҽ��������Ӱĥʴ�ɾ�... </p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/04.jpg"></figure>
        <ul>
          <h3><a href="/">�ֻ���16������С���ܣ���˵99.999%���˶���֪</a></h3>
          <p>�����֪��ô���ֻ��б��õ�أ��ֻ�������12593+�绰����=���塭���ֻ����кܶ��㲻֪����С���ܣ�˵����һ���ܾ��棡���ŵĻ����������ɣ�...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/05.jpg"></figure>
        <ul>
          <h3><a href="/">����Ե�������������ֻ�</a></h3>
          <p>ÿһ������˳Է����ܻ����˻��ó��ֻ�����Ϊ�����ڴ�绰�����н����Ķ��ţ�����������һ��֮�����޷Ǿ������£�1����С˵��2�������˻���QQ...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/06.jpg"></figure>
        <ul>
          <h3><a href="/">�����ֻ���ʽ����! �ڷ���ȫ�ֹ�������ݳ�Ʒ</a></h3>
          <p>���ڿ��������ʱ�С������Լ��˶�Ʒ�������ֻ����������Ϸ����ֻ���Ʒ����ҵ���Ѿ��������ʣ��������Ǹ���ұ����������ֱ���������ʿ̩�񡤺��ţ�Tag Heuer�� ���Ϸ������ֻ�������Modelabs������һ���ݻ��ֻ��Ĳ��ֵ��գ������ո��ֻ����ڱ���ʽ������...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
      <div class="blogs">
        <figure><img src="images/04.jpg"></figure>
        <ul>
          <h3><a href="/">�ֻ���16������С���ܣ���˵99.999%���˶���֪</a></h3>
          <p>�����֪��ô���ֻ��б��õ�أ��ֻ�������12593+�绰����=���塭���ֻ����кܶ��㲻֪����С���ܣ�˵����һ���ܾ��棡���ŵĻ����������ɣ�...</p>
          <p class="autor"><span class="lm f_l"><a href="/">���˲���</a></span><span class="dtime f_l">2014-02-19</span><span class="viewnum f_r">�����<a href="/">459</a>��</span><span class="pingl f_r">���ۣ�<a href="/">30</a>��</span></p>
        </ul>
      </div>
    </div>
  </div>
  <div class="r_box f_r">
    <div class="tit01">
      <h3>��ע��</h3>
      <div class="gzwm">
        <ul>
          <li><a class="xlwb" href="#" target="_blank">����΢��</a></li>
          <li><a class="txwb" href="#" target="_blank">��Ѷ΢��</a></li>
          <li><a class="rss" href="portal.php?mod=rss" target="_blank">RSS</a></li>
          <li><a class="wx" href="mailto:admin@admin.com">����</a></li>
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
          <li class="cur"><a href="/">�������</a></li>
          <li><a href="/">��������</a></li>
          <li><a href="/">վ���Ƽ�</a></li>
        </ul>
      </div>
      <div class="ms-main" id="ms-main">
        <div style="display: block;" class="bd bd-news" >
          <ul>
            <li><a href="/" target="_blank">ס���ֻ��������</a></li>
            <li><a href="/" target="_blank">����������Ƿ���ֻ�����绰</a></li>
            <li><a href="/" target="_blank">ԭ����Ϊ��һ���˵��¸��ǣ�ɾ�������ֻ�����...</a></li>
            <li><a href="/" target="_blank">�ֻ���16������С���ܣ���˵99.999%���˶���֪</a></li>
            <li><a href="/" target="_blank">����Ե�������������ֻ�</a></li>
            <li><a href="/" target="_blank">�����ֻ���ʽ����! �ڷ���ȫ�ֹ�������ݳ�Ʒ</a></li>
          </ul>
        </div>
        <div  class="bd bd-news">
          <ul>
            <li><a href="/" target="_blank">ԭ����Ϊ��һ���˵��¸��ǣ�ɾ�������ֻ�����...</a></li>
            <li><a href="/" target="_blank">�ֻ���16������С���ܣ���˵99.999%���˶���֪</a></li>
            <li><a href="/" target="_blank">ס���ֻ��������</a></li>
            <li><a href="/" target="_blank">����������Ƿ���ֻ�����绰</a></li>
            <li><a href="/" target="_blank">����Ե�������������ֻ�</a></li>
            <li><a href="/" target="_blank">�����ֻ���ʽ����! �ڷ���ȫ�ֹ�������ݳ�Ʒ</a></li>
          </ul>
        </div>
        <div class="bd bd-news">
          <ul>
            <li><a href="/" target="_blank">�ֻ���16������С���ܣ���˵99.999%���˶���֪</a></li>
            <li><a href="/" target="_blank">����Ե�������������ֻ�</a></li>
            <li><a href="/" target="_blank">ס���ֻ��������</a></li>
            <li><a href="/" target="_blank">�����ֻ���ʽ����! �ڷ���ȫ�ֹ�������ݳ�Ʒ</a></li>
            <li><a href="/" target="_blank">����������Ƿ���ֻ�����绰</a></li>
            <li><a href="/" target="_blank">ԭ����Ϊ��һ���˵��¸��ǣ�ɾ�������ֻ�����...</a></li>
          </ul>
        </div>
      </div>
      <!--ms-main end --> 
    </div>
    <!--�л��� moreSelect end -->
    
    <div class="cloud">
      <h3>��ǩ��</h3>
      <ul>
        <li><a href="/">���˲���</a></li>
        <li><a href="/">web����</a></li>
        <li><a href="/">ǰ�����</a></li>
        <li><a href="/">Html</a></li>
        <li><a href="/">CSS3</a></li>
        <li><a href="/">Html5+css3</a></li>
        <li><a href="/">�ٶ�</a></li>
        <li><a href="/">Javasript</a></li>
        <li><a href="/">web����</a></li>
        <li><a href="/">ǰ�����</a></li>
        <li><a href="/">Html</a></li>
        <li><a href="/">CSS3</a></li>
        <li><a href="/">Html5+css3</a></li>
        <li><a href="/">�ٶ�</a></li>
      </ul>
    </div>
    <div class="tuwen">
      <h3>ͼ���Ƽ�</h3>
      <ul>
        <li><a href="/"><img src="images/01.jpg"><b>ס���ֻ��������</b></a>
          <p><span class="tulanmu"><a href="/">�ֻ����</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/02.jpg"><b>����������Ƿ���ֻ�����绰</b></a>
          <p><span class="tulanmu"><a href="/">�ֻ����</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/" title="�ֻ���16������С���ܣ���˵99.999%���˶���֪"><img src="images/03.jpg"><b>�ֻ���16������С���ܣ���˵...</b></a>
          <p><span class="tulanmu"><a href="/">�ֻ����</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/06.jpg"><b>ס���ֻ��������</b></a>
          <p><span class="tulanmu"><a href="/">�ֻ����</a></span><span class="tutime">2015-02-15</span></p>
        </li>
        <li><a href="/"><img src="images/04.jpg"><b>����������Ƿ���ֻ�����绰</b></a>
          <p><span class="tulanmu"><a href="/">�ֻ����</a></span><span class="tutime">2015-02-15</span></p>
        </li>
      </ul>
    </div>
    <div class="ad"> <img src="images/03.jpg"> </div>
    <div class="links">
      <h3><span>[<a href="/">������������</a>]</span>��������</h3>
      <ul>
        <li><a href="/">������˲���</a></li>
        <li><a href="/">web����</a></li>
        <li><a href="/">ǰ�����</a></li>
        <li><a href="/">Html</a></li>
        <li><a href="/">CSS3</a></li>
        <li><a href="/">Html5+css3</a></li>
        <li><a href="/">�ٶ�</a></li>
      </ul>
    </div>
  </div>
  <!--r_box end --> 
</article>
<footer>
  <p class="ft-copyright">��С�ײ��� Design by DanceSmile ��ICP��11002373��-1</p>
  <div id="tbox"> <a id="togbook" href="/"></a> <a id="gotop" href="javascript:void(0)"></a> </div>
</footer>
</body>
</html>