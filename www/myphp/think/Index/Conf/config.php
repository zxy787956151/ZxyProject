<?php
//前台项目配置文件
$config = array(
	//'配置项'=>'配置值'
	
	// 'LOAD_EXT_FILE' => 'function',//配置common.php的默认加载文件名由必须的common改为function.php

	//Think里的模板替换
	'TMPL_PARSE_STRING' => array(
			'__PUBLIC__' => __ROOT__.'/'.APP_NAME.'/Tpl/Public',
		),
);

return array_merge(include './Conf/config.php',$config);
?>