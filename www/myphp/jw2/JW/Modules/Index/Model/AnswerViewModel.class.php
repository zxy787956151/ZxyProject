<?php
Class AnswerViewModel extends ViewModel{
Protected $viewFields=array(
        'answer'=>array(
            'sort','content','time',
            '_type'=>'LEFT'
            ),
        'forum'=>array(
            '_on'=>'forum.id=answer.forum_id'
            ),
        'user'=>array(
            'username','img', 
            '_on'=>'user.id=answer.user_id'
            ),      
        );
}
?>
