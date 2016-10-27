<?php
//后台项目配置文件
$config = array(
	//'配置项'=>'配置值'
	'USERNAME' => 'admin'
	
);
return array_merge(include './Conf/config.php',$config);
?>