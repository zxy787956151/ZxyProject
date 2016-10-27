<?php
namespace Admin\Controller;
use Think\Controller;
class IndexController extends Controller{
	//后台首页视图
	public function index(){
	   $this->display();
	}
	public function logout(){
       session_unset();
       session_destroy();
       redirect(U('Admin/Login/index'));
	}
} 

?>