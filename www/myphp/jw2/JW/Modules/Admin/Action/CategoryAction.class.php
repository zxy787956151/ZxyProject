<?php
Class CategoryAction extends Action{
	Public function index(){
	   //导航栏分类列表显示
	   import('Class.Category',APP_PATH);
	   $cate=M('cate')->order('sort ASC')->select();
	   $this->cate=Category::unlimitedForLevel($cate,'&nbsp;&nbsp;--');	  
	   $this->display();
	}
	Public function addCate(){
	   //添加分类页面显示
	   $this->pid=I('pid',0,'intval');
	   $this->display();
	}
	Public function runAddCate(){
	   //添加分类操作
       if(M('cate')->add($_POST)){
          $this->success('导航栏子类添加成功');
       }else{
          $this->error('添加失败，请重新插入'); 
       }
	}
	Public function sortCate(){
		//导航栏分类排序
        $db=M('cate');
        foreach($_POST as $id=>$sort){
          $db->where(array('id'=>$id))->setField('sort',$sort); 
        }
          $this->redirect(GROUP_NAME.'/Category/index');
	}
}
?>