<?php
namespace Admin\Controller;
use Think\Controller;
class ListController extends Controller{
	//简介视图
	public function index(){
       $this->intro=M('intro')->select();
	   $this->display();
	}
    //添加简介视图
    public function addList(){
       $this->cate=M('cate')->where(array('pid'=>1))->select();
       $this->display();
    }
    //添加简介表单处理
    Public function runList(){
        $db=M('intro');
        $data['name']=I('cid');
        $data['content']=I('content');
        $data['cid']=I('cid');
        $db->create($data);
        if($db->add()){
            $this->success('简介添加成功',U('List/index'));
        }else{
            $this->error('简介添加失败，请重试');
        }
    }
    //删除简介
    public function delete(){
        $id=I('id');
        if(M('intro')->delete($id)){
            $this->success('简介删除成功',U('List/index'));
        }else{
            $this->error('简介删除失败,请重试');
        }
    }   

} 

?>