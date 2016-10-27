<?php
namespace Admin\Controller;
use Think\Controller;
class ListController extends Controller{
	public function index(){
	    $cate=new Message();
	    $list=M('liuyan')->select();
	    $this->liuyan=Message::unlimitedForLevel($list,'&nbsp;&nbsp;----');
	    //p($liuyan);die;
	    $this->display();
	}
	public function delete(){
	    $id=I('id');
        if(M('liuyan')->delete($id)){
        $this->success('留言删除成功',U('List/index'));
        }else{
        $this->error('留言删除失败');
        }
	}
	public function answer(){
	    $db=M('liuyan');
        $data['name']='admin';
        $data['content']=I('content');
        $data['time']=time();
        $data['aid']=I('aid');
        //p($data);die;
        $db->create($data);
        if($db->add()){
        $this->success('留言回复成功',U('List/index'));
        }else{
        $this->error('留言回复失败');
        }
	}
	public function addList(){
	    $this->aid=I('id');
	    $this->display();
	}

}
?>