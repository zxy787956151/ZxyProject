<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
  		<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<link rel="shortcut icon" href="favicon.ico"/>
      	<meta http-equiv="cache-control" content="no-cache">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<title>订单信息 - <?php echo ($CONF['mallTitle']); ?></title>
      	<meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>,订单信息" />
      	<meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,订单信息" />
      	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/common.css" />
     	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/checkorderinfo.css" />
     	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/base.css" />
		<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/head.css" />
   	</head>
   	<body>
	<script src="/wstmall_v1.4.4_160308/Public/js/jquery.min.js"></script>
<script src="/wstmall_v1.4.4_160308/Public/plugins/lazyload/jquery.lazyload.min.js?v=1.9.1"></script>
<script type="text/javascript">
var WST = ThinkPHP = window.Think = {
        "ROOT"   : "/wstmall_v1.4.4_160308",
        "APP"    : "/wstmall_v1.4.4_160308/index.php",
        "PUBLIC" : "/wstmall_v1.4.4_160308/Public",
        "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>",
        "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        "DOMAIN" : "<?php echo WSTDomain();?>",
        "CITY_ID" : "<?php echo ($currArea['areaId']); ?>",
        "CITY_NAME" : "<?php echo ($currArea['areaName']); ?>",
        "DEFAULT_IMG": "<?php echo WSTDomain();?>/<?php echo ($CONF['goodsImg']); ?>",
        "MALL_NAME" : "<?php echo ($CONF['mallName']); ?>",
        "SMS_VERFY"  : "<?php echo ($CONF['smsVerfy']); ?>",
        "PHONE_VERFY"  : "<?php echo ($CONF['phoneVerfy']); ?>",
        "IS_LOGIN" :"<?php echo ($WST_IS_LOGIN); ?>"
}
    $(function() {
    	$('.lazyImg').lazyload({ effect: "fadeIn",failurelimit : 10,threshold: 200,placeholder:WST.DEFAULT_IMG});
    });
</script>
<script src="/wstmall_v1.4.4_160308/Public/js/think.js"></script>
<div id="wst-shortcut">
	<div class="w">
		<ul class="fl lh">
			<li class="fore1 ld"><b></b><a href="javascript:addToFavorite()"
				rel="nofollow">收藏<?php echo ($CONF['mallName']); ?></a></li><s></s>
			<li class="fore3 ld menu" id="app-jd" data-widget="dropdown">
				<span class="outline"></span> <span class="blank"></span> 
				<a href="#" target="_blank"><img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/icon_top_02.png"/>&nbsp;<?php echo ($CONF['mallName']); ?> 手机版</a>
			</li>
			<li class="fore4" id="biz-service" data-widget="dropdown" style='padding:0;'>&nbsp;<s></s>&nbsp;&nbsp;&nbsp;
				所在城市
				【<span class='wst-city'>&nbsp;<?php echo ($currArea["areaName"]); ?>&nbsp;</span>】
				<img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/icon_top_03.png"/>	
				&nbsp;&nbsp;<a href="javascript:;" onclick="toChangeCity();">切换城市</a><i class="triangle"></i>
			</li>
		</ul>
	
		<ul class="fr lh" style='float:right;'>
			<li class="fore1" id="loginbar"><a href="<?php echo U('Home/Orders/queryByPage');?>"><span style='color:blue'><?php echo ($WST_USER['loginName']); ?></span></a> 欢迎您来到 <a href='<?php echo WSTDomain();?>'><?php echo ($CONF['mallName']); ?></a>！<s></s>&nbsp;
			<span>
				<?php if(!$WST_USER['userId']): ?><a href="<?php echo U('Home/Users/login');?>">[登录]</a>
				<a href="<?php echo U('Home/Users/regist');?>"	class="link-regist">[免费注册]</a><?php endif; ?>
				<?php if($WST_USER['userId'] > 0): ?><a href="javascript:logout();">[退出]</a><?php endif; ?>
			</span>
			</li>
			<li class="fore2 ld"><s></s>
			<?php if(session('WST_USER.userId')>0){ ?>
				<?php if(session('WST_USER.userType')==0){ ?>
				    <a href="<?php echo U('Home/Shops/toOpenShopByUser');?>" rel="nofollow">我要开店</a>
				<?php }else{ ?>
				    <?php if(session('WST_USER.loginTarget')==0){ ?>
				        <a href="<?php echo U('Home/Shops/index');?>" rel="nofollow">卖家中心</a>
				    <?php }else{ ?>
				        <a href="<?php echo U('Home/Users/index');?>" rel="nofollow">买家中心</a>
				    <?php } ?>
				<?php } ?>
			<?php }else{ ?>
			    <a href="<?php echo U('Home/Shops/toOpenShop');?>" rel="nofollow">我要开店</a>
			<?php } ?>
			</li>
		</ul>
		<span class="clr"></span>
	</div>
</div>

<div style="height:132px;">
<div id="mainsearchbox" style="text-align:center;">
	<div id="wst-search-pbox">
		<div style="float:left;width:240px;" class="wst-header-car">
		  <a href='<?php echo WSTDomain();?>'>
			<img id="wst-logo" width='240' height='132' src="<?php echo WSTDomain();?>/<?php echo ($CONF['mallLogo']); ?>"/>
		  </a>	
		</div>
		<div id="wst-search-container">
			<div id="wst-search-type-box">
				<input id="wst-search-type" type="hidden" value="<?php echo ($searchType); ?>"/>
				<div id="wst-panel-goods" class="<?php if($searchType == 1): ?>wst-panel-curr<?php else: ?>wst-panel-notcurr<?php endif; ?>">商品</div>
				<div id="wst-panel-shop" class="<?php if($searchType == 2): ?>wst-panel-curr<?php else: ?>wst-panel-notcurr<?php endif; ?>">店铺</div>
				<div class="wst-clear"></div>
			</div>
			<div id="wst-searchbox">
				<input id="keyword" class="wst-search-keyword" data="wst_key_search" onkeyup="getSearchInfo(this,event);" placeholder="<?php if($searchType == 2): ?>搜索 店铺<?php else: ?>搜索 商品<?php endif; ?>" autocomplete="off"  value="<?php echo ($keyWords); ?>">
				<div id="btnsch" class="wst-search-button">搜&nbsp;索</div>
				<div id="wst_key_search_list" style="position:absolute;top:38px;left:-1px;border:1px solid #b8b8b8;min-width:567px;display:none;background-color:#ffffff;z-index:1000;">dfdf</div>
			</div>
			<div id="wst-hotsearch-keys">
				<?php if(is_array($CONF['hotSearchs'])): $k = 0; $__LIST__ = $CONF['hotSearchs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Home/goods/getGoodsList',array('keyWords'=>$vo));?>"><?php echo ($vo); ?></a><?php if($k < count($CONF['hotSearchs'])): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div id="wst-search-des-container">
			<div class="des-box">
				<div class='wst-reach'>
					<img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/sadn.jpg"  height="38" width="40"/>
					<div style="float:left;position:absolute;top:0px;left:38px;"><span style="font-weight:bolder;">闪电配送</span><br/><span style="color:#e23c3d;">最快1小时送达</span></div>
				</div>
				<div class='wst-since'>
					<img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/sqzt.jpg"  height="38" width="40"/>
					<div style="float:left;position:absolute;top:0px;left:38px;"><span style="font-weight:bolder;">社区自提</span><br/><span style="color:#e23c3d;">330家自提点</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="headNav">
		  <div class="navCon w1020">
		  	<div class="wst-slide-controls">
		  		<?php if(is_array($indexAds)): $k = 0; $__LIST__ = $indexAds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == 1): ?><span class="curr"><?php echo ($k); ?></span>
		  		  	<?php else: ?>
		  		    	<span class=""><?php echo ($k); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
		    <div class="navCon-cate fl navCon_on" >
		      <div class="navCon-cate-title"> <a href="<?php echo U('Home/goods/getGoodsList');?>">全部商品分类</a></div>
		      
		      	<?php if($ishome == 1): ?><div class="cateMenu1" >
		      	<?php else: ?>
		      		<div class="cateMenu2" style="display:none;" ><?php endif; ?>
		        <div id="wst-nvg-cat-box" style="position:relative;">
		        	<div class="wst-nvgbk" style="diplay:none;"></div>
		        	<?php $_result=WSTGoodsCats();if(is_array($_result)): $k1 = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if($k1 < 7): ?><li class="wst-nvg-cat-nlt6" style="border-top: none;" >
				    	<?php else: ?>
				    	<li class="wst-nvg-cat-gt6" style="border-top: none;display:none;" ><?php endif; ?>
				    	<div>
				            <div class="cate-tag"> 
				            <div class="listModel">
				             <p > 
				            	<strong><s<?php echo ($k1); ?>></s<?php echo ($k1); ?>>&nbsp;<a style="font-weight:bold;" href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId']));?>"><?php echo ($vo1["catName"]); ?></a></strong>
				             </p> 
				             </div>
				              <div class="listModel">
				                <p> 
				                <?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId']));?>"><?php echo ($vo2["catName"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				                </p>
				              </div>
				            </div>
				            <div class="list-item hide">
				              <ul class="itemleft">
				              	<?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><dl>
				                  <dt><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId']));?>"><?php echo ($vo2["catName"]); ?></a></dt>
				                  <dd> 
				                  <?php if(is_array($vo2['catChildren'])): $k3 = 0; $__LIST__ = $vo2['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($k3 % 2 );++$k3;?><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId'],'c3Id'=>$vo3['catId']));?>"><?php echo ($vo3["catName"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				                  </dd>
				                </dl>
				                <div class="fn-clear"></div><?php endforeach; endif; else: echo "" ;endif; ?>
				              </ul>
				            </div>
				            </div>
				  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		          	
		          	<li style="display:none;"></li>
		        </div>
		      </div>
		    </div>
		    
		    <div class="navCon-menu fl">
		      <ul class="fl">
		        <?php $_result=WSTNavigation(0);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><li ><a href="<?php echo ($vo['navUrl']); ?>" <?php if($vo['isOpen'] == 1): ?>target="_blank"<?php endif; ?> <?php if($vo['active'] == 1): ?>class="curMenu"<?php endif; ?>>&nbsp;&nbsp;<?php echo ($vo['navTitle']); ?>&nbsp;&nbsp;</a></li><?php endforeach; endif; else: echo "" ;endif; ?>
		      </ul>
		    </div>
		    <li id="wst-nvg-cart">
		    	<div class='wst-nvg-cart-cost'>
		       		&nbsp;<span class="wst-nvg-cart-cnt">0</span>件&nbsp;|&nbsp;<span class="wst-nvg-cart-price">0.00</span>元
		       	</div>
			</li>
			<div class="wst-cart-box"><div class="wst-nvg-cart-goods">购物车中暂无商品</div></div>
		  </div>
		</div>
		<script>
		$(function(){
			checkCart();
		});
		</script>
	<div class="w">
        <div style=""><br/>
        	<div class="wst-odetal-box">
        	<table cellspacing="0" cellpadding="0" class="wst-tab" width="1210">
        		<caption class="wst-tab-cpt">日志信息
        		<span style="color:blue;float:right;">
        			<?php if(($order["orderStatus"] == -3) OR ($order["orderStatus"] == -4)): ?>拒收(<?php if($order["isRefund"] == 1): ?>已退款<?php else: ?>未退款<?php endif; ?>
			        <?php elseif($orderInfo["order"]["orderStatus"] == -2): ?>未付款
			        <?php elseif($orderInfo["order"]["orderStatus"] == -1): ?>已取消
			        <?php elseif($orderInfo["order"]["orderStatus"] == 0): ?>未受理
			        <?php elseif($orderInfo["order"]["orderStatus"] == 1): ?>已受理
			        <?php elseif($orderInfo["order"]["orderStatus"] == 2): ?>打包中
			        <?php elseif($orderInfo["order"]["orderStatus"] == 3): ?>配送中
			        <?php elseif($orderInfo["order"]["orderStatus"] == 4): ?>已到货
			        <?php elseif($orderInfo["order"]["orderStatus"] == 5): ?>确认已收货<?php endif; ?>
        		</caption>
        		</span>
        		<tbody>
	        		<?php if(is_array($orderInfo['logs'])): $key1 = 0; $__LIST__ = $orderInfo['logs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$log): $mod = ($key1 % 2 );++$key1;?><tr>
	        			<td width="200"><?php echo ($log["logTime"]); ?></td>
	        			<td class="wst-td-content"><?php echo ($log["logContent"]); ?></td>
	        		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        		</tbody>
        	</table>
        	</div>
        	<br/><br/>
        	<div class="wst-odetal-box">
        	<table cellspacing="0" cellpadding="0" class="wst-tab" width="1210">
        		<caption class="wst-tab-cpt">订单信息</caption>
        		<tbody>
	        		<tr>
	        			<td class="wst-td-title">订单编号：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["orderNo"]); ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">支付方式：</td>
	        			<td class="wst-td-content"><?php if($orderInfo["order"]["payType"]==0): ?>货到付款<?php else: ?>在线支付<?php endif; ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">配送方式：</td>
	        			<td class="wst-td-content">
	        				<?php if($orderInfo["order"]["isSelf"]==1): ?>自提
	        				<?php else: ?>
	        					<?php if($orderInfo["order"]["deliverType"]==0): ?>商城配送<?php else: ?>店铺配送<?php endif; endif; ?>
	        			</td>
	        		</tr>
	        		<tr>
	        		    <td class="wst-td-title">买家留言：</td>
	        		    <td class="wst-td-content"><?php echo ($orderInfo["order"]["orderRemarks"]); ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">下单时间：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["createTime"]); ?></td>
	        		</tr>
        		</tbody>
        	</table>
        	</div>
        	<br/><br/>
        	<div class="wst-odetal-box">
        	<table cellspacing="0" cellpadding="0" class="wst-tab" width="1210">
        		<caption class="wst-tab-cpt">收货人信息</caption>
        		<tbody>
	        		
	        		<tr>
	        			<td class="wst-td-title">收货人姓名：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["userName"]); ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">地址：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["userAddress"]); ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">固定电话：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["userPhone"]); ?> <?php if($orderInfo["order"]["userTel"] != ""): ?>| <?php echo ($orderInfo["order"]["userTel"]); endif; ?></td>
	        		</tr>
	        		<tr>
	        			<td class="wst-td-title">期望送达时间：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["requireTime"]); ?></td>
	        		</tr>
        		</tbody>
        	</table>
        	</div>
        	<br/><br/>
        	<?php if(!empty($orderInfo["order"]["invoiceClient"])): ?><div class="wst-odetal-box">
        	<table cellspacing="0" cellpadding="0" class="wst-tab" width="1210">
        		<caption class="wst-tab-cpt">发票信息</caption>
        		<tbody>
	        		<tr>
	        			<td class="wst-td-title">发票抬头：</td>
	        			<td class="wst-td-content"><?php echo ($orderInfo["order"]["invoiceClient"]); ?></td>
	        		</tr>
        		</tbody>
        	</table>
        	</div><?php endif; ?>       	
        	<div class="wst-odetal-box" style='padding-bottom:5px;'>
        	<table cellspacing="0" cellpadding="0" class="wst-tab" width="1210" style="margin:0 auto;">
        		<caption class="wst-tab-cpt">商品信息</caption>
        		<tbody>
	        		<tr>
	        			<td width='500' class="wst-align-left" style='padding-left:5px'>商品</td>
	        			<td width='80' class="wst-align-center">商品价格</td>
	        			<td width='80' class="wst-align-center">商品数量</td>
	        			<td width='100' class="wst-align-center">商品总金额</td>
	        		</tr>
	        		<?php if(is_array($orderInfo['goodsList'])): $key1 = 0; $__LIST__ = $orderInfo['goodsList'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($key1 % 2 );++$key1;?><tr>
	        			<td class="wst-align-left">
	        			<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
	        			   <img style='margin:5px;' src="/wstmall_v1.4.4_160308/<?php echo ($goods['goodsThums']); ?>" width='50' height='50'/>
	        			</a>
	        			<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
	        			<?php echo ($goods["goodsName"]); ?>
	        			<?php if($goods['goodsAttrName'] != ''): ?>【<?php echo ($goods['goodsAttrName']); ?>】<?php endif; ?>
	        			</a>
	        			</td>
	        			<td class="wst-align-center">￥<?php echo ($goods["shopPrice"]); ?></td>
	        			<td class="wst-align-center"><?php echo ($goods["goodsNums"]); ?></td>
	        			<td class="wst-align-center">￥<?php echo ($goods["shopPrice"]*$goods["goodsNums"]); ?></td>
	        		</tr><?php endforeach; endif; else: echo "" ;endif; ?>
        		</tbody>
        		<tr>
        		   <td colspan='4' class='wst-cart-total-money'>
        		  商品总金额： ￥<?php echo ($orderInfo["order"]["totalMoney"]); ?>  <br/>
        		   + 运费：￥<?php echo ($orderInfo["order"]["deliverMoney"]); ?><br/> 
        		   <span class='wst-cart-order-txt'>订单总金额：</span><span class='wst-cart-order-money'>￥<?php echo ($orderInfo["order"]["totalMoney"]+$orderInfo["order"]["deliverMoney"]); ?></span></td>
        		</tr>
        	</table>
        	</div>
        </div>
    </div>
    <div style="clear: both;"></div>
    <div style="height: 20px;"></div>
	<div class="wst-footer-fl-box">
	<div class="wst-footer" >
		<div class="wst-footer-cld-box">
			<div class="wst-footer-fl">友情链接：</div>
			<div style="padding-left:30px;">
				<?php if(is_array($friendLikds)): $k = 0; $__LIST__ = $friendLikds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div style="float:left;"><a href="<?php echo ($vo["friendlinkUrl"]); ?>" target="_blank"><?php echo ($vo["friendlinkName"]); ?></a>&nbsp;&nbsp;</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="wst-clear"></div>
			</div>
		</div>
	</div>
</div>

<div class="wst-footer-hp-box">
	<div class="wst-footer">
		<div class="wst-footer-hp-ck1">
			<?php if(is_array($helps)): $k1 = 0; $__LIST__ = $helps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="wst-footer-wz-ca">
				<div class="wst-footer-wz-pt">
				    <img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/a<?php echo ($k1); ?>.jpg" height="18" width="18"/>
					<span class="wst-footer-wz-pn"><?php echo ($vo1["catName"]); ?></span>
					<div style='margin-left:30px;'>
						<?php if(is_array($vo1['articlecats'])): $k2 = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U('Home/Articles/index/',array('articleId'=>$vo2['articleId']));?>"><?php echo ($vo2['articleTitle']); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<div class="wst-footer-wz-clt">
				<div style="padding-top:5px;line-height:25px;">
				    <img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/a6.jpg" height="18" width="18"/>
					<span class="wst-footer-wz-kf">联系客服</span>
					<div style='margin-left:30px;'>
						<a href="#">联系电话</a><br/>
						<?php if($CONF['phoneNo'] != ''): ?><span class="wst-footer-pno"><?php echo ($CONF['phoneNo']); ?></span><br/><?php endif; ?>
						<?php if($CONF['qqNo'] != ''): ?><a href="tencent://message/?uin=<?php echo ($CONF['qqNo']); ?>&Site=QQ交谈&Menu=yes">
						<img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo ($CONF['qqNo']); ?>:7" alt="QQ交谈" width="71" height="24" />
						</a><br/><?php endif; ?>
						
					</div>
				</div>
			</div>
			<div class="wst-clear"></div>
		</div>
	    
		<div class="wst-footer-hp-ck2">
			<img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/alipay.jpg" height="40" width="120"/>支付宝签约商家&nbsp;|&nbsp;
			<span class="wst-footer-frd">正品保障</span><span >100%原产地</span>&nbsp;|&nbsp;
			<span class="wst-footer-frd">7天退货保障</span>购物无忧&nbsp;|&nbsp;
			<span class="wst-footer-frd">免费配送</span>满98包邮&nbsp;|&nbsp;
			<span class="wst-footer-frd">货到付款</span>400城市送货上门
		</div>
	    <div class="wst-footer-hp-ck3">
	        <div class="links"> 
	            <?php $_result=WSTNavigation(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a rel="nofollow" <?php if($vo['isOpen'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($vo['navUrl']); ?>"><?php echo ($vo['navTitle']); ?></a>&nbsp;<?php if($vo['end'] == 0): ?>|&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        
	        <div class="copyright">
	         
	         <?php if($CONF['mallFooter']!=''){ echo htmlspecialchars_decode($CONF['mallFooter']); } ?>
	      	<?php if($CONF['visitStatistics']!=''){ echo htmlspecialchars_decode($CONF['visitStatistics'])."<br/>"; } ?>
	        <?php if($CONF['mallLicense'] ==''): ?><div>
				Copyright©2015 Powered By <a target="_blank" href="http://www.wstmall.com">WSTMall</a>
			</div>
			<?php else: ?>
				<div id="wst-mallLicense" data='1' style="display:none;">Copyright©2015 Powered By <a target="_blank" href="http://www.wstmall.com">WSTMall</a></div><?php endif; ?>
	        </div>
	    	
	        	 
	     
	    </div>
	</div>
</div>

</body>

<script src="/wstmall_v1.4.4_160308/Public/js/common.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/index.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/common.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/orders.js"></script>

</html>