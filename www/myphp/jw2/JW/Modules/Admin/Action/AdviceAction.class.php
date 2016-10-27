<?php
Class AdviceAction Extends Action{
	//后台建议列表页显示
	Public function index(){
		$this->advice=D('AdviceRelation')->getAdvice();
		$this->display();
	}
	//删除到回收站或者还原
	Public function toTrach(){
		$type=(int) $_GET['type'];
		$message=$type?'删除':'还原';
        $update=array(
          'id'=>(int) $_GET['id'],
          'del'=>$type,
        	);
        if(M('advice')->save($update)){
            $this->success($message.'成功',U(GROUP_NAME.'/Advice/index'));
        }else{
        	$this->error($message.'失败');
        }
        
	}
	//后台回收站显示
	Public function trach(){
		$this->advice=D('AdviceRelation')->getAdvice(1);
		$this->display('index');
	}
	//彻底删除
	Public function delete(){
        $id=(int) $_GET['id'];
		if(M('advice')->delete($id)){
			$where=array('aid'=>$id);
			M('advice_attr')->where($where)->delete();
			$this->success('彻底删除成功',U(GROUP_NAME.'/Advice/trach'));
		}else{
			$this->error('没有彻底删除，请重试');
		}
	}
	//清空回收站
	Public function clear(){
		$advice=D('AdviceRelation')->getAdvice(1);
		foreach($advice as $key=>$value){
            $id=$value['id'];
            if(M('advice')->delete($id)){
				$where=array('aid'=>$id);
				M('advice_attr')->where($where)->delete();
				$this->success('回收站已被清空',U(GROUP_NAME.'/Advice/trach'));
				}else{
					$this->error('清空失败，请重试');
			}
	    }		
	}
}
?>