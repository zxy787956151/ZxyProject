<?php
	/**
	 * 后台首页控制器
	 */

	Class IndexAction extends Action {

		Public function index(){
			$this->display();
		}

		Public function logout() {
			// session_unset();
			// session_destroy();
			// $this->redirect('Admin/Login/index');
		}
	}
?>