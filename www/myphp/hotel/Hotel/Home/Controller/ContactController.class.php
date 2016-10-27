<?php
namespace Home\Controller;
use Think\Controller;
class ContactController extends Controller{
	public function index(){
		$this->display();
	}
	//留言
	public function contact(){
		$this->display();
	}
	//留言表单处理
	public function runContact(){
		$db=M('board');
		$data['username']=session('username');
	    $data['content']=I('content');
	    $data['time']=time();
	    $db->create($data);
	    if($db->add()){
	    $this->success('留言成功',U('Contact/board'));
	    }else{
	    $this->error('留言失败');
	    }
	}
	//留言板
	public function board(){
	    $this->board=M('board')->select();
	    $this->display();
	}
}
?>