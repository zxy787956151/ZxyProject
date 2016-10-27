<?php
return array(
	
	//数据库连接参数
	'DB_HOST' => 'my.php.com',
	'DB_USER' => 'root',
	'DB_PWD' => '',
	'DB_NAME' => 'think',
	'DB_PREFIX' => 'hd_',

	//'配置项'=>'配置值'
	'TMPL_TEMPLATE-SUFFIX' =>'.htm',//如果模板后缀名不是.html,在此配置
	'URL_HTML_SUFFIX' => 'html',//U函数echo尾部带后缀名的配置
	'URL_MODEL' => '1',//切换get传值显示和pa询复方式,=2时回去点index.php

	'DEFAULT_FILTER' => 'htmlspecialchars',

	'TMPL_VAR_IDENTIFY' => 'array',//配置点语法只解析数组,不解析对象
);
?>