<?php
Class UserViewModel extends ViewModel{
     Protected $viewFields=array(
        'user'=>array(
            'username','img',
            '_type'=>'LEFT'
            ), 
        'forum'=>array(
            'id','content','time',
            '_on'=>'user.id=forum.user_id'
            ), 
     	);
     /*Public function getAll($limit){
     	return $this->where($where)->limit($limit)->select();
     }*/
} 

?>