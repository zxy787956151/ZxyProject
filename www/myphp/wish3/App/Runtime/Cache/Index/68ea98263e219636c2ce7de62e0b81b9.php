<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
	<title>HouDun许愿墙</title>
	<link rel="stylesheet" href="__PUBLIC__/Css/index.css" />
	<!-- __PUBLIC__/,think会自动解析成网站根目录下面的Public文件夹,会自动映射到这个路径 -->
	<script type="text/javascript" src='__PUBLIC__/Js/jquery-1.7.2.min.js'></script>
	<script type="text/javascript" src='__PUBLIC__/Js/index.js'></script>

	<script type="text/javascript">
		var handleUrl = '<?php echo U("Index/Index/handle");?>';//在js文件里不解析,在模板这就解析了!
		//Index项目里的Index控制器里的handle方法
	</script>
</head>
<body>
	<?php echo ($a); ?>
	<div id='top'>
		<span id='send'></span>
	</div>
	<div id='main'>

		<?php if(is_array($wish)): foreach($wish as $key=>$v): ?><!-- key='k' 默认有,间隔为空格,否则会报错-->
			<!-- 开标签解析成<?php foreach ($wish as $key => $v) :?> -->
			<!-- thinkphp的一个模板引擎 -->
			<!-- 闭标签解析成<?php endforeach;?> -->

			<dl class='paper a<?php echo mt_rand(1,5);?>'>
			<!-- 原为<dl class='paper a1~a5'>,think中用函数就类似U方法
			冒号后跟函数名,此标签会被解析成<?php echo mt_rand(1, 5); ?> -->
				<dt>
					<span class='username'><?php echo ($v["username"]); ?></span>
					<!-- 原作<?php echo ($v['id']); ?>,点语法会自动判断后面是不是对象,
					是的话解析成<?php echo ($v->id); ?>,是数组就解析成<?php echo ($v['id']); ?>,
					 可以设置只解析其中一种,在配置config里,以提高编译速度-->
					<span class='num'>No.<?php echo ($v["id"]); ?></span>
				</dt>
				<dd class='content'><?php echo (replace_phiz($v["content "])); ?></dd>
				<!-- think里用函数就是一个竖线 -->
				<dd class='bottom'>
					<span class='time'><?php echo (date('y-m-d H:i', $v["time "])); ?></span>
					<!-- think模板的函数使用,原作dete('Y-m-d H:i:s',time),
					用'|'在输出时使用函数,函数名='在这里传参', 这里第二个参数'###'
					表示吧$v.time作为第二个参数 -->
					<a href="" class='close'></a>
				</dd>
			</dl><?php endforeach; endif; ?>
	</div>

	<div id='send-form'>
		<p class='title'><span>许下你的愿望</span><a href="" id='close'></a></p>
		<form action="<?php echo U('handle');?>" method="post" name='wish'>
			<p>
				<label for="username">昵称：</label>
				<input type="text" name='username' id='username'/>
			</p>
			<p>
				<label for="content">愿望：(您还可以输入&nbsp;<span id='font-num'>50</span>&nbsp;个字)</label>
				<textarea name="content" id='content'></textarea>
				<div id='phiz'>
					<img src="__PUBLIC__/Images/phiz/zhuakuang.gif" alt="抓狂" />
					<img src="__PUBLIC__/Images/phiz/baobao.gif" alt="抱抱" />
					<img src="__PUBLIC__/Images/phiz/haixiu.gif" alt="害羞" />
					<img src="__PUBLIC__/Images/phiz/ku.gif" alt="酷" />
					<img src="__PUBLIC__/Images/phiz/xixi.gif" alt="嘻嘻" />
					<img src="__PUBLIC__/Images/phiz/taikaixin.gif" alt="太开心" />
					<img src="__PUBLIC__/Images/phiz/touxiao.gif" alt="偷笑" />
					<img src="__PUBLIC__/Images/phiz/qian.gif" alt="钱" />
					<img src="__PUBLIC__/Images/phiz/huaxin.gif" alt="花心" />
					<img src="__PUBLIC__/Images/phiz/jiyan.gif" alt="挤眼" />
				</div>
			</p>
			<!-- <span id='send-btn'></span> -->
			<!-- 说是要异步 -->
			<!-- <input type="submit" /> -->

			<span id='send-btn'></span>
		</form>
	</div>
<!--[if IE 6]>
    <script type="text/javascript" src="./Js/iepng.js"></script>
    <script type="text/javascript">
        DD_belatedPNG.fix('#send,#close,.close','background');
    </script>
<![endif]-->
</body>
</html>