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

<?php function get_handle($id)
	{
		$order_info = M("DealOrder")->getById($id);
		if($order_info['order_status']==0)
		{
			$str = l("DEAL_ORDER_HANDLE");
		}
		else
		{
			$str = l("DEAL_ORDER_VIEW");
		}
		$str = "<a href='".u("DealOrder/view_order",array("id"=>$id))."'>".$str."</a>";
		if($order_info['order_status']==1)
		{
			$str.="&nbsp;&nbsp;<a href='javascript:del(".$id.");'>".l("DEL")."</a>";
		}
		return $str;
	}
	function get_extra_status($status)
	{
		return l("EXTRA_STATUS_".$status);
	}
	function get_after_sale($status,$order_status)
	{
		if($order_status==0)
		return l("NO_OVER_ORDER");
		else
		return l("AFTER_SALE_".$status);
	}
	
	function get_order_item($order_sn,$order_id)
	{
		$deal_order_item = M("DealOrderItem")->where("order_id = ".$order_id)->findAll();
		$str = "<span style='font-size:14px; font-family:verdana; font-weight:bold;'>".$order_sn."</span>";
		foreach($deal_order_item as $v)
		{
			$str.="<br />&nbsp;".l('DEAL_ID').":".$v['deal_id']."&nbsp;<span title='".$v['name']."'";
			if(intval($_REQUEST['deal_id'])==$v['deal_id'])
			{
				$str.=" style='color:red;' ";
			}
			$str.=">".msubstr($v['name'],0,5)."</span>&nbsp;".l("NUMBER")." [".$v['number']."]";
		}
		
		return $str;
		
	}
	function get_refund_status($s)
	{
		if($s==0)
		return "无";
		if($s==1)
		return "<span style='color:#f30;'>要求退款</span>";
		if($s==2)
		return "已处理";
	}
	function get_retake_status($s)
	{
		if($s==0)
		return "无";
		if($s==1)
		return "<span style='color:#f30;'>要求退货</span>";
		if($s==2)
		return "已处理";
	} ?>
<script type="text/javascript" src="__TMPL__Common/js/jquery.bgiframe.js"></script>
<script type="text/javascript" src="__TMPL__Common/js/jquery.weebox.js"></script>
<link rel="stylesheet" type="text/css" href="__TMPL__Common/style/weebox.css" />
<script type="text/javascript">
	function batch_delivery()
	{
		express_id = $("select[name='express_id']").val();
		if(express_id==0)
		{
			alert(LANG['SELECT_EXPRESS_WARNING']);
			return;
		}
		idBox = $(".key:checked");
		if(idBox.length == 0)
		{
			alert(LANG['SELECT_EMPTY_WARNING']);
			return;
		}
		idArray = new Array();
		$.each( idBox, function(i, n){
			idArray.push($(n).val());
		});
		ids = idArray.join(",");
		
		$.weeboxs.open(ROOT+'?m=DealOrder&a=load_batch_delivery&ids='+ids+"&express_id="+express_id, {contentType:'ajax',showButton:false,title:LANG['BATCH_DELIVERY'],width:600,height:120});
	}
	
	function batch_print()
	{
		express_id = $("select[name='express_id']").val();
		if(express_id==0)
		{
			alert(LANG['SELECT_EXPRESS_WARNING']);
			return;
		}
		idBox = $(".key:checked");
		if(idBox.length == 0)
		{
			alert(LANG['SELECT_EMPTY_WARNING']);
			return;
		}
		idArray = new Array();
		$.each( idBox, function(i, n){
			idArray.push($(n).val());
		});
		ids = idArray.join(",");
		window.open(ROOT+'?m=Express&a=eprint&order_id='+ids+"&express_id="+express_id);
	}
</script>
<div class="main">
<div class="main_title"><?php echo L("DEAL_ORDER");?></div>
<div class="blank5"></div>
<form name="search" action="__APP__" method="get">	
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("DEL");?>" onclick="del();" />
	<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	<?php if(!$_REQUEST['referer']): ?><input type="button" class="button" value="<?php echo L("EXPORT");?>" onclick="export_csv();" /><?php endif; ?>
	<input type="button" class="button" value="<?php echo L("BATCH_DELIVERY");?>" onclick="batch_delivery();" />
	<input type="button" class="button" value="<?php echo L("BATCH_PRINT");?>" onclick="batch_print();" />
	
	<lable><?php echo L("SELECT_EXPRESS");?>
		<select name="express_id">
			<option value="0"><?php echo L("OTHER_EXPRESS");?></option>
			<?php if(is_array($express_list)): foreach($express_list as $key=>$express): ?><option value="<?php echo ($express["id"]); ?>"><?php echo ($express["name"]); ?></option><?php endforeach; endif; ?>
		</select>
	</lable>
</div>
<div class="blank5"></div>
<div class="search_row">

		<?php echo L("ORDER_SN");?>：<input type="text" class="textbox" name="order_sn" value="<?php echo trim($_REQUEST['order_sn']);?>" style="width:100px;" />
		<?php echo L("DEAL_ID");?>：<input type="text" class="textbox" name="deal_id" value="<?php echo trim($_REQUEST['deal_id']);?>" style="width:30px;" />
		<?php echo L("USER_NAME_S");?>：<input type="text" class="textbox" name="user_name" value="<?php echo trim($_REQUEST['user_name']);?>" style="width:100px;" />

		<?php echo L("PAYMENT_STATUS_S");?>: 
		<select name="pay_status">
				<option value="-1" <?php if(intval($_REQUEST['pay_status']) == -1): ?>selected="selected"<?php endif; ?>><?php echo L("ALL");?></option>
				<option value="0" <?php if(intval($_REQUEST['pay_status']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("PAY_STATUS_0");?></option>
				<option value="1" <?php if(intval($_REQUEST['pay_status']) == 1): ?>selected="selected"<?php endif; ?>><?php echo L("PAY_STATUS_1");?></option>
				<option value="2" <?php if(intval($_REQUEST['pay_status']) == 2): ?>selected="selected"<?php endif; ?>><?php echo L("PAY_STATUS_2");?></option>			
		</select>
		<?php echo L("DELIVERY_STATUS_S");?>: 
		<select name="delivery_status">
				<option value="-1" <?php if(intval($_REQUEST['delivery_status']) == -1): ?>selected="selected"<?php endif; ?>><?php echo L("ALL");?></option>
				<option value="0" <?php if(intval($_REQUEST['delivery_status']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("ORDER_DELIVERY_STATUS_0");?></option>
				<option value="1" <?php if(intval($_REQUEST['delivery_status']) == 1): ?>selected="selected"<?php endif; ?>><?php echo L("ORDER_DELIVERY_STATUS_1");?></option>
				<option value="2" <?php if(intval($_REQUEST['delivery_status']) == 2): ?>selected="selected"<?php endif; ?>><?php echo L("ORDER_DELIVERY_STATUS_2");?></option>
				<option value="5" <?php if(intval($_REQUEST['delivery_status']) == 5): ?>selected="selected"<?php endif; ?>><?php echo L("ORDER_DELIVERY_STATUS_5");?></option>			
		</select>
		<?php echo L("EXTRA_STATUS_S");?>: 
		<select name="extra_status">
				<option value="-1" <?php if(intval($_REQUEST['extra_status']) == -1): ?>selected="selected"<?php endif; ?>><?php echo L("ALL");?></option>
				<option value="0" <?php if(intval($_REQUEST['extra_status']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("EXTRA_STATUS_0");?></option>
				<option value="1" <?php if(intval($_REQUEST['extra_status']) == 1): ?>selected="selected"<?php endif; ?>><?php echo L("EXTRA_STATUS_1");?></option>
				<option value="2" <?php if(intval($_REQUEST['extra_status']) == 2): ?>selected="selected"<?php endif; ?>><?php echo L("EXTRA_STATUS_2");?></option>
		</select>
		<?php echo L("AFTER_SALE_S");?>: 
		<select name="after_sale">
				<option value="-1" <?php if(intval($_REQUEST['after_sale']) == -1): ?>selected="selected"<?php endif; ?>><?php echo L("ALL");?></option>
				<option value="0" <?php if(intval($_REQUEST['after_sale']) == 0): ?>selected="selected"<?php endif; ?>><?php echo L("AFTER_SALE_0");?></option>
				<option value="1" <?php if(intval($_REQUEST['after_sale']) == 1): ?>selected="selected"<?php endif; ?>><?php echo L("AFTER_SALE_1");?></option>
		</select>

		<input type="hidden" value="DealOrder" name="m" />
		<input type="hidden" value="deal_index" name="a" />
		

</div>
</form>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="13" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px"><a href="javascript:sortBy('id','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('order_sn','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("ORDER_SN");?><?php echo ($sortType); ?> "><?php echo L("ORDER_SN");?><?php if(($order)  ==  "order_sn"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("USER_NAME");?><?php echo ($sortType); ?> "><?php echo L("USER_NAME");?><?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('total_price','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("PAY_AMOUNT");?><?php echo ($sortType); ?> "><?php echo L("PAY_AMOUNT");?><?php if(($order)  ==  "total_price"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('pay_amount','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("PAID_AMOUNT");?>    <?php echo ($sortType); ?> "><?php echo L("PAID_AMOUNT");?>    <?php if(($order)  ==  "pay_amount"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('refund_status','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照退款申请    <?php echo ($sortType); ?> ">退款申请    <?php if(($order)  ==  "refund_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("ORDER_CREATE_TIME");?><?php echo ($sortType); ?> "><?php echo L("ORDER_CREATE_TIME");?><?php if(($order)  ==  "create_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('pay_status','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("PAYMENT_STATUS");?><?php echo ($sortType); ?> "><?php echo L("PAYMENT_STATUS");?><?php if(($order)  ==  "pay_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('delivery_status','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("DELIVERY_STATUS");?>    <?php echo ($sortType); ?> "><?php echo L("DELIVERY_STATUS");?>    <?php if(($order)  ==  "delivery_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('extra_status','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("EXTRA_STATUS");?>    <?php echo ($sortType); ?> "><?php echo L("EXTRA_STATUS");?>    <?php if(($order)  ==  "extra_status"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('after_sale','<?php echo ($sort); ?>','DealOrder','deal_index')" title="按照<?php echo L("AFTER_SALE");?><?php echo ($sortType); ?> "><?php echo L("AFTER_SALE");?><?php if(($order)  ==  "after_sale"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$deal_order): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($deal_order["id"]); ?>"></td><td>&nbsp;<?php echo ($deal_order["id"]); ?></td><td>&nbsp;<?php echo (get_order_item($deal_order["order_sn"],$deal_order['id'])); ?></td><td>&nbsp;<?php echo (get_user_name($deal_order["user_id"])); ?></td><td>&nbsp;<?php echo (format_price($deal_order["total_price"])); ?></td><td>&nbsp;<?php echo (format_price($deal_order["pay_amount"])); ?></td><td>&nbsp;<?php echo (get_refund_status($deal_order["refund_status"])); ?></td><td>&nbsp;<?php echo (to_date($deal_order["create_time"])); ?></td><td>&nbsp;<?php echo (get_pay_status($deal_order["pay_status"])); ?></td><td>&nbsp;<?php echo (get_delivery_status($deal_order["delivery_status"],$deal_order['id'])); ?></td><td>&nbsp;<?php echo (get_extra_status($deal_order["extra_status"])); ?></td><td>&nbsp;<?php echo (get_after_sale($deal_order["after_sale"],$deal_order['order_status'])); ?></td><td> <?php echo (get_handle($deal_order["id"])); ?>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="13" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>