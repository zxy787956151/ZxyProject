<?php
namespace Admin\Controller;
use Think\Controller;
class DiaryController extends Controller{
	public function index(){
       $this->diary=M('public')->select();
	   $this->display();
	}  
	public function addDiary(){
	   $this->cate=M('cate')->select();
	   $this->display();
	}
	public function runaddDiary(){
	   $db=M('public');
	   $data['cid']=I('cid');
	   $data['talk']=I('content');
	   $data['time']=time();
       $db->create($data);
       if($db->add()){
         $this->success('发表成功',U('Diary/index'));
       }else{
         $this->error('发表失败');
       }
	}
}
?>