<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 前台列表页 Action

    @Filename ListAction.class.php $

    @Author 追影 生成HTML 写的不够灵活 有需要的根据自己需求修正 QQ:279197963 $

    @Date 2011-11-18 08:42:11 $
*************************************************************/
class ListAction extends BaseAction
{
	Public function _empty()
	{ 
		$this->error('方法不存在');
	} 
	
	public function index()
	{
		inject_check($_GET['typeid']);
		inject_check($_GET['p']);
	//读取数据库&判断
	$typeid = (int)$_GET['typeid'];
	$list_model = 'list/list_default.html';
		$type = M('type');
		$list = $type->where('typeid='.intval($_GET['typeid']))->find();
		if(!$list)
		{
			$this->error('栏目不存在!');
		}
		else
		{
		//当前选中菜单
$pid = get_first_father($list['typeid']);
$cur_menu = get_field('type','typeid='.$pid,'drank');
$this->assign('cur_menu',$cur_menu);
		if($list['list_path'] != '' && file_exists(TMPL_PATH.cookie('think_template').'/'.$list['list_path'])){
		$list_model = $list['list_path'];
		}
		}
ob_start();
//用于生成静态HTML
$is_build = C('IS_BUILD_HTML');
//允许参数
$allow_param = array('p','author_id');
$static_file ='./Html/'.cookie('think_template').'/lists/'.$typeid;
$mid_str ='';
if(count($_REQUEST) >1)
{
foreach($_REQUEST as $k=>$v){
if($k != 'typeid' && in_array($k,$allow_param)){
$mid_str .= '/'.$k.'/'.md5($v);
}
}
}
$static_file .= ($mid_str .'.html');
$path = './ListAction.class.php';
$php_file = basename($path);
parent::html_init($static_file,$php_file,$is_build);
//以下是动态代码
//家族树与子孙树
		parent::tree_dir($typeid,'tree_list');
		parent::children_dir($typeid,'child_list');
//栏目基本信息封装
        $this->assign('title',$list['typename']);
		$this->assign('type',$list);
//栏目导航
		$config = F('basic','','./Web/Conf/');
		if($config['listshowmode'] == 1)
		{
			$map['fid'] = $list['fid'];
		}
		else
		{
			$map['fid'] = intval($_GET['typeid']);
		}
		$map['islink'] = 0;
		$nav = $type->where($map)->field('typeid,typename')->select();
		$this->assign('dh',$nav);
//第一次释放内存
		unset($list,$nav,$map);
		$list_server = M('admin')->where('is_client=1')->select();
		$this->assign('list_server',$list_server);
		$vip_sn = M('vip_mess')->order('id desc')->getField('vip_sn');
		$this->assign('vip_sn',$vip_sn);
//网站头部与友情链接
		R('Public/head');
		R('Public/py_link');
//查询数据库和缓存
		$article = D('ArticleView');
//封装条件
		$map['status'] = 1;
//导入分页类
		import('ORG.Util.Page');
//准备工作
        $arr = get_children($typeid);
		$map['article.typeid'] = array('in',$arr);	
		//用户阅读权限
		if($config['isread'] ==1){
		$map['_string'] = 'article.typeid in('.$_SESSION['dami_uservail'].')';	
		}
	//分页处理
		$count=$article->where($map)->count();
		$p = new Page($count,$config['artlistnum']);
		$p->setConfig('prev','上一页'); 
		$p->setConfig('header','篇文章');
		$p->setConfig('first','首 页');
		$p->setConfig('last','末 页');
		$p->setConfig('next','下一页');
		if(check_wap()){$temp_str = "%first%%upPage%%downPage%%end%";}
		else
		{
		$temp_str ="%first%%upPage%%prePage%%linkPage%%nextPage%%downPage%%end%
		<select name='select' onChange='javascript:window.location.href=(this.options[this.selectedIndex].value);'>%allPage%</select>共<font color='#CD4F07'><b>%totalRow%</b></font>篇 ".$config['artlistnum']."篇/每页";
		}
		$p->setConfig('theme',$temp_str);
//数据查询
		$alist = $article->where($map)->order('istop desc,addtime desc')->limit($p->firstRow.','.$p->listRows)->select();
		//echo $article->getLastSql();
//封装变量
		$this->assign('page',$p->show());
		$this->assign('list',$alist);
//释放内存
		unset($article,$type,$p,$tlist,$alist);
//模板输出
$this->display(TMPL_PATH.cookie('think_template').'/'.$list_model);
if($is_build ==1){
$c = ob_get_contents();
if(!file_exists(dirname($static_file))){
@mk_dir(dirname($static_file));
}
file_put_contents($static_file, $c);
}	
}
 
function photo(){
$count = M('article')->where('is_from_mobile=1 and imgurl<>\'\'')->count();
$this->assign('count',$count);
$list = M('article')->where('is_from_mobile=1 and imgurl<>\'\'')->select();
$this->assign('list',$list);
$this->display(TMPL_PATH.cookie('think_template').'/photo.html');
 }
 
 
}