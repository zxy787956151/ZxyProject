<?php
// +----------------------------------------------------------------------
// | ThinkPHP
// +----------------------------------------------------------------------
// | Copyright (c) 2008 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: liu21st <liu21st@gmail.com>
// +----------------------------------------------------------------------
// $Id$

class EmptyAction extends BaseAction {
    public function _empty($method) {
		header("HTTP/1.0 404 Not Found");//使HTTP返回404状态码 
		$this->display('./404/index.html');
    }
}
?>