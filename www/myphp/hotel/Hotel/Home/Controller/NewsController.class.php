<?php
namespace Home\Controller;
use Think\Controller;
class NewsController extends Controller{
	public function index(){
	    $this->news=M('news')->select();
		$this->display();
	}
	public function news(){
        $id=I('id');
        $this->article=M('news')->where(array('id'=>$id))->select();
        //p($article);die;
        $this->display();
	}
}
?>