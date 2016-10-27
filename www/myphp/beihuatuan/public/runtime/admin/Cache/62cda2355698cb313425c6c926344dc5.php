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

<?php function get_message($id)
	{
		if($id)
		return "<a href='".u("Message/index",array("id"=>$id))."'>".l("VIEW")."</a>";
		else
		return l("NO_REL_DATA");
		
	}
	
	function get_list_content($content)
	{
		return  msubstr(empty_tag($content),0,10);
	}
	
	function get_topic_type($type)
	{
		return l("TOPIC_TYPE_".$type);
	}
	function get_group_name($id)
	{
		return M("TopicGroup")->where("id=".$id)->getField("name");
	} ?>
<script type="text/javascript">

function view_reply(id)
{
	location.href = ROOT+"?"+VAR_MODULE+"=TopicReply&"+VAR_ACTION+"=index&topic_id="+id;
}
</script>
<div class="main">
<div class="main_title"><?php echo ($main_title); ?></div>
<div class="blank5"></div>
<div class="button_row">
	<input type="button" class="button" value="<?php echo L("DELETE");?>" onclick="del();" />
</div>
<div class="blank5"></div>
<div class="search_row">
	<form name="search" action="__APP__" method="get">	
		用户名：<input type="text" class="textbox" name="user_name" value="<?php echo trim($_REQUEST['user_name']);?>" />		
		关键词：<input type="text" class="textbox" name="keyword" value="<?php echo trim($_REQUEST['keyword']);?>" />	
		小组ID：<input type="text" class="textbox" name="group_id" size=4 value="<?php echo trim($_REQUEST['group_id']);?>" />	
		类型：<select name="type">
			<option value="all" <?php if($_REQUEST['type'] == 'all'): ?>selected="selected"<?php endif; ?>>全部</option>
			<option value="share" <?php if($_REQUEST['type'] == 'share'): ?>selected="selected"<?php endif; ?>>普通分享</option>
			<option value="tuancomment" <?php if($_REQUEST['type'] == 'tuancomment'): ?>selected="selected"<?php endif; ?>>团购点评</option>
			<option value="shopcomment" <?php if($_REQUEST['type'] == 'shopcomment'): ?>selected="selected"<?php endif; ?>>商城购物点评</option>
			<option value="youhuicomment" <?php if($_REQUEST['type'] == 'youhuicomment'): ?>selected="selected"<?php endif; ?>>代金券点评</option>
			<option value="fyouhuicomment" <?php if($_REQUEST['type'] == 'fyouhuicomment'): ?>selected="selected"<?php endif; ?>>优惠券点评</option>
			<option value="eventcomment" <?php if($_REQUEST['type'] == 'eventcomment'): ?>selected="selected"<?php endif; ?>>活动点评</option>
			<option value="slocationcomment" <?php if($_REQUEST['type'] == 'slocationcomment'): ?>selected="selected"<?php endif; ?>>门店点评</option>
			<option value="eventsubmit" <?php if($_REQUEST['type'] == 'eventsubmit'): ?>selected="selected"<?php endif; ?>>活动报名</option>
			<option value="sharetuan" <?php if($_REQUEST['type'] == 'sharetuan'): ?>selected="selected"<?php endif; ?>>分享团购</option>
			<option value="sharegoods" <?php if($_REQUEST['type'] == 'sharegoods'): ?>selected="selected"<?php endif; ?>>分享商品</option>
			<option value="sharefyouhui" <?php if($_REQUEST['type'] == 'sharefyouhui'): ?>selected="selected"<?php endif; ?>>分享优惠券</option>
			<option value="sharebyouhui" <?php if($_REQUEST['type'] == 'sharebyouhui'): ?>selected="selected"<?php endif; ?>>分享代金券</option>
			<option value="shareevent" <?php if($_REQUEST['type'] == 'shareevent'): ?>selected="selected"<?php endif; ?>>分享活动</option>
			<option value="fav" <?php if($_REQUEST['type'] == 'fav'): ?>selected="selected"<?php endif; ?>>喜欢</option>
			<option value="relay" <?php if($_REQUEST['type'] == 'relay'): ?>selected="selected"<?php endif; ?>>转发</option>		

		</select>
	
		<input type="hidden" value="Topic" name="m" />
		<input type="hidden" value="index" name="a" />
		<input type="submit" class="button" value="<?php echo L("SEARCH");?>" />
	</form>
</div>
<div class="blank5"></div>
<!-- Think 系统列表组件开始 -->
<table id="dataTable" class="dataTable" cellpadding=0 cellspacing=0 ><tr><td colspan="15" class="topTd" >&nbsp; </td></tr><tr class="row" ><th width="8"><input type="checkbox" id="check" onclick="CheckAll('dataTable')"></th><th width="50px   "><a href="javascript:sortBy('id','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("ID");?><?php echo ($sortType); ?> "><?php echo L("ID");?><?php if(($order)  ==  "id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('user_id','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("USER_NAME");?>  <?php echo ($sortType); ?> "><?php echo L("USER_NAME");?>  <?php if(($order)  ==  "user_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('title','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("TITLE");?>  <?php echo ($sortType); ?> "><?php echo L("TITLE");?>  <?php if(($order)  ==  "title"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('forum_title','<?php echo ($sort); ?>','Topic','index')" title="按照主题  <?php echo ($sortType); ?> ">主题  <?php if(($order)  ==  "forum_title"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('group_id','<?php echo ($sort); ?>','Topic','index')" title="按照小组  <?php echo ($sortType); ?> ">小组  <?php if(($order)  ==  "group_id"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('content','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("CONTENT");?>   <?php echo ($sortType); ?> "><?php echo L("CONTENT");?>   <?php if(($order)  ==  "content"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('reply_count','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("REPLY_COUNT");?>  <?php echo ($sortType); ?> "><?php echo L("REPLY_COUNT");?>  <?php if(($order)  ==  "reply_count"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_best','<?php echo ($sort); ?>','Topic','index')" title="按照精华  <?php echo ($sortType); ?> ">精华  <?php if(($order)  ==  "is_best"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_top','<?php echo ($sort); ?>','Topic','index')" title="按照置顶  <?php echo ($sortType); ?> ">置顶  <?php if(($order)  ==  "is_top"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('is_recommend','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("IS_RECOMMEND");?>  <?php echo ($sortType); ?> "><?php echo L("IS_RECOMMEND");?>  <?php if(($order)  ==  "is_recommend"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('type','<?php echo ($sort); ?>','Topic','index')" title="按照主题类型  <?php echo ($sortType); ?> ">主题类型  <?php if(($order)  ==  "type"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('has_image','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("HAS_IMAGE");?>  <?php echo ($sortType); ?> "><?php echo L("HAS_IMAGE");?>  <?php if(($order)  ==  "has_image"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th><a href="javascript:sortBy('create_time','<?php echo ($sort); ?>','Topic','index')" title="按照<?php echo L("CREATE_TIME");?>   <?php echo ($sortType); ?> "><?php echo L("CREATE_TIME");?>   <?php if(($order)  ==  "create_time"): ?><img src="__TMPL__Common/images/<?php echo ($sortImg); ?>.gif" width="12" height="17" border="0" align="absmiddle"><?php endif; ?></a></th><th >操作</th></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$topic): ++$i;$mod = ($i % 2 )?><tr class="row" ><td><input type="checkbox" name="key" class="key" value="<?php echo ($topic["id"]); ?>"></td><td>&nbsp;<?php echo ($topic["id"]); ?></td><td>&nbsp;<?php echo (get_user_name($topic["user_id"])); ?></td><td>&nbsp;<?php echo (msubstr($topic["title"])); ?></td><td>&nbsp;<?php echo (msubstr($topic["forum_title"])); ?></td><td>&nbsp;<?php echo (get_group_name($topic["group_id"])); ?></td><td>&nbsp;<?php echo (get_list_content($topic["content"])); ?></td><td>&nbsp;<?php echo ($topic["reply_count"]); ?></td><td>&nbsp;<?php echo (get_toogle_status($topic["is_best"],$topic['id'],is_best)); ?></td><td>&nbsp;<?php echo (get_toogle_status($topic["is_top"],$topic['id'],is_top)); ?></td><td>&nbsp;<?php echo (get_toogle_status($topic["is_recommend"],$topic['id'],is_recommend)); ?></td><td>&nbsp;<?php echo (get_topic_type($topic["type"])); ?></td><td>&nbsp;<?php echo (get_status($topic["has_image"])); ?></td><td>&nbsp;<?php echo (to_date($topic["create_time"])); ?></td><td><a href="javascript:edit('<?php echo ($topic["id"]); ?>')"><?php echo L("EDIT");?></a>&nbsp;<a href="javascript:view_reply('<?php echo ($topic["id"]); ?>')"><?php echo L("VIEW_REPLY");?></a>&nbsp;<a href="javascript:del('<?php echo ($topic["id"]); ?>')"><?php echo L("DELETE");?></a>&nbsp;</td></tr><?php endforeach; endif; else: echo "" ;endif; ?><tr><td colspan="15" class="bottomTd"> &nbsp;</td></tr></table>
<!-- Think 系统列表组件结束 -->
 

<div class="blank5"></div>
<div class="page"><?php echo ($page); ?></div>
</div>
</body>
</html>