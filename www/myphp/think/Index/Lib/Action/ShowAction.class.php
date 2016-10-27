<?php
header("Content-Type:text/html;charset=utf-8");
	class ShowAction extends Action{ 
		// 继承Action控制器
		public function abc(){
			echo 'This is Show abc action';
		}

		public function delete(){
    	echo "这里是Show控制器里的删除方法";
    }

    public function add(){
    	echo "这里是Show控制器里的添加方法";
    }
	}
?>