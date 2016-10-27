<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
   
    @function 文章模块
 
    @Filename ArticleAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-21 08:24:25 $
*************************************************************/
class ArticleAction extends BaseAction
{
	Public function _empty()
	{ 
		alert('方法不存在',__APP__);
	} 
	
	public function index()
	{
		if(!isset($_GET['aid']))
		{
			$this->error('非法操作');
		}
		inject_check($_GET['aid']);
		inject_check($_GET['p']);
$aid = intval($_GET['aid']);
//读取数据库和缓存
ob_start();
//用于生成静态HTML
$is_build = C('IS_BUILD_HTML');
//允许参数
$allow_param = array('p','keyword');
$static_file ='./Html/'.cookie('think_template').'/articles/'.$aid;
$mid_str ='';
if(count($_REQUEST) >1)
{
foreach($_REQUEST as $k=>$v){
if($k != 'aid' && in_array($k,$allow_param)){
$mid_str .= '/'.$k.'/'.md5($v);
}
}
}
$static_file .= ($mid_str .'.html');
$path = './ArticleAction.class.php';
$php_file = basename($path);
parent::html_init($static_file,$php_file,$is_build);
//以下是动态代码
$article = M('article');
$config = F('basic','','./Web/Conf/');
$page_model = 'page/page_default.html';
	    //相关判断
$alist = $article->where('aid='.$aid)->find();
if(!$alist)
{
alert('文章不存在或已删除!',__APP__);
}
if($alist['islink'] == 1)
{
Header('Location:'.$alist['linkurl']);
}		
if($alist['status'] == 0)
{
alert('文章未审核!',__APP__);
}
//阅读权限
if($config['isread'] ==1){
$uvail = explode(',',$_SESSION['dami_uservail']);
if(!in_array($alist['typeid'],$uvail)){
alert('对不起您没有阅读改文章的权限！',__APP__);
}
}
$this->assign('title',$alist['title']);
parent::tree_dir($alist['typeid'],'tree_list');
$type = M('type');
$list = $type->where('typeid='.intval($alist['typeid']))->find();
if($list){
$pid = get_first_father($list['typeid']);
$cur_menu = get_field('type','typeid='.$pid,'drank');
$this->assign('cur_menu',$cur_menu);	
$this->assign('type',$list);
}
$a = M('type')->where('typeid='.$alist['typeid'])->getField('page_path');
if( $a !='' && file_exists(TMPL_PATH.cookie('think_template').'/'.$a)){
$page_model = $a;		
} 
//统计处理
if($alist['status'] == 1)
{
$map['hits'] = $alist['hits']+1;
$article->where('aid='.$aid)->save($map);
}
//注销map
unset($map);
$alist['hits'] += 1;
//关键字替换
$alist['content'] = $this->key($alist['content']);
//鼠标轮滚图片
if($config['mouseimg'] == 1)
{
$alist['content'] = $this->mouseimg($alist['content']);
}
//文章内分页处理
if($alist['pagenum']==0)
{
//手动分页
$alist['content'] = $this->diypage($alist['content']);
}
else
{
//自动分页
$alist['content'] = $this->autopage($alist['pagenum'],$alist['content']);
}
//文章内投票
$this->vote($alist['voteid']);
//心情投票
		$url = __ROOT__;//用于心情js的根路径变量
		$this->assign('url',$url);
	//文章上下篇
		$map['status'] = 1;
		$map['typeid'] = $alist['typeid'];
		$map['aid'] = array('lt',$alist['aid']);
		$up = $article->where($map)->field('aid,title')->order('addtime desc')->limit(1)->find();
		//dump($article->getLastsql());
		if(!$up)
		{
		$lastpage = '';
			$updown = '下一篇：<span>无</span>';
		}
		else
		{
		
			$up['title'] = msubstr($up['title'],0,20,'utf-8');
			$lastpage = '<a href="'.U('articles/'.$up['aid']).'" data-icon="arrow-l" data-iconpos="left">'.$up['title'].'</a>';
			$updown = '下一篇：<span><a href="'.U('articles/'.$up['aid']).'" >'.$up['title'].'</a></span>';
		}
		$this->assign('lastpage',$lastpage);
		$map['aid'] = array('gt',$alist['aid']);
		$down =$article->where($map)->field('aid,title')->order('addtime desc')->limit(1)->find();
		if(!$down)
		{
		$nextpage = '';
			$updown .= '  上一篇：<span>无</span>';
		}
		else
		{
			$dowm['title'] = msubstr($down['title'],0,20,'utf-8');
			$nextpage = '<a href="'.U('articles/'.$down['aid']).'" data-icon="arrow-r" data-iconpos="right">'.$down['title'].'</a>';
			$updown .= '  上一篇：<span><a href="'.U('articles/'.$down['aid']).'">'.$down['title'].'</a></span>';
		}
		$this->assign('nextpage',$nextpage);
		$this->assign('updown',$updown);
		
	//释放相关内存
		unset($updown,$up,$down,$map,$lastpage,$nextpage);
	//相关文章
if($alist['keywords'] != ''){
		$map['status'] = 1;
		$keywords=explode(",",$alist['keywords']);
		foreach ($keywords as $k=>$v)
		{
			if($k == 0)
			{
				$map['_string'] = "(keywords like '%{$v}%')";
			}
			else
			{
				$map['_string'] = " OR (keywords like '%{$v}%')";
			}
		}
$klist = $article->where($map)->field('aid,title,imgurl,addtime')->limit(6)->select();
//封装变量
$this->assign('keylist',$klist);
}
$this->assign('article',$alist);
//释放内存
unset($article,$alist,$klist,$map);
//模板输出
$this->display(TMPL_PATH.cookie('think_template').'/'.$page_model);
if($is_build ==1){
$c = ob_get_contents();
if(!file_exists(dirname($static_file))){
@mk_dir(dirname($static_file));
}
file_put_contents($static_file, $c);
}	
}
	
	//投票模块
	private function vote($id)
	{
		$vote = M('vote');
		$vo = $vote->where('id='.$id)->find();
		if($vo)
		{
			$strs = explode("\n",trim($vo['vote']));
			for($i = 0;$i < count($strs);$i++)
			{
				$s = explode('=',$strs[$i]);
				$data[$i]['num'] = $s[1];
				$data[$i]['title'] = $s[0];
			}
		}
		else
		{
			$vo['title'] = '投票ID不存在!请检查网站配置!';
		}
	//封装变量
		$this->assign('votetype',$vo['stype']);
		$this->assign('voteid',$vo['id']);
		$this->assign('votetitle',$vo['title']);
		$this->assign('votedata',$data);
	//释放内存
		unset($vote,$vo,$data);
	}
	
	
//关键字替换
	private function key($content)
	{
		import('ORG.Util.KeyReplace');
		$key = M('key');
		$keys = $key->field('url,title,num')->select();
		$map = array();
		foreach ($keys as $k=>$v)
		{
			$map[$k]['Key'] = $v['title'];
			$map[$k]['Href'] ="<a href=\"{$v['url']}\" target=\"_blank\">{$v['title']}</a>";
			$map[$k]['ReplaceNumber'] = $v['num'];
		}
		$a = new KeyReplace($map,$content);
		$a->KeyOrderBy();
		$a->Replaces();
		return $a->HtmlString;
	}
	
	//鼠标鼠标滚轮控制图片大小的函数
	private function mouseimg($content)
	{
		$pattern = "/<img.*?src=(\".*?\".*?\/)>/is";
		$content = preg_replace($pattern,"<img src=\${1} onload=\"javascript:resizeimg(this,575,600)\">",$content);
		return $content;
	}
	
	//文章内容分页-自定义分页
	private function diypage($content)
	{
		$str = explode('[dami_page]',$content);
		$num = count($str);
		if($num == 1)
		{
			return $content;
			exit;
		}
		import('ORG.Util.Page');
		$p = new Page($num,1);
		$p->setConfig('prev','上一页');
		$p->setConfig('next','下一页');
		$p->setConfig('theme',"%upPage%%linkPage%%downPage%");
		$this->assign('page',$p->show());
		$this->assign('nowpage',$p->nowPage);
		$nowpage = $p->nowPage - 1;
	//释放内存
		unset($p);
		return $str[$nowpage];
	}
	
	
	//文章自动分页
	private function autopage($pagenum,$content)
	{
		if($pagenum == 0)
		{
			return $content;
		}
		if(strlen($content) < $pagenum)
		{
			return $content;
		}
	//导入分页类和函数库
		import('ORG.Util.Page');
		$num = ceil(strlen($content) / $pagenum);
		$p = new Page($num,1);
		$p->setConfig('prev','上一页');
		$p->setConfig('next','下一页');
		$p->setConfig('theme',"%upPage%%linkPage%%downPage%");
		$this->assign('page',$p->show());
		$this->assign('nowpage',$p->nowPage);
		$content = msubstr($content,($p->nowPage-1) * $pagenum,$pagenum);
	//释放内存
		unset($p);
		return $content;
	}
}