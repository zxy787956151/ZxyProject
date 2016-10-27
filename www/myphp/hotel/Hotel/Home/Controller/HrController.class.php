<?php
namespace Home\Controller;
use Think\Controller;
class HrController extends Controller{
	public function index(){
		$this->hr=M('hr')->select();
		$this->display();
	}
}
?>