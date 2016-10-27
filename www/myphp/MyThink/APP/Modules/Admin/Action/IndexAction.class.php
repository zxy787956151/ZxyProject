<?php 
	Class IndexAction extends CommonAction{
		Public function index() {
			$this->display();

		}

		Public function update() {
			$this->display();
			// var_dump(md5('333'));
		}

		Public function do_update() {
			$db = M('user');
			
			$user = $db->where(array('username' => $_SESSION['username']))->find();

			if(md5($_POST['pwd1'])!=$user['password']) {
				$this->error("原始密码错误!");
			}

			else if($_POST['pwd2']!=$_POST['pwd3']) {
				$this->error("两次输入密码不一致!");
			}

			else{

				$data = array('password'=>md5($_POST['pwd3']));
				$db->data($data)->where(array('username' => $_SESSION['username']))->save();

				$this->success("密码修改成功",__GROUP__);
			}
		}

		Public function out() {
			redirect(__GROUP__."/".Login);
		}
	}
?>