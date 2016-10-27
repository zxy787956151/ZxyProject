<?php


/**
  +----------------------------------------------------------
 * 项目基类
  +----------------------------------------------------------
 */
class BaseAction extends Action {
//初始化
function _initialize() {
if(isset($_REQUEST['t']) && $_REQUEST['t'] != '' && file_exists(TMPL_PATH.'/'.$_REQUEST['t'])){
cookie('think_template',$_REQUEST['t']);
}
else if(cookie('think_template') == '')
{
$cc = M('config')->find();
cookie('think_template',$cc['sitetpl']);
}
//获取访客权限
if(intval(S('first_look')) != 1 || !isset($_SESSION['dami_uid'])){
$config = F('basic','','./Web/Conf/');
if($config['isread']==1){
$group_vail = M('member_group')->where('group_id='.$config['defaultup'])->getField('group_vail');
$_SESSION['dami_uservail'] = $group_vail;
}
S('first_look',1);
}
R('Public/head');
}

protected function lists($typeid,$mode,$limit,$param,$order='addtime desc')
	{
	//查询数据库
		$article = D('ArticleView');
		$type = M('type');
	//封装条件
		$map['status'] = 1;
	//准备工作
	//追影 QQ:279197963修改让其支持无限极
		$arr = get_children($typeid);
	//模式判断
		switch($mode)
		{
			case 0:
				$map['article.typeid'] = array('in',$arr);
				break;
			case 1:
				$map['article.typeid'] = $typeid;
				break;
			case 2:
				$map['article.typeid'] = array('in',$arr);
				break;
		}
		$alist = $article->where($map)->order($order)->limit($limit)->select();
		$this->assign($param,$alist);
	}

//是否使用静态
protected function html_init($static_file,$php_file,$is_build){
clearstatcache();
if (file_exists($static_file) && $is_build == 1 && $_SESSION['is_rebuild'] != 1 && (time()-filemtime($static_file)) <= 21600 && filemtime($php_file) - filemtime($static_file) <=0) //判断源文件已修改//缓存6小时 永久的化去掉他
{
//$this->display($static_file); 用这句容易产生注入漏洞因为静态页里的PHP代码仍然解析
$fp = fopen($static_file,"r");
$conStr = fread($fp,filesize($static_file));
fclose($fp);
echo $conStr;
exit();
}
}
//获取子孙目录
protected function children_dir($typeid=22,$assign = 'product_dir',$show_all=0){
$dao = M('type');
$t = $dao->where('typeid ='.$typeid)->find();
if($t){
	if($show_all==1){
$str = $t["path"]."-".$t["typeid"];
$mylist = $dao->where("1 = instr(path,'".$str."')")->select();
	}
	else{
$mylist = $dao->where("fid = ".$t["typeid"])->select();	
	}
$this->assign($assign,$mylist);
}
}
//获取家族树
protected function tree_dir($typeid,$assign='tree_list'){
if($typeid ==0){exit();}
$str = get_all_tree($typeid);
$dao = M('type');
$t = $dao->where('typeid in('.$str.')')->order('typeid')->select();
$this->assign($assign,$t);
}



// Base end
}
?>