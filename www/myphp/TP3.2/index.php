<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2014 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------

//※※※※※ 应用入口文件

// 检测PHP环境
if(version_compare(PHP_VERSION,'5.3.0','<'))  die('require PHP > 5.3.0 !');

// 亲^_^ 后面不需要任何代码了 就是如此简单

//更换所加载的配置文件
		// define('APP_STATUS','office');	
		// define('APP_STATUS','homes');

//两句自动生成模块目录(支持多个控制器)	666
		// define('BIND_MODULE','Admin');
		// define('BUILD_CONTROLLER_LIST','Index,User,Menu');
//绑定模板文件
		// define('BIND_MODULE', 'Admin'); // 绑定Home模块到当前入口文件
		// define('BIND_CONTROLLER','Index'); // 绑定Index控制器到当前入口文件


// 开启调试模式 建议开发阶段开启 部署阶段注释或者设为false
// 没开启调试不会显示前端页面!!!!!
define('APP_DEBUG',True);

// 定义应用目录
define('APP_PATH','./App/')	;

// 引入ThinkPHP入口文件
require './ThinkPHP/ThinkPHP.php';




