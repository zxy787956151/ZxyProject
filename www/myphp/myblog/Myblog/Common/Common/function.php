<?php
function p($arr){
	echo '<pre>'.print_r($arr,true).'<pre>';
}
//获取验证码
function check_code($code, $id = ""){  
    $verify = new \Think\Verify();  
    return $verify->check($code, $id);  
 } 