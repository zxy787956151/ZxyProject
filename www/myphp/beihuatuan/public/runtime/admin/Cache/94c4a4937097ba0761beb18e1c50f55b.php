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


<div class="main">
<div class="main_title"><?php echo ($main_title); ?></div>
<div class="blank5"></div>

<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		<input type="button" class="button" value="<?php echo L("FOREVERDEL");?>" onclick="foreverdel();" />
		类型：<select name="rel_table">
			<option value="all" <?php if($_REQUEST['rel_table'] == 'all'): ?>selected="selected"<?php endif; ?>>全部</option>
			<option value="deal_order" <?php if($_REQUEST['rel_table'] == 'deal_order'): ?>selected="selected"<?php endif; ?>>订单留言</option>
			<option value="deal" <?php if($_REQUEST['rel_table'] == 'deal'): ?>selected="selected"<?php endif; ?>>商品团购代金券留言</option>
			<option value="youhui" <?php if($_REQUEST['rel_table'] == 'youhui'): ?>selected="selected"<?php endif; ?>>优惠券留言</option>
			<option value="event" <?php if($_REQUEST['rel_table'] == 'event'): ?>selected="selected"<?php endif; ?>>活动留言</option>
			<option value="tx" <?php if($_REQUEST['rel_table'] == 'tx'): ?>selected="selected"<?php endif; ?>>提现申请</option>
		</select>
	
		<input type="hidden" value="Message" name="m" />
		<input type="hidden" value="index" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="10" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px  "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('rel_table','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_TYPE");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_TYPE");?>  <?php if(($order)  ==  "rel_table"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_CREATE_TIME");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_CREATE_TIME");?>  <?php if(($order)  ==  "create_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('update_time','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_REPLY_TIME");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_REPLY_TIME");?>  <?php if(($order)  ==  "update_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("USER_NAME");?>  <?php echo ($sortType); ?> "><?php echo L("USER_NAME");?>  <?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_buy','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_IS_BUY");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_IS_BUY");?>  <?php if(($order)  ==  "is_buy"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('point','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_POINT");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_POINT");?>  <?php if(($order)  ==  "point"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_effect','<?php echo ($sort); ?>','Message','index')" title="按照<?php echo L("MESSAGE_IS_EFFECT");?>  <?php echo ($sortType); ?> "><?php echo L("MESSAGE_IS_EFFECT");?>  <?php if(($order)  ==  "is_effect"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$message): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($message["id"]); ?>"></td><td>&nbsp;<?php echo ($message["id"]); ?></td><td>&nbsp;<?php echo (get_message_type($message["rel_table"],$message['rel_id'])); ?></td><td>&nbsp;<?php echo (to_date($message["create_time"])); ?></td><td>&nbsp;<?php echo (to_date($message["update_time"])); ?></td><td>&nbsp;<?php echo (get_user_name($message["user_id"])); ?></td><td>&nbsp;<?php echo (get_is_buy($message["is_buy"])); ?></td><td>&nbsp;<?php echo (get_point($message["point"])); ?></td><td>&nbsp;<?php echo (get_message_is_effect($message["is_effect"])); ?></td><td><a href="javascript:edit('<?php echo ($message["id"]); ?>')"><?php echo L("VIEW");?></a>&nbsp;<a href="javascript:foreverdel('<?php echo ($message["id"]); ?>')"><?php echo L("FOREVERDEL");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="10" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>