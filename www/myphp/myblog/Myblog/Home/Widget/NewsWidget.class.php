<?php
namespace Home\Widget;
use Think\Controller;
class NewsWidget extends Controller{
	public function news(){
	$this->blog=M('blog')->field(array('id','title'))->select();
	//p($blog);die;
	$this->display('header:news');
	}
}
?>