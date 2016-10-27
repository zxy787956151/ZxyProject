<?php
namespace Home\Controller;
use Think\Controller;
class DiaryController extends Controller{
	public function index(){
	  $this->cate=M('cate')->order('sort')->select();
	  $id=I('id');
	  $count=M('public')->where(array('cid'=>$id))->count();
	  $Page = new \Think\Page($count,2);// 实例化分页类 传入总记录数和每页显示的记录数k
	  $Page->setConfig('header','共%TOTAL_ROW%条');
	  $Page->setConfig('first','首页');
	  $Page->setConfig('last','共%TOTAL_PAGE%页');
	  $Page->setConfig('prev','上一页');
	  $Page->setConfig('next','下一页');
	  $Page->setConfig('link','indexpagenumb');//pagenumb 会替换成页码
	  $Page->setConfig('theme','%HEADER% %FIRST% %UP_PAGE% %LINK_PAGE% %DOWN_PAGE% %END%');
	  $limit=$Page->firstRow.','.$Page->listRows;
	  $this->diary=M('public')->where(array('cid'=>$id))->order('time DESC')->limit($limit)->select();
	  $this->page=$Page->show();
	  $this->display();
	}
}
?>