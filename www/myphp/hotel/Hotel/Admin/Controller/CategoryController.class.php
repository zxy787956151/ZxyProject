<?php
namespace Admin\Controller;
use Think\Controller;
class CategoryController extends Controller{
	//分类列表视图
	public function index(){
		$obj=new Category();
		$c=M('cate')->order('sort ASC')->select();
	    $this->cate=Category::unlimitedForLevel($c,'&nbsp;&nbsp;--');
		$this->display();
	}
	//添加分类视图
	public function addCate(){
		$this->pid=I('pid',0,'intval');
		$this->display();
	}
	//分类表单处理
	public function runAddCate(){
		$cate=M('cate');
		$data['name']=I('name');
		$data['sort']=I('sort');
		$data['pid']=I('pid');
        $cate->create($data);
        if($cate->add()){
        	$this->success('添加分类成功',U('Category/index'));
        }else{
        	$this->error('添加分类失败');
        }
	} 
	//排序
	public function sortCate(){
		$db=M('cate');
		foreach($_POST as $id=>$sort){
			$db->where(array('id'=>$id))->setField('sort',$sort);
		}
		redirect(U('Category/index'));
	}
} 
?>