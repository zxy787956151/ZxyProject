<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class CheckoutController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0);
			$this->display();
		}
	}
 ?>