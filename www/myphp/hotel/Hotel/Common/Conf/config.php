<?php
return array(
	'DB_TYPE'   => 'mysql', 
	'DB_HOST'   => '127.0.0.1',
	'DB_NAME'   => 'hotel',
	'DB_USER'   => 'root', 
	'DB_PWD'    => '',
	'DB_PREFIX' => 'ht_',  
	'DB_CHARSET'=> 'utf8', 
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
	'MODULE_ALLOW_LIST' => array('Home','Admin'), // 配置分组列表
    'DEFAULT_MODULE' => 'Home', // 配置默认分组
    //去掉URL里面的index.php
	'URL_MODEL'=>2,
	//开启显示调试模式
	//'SHOW_PAGE_TRACE'=>true,
	//开启路由
	'URL_ROUTER_ON'=>true,
    'URL_ROUTE_RULES'=>array(
    '/^a_(\d+)$/'=>'Home/Intro/index?id=:1',
    //'c/:id'=>'Home/Index/index'
       ),
	);
?>