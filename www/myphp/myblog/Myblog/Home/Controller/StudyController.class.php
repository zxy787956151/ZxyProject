<?php
namespace Home\Controller;
use Think\Controller;
class StudyController extends Controller{
	public function index(){
	  $this->cate=M('cate')->order('sort')->select();
	  if(!$study=S('index_study')){
	  $study=M('blog')->select();
	  }
	  S('index_study',$study,5);
	  $this->study=$study;
	  $this->display();
	}
}
?>