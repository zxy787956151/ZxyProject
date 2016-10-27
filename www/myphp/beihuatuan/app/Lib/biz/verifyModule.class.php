<?php
// +----------------------------------------------------------------------
// | Fanwe 方维o2o商业系统
// +----------------------------------------------------------------------
// | Copyright (c) 2011 http://www.fanwe.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: 云淡风轻(88522820@qq.com)
// +----------------------------------------------------------------------


class verifyModule extends BizBaseModule
{
	public function __construct()
	{
		parent::__construct();
		$this->check_auth();
	}
	public function index()
	{				
		$s_account_info = es_session::get("account_info");
		$account_id = intval($s_account_info['id']);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['VERIFY_COUPON']);
		$GLOBALS['tmpl']->display("biz/biz_verify.html");
	}
	
	
	
	public function check_coupon()
	{
		$s_account_info = es_session::get("account_info");
		if(intval($s_account_info['id'])==0)
		{
			$result['status'] = 2;
			ajax_return($result);
		}
		else
		{
			$now = get_gmtime();
			$sn = htmlspecialchars(addslashes(trim($_REQUEST['coupon_sn'])));
			$pwd = htmlspecialchars(addslashes(trim($_REQUEST['coupon_pwd'])));
			$supplier_id = intval($s_account_info['supplier_id']);
			$coupon_data = $GLOBALS['db']->getRow("select c.refund_status, c.id as id,c.deal_id,c.is_valid,doi.name as name,doi.number as number, c.sn as sn,c.supplier_id as supplier_id,c.confirm_time as confirm_time from ".DB_PREFIX."deal_coupon as c left join ".DB_PREFIX."deal_order_item as doi on c.order_deal_id = doi.id where c.sn = '".$sn."' and c.password = '".$pwd."' and c.is_valid in(1,2) and c.is_delete = 0  and c.begin_time <".$now." and (c.end_time = 0 or c.end_time>".$now.")"); 
			if($coupon_data)
			{
				if($coupon_data['is_valid'] == 2){
					$result['status'] = 0;
					$result['msg'] = $GLOBALS['lang']['COUPON_IS_VALID_2'];
					ajax_return($result);
				}
				
				if($coupon_data['refund_status'] > 0){
					$result['status'] = 0;
					$result['msg'] = "团购券提交了退款申请，无法验证";
					ajax_return($result);
				}
				
				$sql = "select d.* from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_location_link as l on l.deal_id = d.id where l.deal_id = ".$coupon_data['deal_id']." and l.location_id in (".implode(",",$s_account_info['location_ids']).")";
				$deal_info = $GLOBALS['db']->getRow($sql);
				if(!$deal_info)
				{
					$result['status'] = 0;
					$result['msg'] = $GLOBALS['lang']['NO_AUTH'];
					ajax_return($result);
				}
				if(!$coupon_data['name'])$coupon_data['name'] = $deal_info['name'];
				
				if($coupon_data['supplier_id']!=$supplier_id)
				{
					$result['status'] = 0;
					$result['msg'] = $GLOBALS['lang']['COUPON_INVALID_SUPPLIER'];
					ajax_return($result);
				}
				elseif($coupon_data['confirm_time'] > 0)
				{
					$result['status'] = 0;
					$result['msg'] = sprintf($GLOBALS['lang']['COUPON_INVALID_USED'],to_date($coupon_data['confirm_time']));
					ajax_return($result);
				}
				else
				{
					$deal_type = intval($GLOBALS['db']->getOne("select deal_type from ".DB_PREFIX."deal where id = ".intval($coupon_data['deal_id'])));
					$result['status'] = 1;					
					if($deal_type == 1)
					{
						$result['msg'] = $coupon_data['name']."(购买数量：".$coupon_data['number'].")";
					}
					else
					{
						$result['msg'] = $coupon_data['name'];
					}
					ajax_return($result);
				}
			}
			else
			{				
				$result['status'] = 0;
				$result['msg'] = $GLOBALS['lang']['COUPON_INVALID'];
				ajax_return($result);
			}
		}
	}
	
	
	public function use_coupon()
	{
		$s_account_info = es_session::get("account_info");
		if(intval($s_account_info['id'])==0)
		{
			$result['status'] = 0;
			$result['msg'] = "请先登录";
			ajax_return($result);
		}
		else
		{
			$now = get_gmtime();
			$sn = htmlspecialchars(addslashes(trim($_REQUEST['coupon_sn'])));
			$pwd = htmlspecialchars(addslashes(trim($_REQUEST['coupon_pwd'])));
			$supplier_id = intval($s_account_info['supplier_id']);
			$coupon_data = $GLOBALS['db']->getRow("select c.refund_status,c.is_valid,c.id as id,c.deal_id,doi.name as name,doi.number as number,c.sn as sn,c.supplier_id as supplier_id,c.confirm_time as confirm_time from ".DB_PREFIX."deal_coupon as c left join ".DB_PREFIX."deal_order_item as doi on c.order_deal_id = doi.id where c.sn = '".$sn."' and c.password = '".$pwd."' and c.is_valid = 1 and c.is_delete = 0  and c.begin_time <".$now." and (c.end_time = 0 or c.end_time>".$now.")"); 
			if($coupon_data)
			{
				$sql = "select d.* from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_location_link as l on l.deal_id = d.id where l.deal_id = ".$coupon_data['deal_id']." and l.location_id in (".implode(",",$s_account_info['location_ids']).")";
				$deal_info = $GLOBALS['db']->getRow($sql);
				if(!$deal_info)
				{
					$result['status'] = 0;
					$result['msg'] = $GLOBALS['lang']['NO_AUTH'];
					ajax_return($result);
				}
				
				if($coupon_data['supplier_id']!=$supplier_id)
				{
					$result['status'] = 0;
					$result['msg'] = $GLOBALS['lang']['COUPON_INVALID_SUPPLIER'];
					ajax_return($result);
				}
				elseif($coupon_data['confirm_time'] > 0)
				{
					$result['status'] = 0;
					$result['msg'] = sprintf($GLOBALS['lang']['COUPON_INVALID_USED'],to_date($coupon_data['confirm_time']));
					ajax_return($result);
				}
				elseif($coupon_data['refund_status'] > 0)
				{
					$result['status'] = 0;
					$result['msg'] = "团购券提交了退款申请，无法验证";
					ajax_return($result);
				}
				else
				{
					//开始确认
					$GLOBALS['db']->query("update ".DB_PREFIX."deal_coupon set confirm_account = ".intval($s_account_info['id']).",confirm_time=".$now." where id = ".intval($coupon_data['id']));
					$result['status'] = 1;
					
					$deal_type = intval($GLOBALS['db']->getOne("select deal_type from ".DB_PREFIX."deal where id = ".intval($coupon_data['deal_id'])));			
					if($deal_type == 1)
					{
						$result['msg'] = $coupon_data['name']."(购买数量：".$coupon_data['number'].")".sprintf($GLOBALS['lang']['COUPON_USED_OK'],to_date($now));;
					}
					else
					{
						$result['msg'] = $coupon_data['name'].sprintf($GLOBALS['lang']['COUPON_USED_OK'],to_date($now));;
					}
					
					send_use_coupon_sms(intval($coupon_data['id'])); //发送团购券确认消息
					send_use_coupon_mail(intval($coupon_data['id'])); //发送团购券确认消息
					
					update_balance($coupon_data['id'],$coupon_data['deal_id']);					
					ajax_return($result);
				}
			}
			else
			{				
				$result['status'] = 0;
				$result['msg'] = $GLOBALS['lang']['COUPON_INVALID'];
				ajax_return($result);
			}
		}
	}
	
	
	public function youhui()
	{
		$s_account_info = es_session::get("account_info");
		$account_id = intval($s_account_info['id']);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['YOUHUI_VERIFY']);
		$GLOBALS['tmpl']->display("biz/biz_verify_youhui.html");		
	}
	
	
	
	public function check_youhui()
	{
		
		$s_account_info = es_session::get("account_info");
		if(intval($s_account_info['id'])==0)
		{
			$result['status'] = 0;
			$result['info'] = $GLOBALS['lang']['SUPPLIER_NOT_LOGIN'];
			ajax_return($result);
		}
		
		$now = get_gmtime();
		$sn = htmlspecialchars(addslashes(trim($_REQUEST['youhui_sn'])));
		$youhui_log = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."youhui_log where youhui_sn = '".$sn."'");
		
		if($youhui_log)
		{
			$sql = "select y.* from ".DB_PREFIX."youhui as y left join ".DB_PREFIX."youhui_location_link as l on l.youhui_id = y.id where l.youhui_id = ".$youhui_log['youhui_id']." and l.location_id in (".implode(",",$s_account_info['location_ids']).")";
			$youhui_info = $GLOBALS['db']->getRow($sql);
			if(!$youhui_info)
			{
				$result['status'] = 0;
				$result['info'] = $GLOBALS['lang']['NO_AUTH'];
				ajax_return($result);
			}
			if($youhui_log['confirm_id']>0&&$youhui_log['confirm_time']>0)
			{
				$result['status'] = 0;
				$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_HAS_USED'],to_date($youhui_log['confirm_time']));
			}
			else
			{
				$youhui_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."youhui where id = ".$youhui_log['youhui_id']);
				if($youhui_data)
				{
					if($youhui_data['begin_time']>0&&$youhui_data['begin_time']>$now)
					{
						$result['status'] = 0;
						$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_NOT_BEGIN'],to_date($youhui_data['begin_time']));
					}
					elseif($youhui_data['end_time']>0&&$youhui_data['end_time']<$now)
					{
						$result['status'] = 0;
						$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_HAS_END'],to_date($youhui_data['end_time']));
					}
					else
					{
						$result['status'] = 1;
						$youhui_log['youhui_data'] = $youhui_data;
						$result['data'] = $youhui_log;
						$result['info'] = $youhui_data['name']."[".$GLOBALS['lang']['YOUHUI_SN'].":".$youhui_log['youhui_sn']."]".$GLOBALS['lang']['IS_VALID_YOUHUI'];
						if($youhui_log['order_count']>0)
						$result['info'].="\n".$GLOBALS['lang']['YOUHUI_ORDER_COUNT'].":".$youhui_log['order_count'].$GLOBALS['lang']['ORDER_COUNT_PERSON'];
						if($youhui_log['is_private_room'])
						$result['info'].="(".$GLOBALS['lang']['IS_PRIVATE_ROOM'].")";
						if($youhui_log['date_time']>0)
						$result['info'].="\n".$GLOBALS['lang']['ORDER_DATE_TIME'].":".to_date($youhui_log['date_time'],"Y-m-d H:i");
						$result['info'].="\n".$GLOBALS['lang']['CONFIRM_USE_YOUHUI'];
					}
				}
				else
				{
					$result['status'] = 0;
					$result['info'] = $GLOBALS['lang']['YOUHUI_INVALID'];
				}
			}
		}
		else
		{
			$result['status'] = 0;
			$result['info'] = $GLOBALS['lang']['YOUHUI_SN_INVALID'];
		}
		ajax_return($result);
	}
	
	public function use_youhui()
	{
		$s_account_info = es_session::get("account_info");
		if(intval($s_account_info['id'])==0)
		{
			$result['status'] = 0;
			$result['info'] = $GLOBALS['lang']['SUPPLIER_LOGIN_FIRST'];
		}
		else
		{
			$now = get_gmtime();
			$sn = htmlspecialchars(addslashes(trim($_REQUEST['youhui_sn'])));
			$total_fee = intval(htmlspecialchars(addslashes(trim($_REQUEST['total_fee']))));
			
			$youhui_log = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."youhui_log where youhui_sn = '".$sn."'");
			if($youhui_log)
			{
				$sql = "select y.* from ".DB_PREFIX."youhui as y left join ".DB_PREFIX."youhui_location_link as l on l.youhui_id = y.id where l.youhui_id = ".$youhui_log['youhui_id']." and l.location_id in (".implode(",",$s_account_info['location_ids']).")";
				$youhui_info = $GLOBALS['db']->getRow($sql);
				if(!$youhui_info)
				{
					$result['status'] = 0;
					$result['info'] = $GLOBALS['lang']['NO_AUTH'];
					ajax_return($result);
				}
				if($youhui_log['confirm_id']>0&&$youhui_log['confirm_time']>0)
				{
					$result['status'] = 0;
					$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_HAS_USED'],to_date($youhui_log['confirm_time']));
				}
				else
				{
					$youhui_data = $GLOBALS['db']->getRow("select * from ".DB_PREFIX."youhui where id = ".$youhui_log['youhui_id']);
					if($youhui_data)
					{
						if($youhui_data['begin_time']>0&&$youhui_data['begin_time']>$now)
						{
							$result['status'] = 0;
							$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_NOT_BEGIN'],to_date($youhui_data['begin_time']));
						}
						elseif($youhui_data['end_time']>0&&$youhui_data['end_time']<$now)
						{
							$result['status'] = 0;
							$result['info'] = sprintf($GLOBALS['lang']['YOUHUI_HAS_END'],to_date($youhui_data['end_time']));
						}
						else
						{
							$youhui_log['confirm_id'] = $s_account_info['id'];
							$youhui_log['confirm_time'] = $now;
							$youhui_log['total_fee'] = $total_fee;
							$GLOBALS['db']->autoExecute(DB_PREFIX."youhui_log", $youhui_log, $mode = 'UPDATE', $where = 'id='.$youhui_log['id'], $querymode = 'SILENT');
							//更新优惠总金额
							$youhui_content['total_fee']=$youhui_data['total_fee']+$total_fee;
							$GLOBALS['db']->autoExecute(DB_PREFIX."youhui", $youhui_content, $mode = 'UPDATE', $where = 'id='.$youhui_data['id'], $querymode = 'SILENT');
							
							require_once APP_ROOT_PATH."system/libs/user.php";
							$data = array(
								"money" => $youhui_data['return_money'],
								"score" => $youhui_data['return_score'],
								"point" => $youhui_data['return_point']
							);
							modify_account($data,$youhui_log['user_id'],$youhui_data['name']."已验证消费");
							
							$result['status'] = 1;
							$youhui_log['youhui_data'] = $youhui_data;
							$result['data'] = $youhui_log;
						}
					}
					else
					{
						$result['status'] = 0;
						$result['info'] = $GLOBALS['lang']['YOUHUI_INVALID'];
					}
				}
			}
			else
			{
				$result['status'] = 0;
				$result['info'] = $GLOBALS['lang']['YOUHUI_SN_INVALID'];
			}
			ajax_return($result);
		}
	}
	
	//批量验证消费劵
	public function batch(){
		$s_account_info = es_session::get("account_info");
		$sql="select DISTINCT(dc.deal_id),d.sub_name from ".DB_PREFIX."deal_coupon as dc left join ".DB_PREFIX."deal as d on dc.deal_id=d.id where dc.supplier_id=".$s_account_info['supplier_id'];
		$coupon_list=$GLOBALS['db']->getAll($sql);
		$sql="select id,name from ".DB_PREFIX."supplier_location where supplier_id=".$s_account_info['supplier_id'];
		$supplier_location_list=$GLOBALS['db']->getAll($sql);
		$GLOBALS['tmpl']->assign('coupon_list',$coupon_list);
		$GLOBALS['tmpl']->assign('supplier_location_list',$supplier_location_list);
		$GLOBALS['tmpl']->assign("page_title",$GLOBALS['lang']['YOUHUI_VERIFY']);
		$GLOBALS['tmpl']->display("biz/biz_verify_batch.html");
	}
	public function add_coupon(){
		$s_account_info = es_session::get("account_info");
		$supplier_id = $s_account_info['supplier_id'];
		$coupon_pw=trim($_REQUEST['coupon_pw']);
		$sql="select * from ".DB_PREFIX."deal_coupon where password="."'$coupon_pw' and supplier_id = ".$supplier_id;	
		$deal_coupon=$GLOBALS['db']->getRow($sql);
		if($deal_coupon)
		{
		$order_item = $GLOBALS['db']->getRow("select name,sub_name from ".DB_PREFIX."deal_order_item where id = ".$deal_coupon['order_deal_id']);
		$deal_coupon['sub_name'] = $order_item['sub_name'];
		$deal_coupon['name'] = $order_item['name'];
		$GLOBALS['tmpl']->assign('deal_coupon',$deal_coupon);
		$html = $GLOBALS['tmpl']->fetch("biz/add_coupon.html");
		header("Content-Type:text/html; charset=utf-8");
		echo $html;
		}
	}
	
	public function check_coupon_batch()
	{
				
		$s_account_info = es_session::get("account_info");
		if(intval($s_account_info['id'])==0)
		{
			$res['status'] = 0;
			ajax_return($res);
		}
		else
		{
			$now = get_gmtime();
			$supplier_id = intval($s_account_info['supplier_id']);
			$temp=explode(",",$_REQUEST['code']);
			
			$k=0;
			foreach($temp as $v){
				$coupon=explode('-',$v);
				$deal_id=$coupon['0'];
				$sn=$coupon['1'];
				$pwd=$coupon['2'];
				$coupon_data = $GLOBALS['db']->getRow("select c.refund_status,c.begin_time,c.end_time, c.id as id,c.is_valid,c.deal_id,doi.name as name,doi.sub_name as sub_name,c.password as password,doi.number as number,c.sn as sn,c.supplier_id as supplier_id,c.confirm_time as confirm_time from ".DB_PREFIX."deal_coupon as c left join ".DB_PREFIX."deal_order_item as doi on c.order_deal_id = doi.id where c.sn = '".$sn."' and c.password = '".$pwd."' and c.is_valid in(1,2) and c.is_delete = 0 "); 
				if($coupon_data)
				{
					if($coupon_data['is_valid'] == 2){//改团购劵因为退款被锁定
						$result[$k]['msg'] = $GLOBALS['lang']['COUPON_IS_VALID_2'];
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					
					if($coupon_data['refund_status'] > 0){
						$result[$k]['msg'] = "团购券提交了退款申请，无法验证";
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					
				if($coupon_data['begin_time']>0&&$coupon_data['begin_time']>get_gmtime()){//未启用
						$result[$k]['msg'] = "团购券未生效";
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					if($coupon_data['end_time']>0&&$coupon_data['end_time']<get_gmtime()){//过期
						$result[$k]['msg'] = "团购券已过期";
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					
					$sql = "select d.* from ".DB_PREFIX."deal as d left join ".DB_PREFIX."deal_location_link as l on l.deal_id = d.id where l.deal_id = ".$coupon_data['deal_id']." and l.location_id in (".implode(",",$s_account_info['location_ids']).")";
					$deal_info = $GLOBALS['db']->getRow($sql);
					if(!$deal_info)
					{
						$result[$k]['msg'] = $GLOBALS['lang']['NO_AUTH'];
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					
					if($coupon_data['supplier_id']!=$supplier_id)
					{
						$result[$k]['msg'] = $GLOBALS['lang']['COUPON_INVALID_SUPPLIER'];
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					elseif($coupon_data['confirm_time'] > 0)
					{
						$result[$k]['msg'] = sprintf($GLOBALS['lang']['COUPON_INVALID_USED'],to_date($coupon_data['confirm_time']));
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=0;
						$k++;
						continue;
					}
					else
					{
						//开始确认
						$GLOBALS['db']->query("update ".DB_PREFIX."deal_coupon set confirm_account = ".intval($s_account_info['id']).",confirm_time=".$now." where id = ".intval($coupon_data['id']));
						$result[$k]['msg']=$GLOBALS['lang']['COUPON_SUCCESS'];;
						$result[$k]['deal_id']=$deal_id;
						$result[$k]['id'] = $coupon_data['id'];
						$result[$k]['name'] = $coupon_data['name'];
						$result[$k]['sub_name'] = $coupon_data['sub_name'];
						$result[$k]['password'] = $coupon_data['password'];
						$result[$k]['sn']=$sn;
						$result[$k]['status']=1;
						$k++;
//						$deal_type = intval($GLOBALS['db']->getOne("select deal_type from ".DB_PREFIX."deal where id = ".intval($coupon_data['deal_id'])));			
//						if($deal_type == 1)
//						{
//							$result['msg'] = $coupon_data['name']."(购买数量：".$coupon_data['number'].")".sprintf($GLOBALS['lang']['COUPON_USED_OK'],to_date($now));;
//						}
//						else
//						{
//							$result['msg'] = $coupon_data['name'].sprintf($GLOBALS['lang']['COUPON_USED_OK'],to_date($now));;
//						}
						
						send_use_coupon_sms(intval($coupon_data['id'])); //发送团购券确认消息
						send_use_coupon_mail(intval($coupon_data['id'])); //发送团购券确认消息
						
						update_balance($coupon_data['id'],$coupon_data['deal_id']);					
						continue;
					}
				}
				else
				{				
					$result[$k]['msg'] = $GLOBALS['lang']['COUPON_INVALID'];
					$result[$k]['deal_id']=$deal_id;
					$result[$k]['sn']=$sn;
					$result[$k]['id'] =0;
					$result[$k]['name'] = '-';
					$result[$k]['sub_name'] = '-';
					$result[$k]['password'] = '';
					$result[$k]['status']=0;
					$k++;
					continue;
				}
				
			}
			$GLOBALS['tmpl']->assign('result',$result);
			$html = $GLOBALS['tmpl']->fetch("biz/user_coupon_batch_reult.html");
			$res['status']=1;
			$res['html']=$html;
			header("Content-Type:text/html; charset=utf-8");
			ajax_return($res);
		}
	}
}
?>