<?php
namespace Home\Controller;
use Think\Controller;
class MessageController extends Controller{
	public function index(){
	  $this->cate=M('cate')->order('sort')->select();
	  $this->liuyan=M('liuyan')->where(array('aid'=>'id'))->select();
	  //p($liuyan);die;
	  $this->display();
	}
	public function runList(){
	  $db=M('liuyan');
	  $data['name']=I('author');
	  $data['content']=I('content');
      $data['time']=time();
      //p($data);die;
      $db->create($data);
      if($db->add()){
          $this->success('留言成功',U('Message/index'));
      }else{
          $this->error('留言失败');
      }
	}
}
?>