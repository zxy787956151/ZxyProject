<?php	
	Class CommonAction extends Action {
		Public function _initialize () {
			// echo 2;
			if (!isset($_SESSION['uid'])) {
				$this->redirect(GROUP_NAME . '/Index/index');
			}
			//此处redirect为类方法,传参同U方法,也为跳转的意思
		}
	}

?>