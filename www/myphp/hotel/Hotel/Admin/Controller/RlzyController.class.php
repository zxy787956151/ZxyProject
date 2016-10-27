<?php
namespace Admin\Controller;
use Think\Controller;
class RlzyController extends Controller{
	//人才招聘视图
	Public function index(){
		$this->hr=M('hr')->select();
		$this->display();
	}
	//添加招聘视图
	public function addRen(){
		$this->display();
	}
	//添加招聘表单处理
	public function runaddRen(){
		$db=M('hr');
        $data['workname']=I('workname');
        $data['edu']=I('edu');
        $data['agelimit']=I('agelimit');
        $data['site']=I('site');
        $data['num']=I('num');
        $db->create($data);
        if($db->add()){
            $this->success('招聘信息添加成功',U('Rlzy/index'));
        }else{
            $this->error('招聘信息添加失败，请重试');
        }
    }
    //删除招聘信息
    public function delete(){
    	$id=I('id');
        if(M('hr')->delete($id)){
        	$this->success('招聘信息删除成功',U('Rlzy/index'));
        }else{
        	$this->error('招聘信息删除失败,请重试');
        }
    }
}
?>