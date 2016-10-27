<?php
/***********************************************************
    [大米CMS] (C)2011 - 2011 damicms.com
    
	@function 前台列表页 Action

    @Filename MemberAction.class.php $

    @Author 追 影 QQ:279197963 $

    @Date 2011-11-18 08:42:11 $
*************************************************************/
class MemberAction extends BaseAction
{
private $qqconfig = array();
function _initialize() {
parent::_initialize();
$this->qqconfig['appid'] = C('QQ_APPID');
$this->qqconfig['appkey'] = C('QQ_APPKEY');
$this->qqconfig['callback'] = 'http://'.$_SERVER['HTTP_HOST'].__ROOT__."/index.php?m=Member&a=qqcallback";
$member_menu = S('member_menu');
if(!is_array($member_menu)){
$member_menu = M('member_menu')->where('is_show=1')->order('drand')->select();
S('member_menu',$member_menu);	
}
$this->assign('member_menu',$member_menu);
} 
//检查是否登录
private function  is_login(){
header("Content-type: text/html; charset=utf-8"); 
if(!isset($_SESSION['dami_uid']) && $_SESSION['dami_uid'] == ''){
$lasturl = urlencode(htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
$this->assign('jumpUrl',__ROOT__.'/index.php?m=Member&a=login&lasturl='.$lasturl);
$this->success('未登陆或登陆超时，请重新登陆,页面跳转中~');		
}
}	
//用户登陆	
public function login(){
if(isset($_SESSION['dami_uid']) && $_SESSION['dami_uid'] != ''){
$this->redirect('Member/main');	
}
$this->display();
}
//登录
function dologin(){
self::check_verify();
$username = inject_check($_REQUEST['username']);
$userpwd =  inject_check($_REQUEST['userpwd']);
if($username=='' || $userpwd==''){$this->error('请输入用户名和密码?');exit();}
$info = M('member')->where("username='{$username}' and is_lock=0")->find();
if(!$info){$this->error('用户不存在或账户未激活!');}
else
{
	if($info['userpwd'] != md5($userpwd)){
		$this->error('密码错误，请重新登录!');
		}else{
		$_SESSION['dami_uid'] = $info['id'];
		$_SESSION['dami_username'] = $info['username'];
		$_SESSION['dami_usericon'] = $info['icon'];
		$_SESSION['dami_uservail'] =  get_field('member_group','group_id='.$info['group_id'],'group_vail');
		if(!empty($_REQUEST['lasturl'])){
		$this->assign('jumpUrl',htmlspecialchars(urldecode($_REQUEST['lasturl'])));	
		}
		else{
		$this->assign('jumpUrl',U('Member/main'));
		}
		$this->success('登录成功~');		
	}
}
}
//在线充值
function chongzhi(){
self::is_login();
$info = M('member')->where('id='.$_SESSION['dami_uid'])->find();
$this->assign('row',$info);
$this->display();	
}
//卡充值
function card_money(){
self::is_login();
$uid = intval($_SESSION['dami_uid']);
$User = D("card"); // 实例化User对象
if (!$User->create()){
$this->error($User->getError());
}else{
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data);
$card_number = $data['card_number'];
$card_pwd = $data['card_pwd'];
$t = $User->where("card_num='$card_number' and status=0")->find();
if(!$t){$this->error('卡号错误或已使用');}
	if($t['card_pwd'] != $card_pwd){
	$this->error('卡号密码有误!充值失败!');
	}
	else{
	M('member')->setInc('money','uid='.$uid,floatval($t['money'])); 		
		//logResult(M('dami_common_member',null)->getLastSql().'<BR>');
		$data['uid'] =$uid;
		$data['addtime'] = time();
		$data['price'] = floatval($t['money']);
		$data['trade_no'] = $card_number;
		$data['remark'] = "用户用卡号:{$card_number}充值";
		$data['log_type'] = 0;
		M('money_log')->add($data);
	$this->success('恭喜您充值成功!');
	}
}
}
//注销登录
function dologout(){
unset($_SESSION['dami_uid']);
unset($_SESSION['dami_username']);
unset($_SESSION['dami_usericon']);
unset($_SESSION['dami_uservail']);
session_destroy();
$this->assign('jumpUrl',U('Member/login'));
$this->success('注销成功~');	
}

//用户注册
public function register(){
$this->display();
}
//确认注册
function doreg(){
$User = D("Member"); // 实例化User对象
if (!$User->create()){
$this->error($User->getError());
}else{
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data);
if(strlen($data['username'])>16){$this->error('用户名太长!');}
$data['userpwd'] = md5($_POST['userpwd']);
$data['money'] = 0;
$config = F('basic','','./Web/Conf/');
if(intval(C('MAIL_REG')) == 1){
$data['is_lock'] = 1;
$body='点击或复制以下链接,激活您的账号:<br><a href="http://'.$_SERVER['HTTP_HOST'].'/'.U('Member/doactive',array('username'=>$data['username'])).'">http://'.$_SERVER['HTTP_HOST'].'/'.U('Member/doactive',array('username'=>$data['username'])).'</a>';
send_mail($data['email'], $config[sitetitle].'用户' , '用户注册激活邮件', $body);
$message ="恭喜你注册成功，但需要邮件激活，请登陆您的邮箱激活!";
}else{
$message = "注册成功,请登录~";
$data['is_lock'] = 0;
}

$data['group_id'] = intval($config['defaultmp']);
$data['addtime'] = time();
$User->add($data);
$this->assign('jumpUrl',U('Member/login'));
$this->success($message);
}
}
//找回密码
function find_password(){
if($_POST){
self::check_verify();
$_POST = array_map('strval',$_POST);
if(empty($_POST['username']) || empty($_POST['email']) || !preg_match("/^[\w\-\.]+@[\w\-\.]+(\.\w+)+$/", $_POST['email'])){$this->error('请输入用户名与注册邮件');}
$map['username'] = inject_check($_POST['username']);
$map['email'] = inject_check($_POST['email']);
$t = M('member')->where($map)->find();
  if(!$t){
  $this->error('用户名与邮件不匹配');
  }else{
  $map['hash'] = dami_encrypt(time());
  $map['addtime'] = time();
  M('find_password')->add($map);
  $url = 'http://'.$_SERVER['HTTP_HOST'].'/'.U('Member/reset_password',$map);
  $body="您在".date('Y-m-d H:i:s')."提交了找回密码请求。请点击下面的链接重置密码（48小时内有效）。<br><a href=\"{$url}\" target=\"_blank\">{$url}</a>";
  send_mail($t['email'], $t['email'].'用户' , '用户找回密码邮件', $body);
  $this->assign("waitSecond",30);
  $this->assign("jumpUrl",U('Member/login'));
  $this->success('找回密码成功！请在48小时内登陆邮箱重置密码!');
  }
}
else{
$this->display();
}
}
//重置密码
function reset_password(){
if($_REQUEST['email'] =='' || $_REQUEST['username'] =='' || $_REQUEST['hash'] =='' || $_REQUEST['addtime'] ==''){$this->errpr('URL参数不完整');}
$map['username'] = inject_check($_REQUEST['username']);
$map['email'] = inject_check($_REQUEST['email']);
$map['hash'] = inject_check($_REQUEST['hash']);
$map['addtime'] = inject_check($_REQUEST['addtime']);
$t = M('find_password')->where($map)->find();
if(!$t){$this->error('URL参数不正确');}else{
if( time > $t['addtime'] + 48*3600){$this->error('URL已经过期');M('find_password')->where('id='.$t['id'])->delete();}
}
if($_POST){
 if($_POST['newpwd']=='' || $_POST['newpwd'] != $_POST['newpwd2']){$this->error('密码不能为空，两次密码输入必须一致');}
 unset($map['hash']);
 unset($map['addtime']);
 M('member')->where($map)->setField('userpwd',md5($_POST['newpwd']));
 $this->assign("jumpUrl",U('Member/login'));
 $this->success('密码已经修改成功！请登陆');
}else{
$this->display();
}
}
//用户激活
function doactive(){
$username = inject_check($_REQUEST['username']);
$t = M('member')->where("username='{$username}' and last_uptime is null")->find();
if(!$t){
$this->error('邮件已过期或已经激活!');
}else{
$data['is_lock'] = 0;
$data['last_uptime'] = time();
M('member')->where("username='{$username}' and last_uptime is null")->save($data);
$this->assign('jumpUrl','http://'.$_SERVER['HTTP_HOST']);
$this->success('邮件激活，请登陆`');
}
}
//生成验证码
public function verify(){
		import('ORG.Util.Image');
		ob_end_clean();
		Image::buildImageVerify(5,1,'png',78,20,'verify');	
}
//验证验证码
private function check_verify(){
if (empty($_POST['verify']) && cookie('think_template') != 'w3g')
{
$this->error('验证码必须!');
}
if(md5($_POST['verify']) != $_SESSION['verify'] && cookie('think_template') != 'w3g')
{
$this->error('验证码错误!');
}
}
//个人资料修改
function main(){
self::is_login();
if($_POST){
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data);
unset($data['username']);//禁止修改用户名
unset($data['money']);//禁止修改money
unset($data['is_lock']);//禁止修改锁定状态
unset($data['group_id']);//禁止修改锁定状态
$data['id'] = $_SESSION['dami_uid'];
$User = D("Member"); // 实例化User对象
if (!$User->create()){
$this->error($User->getError());
}else{
$User->save($data);
$this->success('资料保存成功~');
}
}else{
$info = M('member')->where('id='.$_SESSION['dami_uid'])->find();
$this->assign('info',$info);
$this->display();
}
}
//修改密码
function changepwd(){
	self::is_login();
	if($_POST){
	if($_POST['oldpwd']==''){$this->error('请输入旧密码!');}
	if($_POST['newpwd']=='' || $_POST['newpwd'] != $_POST['newpwd2']){$this->error('密码输入不一致!');}
	$info = M('member')->where("id=".$_SESSION['dami_uid']." and userpwd='".md5($_POST['oldpwd'])."'")->find();
	if(!$info){$this->error('旧密码不正确!');}
	else{
	$data['id'] = $_SESSION['dami_uid'];
	$data['userpwd'] = md5($_POST['newpwd']);
	M('member')->save($data);
	unset($_SESSION['dami_uid']);
	unset($_SESSION['dami_username']);
	unset($_SESSION['dami_usericon']);
	unset($_SESSION['dami_uservail']);
	$this->assign('jumpUrl',U('Member/login'));
	$this->success('密码修改成功~,请重新登录!');
	}
	
	}else{
$this->display();	
	}
}
//投稿列表
function tougaolist(){
self::is_login();
$list = M('article')->where('dami_uid='.$_SESSION['dami_uid'])->select();
$this->assign('list',$list);
$this->display();
}

function modpage(){
self::is_login();
$aid = intval($_REQUEST['aid']);	
if($_POST){
$_POST = array_map('strval',$_POST);
$_POST['status'] =0;	
$_POST['title'] = htmlspecialchars(remove_xss($_POST['title']));
$_POST['content'] = htmlspecialchars(remove_xss($_POST['content']));
$arc = M('article');
if(C('TOKEN_ON') && !$arc->autoCheckToken($_POST)){$this->error(L('_TOKEN_ERROR_'));}//防止乱提交表单
$arc->where('dami_uid='.$_SESSION['dami_uid'].' and aid='.$aid)->save($_POST);	
$this->assign('jumpUrl',U('Member/tougaolist'));
$this->success('修改成功~,请等待审核!');
}else{
$info = M('article')->where('dami_uid='.$_SESSION['dami_uid'].' and aid='.$aid)->find();
if(!$info){$this->error('记录不存在');exit();}
self::pub_class($info['typeid']);
$this->assign('info',$info);
}
$this->display();
}
function delpage(){
self::is_login();
$aid = intval($_REQUEST['aid']);
M('article')->where('dami_uid='.$_SESSION['dami_uid'].' and status=0 and aid='.$aid)->delete();	
$this->success('删除成功!');
}
//用户投稿可以搞成游客投稿会员投稿只做简单演示表单按自己需求改进
function tougao(){
self::is_login();
if($_POST){
if (empty($_POST['verify']) && !check_wap())
{
$this->error('验证码必须!');
}
if(md5($_POST['verify']) != $_SESSION['verify'] && !check_wap())
{
$this->error('验证码错误!');
}
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data);
//过滤下标题
$data['title'] = htmlspecialchars($_POST['title']);
$data['content'] = htmlspecialchars($_POST['content']);
$data['status'] = 0;
$data['dami_uid'] = $_SESSION['dami_uid'];
$arc = M('article');
if(C('TOKEN_ON') && !$arc->autoCheckToken($_POST)){$this->error(L('_TOKEN_ERROR_'));}//防止乱提交表单
$arc->add($data);
$this->success('发布成功请等待管理员审核~');
	}else{
self::pub_class();	
$this->display();
	}
}
//订单列表
function buylist(){
$dao = D('TradeView');
$list = $dao->where('uid='.$_SESSION['dami_uid'])->select();
$this->assign('list',$list);
$this->display();
}
//提现
function tixian(){
self::is_login();
$money = floatval($_POST['money']);
if($_POST['your_email'] =='' || $money<=0 ){$this->error('提现参数有错误!');}
$have_money = M('member')->where('id='.$_SESSION['dami_uid'])->getField('money');
if(floatval($have_money) < $money){$this->error('提现金额大于您的余额,提现失败!');}
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data) ;
$data['status'] =0;
$data['uid'] =$_SESSION['dami_uid'];
$data['addtime'] = time();
$tx = M('tixian');
if(C('TOKEN_ON') && !$tx->autoCheckToken($_POST)){$this->error(L('_TOKEN_ERROR_'));}//防止乱提交表单
$tx->add($data);
unset($data);
$this->success('提现申请成功，等待2-3个工作日处理!');
}
 //公共分类
private function pub_class($type_value=0){
	$type = M('type');
	$oplist = $type->where('islink=0 and isuser=1')->field("typeid,typename,fid,concat(path,'-',typeid) as bpath")->group('bpath')->select();
		foreach($oplist as $k=>$v)
		{
		$check ='';
		if($v['typeid'] == $type_value){
		$check = 'selected="selected"';
		}
		
	
			if($v['fid'] == 0)
			{
				$count[$k]='';
			}
			else
			{
				for($i = 0;$i < count(explode('-',$v['bpath'])) * 2;$i++)
				{
					$count[$k].='&nbsp;';
				}
			}
			$op.="<option value=\"".$v['typeid']."\" $check>{$count[$k]}|-{$v['typename']}</option>";
		}
$this->assign('op',$op);
	}
//购物第一步:确认订单
function gobuy(){
self::is_login();
$info = M('member')->where('id='.$_SESSION['dami_uid'])->find();
$this->assign('uinfo',$info);
$iscart = $_REQUEST['iscart'];
if($iscart ==1){
import ('ORG.Util.Cart' );	
$cart = new Cart();
$list = $cart->contents();
foreach($list as $k=>$v){
if($v['id']){
$list[$k]['gtype'] = $v['option']['gtype'];	
$list[$k]['pic'] = $v['option']['pic'];	
}
}
}else{
$list = array(0=>$_REQUEST);
}
if(!$list){$this->error('您的购物为空，请先选择物品!');exit();}
$this->assign('list',$list);
$this->display();
}
//订单处理
function dobuy(){
self::is_login();
if(!$_POST){exit();}
if(!is_array($_POST['id'])){$this->error('您的购物为空!');exit();}
if($_POST['realname'] =='' || $_POST['tel']==''){$this->error('收货人信息为空!');exit();}
$trade_type = (int)$_POST['trade_type'];
$iscart = (int)$_POST['iscart'];
$group_trade_no = "GB".time()."-".$_SESSION['dami_uid'];
if($iscart ==1){
import ('ORG.Util.Cart' );	
$cart = new Cart();
$cart->destroy();
}
$_POST = array_map('remove_xss',$_POST);	
$trade = M('member_trade');
if(C('TOKEN_ON') && !$trade->autoCheckToken($_POST)){$this->error(L('_TOKEN_ERROR_'));}//防止乱提交表单
//循环出购物车 写进数据库
if($trade_type ==1){
$title='';
$subject='';
$total_fee =0;
$total_num =0;
for($i=0;$i<count($_POST['id']);$i++){
if(!is_numeric($_POST['id'][$i]) || !is_numeric($_POST['price'][$i]) || !is_numeric($_POST['qty'][$i])){continue;}
 $data['gid'] = $_POST['id'][$i];
 $data['uid'] = $_SESSION['dami_uid'];	
 $data['price'] = (float)M('article')->where('aid='.$data['gid'])->getField('price');//必须,信任客户端表单可以改写哈$_POST['price'][$i]
 $data['province'] = $_POST['province'];
 $data['city'] = $_POST['city'];
 $data['area'] = $_POST['area'];
 $data['sh_name'] = $_POST['realname'];
 $data['sh_tel'] = $_POST['tel'];
 $data['address'] = $_POST['address'];
 $data['group_trade_no'] = $group_trade_no;
 $data['out_trade_no'] = "DB".time()."-".$_SESSION['dami_uid'];	
 $data['servial'] = $_POST['gtype'][$i];
 $data['status'] = 0;
 $data['trade_type'] = 1;
 $data['addtime'] = time();
 $data['num'] = (int)$_POST['qty'][$i];
 $total_fee += ($data['num'] * $data['price'])*1; 
 $total_num += $data['num']; 
 $trade->add($data);
 if(strlen($subject)<200){$subject .= $_POST['name'][$i];}	
 if(strlen($title)<400){$title .= $_POST['name'][$i]."&nbsp;&nbsp;数量:".$data['num'].' 单价:'.$data['price'].'<br>';}	
}
if(intval(C('MAIL_TRADE'))==1){
$config = F('basic','','./Web/Conf/');
$user_name= $config[sitetitle].'管理员';
$subject= $config[sitetitle].'订单提醒';
$bodyurl='下单时间：'.date('Y-m-d H:i:s',time()).'<br>会员编号:'.$_SESSION['dami_uid'].'<br>姓名：'.$_POST['realname'].'<br>订单号：'.$group_trade_no.'<br>付款方式:支付宝在线交易<br>订购物件：<br>'.$title.'<br>总数量:'.$total_num.'<br>总金额:'.$total_fee.'元';
$sendto_email = C('MAIL_TOADMIN');
$email_port = C('MAIL_PORT');
send_mail($sendto_email, $user_name, $subject, $bodyurl,$email_port);
}
//构造支付宝表单并输出
$t_path = (intval(C('AP_TYPE')) == 1)?'ap_jishi':'ap_danbao';
$url = "http://".$_SERVER['HTTP_HOST'].__ROOT__."/Trade/".$t_path."/alipayapi.php";
$post_data = array ("WIDtotal_fee"=>$total_fee,"WIDsubject"=>$subject,"WIDreceive_name"=>$_POST['realname'],"WIDreceive_address"=>$_POST['address'],"WIDreceive_mobile"=>$_POST['tel'],"WIDreceive_phone"=>"","WIDout_trade_no"=>$group_trade_no,"WIDshow_url"=>"http://www.damicms.com/Public/donate","WIDbody"=>"","WIDreceive_zip"=>"","WIDseller_email"=>C("AP_EMAIL"));
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
$output = curl_exec($ch);
curl_close($ch);
echo $output;
}
else if($trade_type ==2){
//货到付款
$title='';
$total_fee =0;
$total_num =0;
for($i=0;$i<count($_POST['id']);$i++){
if(!is_numeric($_POST['id'][$i]) || !is_numeric($_POST['price'][$i]) || !is_numeric($_POST['qty'][$i])){continue;}
 $data['gid'] = $_POST['id'][$i];
 $data['uid'] = $_SESSION['dami_uid'];	
 $data['price'] = (float)M('article')->where('aid='.$data['gid'])->getField('price');//必须
 $data['province'] = $_POST['province'];
 $data['city'] = $_POST['city'];
 $data['area'] = $_POST['area'];
 $data['sh_name'] = $_POST['realname'];
 $data['sh_tel'] = $_POST['tel'];
 $data['address'] = $_POST['address'];
 $data['group_trade_no'] = $group_trade_no;
 $data['out_trade_no'] = "DB".time()."-".$_SESSION['dami_uid'];	
 $data['servial'] = $_POST['gtype'][$i];
 $data['status'] = 11;//等待付款,等待发货
 $data['trade_type'] = 2;
 $data['addtime'] = time();
 $data['num'] = (int)$_POST['qty'][$i];
 $total_fee += ($data['num'] * $data['price'])*1; 
 $total_num += $data['num'];
 $trade->add($data);
 if(strlen($title)<400){$title .= $_POST['name'][$i]."&nbsp;&nbsp;数量:".$data['num'].' 单价:'.$data['price'].'<br>';}	
}
if(intval(C('MAIL_TRADE'))==1){
$config = F('basic','','./Web/Conf/');
$user_name= $config[sitetitle].'管理员';
$subject= $config[sitetitle].'订单提醒';
$bodyurl='下单时间：'.date('Y-m-d H:i:s',time()).'<br>会员编号:'.$_SESSION['dami_uid'].'<br>姓名：'.$_POST['realname'].'<br>订单号：'.$group_trade_no.'<br>付款方式:货到付款<br>订购物件：<br>'.$title.'<br>总数量:'.$total_num.'<br>总金额:'.$total_fee.'元';
$sendto_email = C('MAIL_TOADMIN');
$email_port = C('MAIL_PORT');
send_mail($sendto_email, $user_name, $subject, $bodyurl,$email_port);
}
$this->assign('group_trade_no',$group_trade_no);
$this->display('buysuccess');
}
else if($trade_type ==3){
$title='';
$total_fee =0;
$total_num =0;
for($i=0;$i<count($_POST['id']);$i++){
$price = (float)M('article')->where('aid='.intval($_POST['id'][$i]))->getField('price');
if(!is_numeric($_POST['id'][$i]) || !is_numeric($_POST['price'][$i]) || !is_numeric($_POST['qty'][$i])){continue;}
$total_fee += (intval($_POST['qty'][$i]) * $price)*1;	
}
$have_money = M('member')->where('id='.$_SESSION['dami_uid'])->getField('money');
if($have_money < $total_fee){
$this->assign('jumpUrl',U('Member/chongzhi'));
$this->error('您的余额不足，请充值!');exit();
}
for($i=0;$i<count($_POST['id']);$i++){
if(!is_numeric($_POST['id'][$i]) || !is_numeric($_POST['price'][$i]) || !is_numeric($_POST['qty'][$i])){continue;}
 $data['gid'] = $_POST['id'][$i];
 $data['uid'] = $_SESSION['dami_uid'];	
 $data['price'] = (float)M('article')->where('aid='.$data['gid'])->getField('price');//必须
 $data['province'] = $_POST['province'];
 $data['city'] = $_POST['city'];
 $data['area'] = $_POST['area'];
 $data['sh_name'] = $_POST['realname'];
 $data['sh_tel'] = $_POST['tel'];
 $data['address'] = $_POST['address'];
 $data['group_trade_no'] = $group_trade_no;
 $data['out_trade_no'] = "DB".time()."-".$_SESSION['dami_uid'];	
 $data['servial'] = $_POST['gtype'][$i];
 $data['status'] = 1;//已付款等待发货
 $data['trade_type'] = 3;
 $data['addtime'] = time();
 $data['num'] = (int)$_POST['qty'][$i];
 $total_num += $data['num'];
 $trade->add($data);
 if(strlen($title)<400){$title .= $_POST['name'][$i]."&nbsp;&nbsp;数量:".$data['num'].' 单价:'.$data['price'].'<br>';}
}
//扣款
 M('member')->setDec('money','id='.$_SESSION['dami_uid'],$total_fee);
if(intval(C('MAIL_TRADE'))==1){
$config = F('basic','','./Web/Conf/');
$user_name= $config[sitetitle].'管理员';
$subject= $config[sitetitle].'订单提醒';
$bodyurl='下单时间：'.date('Y-m-d H:i:s',time()).'<br>会员编号:'.$_SESSION['dami_uid'].'<br>姓名：'.$_POST['realname'].'<br>订单号：'.$group_trade_no.'<br>付款方式:站内扣款<br>订购物件：<br>'.$title.'<br>总数量:'.$total_num.'<br>总金额:'.$total_fee.'元';
$sendto_email = C('MAIL_TOADMIN');
$email_port = C('MAIL_PORT');
send_mail($sendto_email, $user_name, $subject, $bodyurl,$email_port);
}
$this->assign('group_trade_no',$group_trade_no);
$this->display('buysuccess');
}
else{
$this->error('交易方式不确定!');exit();
}
}
//删除交易记录
function deltrade(){
$buyid = intval($_REQUEST['buyid']);
M('member_trade')->where('buy_id='.$buyid.' and uid='.$_SESSION['dami_uid'])->delete();
//echo M('member_trade')->getLastSql();
$this->success('删除成功!');
}
//QQ登陆	
function qqlogin(){
$lasturl =  urlencode(htmlspecialchars($_SERVER['HTTP_REFERER']));
$this->qqconfig['callback'] .= ('&lasturl='.$lasturl);
import('ORG.Util.Qqlogin');
$o_qq = Oauth_qq::getInstance($this->qqconfig);
$o_qq->login();	
}
function qqcallback(){
import('ORG.Util.Qqlogin');
$lasturl = urlencode(htmlspecialchars('http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI']));
$o_qq = Oauth_qq::getInstance($this->qqconfig);
$o_qq->callback();
$qid = $o_qq->get_openid();
if($qid != ''){
$info = M('member')->where("qid='$qid'")->find();
if($info){
//已经绑定帐号
$_SESSION['dami_uid'] = $info['id'];
$_SESSION['dami_username'] = $info['username'];
$_SESSION['dami_usericon'] = $info['icon'];
		if(!empty($_REQUEST['lasturl'])){
		$this->assign('jumpUrl',urldecode(htmlspecialchars($_REQUEST['lasturl'])));	
		}
		else{
		$this->assign('jumpUrl',U('Member/main'));
		}
		$this->success('登录成功~');
}else{
//首次绑定
$userinfo = $o_qq->get_user_info();
//print_r($userinfo);
$this->assign('userinfo',$userinfo);
$this->assign('qid',$qid);
$this->display();
}
}
}
//创建帐号
function qqcreate(){
$data = array_map('strval',$_POST);
$data = array_map('remove_xss',$data);
unset($data['money']);//禁止修改money
unset($data['is_lock']);//禁止修改锁定状态
if($data['realname']=='' || $data['qid']==''){$this->error('参数错误!');exit();}
$t = M('member')->where("username='".$data['realname']."'")->find();
if(!$t){
$data['username'] = $data['realname'];
}else{
$data['username'] = (string)time();
}
$data['userpwd'] = md5(time().rand(0,9999));
$User = D("Member"); // 实例化User对象
if (!$User->create()){
$this->error($User->getError());
}else{
$config = F('basic','','./Web/Conf/');
$data['group_id'] = intval($config['defaultmp']);
$uid = M('member')->add($data);
$_SESSION['dami_uid'] = $uid;
$_SESSION['dami_username'] = $data['username'];
$_SESSION['dami_usericon'] = $data['icon'];
$_SESSION['dami_uservail'] =  get_field('member_group','group_id='.$data['group_id'],'group_vail');
if(!empty($_REQUEST['lasturl'])){
		$this->assign('jumpUrl',urldecode(htmlspecialchars($_REQUEST['lasturl'])));	
}else{
$this->assign('jumpUrl',U('Member/main'));
}
$this->success('绑定成功,正在登陆~');	
}
}
//绑定帐号
function qqupdate(){
$username= remove_xss(inject_check($_POST['username']));
$userpwd= remove_xss($_POST['userpwd']);
$qid = remove_xss($_POST['qid']);
$icon = remove_xss($_POST['icon']);
if($username=='' || $userpwd=='' || $qid==''){$this->error('请输入用户名和密码?');exit();}
$info = M('member')->where("username='{$username}' and is_lock=0")->find();
if(!$info){$this->error('用户不存在或已经禁止登陆!');}
else
{
	if($info['userpwd'] != md5($userpwd)){
		$this->error('密码错误，绑定失败!');
		}else{
		$_SESSION['dami_uid'] = $info['id'];
		$_SESSION['dami_username'] = $info['username'];
		$_SESSION['dami_usericon'] = $icon;
		$_SESSION['dami_uservail'] =  get_field('member_group','group_id='.$info['group_id'],'group_vail');
		if($info['icon']==''){
		M('member')->where("username='{$username}' and is_lock=0")->setField(array('qid','icon'),array($qid,$icon));
		}else{
		M('member')->where("username='{$username}' and is_lock=0")->setField('qid',$qid);
		}
		if(!empty($_REQUEST['lasturl'])){
		$this->assign('jumpUrl',urldecode(htmlspecialchars($_REQUEST['lasturl'])));	
		}
		else{
		$this->assign('jumpUrl',U('Member/main'));
		}
		$this->success('绑定成功,正在登陆~');		
	}
}
}
//类结束
}