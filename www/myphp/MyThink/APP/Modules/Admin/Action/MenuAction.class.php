<?php 
	include '/../base.php';
	
	Class MenuAction extends Action {

		Public function index() {

			$this->menu = M('menu')->select();
			//光查出来不行,你得分配过去(分配到前台)
			$this->display();
		}

		Public function menu_update() {		
			$_SESSION['lost_menu'] = $_GET['menu_content'];
 			$this->display();
		}

		Public function runMenuUpdate() {
			// var_dump($_POST);

			$menu = M('menu');
			$data = array(
					'content' => $_POST['new_menu'],
				);

			$_POST['lost_menu'] = $_SESSION['lost_menu'];

			if($pd = $menu->where(array('content' => I('lost_menu')))->save($data)){
				$this->success("修改成功","__GROUP__/Menu/index");
			}
		}

		Public function deleteMenu() {	//像删除这样的能不写视图的就先不写了,省代码
			$menu = M('menu'); //这玩应都得现写 M

			// var_dump(I('menu_content'));

			if($pd = $menu->where(array('content' => I('menu_content')))->delete()){
				$this->success("删除成功!","");
			}
		}

		Public function addMenu() {
			$this->display();
		}

		Public function do_addMenu() {
			$menu = M('menu');
			$data = array(
					'content' => $_POST['menu_name'],
					'uid' => $_POST['menu_uid'],
				);
			if($pd = $menu->data($data)->add()) {
				$this->success("添加菜单项成功!","__GROUP__/Menu/index");
			}
		}

		Public function logo() {
			$this->display();
		}

		

		Public function upfile() {
			
				Zxy::deleteFile('e:/wamp/www/myphp/MyThink/APP/Modules/Admin/Action/Upfile');
				
				mkdir('e:/wamp/www/myphp/MyThink/APP/Modules/Admin/Action/Upfile',0777);
		    	move_uploaded_file($_FILES["file"]["tmp_name"],"e:/wamp/www/myphp/MyThink/APP/Modules/Admin/Action/Upfile/". iconv("UTF-8","gb2312",$_FILES["file"]["name"]));

				Zxy::fileRename("e:/wamp/www/myphp/MyThink/APP/Modules/Admin/Action/Upfile","png","png");

			    $this->success("Logo修改成功!",__GROUP__."/Menu/logo");
		

		}

		

	}
 ?>