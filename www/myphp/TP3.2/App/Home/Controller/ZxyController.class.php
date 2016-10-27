<?php 
	namespace Home\Controller;
	use Think\Controller;
header("Content-Type:text/html;charset=utf-8");
	Class ZxyController extends Controller{

		Public function index(){
			echo "ÕâÀïÊÇZxy/index";
		}

		Public function _before_fun(){
			echo "ÕâÀïÊÇfunµÄÇ°ÖÃ·½·¨!<br/>";
		}

		Public function fun(){
			echo "ÕâÀïÊÇZxy/fun<br/>";
		}

		Public function _after_fun(){
			echo "ÕâÀïÊÇfunµÄºóÖÃ·½·¨!";
		}

		
		//·ÂGET??
		Public function read($id){
			//id参数是必须传入参数的
			echo 'id='.$id;
 		}

 		//66666
		Public function archive($year='2013',$month='01'){
			echo 'year='.$year.'&month='.$month;
		}


	}
 ?>