<?php
namespace Home\Controller;
use Think\Controller;
class PictureController extends Controller{
	public function index(){
	   $this->cate=M('cate')->order('sort')->select();
	   $this->display();
	}
}
?>