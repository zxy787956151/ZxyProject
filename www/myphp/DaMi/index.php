<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 前台 入口文件

    @Filename index.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-18 13:48:13 $
*************************************************************/
require_once('php_safe.php');
if(!file_exists(dirname(__FILE__).'/install.lck')) header('Location:./install/index.php');
define('THINK_PATH','./Core/');
define('APP_NAME','Web');
define('APP_PATH','./Web/');
define('APP_DEBUG',true);
require(THINK_PATH."/Core.php");