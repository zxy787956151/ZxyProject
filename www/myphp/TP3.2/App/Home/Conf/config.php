<?php
return array(
	'TMPL_PARSE_STRING'=>array(
    '__PUBLIC__'=> __ROOT__ . '/App/Home/View/Public'),
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


    'URL_PARAMS_BIND_TYPE' => 1, // 设置参数绑定按照变量顺序绑定

     'URL_HTML_SUFFIX'=>'shehuixiuyuge', //伪静态的设置为 shehuixiuyuge ，如果我们设置伪静态后缀为空

     //URL不区分大小写,个人不喜欢用zxy
     'URL_CASE_INSENSITIVE' =>true,



     //绑定操作到类(没事关了它!!!),开了它以前的控制器命名法就不好使了
     //开启后命名: Application/Home/Controller/Index/index.class.php
     //                             Conreoller/控制器/方法名(index).class.php           
     // 'ACTION_BIND_CLASS' => true,



     // 开启路由
    // 'URL_ROUTER_ON'   => true, 
    // 'URL_ROUTE_RULES'=>array(
    
    //     'talk/:id\d'=>'Home/Talk/index',
    //     //以上定义路由规则后，下面的URL访问地址都可以被正确的路由匹配： /TP3.2/talk/2214412353124
    
    //     ),


    //控制器分组
    // 'CONTROLLER_LEVEL' => 2,

);