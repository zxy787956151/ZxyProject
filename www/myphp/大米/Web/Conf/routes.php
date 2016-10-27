<?php
	return array(
	'articles/:aid' => 'Article/index',
	'lists/:typeid' => 'List/index',
	'photos' => 'List/photo',
	'votes/:id' => 'Vote/index',
	's'=> 'Index/search',
	//演示url的SEO 后台栏目管理URL外部连接设置为/about.html不启用即可
	'about' => 'List/index?typeid=15',
	'news' => 'List/index?typeid=18',
	'product' => 'List/index?typeid=22',
	'project' => 'List/index?typeid=27',
	'zhaopin' => 'List/index?typeid=25',
	);
?>