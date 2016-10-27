<?php
namespace Home\Model;
use Think\Model\ViewModel;
class IntroViewModel extends ViewModel {
	Protected $viewFields=array(
        'intro'=>array(
         'name','content',
         //左关联
         '_type'=>'LEFT'
        	),
        'cate'=>array(
         'id','_on'=>'intro.cid=cate.id'
        	),
    ); 
}
?>