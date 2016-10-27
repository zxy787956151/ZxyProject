<?php
Class ForumAction extends Action{
	//帖子列表视图
	Public function forum(){ 
		$this->forum=M('forum')->select();
		$this->count=M('forum')->count();
		$this->display();
	}
	//发帖表单处理
	Public function runaddforum(){	
		$pubuser=M('user')->where(array('username'=>$_SESSION['username']))->select();
		$data=array(
			'louzhu'=>$_SESSION['username'],
			'title'=>I('title'),
            'content'=>I('content'),
            'time'=>time(),
            'user_id'=>$pubuser[0]['id']
			);
		if(M('forum')->add($data)){
			$this->success('发帖成功',U(GROUP_NAME.'/Forum/index'));
		}else{
			$this->error('发帖失败');
		}
	}
	//具体帖子及回复视图
	Public function index(){
		$id=(int)$_GET['id'];
		$where=array('id'=>$id);
		$this->user=D('UserView')->where($where)->select();
	    //p($user);die;
	    $tiaojian=array('forum_id'=>$id);
	    $this->answer=D('AnswerView')->where($tiaojian)->select();
	    //p($answer);die;
        $this->flag=I('flag',2,'intval');
        $this->fid=I('fid');
        $this->display();
	}
	//回复表单处理
	Public function runanswer(){
	    $replayuser=M('user')->where(array('username'=>$_SESSION['username']))->select();	
		$data=array(
            'answername'=>$_SESSION['username'],
            'content'=>I('answer'),
            'time'=>time(),
            'flag'=>I('flag'),
            'user_id'=>$replayuser[0]['id'],
            'forum_id'=>I('fid')
			);
		if(M('answer')->add($data)){
			$this->success('回复成功',U(GROUP_NAME.'/Forum/index'));
		}else{
			$this->error('回复失败');
		}
	}
	//回帖排序
	Public function sort(){
		$where=array('flag'=>1);
		$answer=M('answer')->where($where)->order('time')->select();
		$data=array('sort');
		M('answer')->save($data);
		p($answer);die;
	}
}

?>