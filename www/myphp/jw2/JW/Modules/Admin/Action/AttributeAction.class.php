<?php
Class AttributeAction extends Action{
	Public function index(){
		//属性列表
		$this->attr=M('attr')->select();
		$this->display();
	}
	Public function addAttr(){
		//添加属性
		$this->display();
	}
	Public function runAddAttr(){
	   //属性列表表单处理
	   if(M('attr')->add($_POST)){
	     $this->success('属性添加成功',U(GROUP_NAME.'/Attribute/index'));
	   }else{
	     $this->error('属性添加失败');
	   }
	}
}
?>