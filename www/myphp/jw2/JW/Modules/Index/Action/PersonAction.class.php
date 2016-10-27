<?php
Class PersonAction extends Action{
	Public function person(){
		$this->user=M('user')->where(array('username'=>$_SESSION['username']))->select();
		$this->display();
	}
	Public function update(){
		$data=array(
            'username'=>I('username'),
            'password'=>I('rpwd'),
            'direction'=>I('direction'),
            'time'=>I('time'),
            'work'=>I('work'),
            'qq'=>I('qq'),
            );
		if(M('user')->where(array('username'=>$_SESSION['username']))->save($data)){
			$this->success('个人信息修改成功',U(GROUP_NAME.'/Person/person'));
		}else{
			$this->error('个人信息修改失败');
		}
	}
}
?>