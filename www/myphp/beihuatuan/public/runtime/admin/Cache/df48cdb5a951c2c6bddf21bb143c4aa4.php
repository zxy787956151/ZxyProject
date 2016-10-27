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

<script type="text/javascript" src="__TMPL__Common/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.weebox.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/weebox.css" />
<script type="text/javascript">
	function preview(id)
	{
		window.open("__ROOT__/shop.php?ctl=goods&id="+id+"&preview=1");
	}
</script>
<?php function get_shop_cate_name($cate_id)
	{
		return M("ShopCate")->where("id=".$cate_id)->getField("name");
		
	}
	function get_buy_type_title($buy_type)
	{
		return l("SHOP_BUY_TYPE_".$buy_type);
	}
	function a_get_time_status($time_status,$deal_id)
	{
		$str = l("TIME_STATUS_".$time_status);
		return $str;
	}
	function a_get_deal_type($type,$id)
	{
		$deal = M("Deal")->getById($id);
		if($deal['is_coupon'])
		{
		$link = "&nbsp;&nbsp;[ <a href='".__APP__."?m=DealCoupon&a=index&deal_id=".$id."' style='color:red;'>".l("DEAL_COUPON")."</a> ]";
		return l("COUNT_TYPE_".$deal['deal_type']).$link;
		}
		else
		return l("NO_DEAL_COUPON_GEN");
		
	} ?>
<div class="main">
<div class="main_title"><?php echo L("DEAL_SHOP");?></div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("ADD");?>" onclick="add_goods();" />
	<input type="button" class="button" value="<?php echo L("DEL");?>" onclick="del();" />
</div>
<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		<?php echo L("GOODS_NAME");?>：<input type="text" class="textbox" name="name" value="<?php echo trim($_REQUEST['name']);?>" />
		<?php echo L("DEAL_CITY");?>：
		<select name="city_id">
			<option value="0" <?php if(intval($_REQUEST['city_id']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("NO_SELECT_CITY");?></option>
			<?php if(is_array($city_list)): foreach($city_list as $key=>$city_item): ?><option value="<?php echo ($city_item["id"]); ?>" <?php if(intval($_REQUEST['city_id']) == $city_item['id']): ?>selected="selected"<?php endif; ?>><?php echo ($city_item["title_show"]); ?></option><?php endforeach; endif; ?>
		</select>
		<?php echo L("CATE_TREE");?>：
		<select name="cate_id">
			<option value="0" <?php if(intval($_REQUEST['cate_id']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("NO_SELECT_CATE");?></option>
			<?php if(is_array($cate_tree)): foreach($cate_tree as $key=>$cate_item): ?><option value="<?php echo ($cate_item["id"]); ?>" <?php if(intval($_REQUEST['cate_id']) == $cate_item['id']): ?>selected="selected"<?php endif; ?>><?php echo ($cate_item["title_show"]); ?></option><?php endforeach; endif; ?>
		</select>
		<?php echo L("BRAND_LIST");?>：
		<select name="brand_id">
			<option value="0" <?php if(intval($_REQUEST['brand_id']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("NO_SELECT_BRAND");?></option>
			<?php if(is_array($brand_list)): foreach($brand_list as $key=>$brand_item): ?><option value="<?php echo ($brand_item["id"]); ?>" <?php if(intval($_REQUEST['brand_id']) == $brand_item['id']): ?>selected="selected"<?php endif; ?>><?php echo ($brand_item["name"]); ?></option><?php endforeach; endif; ?>
		</select>
		
		<input type="hidden" value="Deal" name="m" />
		<input type="hidden" value="shop" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="12" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px   "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('name','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("GOODS_NAME");?><?php echo ($sortType); ?> "><?php echo L("GOODS_NAME");?><?php if(($order)  ==  "name"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('shop_cate_id','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("SHOP_CATE_TITLE");?>   <?php echo ($sortType); ?> "><?php echo L("SHOP_CATE_TITLE");?>   <?php if(($order)  ==  "shop_cate_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('city_id','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("SHOP_CITY");?>   <?php echo ($sortType); ?> "><?php echo L("SHOP_CITY");?>   <?php if(($order)  ==  "city_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('time_status','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("DEAL_TIME_STATUS");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_TIME_STATUS");?>   <?php if(($order)  ==  "time_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('buy_type','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("DEAL_BUY_TYPE");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_BUY_TYPE");?>   <?php if(($order)  ==  "buy_type"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('brand_promote','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("BRAND_PROMOTE");?>   <?php echo ($sortType); ?> "><?php echo L("BRAND_PROMOTE");?>   <?php if(($order)  ==  "brand_promote"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('deal_type','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("DEAL_COUNT_TYPE");?>   <?php echo ($sortType); ?> "><?php echo L("DEAL_COUNT_TYPE");?>   <?php if(($order)  ==  "deal_type"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_effect','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("IS_EFFECT");?>   <?php echo ($sortType); ?> "><?php echo L("IS_EFFECT");?>   <?php if(($order)  ==  "is_effect"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('sort','<?php echo ($sort); ?>','Deal','shop')" title="按照<?php echo L("SORT");?><?php echo ($sortType); ?> "><?php echo L("SORT");?><?php if(($order)  ==  "sort"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal["id"]); ?>"></td><td>&nbsp;<?php echo ($deal["id"]); ?></td><td>&nbsp;<a href="javascript:edit_goods   ('<?php echo (addslashes($deal["id"])); ?>')"><?php echo (msubstr($deal["name"])); ?></a></td><td>&nbsp;<?php echo (get_shop_cate_name($deal["shop_cate_id"])); ?></td><td>&nbsp;<?php echo (get_deal_city_name($deal["city_id"])); ?></td><td>&nbsp;<?php echo (a_get_time_status($deal["time_status"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_buy_type_title($deal["buy_type"])); ?></td><td>&nbsp;<?php echo (get_status($deal["brand_promote"])); ?></td><td>&nbsp;<?php echo (a_get_deal_type($deal["deal_type"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_is_effect($deal["is_effect"],$deal['id'])); ?></td><td>&nbsp;<?php echo (get_sort($deal["sort"],$deal['id'])); ?></td><td><a href="javascript:edit_goods('<?php echo ($deal["id"]); ?>')"><?php echo L("EDIT");?></a>&nbsp;<a href="javascript: del('<?php echo ($deal["id"]); ?>')"><?php echo L("DEL");?></a>&nbsp;<a href="javascript: preview('<?php echo ($deal["id"]); ?>')"><?php echo L("PREVIEW");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="12" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>