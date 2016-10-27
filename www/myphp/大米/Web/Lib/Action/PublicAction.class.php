<?php
/***********************************************************
    [大米CMS] (C)2011 - 2012 damicms.com
    
	@function 前台公共	Action

    @Filename PublicAction.class.php $

    @Author 追影 QQ:279197963 $

    @Date 2011-11-21 08:24:19 $
*************************************************************/
class PublicAction extends Action
{
	Public function _empty()
	{
		alert('方法不存在',3);
	}

     public function head()
    {
	//读取数据库和缓存
		$type = M('type');
		$article = M('article');
		$config = F('basic','','./Web/Conf/');		
	//封装网站配置
		$this->assign('config',$config);
	//滚动公告
		$data['status'] = 1;
		$data['typeid'] = $config['noticeid']; 
		$roll=$article->where($data)->field('aid,title')->order('addtime desc')->limit($config['rollnum'])->select();
		//处理标题:防止标题过长撑乱页面
		foreach ($roll as $k=>$v)
		{
			$roll[$k]['title'] = msubstr($v['title'],0,20,'utf-8');
		}
		$this->assign('roll',$roll);		
	//网站导航
		$menu = $type->where('ismenu=1')->order('drank asc')->select();
		foreach( $menu as $k=>$v)
		{
			$menuson[$k] = $type->where('fid='.$v['typeid'].' AND drank <> 0')->order('drank asc')->select();
			$menu[$k]['submenu'] = $menuson[$k];
		}
		$this->assign('menuson',$menuson);
		$this->assign('menu',$menu);		
	//位置导航
		$nav = '<a href="'.$config['siteurl'].'">首页</a>';
		if(isset($_GET['aid']))
		{
			$typeid = $article->where('aid='.intval($_GET['aid']))->getField('typeid');
		}
		else
		{
			$typeid = intval($_GET['typeid']);
		}
		$typename = $type->where('typeid='.$typeid)->getField('typename');
		$path = $type->where('typeid='.$typeid)->getField('path');
		$typelist = explode('-',$path);
		//拼装导航栏字符串
		foreach($typelist as $v)
		{
			if($v==0) continue;
			$s = $type->where('typeid='.$v)->getField('typename');
			$nav.="&nbsp;&gt;&nbsp;<a href=\"".U('lists/'.$v)."\">{$s}</a>";
		}
		$nav.="&nbsp;&gt;&nbsp;<a href=\"".U('lists/'.$typeid)."\">{$typename}</a>";
		$this->assign('nav',$nav);
	//释放内存
		unset($type,$article);
		$this->assign('head',TMPL_PATH.cookie('think_template').'/head.html');
		$this->assign('footer',TMPL_PATH.cookie('think_template').'/footer.html');
    }
	
	function py_link(){
	$link = M('link')->where('islogo=1')->order('rank')->limit(5)->select();
	$this->assign('mylink',$link);
	}
	
function single(){
self::head();
$sinfo=M('article')->where('aid='.intval($_GET[aid]))->find();
if($sinfo){
$this->assign('title',$sinfo['title']);
$this->assign('sinfo',$sinfo);
}
$this->display();
}


//RSS订阅
function rss(){
import ('ORG.Util.Rss' );
$myRss = new RSS("大米CMS",C('SERVER_URL'),"大米CMS");
$list =M('article')->where('1=1')->select();
foreach($list as $k=>$v){
$myRss->AddItem($v['title'],'http://'.$_SERVER['SERVER_NAME'].url('articles',$v['aid']),$v['addtime']);
}
$myRss->BuildRSS();
$myRss->SaveToFile('./feed.rss');
$myRss->getFile('./feed.rss');
}
//自动更新描述
function up_desc(){
$list = M('article')->where("description=''")->select();
foreach($list as $k=>$v){
M('article')->where('aid='.$v['aid'])->setField('description',msubstr(strip_tags($v['content']),0,100));
}
echo '成功';
}
//在线充值或在线订单处理
function shouquan(){
$ap_path = (intval(C('AP_TYPE'))==1?'ap_jishi':'ap_danbao');
require_once("./Trade/{$ap_path}/alipay.config.php");
require_once("./Trade/{$ap_path}/lib/alipay_notify.class.php");
//计算得出通知验证结果
$alipayNotify = new AlipayNotify($alipay_config);
$verify_result = $alipayNotify->verifyNotify();

if($verify_result) {//验证成功
	
	//商户订单号WIDout_trade_no

	$out_trade_no = $_POST['out_trade_no'];

	//支付宝交易号

	$trade_no = $_POST['trade_no'];

	//交易状态
	$trade_status = $_POST['trade_status'];
	
	$total_fee = $_POST['total_fee'];	
	if($_POST['trade_status'] == 'WAIT_BUYER_PAY') {
	//该判断表示买家已在支付宝交易管理中产生了交易记录，但没有付款
	
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
			
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',0);		
	logResult('等待买家付款!');
    echo "success";		//请不要修改或删除
    }
	else if($_POST['trade_status'] == 'WAIT_SELLER_SEND_GOODS') {
	//该判断表示买家已在支付宝交易管理中产生了交易记录且付款成功，但卖家没有发货
		//判断该笔订单是否在商户网站中已经做过处理
		//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
		//如果有做过处理，不执行商户的业务程序
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',1);
	logResult('已付款，等待发货!');
	echo "success";		//请不要修改或删除
		
		

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    }
	else if($_POST['trade_status'] == 'WAIT_BUYER_CONFIRM_GOODS') {
	//该判断表示卖家已经发了货，但买家还没有做确认收货的操作
	
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
		M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',2);	
		logResult('已发货,等待收货!');
        echo "success";		//请不要修改或删除

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    }
	else if($_POST['trade_status'] == 'TRADE_SUCCESS') {
		M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',3);
	    $trade_type = substr($out_trade_no,0,2);
		if($trade_type == "CZ"){
		$arr = explode("-",$out_trade_no);
		if(count($arr)==2){
        $uid = intval($arr[1]);
		if($uid>0){
        M('member')->setInc('money','uid='.$uid,$total_fee); 		
		//logResult(M('dami_common_member',null)->getLastSql().'<BR>');
		$data['uid'] =$uid;
		$data['addtime'] = time();
		$data['price'] =$total_fee;
		$data['trade_no'] = $out_trade_no;
		$data['remark'] = "用户充值";
		$data['log_type'] = 0;
		M('money_log')->add($data);
		//logResult(M('money_log')->getLastSql().'<BR>');
		}
		}
	}
	//退款退货相关
	else if($_POST['refund_status'] == 'WAIT_SELLER_AGREE'){
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',7);
		}
	else if($_POST['refund_status'] == 'WAIT_BUYER_RETURN_GOODS'){
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',8);
	}
	else if($_POST['refund_status'] == 'REFUND_SUCCESS'){
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',9);	
	
	}
	else if($_POST['trade_status'] == 'TRADE_CLOSED'){
	M('member_trade')->where("out_trade_no='{$out_trade_no}' or group_trade_no='{$out_trade_no}'")->setField('status',10);
	}
	else{
	logResult($out_trade_no.'<BR>');
	}
	//该判断表示买家已经确认收货，这笔交易完成
	
		//判断该笔订单是否在商户网站中已经做过处理
			//如果没有做过处理，根据订单号（out_trade_no）在商户网站的订单系统中查到该笔订单的详细，并执行商户的业务程序
			//如果有做过处理，不执行商户的业务程序
		logResult('交易完成!');
        echo "success";		//请不要修改或删除

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
    }
    else {
		//其他状态判断
		logResult('其他状态!');
        echo "success";

        //调试用，写文本函数记录程序运行情况是否正常
        //logResult ("这里写入想要调试的代码变量值，或其他运行的结果记录");
    }

	//——请根据您的业务逻辑来编写程序（以上代码仅作参考）——
	
	/////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////////
}
else {
    //验证失败
	logResult('验证失败<BR>');
    echo "fail";

    //调试用，写文本函数记录程序运行情况是否正常
    //logResult("这里写入想要调试的代码变量值，或其他运行的结果记录");
}
}
//ajax加入购物车
function ajax_insert_cart(){
if(empty($_REQUEST['id']) || empty($_REQUEST['qty']) || empty($_REQUEST['price']) ||empty($_REQUEST['name']) || !is_numeric($_REQUEST['price']) || !is_numeric($_REQUEST['qty']) || !is_numeric($_REQUEST['id']) || intval($_REQUEST['qty'])<=0){$this->ajaxReturn('参数错误','失败',0);exit();}
import ('ORG.Util.Cart' );	
$items = array(
			array(
			'id' => (int)$_REQUEST['id'],
			'qty' => (int)$_REQUEST['qty'],
			'price' => $_REQUEST['price'],
			'name' => $_REQUEST['name'],
			'option'=> array('gtype'=>(string)$_REQUEST['gtype'],'pic'=>(string)$_REQUEST['pic']),			
			),
		);
$cart = new Cart();
$cart->insert($items);
$this->ajaxReturn($cart->contents(),'成功',1);	
}
//ajax购物车物品列表
function ajax_cart_list(){
import ('ORG.Util.Cart' );	
$cart = new Cart();
$this->ajaxReturn($cart->contents(),'成功',1);	
}
//将物品从购物车中删除
function ajax_del_cart(){
import ('ORG.Util.Cart' );
$id = intval($_REQUEST['id']);	
$cart = new Cart();
$arr = array(
'rowid' => md5($id),
'qty' => 0//清楚该物品只要设置为0即可
		);
$cart->update($arr);
}
//结束
}
?>