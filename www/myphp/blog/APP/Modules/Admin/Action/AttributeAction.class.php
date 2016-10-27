<?php
	header("Content-Type:text/html;charset=utf-8");
	/**
	 * 处理属性的
	 */
	Class AttributeAction extends CommonAction {

		//属性列表
		Public function index(){
			$this->attr = M('attr')->select();
			//把attr里所有记录读取出来
			$this->display(); 
		}

		//添加属性表单处理
		Public function runAddAttr () {
			// p($_POST);
			if (M('attr')->add($_POST)) {
				// 因为表单的名称和数据库里表的名称一样
				// 所以会自动用字段插入进数据库,如果字段数据库没有,将自动过滤掉
				$this->success('添加成功', U(GROUP_NAME .'/Attribute/index'));
			}else{
				$this->error('添加失败');
			}
		}
	}
?>
<!-- create table hd_attr(id int unsigned not null primary key auto_increment, name char(10) not null default '', color char(10) not null default ''); -->