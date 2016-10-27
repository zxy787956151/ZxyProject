<?php 
	Class MainAction extends CommonAction{
		
		Public function index() {

			$user = M('user');
			$where['username'] = $_GET['username'];
			$this->qx = $user->where($where)->select();
			$this->display();
		}

		

	}
 ?>
