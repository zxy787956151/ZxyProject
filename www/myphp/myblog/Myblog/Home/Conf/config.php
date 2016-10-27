<?php
return array(
	'TMPL_PARSE_STRING'=>array(
    '__PUBLIC__'=>__ROOT__.'/Public/Home'),
    //开启静态缓存
    'HTML_CACHE_ON'=>true,
    'HTML_CACHE_RULES'=>array(
       'Index:show'=>array('{:module}_{:Controller}_{id}',0),
    ),
    // 'DATA_CACHE_TYPE'=>'Memcache',
	// 'MEMCACHE_HOST'=>'127.0.0.1',
	// 'MEMCACHE_PORT'=>11211,
 //    'DATA_CACHE_TIME' => '3600',
    //指定错误页面的模板路径
    'TMPL_EXCEPTION_FILE'=>'./Public/Error/error.html',
);