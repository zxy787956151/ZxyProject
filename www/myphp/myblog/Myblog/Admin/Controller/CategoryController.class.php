<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
	//分类列表视图
	public function index(){
	   $this->cate=M('cate')->order('sort ASC')->select();
	   $this->display();
	}
	//添加分类视图
	public function addCate(){
	   $this->display();
	}
	//添加分类表单处理
    public function runaddCate(){
       $db=M('cate');
       $data['name']=I('name');
       $data['sort']=I('sort');
       $data['alias']=I('alias');
       $db->create($data);
       if($db->add()){
          $this->success('分类添加成功',U('Category/index'));
       }else{
          $this->error('分类添加失败');
       }
    }
    //分类排序
    public function sort(){
       $db=M('cate');
       foreach($_POST as $id=>$sort){
          $db->where(array('id'=>$id))->setField('sort',$sort);
       }
       $this->redirect('Category/index');
    }
    //删除分类
    public function delete(){
       $id=I('id');
       $db=M('cate');
       if($db->delete($id)){
         $this->display('分类删除成功',U('Category/index'));
       }else{
         $this->error('删除失败');
       }
    }
} 

?>