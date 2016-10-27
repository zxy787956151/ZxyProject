<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
	//首页视图
    public function index(){
    $this->news=M('news')->limit(5)->select();
    $this->display();    
    }
}