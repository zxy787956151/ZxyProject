<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com

	@function article 视图模型

    @Filename ArticleViewModel.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 15:22:07 $
*************************************************************/
class ArticleViewModel extends ViewModel
{
	public $viewFields = array( 

  'article'=>array('aid','typeid','title','addtime','istop','hits','status','isimg','isflash','ishot','_type'=>'LEFT'), 

  'type'=>array('typename', '_on'=>'article.typeid=type.typeid'), 

 ); 

}
?>