<?php 
	namespace Home\Controller;
	use Think\Controller;
 	include 'base.php';

	Class ProductController extends Controller{

		Public function index(){
			// var_dump($pd);
			// die();
/*
    参数说明: $GLOBALS[pagNum] => 目前库里最多形成页数
              $GET[pd] => 当前页数0开头
              $_SESSION[NowPage] => 当前页码累计量0开头(可超量)
              $mod => 将上一个变量转换成页码(1到$GLOBALS[pagNum])
*/
			$this->arr = D('category')->getTree(M('category')->select(),0);

			$Dpro = D('Product');

			$GLOBALS['pagNum'] = $Dpro->GetPageNum('Product','8');
            $this->assign('pagGlobals',$GLOBALS['pagNum']);
            //ChangePage
			switch ($_GET['pd']) {
				case '+':
					$_SESSION['NowPage'] += 1;
                    $mod = ($_SESSION['NowPage'])%($GLOBALS['pagNum']);
                    if ($mod == 0){
                        $mod += $GLOBALS['pagNum'];
                    }
					$this->PageNow = $Dpro->group('Product','9',$mod,$GLOBALS['pagNum']);
					break;

				case '-':
                    $_SESSION['NowPage'] -= 1;
                    $mod = ($_SESSION['NowPage'])%($GLOBALS['pagNum']);
                    if ($mod == 0){
                        $mod += $GLOBALS['pagNum'];
                    }
                    $this->PageNow = $Dpro->group('Product','9',$mod,$GLOBALS['pagNum']);
					break;

				case '1':
					$_SESSION['NowPage']+=1;
                    $mod = ($_SESSION['NowPage'])%($GLOBALS['pagNum']);
                    if ($mod == 0){
                        $mod += $GLOBALS['pagNum'];
                    }
					$this->PageNow = $Dpro->group('Product','9',$mod,$GLOBALS['pagNum']);
					break;

				default:
                    $_SESSION['NowPage']=1;
                    $mod = ($_SESSION['NowPage'])%($GLOBALS['pagNum']);
                    if ($mod == 0){
                        $mod += $GLOBALS['pagNum'];
                    }
                    $this->PageNow = $Dpro->group('Product','9',$mod,$GLOBALS['pagNum']);
                    break;
			}

            var_dump($_SESSION['NowPage']);

            $this->display();

		}
	}
 ?>