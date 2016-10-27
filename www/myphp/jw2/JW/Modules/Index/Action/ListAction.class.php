<?php
Class  ListAction extends Action{
	Public function index(){
		$d=$_GET['direction'];
		$where=array('direction'=>$d);
	    $this->advice=M('advice')->where($where)->select();
		$this->display();
	}
}

?>