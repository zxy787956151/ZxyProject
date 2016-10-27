<?php
return array(	
	'DB_HOST'=>'127.0.0.1',
	'DB_USER'=>'root',
	'DB_PWD'=>'',
	'DB_NAME'=>'jwroom',
	'DB_PREFIX'=>'jw_',
	
	'APP_GROUP_LIST'=>'Index,Admin',
	'DEFAULT_GROUP'=>'Index',
	'APP_GROUP_MODE'=>1,
	'APP_GROUP_PATH'=>'Modules',
	//新建的配置的文件不能自动加载，因此通过配置以下项来加载verify.php配置文件
	// 'LOAD_EXT_CONFIG'=>'verify',
	//调试模式
	//'SHOW_PAGE_TRACE'=>true,
	//去掉index.php
	'URL_MODEL'=>2,
	'URL_ROUTER_ON'=>true,
	'URL_ROUTE_RULES'=>array(
		//正则路由c_数字
        '/^c_(\d+)$/'=>'Index/Forum/forum?id=:1',
        ':id\d'=>'Index/Forum/index'
		)
	);
?>