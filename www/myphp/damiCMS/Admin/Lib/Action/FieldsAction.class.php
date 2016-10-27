<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
	
    @function 栏目管理模块

    @Filename TypeAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-23 10:33:18 $
*************************************************************/
class FieldsAction extends CommonAction
{	
    public function index()
    {
		$dao = M('extend_fieldes');
		$list = $dao->order('orders')->select();
		$this->assign('list',$list);
		$this->display('index');	
    }
	//添加扩展字段
	function add(){
	$this->assign('list_type',C('FIELD_TYPE'));
	$this->display();
	}	
	//保存添加扩展字段
	function doadd(){
	$data = array();
	$dao = D('ExtendFieldes');
	if($_POST['field_name'] == ''){$this->error('请输入字段名称');}
	$data = $_POST;
	if(trim($_POST['options']) !=''){
	$data['set_option'] = str_replace("\r\n",',',trim($_POST['options']));
	}
	$sql = "ALTER TABLE ".C('DB_PREFIX')."article ADD ".trim($_POST['field_name'])." text(0) CHARACTER SET utf8;";
	$t = M()->execute($sql);
	$e_n = (int)mysql_affected_rows();	
	if($e_n>=0){
	if($dao->create()){
	$dao->add($data);
	$this->assign("waitSecond",30);
	$this->assign("jumpUrl",U('Fields/index'));
	$this->success('添加扩展字段成功! 您可以<a href="'.U('Fields/add').'" style="color:green">继续添加</a>&nbsp;&nbsp;<a href="'.U('Fields/index').'" style="color:red">返回扩展字段列表</a>');
	}
	else
	{
	$this->error($dao->getError());
	}
	}
	$this->error('已经存在该字段或数据非法!');
	}
	//删除
	function del(){
	$field_id = (int)$_REQUEST['field_id'];
	$sql = "ALTER TABLE ".C('DB_PREFIX')."article DROP COLUMN ".trim($_REQUEST['field_name']);
	$t = M()->execute($sql);
	$e_n = (int)mysql_affected_rows();	
	if($e_n>=0){
	M('extend_fieldes')->where('field_id='.$field_id)->delete();
	M('extend_show')->where('field_id='.$field_id)->delete();
	$this->success('删除成功');
	}	
	$this->error('删除失败');
	}
	//编辑
	function edit(){
	$field_id = (int)$_REQUEST['field_id'];
	$this->assign('list_type',C('FIELD_TYPE'));
	$list = M('extend_fieldes')->where('field_id='.$field_id)->find();
	if($list['field_type']>2 && $list['field_type']<7){
	$list['set_option'] = str_replace(',',"\r\n",$list['set_option']);	
	}
	$this->assign('list',$list);
	$this->display();	
	}
	//保存编辑
	function doedit(){
	$field_id = (int)$_REQUEST['field_id'];
	$data = array();
	$dao = M('extend_fieldes');
	if($_POST['field_name'] == ''){$this->error('请输入字段名称');exit();}
	$list = $dao->where('field_id='.$field_id)->find();
	if(!$list){$this->error('找不到该字段');exit();}
	$data = $_POST;
	if($dao->create()){
	if(trim($_POST['options']) !=''){
	$data['set_option'] = str_replace("\r\n",',',trim($_POST['options']));
	}
	if($list['field_name'] != trim($_POST['field_name'])){
	$sql = "ALTER TABLE ".C('DB_PREFIX')."article change ".$list['field_name']." ".trim($_POST['field_name'])." text(0) CHARACTER SET utf8;";
	$tt = M()->query($sql);
	}
	$dao->save($data);
	//echo $dao->getLastSql();
	M('extend_show')->where('field_id='.$field_id)->setField('orders',$_POST['orders']);
	$this->success('修改成功');
	}else{
	$this->error($dao->getError());	
		}
	}
	
}
?>