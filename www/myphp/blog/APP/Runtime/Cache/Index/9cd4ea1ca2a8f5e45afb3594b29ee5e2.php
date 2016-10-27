<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>Document</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<script type="text/JavaScript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/JavaScript" src='__PUBLIC__/Js/common.js'></script>


	<link rel="stylesheet" href="__PUBLIC__/Css/common.css" />
	<link rel="stylesheet" href="__PUBLIC__/Css/show.css" />
</head>
<body>
<!--头部-->
<?php  $cate = M('cate')->order('sort')->select(); ?>
	<div class='top-list-wrap'>
		<div class='top-list'>
			<ul class='l-list'>
				<li><a href="http://www.houdunwang.com" target='_blank'>后盾网</a></li>
				<li><a href="http://bbs.houdunwang.com" target='_blank'>后盾网论坛</a></li>
				<li><a href="http://study.houdunwang.com" target='_blank'>后盾学习社区</a></li>
			</ul>
			<ul class='r-list'>
				<li><a href="http://www.hdphp.com" target='_blank'>HDPHP框架</a></li>
				<li><a href="http://bbs.houdunwang.com" target='_blank'>免费视频教程</a></li>
			</ul>
		</div>
	</div>


	<div class='top-search-wrap'>
		<div class='top-search'>
			<a href="http://bbs.houdunwang.com" target='_blank' class='logo'>
				<img src="__PUBLIC__/Images/logo.png"/>
			</a>
			<div class='search-wrap'>
				<form action="" method='get'>
					<input type="text" name='keyword' class='search-content'/>
					<input type="submit" name='search' value='搜索'/>
				</form>
			</div>
		</div>
	</div>
<!-- 获取的数组改为对维数组 -->
<?php $cate = M('cate')->order('sort')->select(); import('Class.Category', APP_PATH); $cate = Category::unlimitedForLayer($cate); ?>
	<div class='top-nav-wrap'>
		<ul class='nav-lv1'>
			<li class='nav-lv1-li'>
				<a href="" class='top-cate'>博客首页</a>
			</li>
			

			<?php if(is_array($cate)): foreach($cate as $key=>$v): ?><li class='nav-lv1-li'>
					<a href="" class='top-cate'><?php echo ($v["name"]); ?></a>

					<?php if($v["child"]): ?><ul>
							<?php if(is_array($v["child"])): foreach($v["child"] as $key=>$value): ?><li><a href=""><?php echo ($value["name"]); ?></a></li><?php endforeach; endif; ?>
						</ul><?php endif; ?>
				</li><?php endforeach; endif; ?>
		</ul>
	</div>

<!--主体-->
	<div class='main'>
		<div class='main-left'>
			<div class='location'>
				<a href="">首页</a>>
				<a href="">PHP</a>>
				<a href="">对象</a>
			</div>
			<div class="title">
				<p>对象的产生与生命周期</p>
				<div>
					<span class='fl'>发布于：2013年12月12日</span>
					<span class='fr'>已被阅读1024次</span>
				</div>
			</div>
			<div class='content'>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
				这里是正文<br/>
			</div>
		</div>
	<!--主体右侧-->
		<div class='main-right'>
			<dl>
				<dt>热门博文</dt>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>

				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
			</dl>

			<dl>
				<dt>最发布发</dt>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>

				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
				<dd>
					<a href="">对象的产生与生命周期</a>
					<span>(1024)</span>
				</dd>
			</dl>

			<dl>
				<dt>友情连接</dt>
				<dd>
					<a href="">后盾网</a>
				</dd>

				<dd>
					<a href="">后盾网论坛</a>
				</dd>
				<dd>
					<a href="">后盾网学习社区</a>
				</dd>
			</dl>
		</div>
	</div>
<!--底部-->
	<div class='bottom'>
		<div></div>
	</div>
</body>
</html>