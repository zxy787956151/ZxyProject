<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com

	@function 交易视图模型

    @Filename ArticleViewModel.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-17 15:22:07 $
*************************************************************/
class TradeViewModel extends ViewModel
{
	public $viewFields = array( 
  'member_trade'=>array('*','_type'=>'LEFT'), 
  'article'=>array('title','typeid','content','price'=>'self_price','product_xinghao','color', '_on'=>'member_trade.gid=article.aid','_type'=>'LEFT'), 
  'type'=>array('typename', '_on'=>'article.typeid=type.typeid'),
 ); 

}
?>