<?php
namespace Home\Controller;
use Think\Controller;
class IntroController extends Controller{
	//酒店简介视图
	public function index(){
	    $this->cate=M('cate')->where(array('pid'=>1))->select();
	    $id=I('id');
	    $this->intro=M('intro')->where(array('cid'=>$id))->select();
	    $this->display();
	}
}
?>