<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com

	@function 交易视图模型

    @Filename ArticleViewModel.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 15:22:07 $
*************************************************************/
class TixianViewModel extends ViewModel
{
public $viewFields = array( 
  'tixian'=>array('*','_type'=>'LEFT'), 
  'member'=>array('id'=>'uid','username','realname','tel','money'=>'have_money','address','province','city','area','email','qq','sex', '_on'=>'tixian.uid=member.id'),
 ); 
}
?>