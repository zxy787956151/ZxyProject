<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 文章管理

    @Filename ArticleAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-27 08:52:44 $
*************************************************************/
class CaijiAction extends CommonAction
{	
function caiji(){
$sql = "describe ".C('DB_PREFIX')."article;";
$list_field = M()->query($sql);
$this->addop();
$this->assign('list_field',$list_field);
$this->display();
}

//开始采集
function docaiji(){
set_time_limit(0);
import('ORG.Util.Spider');
$islocal = intval($_POST['islocal']);
$list_url = trim($_POST['url_list']);
$charset =   trim($_POST['charset']);
$page_url =  trim($_POST['page_list']);
$act = intval($_POST['act']);
$field = $_POST['field'];
$field[] = 'typeid';
$role = $_POST['role'];
$role[] = $_POST['typeid'];
$spider  = new spider();
//支持单页或多页采集
$spider->islocal = $islocal;
$spider->addStartUrl($list_url);
$spider->setCharset($charset);
$spider->addLayer(0,'list',$page_url);
for($i=0;$i<count($field);$i++){
$spider->addField($field[$i],$role[$i]);
}
$spider->run();
$spider->output();
$file = $_SERVER['DOCUMENT_ROOT'].'/dami_caiji.sql';
$spider->saveSql('dami_article',$file,$act);
}
//文章模块 添加-栏目option
	private function addop(){
		$type = M('type');
		//获取栏目option
		$list = $type->where('islink=0')->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->order('bpath')->select();
		foreach($list as $k=>$v)
		{
		
		$check ='';
		if(isset($_REQUEST['typeid']))
		{
		if($v['typeid'] == intval($_REQUEST['typeid'])){
		$check = 'selected="selected"';
		}
		}
		
			if($v['fid'] == 0)
			{
				$count[$k] = '';
			}
			else
			{
				for($i = 0;$i < count(explode('-',$v['bpath'])) * 2;$i++)
				{
					$count[$k].='&nbsp;';
				}
			}
			$option.="<option value=\"{$v['typeid']}\" $check>{$count[$k]}|-{$v['typename']}</option>";
		}
		$this->assign('option',$option);
	}
//结束 
}
?>