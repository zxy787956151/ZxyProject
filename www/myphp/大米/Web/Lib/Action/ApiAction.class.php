<?php
/***********************************************************
    [大米CMS] (C)2011 - 2012 damicms.com
    
	@function 前台公共接口	Action

    @Filename APIAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-21 08:24:19 $
*************************************************************/
class ApiAction extends Action
{
//产品相册列表
function list_product_photo(){
$list = M('article')->where("imgurl<>'' and is_from_mobile=1")->field('aid,title,content,imgurl')->select();
$this->ajaxReturn($list,'产品列表',1);exit();
}
//发送消息
function domess(){
$company_id = intval($_REQUEST['companyid']);
$to_uid = intval($_REQUEST['touid']);
$content = $_REQUEST['content'];
$client_tel = $_REQUEST['clienttel'];
cookie('client_tel',$client_tel);
$url = C('SERVER_URL')."Public/doshop_mess?company_id={$company_id}&to_uid={$to_uid}&content={$content}&client_tel={$client_tel}&from_url=".urlencode('http://'.$_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']);
$res = json_decode(file_get_contents($url));
echo $res->data;
}
//万能获取数据接口
function ajax_arclist(){
$prefix = !empty($_REQUEST['prefix'])?(bool)$_REQUEST['prefix']:true;
		 //表过滤防止泄露信息,只允许的表
		 if(!in_array($_REQUEST['model'],array('article','type','ad','label','link'))){exit();}
		 if(!empty($_REQUEST['model'])){
		 if($prefix == true){
		 $model = C('DB_PREFIX').$_REQUEST['model'];
		 }
		 else{
		$model =	$_REQUEST['model'];
		 } 
		 }else{
		$model = C('DB_PREFIX').'article';
		 }  
         $order     =!empty($_REQUEST['order'])?inject_check($_REQUEST['order']):'';
         $num       =!empty($_REQUEST['num'])?inject_check($_REQUEST['num']):'';
         $where     =!empty($_REQUEST['where'])?inject_check(urldecode($_REQUEST['where'])):'';
         //使where支持 条件判断,添加不等于的判断
         $page=false;
         if(!empty($_REQUEST['page'])) $page=(bool)$_REQUEST['page'];    
         $pagesize  =!empty($_REQUEST['pagesize'])?intval($_REQUEST['pagesize']):'10';
         //$query     =!empty($_REQUEST['sql'])?$_REQUEST['sql']:'';//太危险不用
         $field     = '';
		 if(!empty($_REQUEST['field'])){
		 $f_t = explode(',',inject_check($_REQUEST['field']));
		 $f_t = array_map('urlencode',$f_t);
		 $field = implode(',',$f_t);
		 }
	
         $m=new Model($model,NULL);	 
         //如果使用了分页,缓存也不生效
         if($page){
               import("ORG.Util.Page");     //这里改成你的Page类           
              $count=$m->where($where)->count();
              $total_page = ceil($count / $pagesize);
              $p = new Page($count,$pagesize);
               //如果使用了分页，num将不起作用
               $t=$m->field($field)->where($where)->limit($p->firstRow.','.$p->listRows)->order($order)->select();
			   //echo $m->getLastSql();			   
			   $ret = array('total_page'=>$total_page,'data'=>$t);			   
         }
         //如果没有使用分页，并且没有 query
         if(!$page){    
         $ret=$m->field($field)->where($where)->order($order)->limit($num)->select();
         }		 
         $this->ajaxReturn($ret,'返回信息',1);		 
}

//登陆信息js
function login_js(){
	$ret = '';
if($_SESSION['dami_username'] !=''){
	$ret .= '欢迎您，'.$_SESSION['dami_username'].',&nbsp;';
	if($_SESSION['dami_usericon'] != ''){
	$ret .= '<img src="'.$_SESSION['dami_usericon'].'" border="0" width="16" height="16">';	
		} 
	$ret .= '<a href="'.U('Member/main').'">会员中心</a>&nbsp;&nbsp;<a href="'.U('Member/dologout').'">退出</a>';
	}
else{
	if(intval(C('QQ_LOGIN')) ==1){
		$ret .= '<a href="'.U('Member/qqlogin').'"><img src="'.__ROOT__.'/Web/Tpl/'.cookie('think_template').'/images/qq_login.png" border="0" /></a>';
	}
	$ret .= '<a href="'.U('Member/login').'">登陆</a> | <a href="'.U('Member/register').'">注册</a>';
	}
	echo 'document.writeln(\''.$ret.'\');';
}
//文章浏览次数js
function hits_js(){
	$aid= intval($_REQUEST['aid']);
	$hits = M('article')->where('aid='.$aid)->getField('hits');
	if(intval(C('IS_BUILD_HTML'))==1){
	M('article')->setInc('hits','aid='.$aid);
	}
	echo 'document.writeln(\''.$hits.'\');';
	}

//类结束
}
?>