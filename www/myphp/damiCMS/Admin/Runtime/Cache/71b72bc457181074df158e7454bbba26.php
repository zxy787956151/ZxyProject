<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8" /><title>无标题文档</title><link href="__PUBLIC__/Admin/images/Admin_css.css" type=text/css rel=stylesheet><script type="text/javascript" src="/damiCMS/Public/Admin/js/Jquery.js"></script><script src="__PUBLIC__/js/bootstrap.min.js"></script></head><body><!-- Modal --><div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true"><div class="modal-dialog"><div class="modal-content"><div class="modal-header"><button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button><h4 class="modal-title" id="myModalLabel">栏目设置为后台独立菜单操作</h4></div><div class="modal-body"><table width="450" border="0" cellspacing="0" cellpadding="0"><tr><td width="143">独立管理菜单名称</td><td width="307"><input type="text" name="m_typename" id="m_typename" value="" />&nbsp;<input name="m_typeid" id="m_typeid" type="hidden" value=""></td></tr><tr><td>状态</td><td><input type="radio" name="enable" id="m_enable1" value="1" />启用&nbsp;
    <input type="radio" name="enable" id="m_enable2" value="0" />禁用&nbsp;
    <span id="m_status"></div></td></tr></table></div><div class="modal-footer"><button type="button" class="btn btn-success" data-dismiss="modal">确定</button></div></div><!-- /.modal-content --></div><!-- /.modal-dialog --></div><!-- /.modal --><script> function showhelp(){
	var str = '蓝色:文章数 eg:(1),[外]代表外链栏目;红色:顶级导航排序,绿色:二级导航排序,-:不参与首页栏目内容排序,√代表支持,x代表不支持,点击编辑,修改栏目相关属性';
	alert(str);
 }
function show_mydialog(id,name){
var url = '<?php echo ($_SERVER["PHP_SELF"]); ?>' + '?m=Type&a=ajax_menuid&typeid=' + id;
$.getJSON(url,{},function(json){
var data = json.data;
var status = json.status;
if(status==0){
$('#m_typeid').val(id);
$('#m_typename').val(name);
$('#m_enable1').attr("checked","checked");	
}else{
	
$('#m_typeid').val(data.typeid);
$('#m_typename').val(data.menu_name);
$('#m_status').html('<input type="radio" name="enable" id="m_enable3" value="2" />删除');	
if(data.enable != 1){
	$('#m_enable2').attr("checked","checked");}else{
	$('#m_enable1').attr("checked","checked");}	
}
});
$('#myModal').modal('show');
}
$(function(){
$('#myModal').on('hidden.bs.modal', function (e) {
var url = '<?php echo ($_SERVER["PHP_SELF"]); ?>' + '?m=Type&a=ajax_domenu&typeid=' + $('#m_typeid').val() + '&menu_name=' + escape($('#m_typename').val()) + '&enable=' + $('input:radio[name="enable"]:checked').val();
$.post(url);
});
});
 </script><div class="main_center"><table border="0" cellspacing="2" cellpadding="3"  align="center" class="table table-bordered"><tr><td colspan="8" align=left class="admintitle">栏目列表　[<a href="__URL__/add"><font color="#FF0000">添加栏目</font></a>] [<a href="__APP__/Fields/index"><font color="#FF0000">扩展字段管理</font></a>][<a onClick="showhelp();">操作提示</a>]</td></tr><tr align="center"><td width="20%" class="ButtonList">栏目名称</td><td width="8%" class="ButtonList">栏目ID</td><td width="12%" class="ButtonList">用户投稿</td><td width="8%" class="ButtonList">导航排序</td><td width="9%" class="ButtonList">导航显示</td><td width="8%" class="ButtonList">首页排序</td><td width="12%" class="ButtonList">首页显示</td><td width="23%" class="ButtonList">操 作</td></tr><?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr bgcolor="#f1f3f5" onMouseOver="this.style.backgroundColor='#EAFCD5';this.style.color='red'" onMouseOut="this.style.backgroundColor='';this.style.color=''"><td height="24" class="tdleft"><?php if(($vo["fid"]) == "0"): if(($vo["islink"]) != "1"): ?><a href="javascript:show_mydialog(<?php echo ($vo["typeid"]); ?>,'<?php echo ($vo["typename"]); ?>');"><img src='__PUBLIC__/Editor/themes/common/anchor.gif' border='0'></a><?php endif; endif; echo ($vo["space"]); ?><a href="__APP__/Article/index/typeid/<?php echo ($vo["typeid"]); ?>"><?php echo ($vo["typename"]); ?></a><font color="blue"><font color="blue"><?php if(($vo["islink"]) == "1"): ?>[<a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/islink-1">外</a>]<?php else: ?>(<a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/islink-0"><?php echo ($vo["total"]); ?></a>)<?php endif; ?></font></td><td height="24" align="center"><?php echo ($vo["typeid"]); ?></td><td height="24" align="center" class="tdleft"><?php if(($vo["isuser"]) == "1"): ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/isuser-1">√<?php else: ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/isuser-0">ㄨ<?php endif; ?></a></td><td height="24" align="center"><?php if(($vo["ismenu"]) == "1"): ?><font color="red"><?php else: ?><font color="green"><?php endif; echo ($vo["drank"]); ?></font></td><td height="24" align="center"><?php if(($vo["ismenu"]) == "1"): ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/ismenu-1">√<?php else: ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/ismenu-0">ㄨ<?php endif; ?></a></td><td height="24" align="center"><?php if(($vo["isindex"]) == "1"): echo ($vo["irank"]); else: ?>-<?php endif; ?></td><td height="24" align="center"><?php if(($vo["isindex"]) == "1"): ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/isindex-1">√<?php else: ?><a href="__URL__/status/typeid/<?php echo ($vo["typeid"]); ?>/s/isindex-0">ㄨ<?php endif; ?></a></td><td width="23%" align="center"><a href="__URL__/edit/typeid/<?php echo ($vo["typeid"]); ?>">编辑</a> | <a href="__URL__/del/typeid/<?php echo ($vo["typeid"]); ?>" onClick="JavaScript:return confirm('删除的栏目必须无子栏目,且无文章！确定？')">删除</a><?php if(($vo["islink"]) != "1"): ?>| <a href="__URL__/show_field/typeid/<?php echo ($vo["typeid"]); ?>">字段显示</a>  |<a href='__URL__/manage_moban/typeid/<?php echo ($vo["typeid"]); ?>'>模板控制</a><?php endif; ?></td></tr><?php endforeach; endif; else: echo "" ;endif; ?></table></div></body></html>