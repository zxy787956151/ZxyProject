<?php 

	include('/APP/Modules/Index/base.php');

	Class IndexAction extends Action {
		Public function index() {
			

			//读取菜单(链式)
			// $cate = M('cate')->order('sort')->select();
			// p($cate);die;
			//如果在这里分配只能在index好使,若用_initialize公用模板,有的有有的没有,浪费资源,所以直接在模板上用原生php分配

			$this->display();
			//显示模板
		}
	}
 ?>