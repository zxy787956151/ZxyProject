<?php 
	include '/../base.php';

	Class MoveAction extends Action {
		Public function index() {
			$this->move = M('move')->select();
			$this->display();
		}

		Public function addMove() {
			$this->display();
		}

		Public function do_addMove() {
			
		}

		Public function move_update() {
			$_SESSION['lost_uid'] = $_GET['move_uid'];
			$_SESSION['lost_title'] = $_GET['move_title'];
			$_SESSION['lost_content'] = $_GET['move_content'];
			$this->display();
		}


		Public function runMoveUpdate() {
			$move = M('move');

			$data = array(
					'uid' => $_POST['new_uid'],	
					'title' => $_POST['new_title'],			
					'content' => $_POST['new_content'],
				);

			$_POST['lost_uid'] = $_SESSION['lost_uid'];
			$_POST['lost_title'] = $_SESSION['lost_title'];
			$_POST['lost_content'] = $_SESSION['lost_content'];

			if($pd = $move->where(array('content' => I('lost_content')))->save($data)){
				$this->success("修改成功","__GROUP__/Move/index");
			}
		}


		Public function img_update(){
			$_POST['move_uid'] = $_GET['move_uid'];
			$move = M('move');
			$data = $move->where(array('uid' => I('move_uid')))->find();
			
			session_start();
			$_SESSION['img_id'] = $data['id'];

			$this->display();
		}

		Public function runImg_update() {

			move_uploaded_file($_FILES["file"]["tmp_name"],"e:/wamp/www/myphp/MyThink/APP/Modules/Index/Tpl/Style/images". iconv("UTF-8","gb2312",$_FILES["file"]["name"]));

			Zxy::fileRename("e:/wamp/www/myphp/MyThink/APP/Modules/Index/Tpl/Style/images/","jpg","jpg");

			$_POST['img_id'] = $_SESSION['img_id'];

			$data = array(
					'name' => $_FILES["file"]["name"],
				);

			if($pd = $move->where(array('id' => I('img_id')))->save($data)){
				$this->success("修改轮播成功!","__GROUP__/Move/img_update");
			}
		}

		Public function deleteMove() {

		}
	}
 ?>	