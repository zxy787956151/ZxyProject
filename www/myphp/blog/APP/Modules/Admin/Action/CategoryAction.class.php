<?php
header("Content-Type:text/html;charset=utf-8");

	Class CategoryAction extends Action {
		//分类列表视图
		Public function index () {
			// echo 1;

			import('Class.Category',APP_PATH);//视频30	9min8s

			$cate = M('cate')->order('sort ASC')->select();//$cate = M('cate')->order('sort ASC')->select();
			$this->cate = Category::unlimitedForLevel($cate, '&nbsp;&nbsp;--');
			// // p($cate); 
			// // die();
			// // $this->cate = $cate;
			// $this->display();
			/*链式调用$this->assgin('cate', $cate)->display();
			上述使用对象的形式调用,方便简短*/


			// $cate = Category::unlimitedForLayer($cate, 'child');
			// $cate = Category::getParents($cate, 12);\
			// $cate = Category::getChilds($cate, 4);
			// p($cate);
			$this->display();
		}

		//添加分类视图
		Public function addCate() {

			$this->pid = I('pid', 0, 'intval');
			/*1.I函数会自动到GET里面取,即到GET里面取pid
			默认值是0(有pid取pid没pid取0),intval函数将pid转化为整形*/

			/*上述I方法相当于$pid = isset($_GET['pid']) ? 
			$_GET['pid'] : 0;*/

			$this->display();
			// 显示一个模板
		}

		//添加分类表单处理
		Public function runAddCate () {
			// p($_POST);
			if (M('cate')->add($_POST)) {
				$this->success('添加成功', U(GROUP_NAME . '/Category/index'));
			}
			else {
				$this->error('添加失败');
			}
		}

		//排序
		Public function sortCate () {
			// p($_POST);
			$db = M('cate');

			foreach ($_POST as $id => $sort) {
			  	$db->where(array('id' => $id))->setField('sort', $sort);
			  	//讲sort字段的值更新为$sort
			  }  //更新数据库里一个字段,用以实现排序

			  $this->redirect(GROUP_NAME . '/Category/index');
		}




	}
?>

<!-- create table hd_cate (id int unsigned not null primary key auto_increment, name char(15) not null default '', pid int unsigned not null default 0,sort smallint(6) not null default 100);
//排序:sort smallint(6) not null default;
alter table hd_cate add index pid(pid); -->