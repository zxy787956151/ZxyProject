<?php 
	namespace Home\Controller;
	use Think\Controller;
	include 'base.php';

	Class IndexController extends Controller{

		Public function index(){
			
			

			// if (isset($_GET['user'])) {
			// 	$this->assign("user",$_GET['user']);
			// }else{
			// 	$this->assign("user","Login");
			// }
			//用会话,不用上面这破玩意


			$this->arr = D('category')->getTree(M('category')->select(),0);
			$this->latest = M('product')->where('latest=1')->select();

			// var_dump($arr[0][child])	;
			// p($arr);
			// var_dump($arr[0][0]);
			// die();
			// $Olevel = $cate->where('pid=0')->select();
			// foreach ($Olevel as $v) {
			// 	$where['pid'] = $v['id'];
			// 	$this->Tlevel = $cate->where($where)->select();
			// }
			// $this->Olevel = $cate->where('pid=0')->select();

			// $this->Tlevel = $cairo_scaled_font_text_extents(scaledfont, text)->where('pid>0')->select();

			$this->display();
		}

		
	}
 ?>