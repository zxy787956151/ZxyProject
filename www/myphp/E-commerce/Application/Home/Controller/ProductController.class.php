<?php 
	namespace Home\Controller;
	use Think\Controller;
 	include 'base.php';

	Class ProductController extends Controller{

		Public function index($pd){
			// var_dump($pd);
			// die();
			
			$this->arr = D('category')->getTree(M('category')->select(),0);

			$Dpro = D('Product');

			$GLOBALS['pagNum'] = $Dpro->GetPageNum('Product','8');

			//ChangePage
			switch ($_POST['pd']) {
				case '':
					$_SESSION['NowPage'] = '1';
					$this->PageNow = $Dpro->group('Product','9','1',$GLOBALS['pagNum']);
					break;

				case '0':
					// $this->PageNow = $Dpro->group('Product','9','1',$GLOBALS['pagNum']);
					break;

				case '1':
					$_SESSION['NowPage']+=1;
					$this->PageNow = $Dpro->group('Product','9',$_SESSION['NowPage'],$GLOBALS['pagNum']);
					break;

				default:
					break;
			}

			var_dump($GLOBALS['pagNum']);


			$this->display();

		}
	}
 ?>