<?php
$config= require './Public/Config/config.ini.php';
$routes = require APP_PATH.'Conf/routes.php';
$web_config=array(
   // 'SHOW_PAGE_TRACE'=>true,
	'URL_MODEL'=>3,//rewrite模式改为2
	'URL_PATHINFO_DEPR'=>'/',
	'URL_ROUTER_ON'=> true,
	'URL_ROUTE_RULES' => $routes,
	'URL_HTML_SUFFIX'=>'.html',
    'DEFAULT_THEME'=>'default',
    'TMPL_DETECT_THEME' => true, // 自动侦测模板主题
	'TMPL_CACHE_ON'			=> false,        // 是否开启模板编译缓存,设为false则每次都会重新编
	'URL_CASE_INSENSITIVE' =>true,//URL不区分大小写
	'IS_BUILD_HTML'=>0,
	'TMPL_PARSE_STRING'=> array( 
    '__WEB__'=>__ROOT__.'',
	'__ARTICLE__'=>__ROOT__.'/index.php?s=articles/',
	'__TYPE__'=>__ROOT__.'/index.php?s=lists/',
	'__VOTE__'=>__ROOT__.'/index.php?s=votes/',
	'__TPL__'=>__ROOT__.'/Web/Tpl',
),
    //默认成功与失败的模板
	'TMPL_ACTION_ERROR' => 'Public:success',
    'TMPL_ACTION_SUCCESS' => 'Public:success', 
);
return array_merge($config,$web_config);
?>