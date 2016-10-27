<?php
Class SystemAction extends Action{
    //建议列表首页
    Public function index(){
        $this->advice=M('advice')->select();
        $this->display();
    } 
	  //学长发表建议首页
    Public function advice(){
        //建议属性
        $this->attr=M('attr')->select();
        $this->display();
    }
    //发表建议表单处理
    Public function addAdvice(){
        $data=array(
           'title'=>$_POST['title'],
           'direction'=>$_POST['direction'],
           'xzname'=>$_POST['xzname'],
           'content'=>$_POST['content'],
           'time'=>time(),
           'click'=>(int) $_POST['click'],
           'cid'=>(int) $_POST['cid']
			  );
        if($aid=M('advice')->add($data)){
          if(isset($_POST['bid'])){
            $sql='INSERT INTO `'.C('DB_PREFIX').'advice_attr`(aid,bid) VALUES';
               foreach ($_POST['bid'] as $v) {
                  $sql.='('.$aid.','.$v.'),';
               }
               $sql=rtrim($sql,',');
               M('advice_attr')->query($sql);
          }
        $this->success('建议发表成功',U(GROUP_NAME.'/System/index'));
        }else{
        $this->error('建议发表失败');
        }      
     }

}
?>