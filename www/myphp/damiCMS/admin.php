<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 后台入口文件

    @Filename admin.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-18 13:48:44 $
*************************************************************/
if(!file_exists(dirname(__FILE__).'/install.lck')) header('Location:./install/index.php');
error_reporting(E_ERROR | E_WARNING | E_PARSE);
define('THINK_PATH', './Core/');
define('APP_NAME', 'Admin');
define('APP_PATH', './Admin/'); 
//define('APP_DEBUG',true);
require(THINK_PATH."/Core.php");
?>