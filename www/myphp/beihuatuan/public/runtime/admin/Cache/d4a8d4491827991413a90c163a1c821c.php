<?php if (!defined('THINK_PATH')) exit();?>

<!DOCTYPE html PUBLIC '-//W3C//DTD XHTML 1.0 Transitional//EN' 'http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd'>
<html>
<head>
<title></title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/style.css" />
<script type="text/javascript">
 	var VAR_MODULE = "<?php echo conf("VAR_MODULE");?>";
	var VAR_ACTION = "<?php echo conf("VAR_ACTION");?>";
	var MODULE_NAME	=	'<?php echo MODULE_NAME; ?>';
	var ACTION_NAME	=	'<?php echo ACTION_NAME; ?>';
	var ROOT = '__APP__';
	var ROOT_PATH = '<?php echo APP_ROOT; ?>';
	var CURRENT_URL = '<?php echo trim($_SERVER['REQUEST_URI']);?>';
	var INPUT_KEY_PLEASE = "<?php echo L("INPUT_KEY_PLEASE");?>";
	var TMPL = '__TMPL__';
	var APP_ROOT = '<?php echo APP_ROOT; ?>';
</script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.timer.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/script.js"></script>
<script type="text/javascript" src="__ROOT__/public/runtime/admin/lang.js"></script>
<script type='text/javascript'  src='__ROOT__/admin/public/kindeditor/kindeditor.js'></script>
</head>
<body>
<div id="info"></div>

<?php function get_is_shop_type($type)
	{
		if($type==0) return "团购";
		if($type==2) return "代金券";
		if($type==1) return "商城";
	}
	function get_deal_edit($id,$deal)
	{
		if($deal['is_shop']==0)
		return "<a href='".u("Deal/edit",array("id"=>$id))."'>发布</a>";
		if($deal['is_shop']==1)
		return "<a href='".u("Deal/shop_edit",array("id"=>$id))."'>发布</a>";
		if($deal['is_shop']==2)
		return "<a href='".u("Deal/youhui_edit",array("id"=>$id))."'>发布</a>";
	}
	function get_p_deal_cate_name($cid)
	{
		$name = M("DealCate")->where("id=".$cid)->getField("name");
		return $name?$name:"无";
	}
	function get_p_shop_cate_name($cid)
	{
		$name = M("ShopCate")->where("id=".$cid)->getField("name");
		return $name?$name:"无";
	} ?>
<div class="main">
<div class="main_title">商家提交</div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("FOREVERDEL");?>" onclick="foreverdel();" />
</div>
<div class="blank5"></div>

<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="12" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px   "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Deal','publish')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name','<?php echo ($sort); ?>','Deal','publish')" title="按照名称   <?php echo ($sortType); ?> ">名称   <?php if(($order)  ==  "name"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('cate_id','<?php echo ($sort); ?>','Deal','publish')" title="按照生活服务分类   <?php echo ($sortType); ?> ">生活服务分类   <?php if(($order)  ==  "cate_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('shop_cate_id','<?php echo ($sort); ?>','Deal','publish')" title="按照商城分类   <?php echo ($sortType); ?> ">商城分类   <?php if(($order)  ==  "shop_cate_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('city_id','<?php echo ($sort); ?>','Deal','publish')" title="按照<?php echo L("DEAL_CITY");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_CITY");?>   <?php if(($order)  ==  "city_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','Deal','publish')" title="按照发布时间   <?php echo ($sortType); ?> ">发布时间   <?php if(($order)  ==  "create_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('supplier_id','<?php echo ($sort); ?>','Deal','publish')" title="按照商家   <?php echo ($sortType); ?> ">商家   <?php if(($order)  ==  "supplier_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_shop','<?php echo ($sort); ?>','Deal','publish')" title="按照类型   <?php echo ($sortType); ?> ">类型   <?php if(($order)  ==  "is_shop"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('account_id','<?php echo ($sort); ?>','Deal','publish')" title="按照发布人   <?php echo ($sortType); ?> ">发布人   <?php if(($order)  ==  "account_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Deal','publish')" title="按照发布<?php echo ($sortType); ?> ">发布<?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal["id"]); ?>"></td><td>&nbsp;<?php echo ($deal["id"]); ?></td><td>&nbsp;<?php echo (msubstr($deal["name"])); ?></td><td>&nbsp;<?php echo (get_p_deal_cate_name($deal["cate_id"])); ?></td><td>&nbsp;<?php echo (get_p_shop_cate_name($deal["shop_cate_id"])); ?></td><td>&nbsp;<?php echo (get_deal_city_name($deal["city_id"])); ?></td><td>&nbsp;<?php echo (to_date($deal["create_time"])); ?></td><td>&nbsp;<?php echo (get_supplier_name($deal["supplier_id"])); ?></td><td>&nbsp;<?php echo (get_is_shop_type($deal["is_shop"])); ?></td><td>&nbsp;<?php echo (get_submit_user($deal["account_id"])); ?></td><td>&nbsp;<?php echo (get_deal_edit($deal["id"],$deal)); ?></td><td><a href="javascript:foreverdel('<?php echo ($deal["id"]); ?>')"><?php echo L("FOREVERDEL");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="12" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>