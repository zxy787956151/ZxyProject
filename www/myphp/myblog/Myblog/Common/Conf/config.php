<?php
return array(
	'DB_TYPE'   => 'mysql', 
	'DB_HOST'   => '127.0.0.1',
	'DB_NAME'   => 'myblog',
	'DB_USER'   => 'root', 
	'DB_PWD'    => '',
	'DB_PREFIX' => 'mb_',  
	'DB_CHARSET'=> 'utf8', 
	'DB_DEBUG'  =>  TRUE, // 数据库调试模式 开启后可以记录SQL日志
	'MODULE_ALLOW_LIST' => array('Home','Admin'), // 配置分组列表
    'DEFAULT_MODULE' => 'Home', // 配置默认分组
    //去掉URL里面的index.php
	'URL_MODEL'=>2,
	//开启显示调试模式
	'SHOW_PAGE_TRACE'=>true,
	//开启路由
	'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES'=>array(
        'about/:id\d'=>'Home/About/index',
        'talk/:id\d' =>'Home/Talk/index',
        'diary/:id\d' =>'Home/Diary/index',
        'picture/:id\d' =>'Home/Picture/index',
        'study/:id\d' =>'Home/Study/index',
        'message/:id\d' =>'Home/Message/index',
        ':id\d'=>'Home/Index/show'
		)
);
?>
<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK IT ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2012 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 麦当苗儿 <zuojiazi.cn@gmail.com> <http://www.zjzit.cn>
// +----------------------------------------------------------------------
// config.php 2013-02-25

//定义回调URL通用的URL 线上请改成自己的
define('URL_CALLBACK', 'http://127.0.0.1/Home/Index/callback/type/');

return array(
	//腾讯QQ登录配置
	'THINK_SDK_QQ' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'qq',
	),
	//腾讯微博配置
	'THINK_SDK_TENCENT' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'tencent',
	),
	//新浪微博配置
	'THINK_SDK_SINA' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'sina',
	),
	//网易微博配置
	'THINK_SDK_T163' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 't163',
	),
	//人人网配置
	'THINK_SDK_RENREN' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'renren',
	),
	//360配置
	'THINK_SDK_X360' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'x360',
	),
	//豆瓣配置
	'THINK_SDK_DOUBAN' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'douban',
	),
	//Github配置
	'THINK_SDK_GITHUB' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'github',
	),
	//Google配置
	'THINK_SDK_GOOGLE' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'google',
	),
	//MSN配置
	'THINK_SDK_MSN' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'msn',
	),
	//点点配置
	'THINK_SDK_DIANDIAN' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'diandian',
	),
	//淘宝网配置
	'THINK_SDK_TAOBAO' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'taobao',
	),
	//百度配置
	'THINK_SDK_BAIDU' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'baidu',
	),
	//开心网配置
	'THINK_SDK_KAIXIN' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'kaixin',
	),
	//搜狐微博配置
	'THINK_SDK_SOHU' => array(
		'APP_KEY'    => '', //应用注册成功后分配的 APP ID
		'APP_SECRET' => '', //应用注册成功后分配的KEY
		'CALLBACK'   => URL_CALLBACK . 'sohu',
	),
);