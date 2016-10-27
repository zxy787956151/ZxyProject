<?php
	Class VerifyAction extends Action {
		Public function index() {
			$this->display();
		}

		Public function updateVerify () {
			// p($_POST);

			//echo CONF_PATH;//./APP/Conf/
			//上行常量直接指向这个路径echo APP_PATH . '/Conf/';

			// dump(F('verify', $_POST, CONF_PATH));//int(25)
			// dump(F('verify', $_POST, ));

			if (F('verify', $_POST, CONF_PATH)) {
				$this->success('修改成功', U(GROUP_NAME . '/Verify/index'));
			}
			else {
				$this->error('修改失败,请修改' . CONF_PATH . 'verify.php权限');
			}
		}
	}

?>