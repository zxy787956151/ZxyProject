<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
	<head>
  		<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<link rel="shortcut icon" href="favicon.ico"/>
      	<meta http-equiv="cache-control" content="no-cache">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<title>填写核对订单信息 - <?php echo ($CONF['mallTitle']); ?></title>
      	<meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>,填写核对订单信息" />
      	<meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,填写核对订单信息" />
      	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/common.css" />
     	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/checkorderinfo.css" />
     	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/base.css" />
		<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/head.css" />
		<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/magnifier.css" />
      	<style>
      	.adsipt{height:28px;}
		textarea{height:60px;}
      	</style>
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
        <div>
            <div>
                <div id="succeed">
                    <div class="success2" style="">
                        <div class="wst-chkod-blank"></div>
                        <div class="wst-chkod-step">
                            <img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/step2.png" alt="" /><br />
                            <span class="wst-chkod-step1">1.我的购物车</span>
                            <span class="wst-chkod-step2">2.填写核对订单信息</span>
                            <span class="wst-chkod-step3">3.成功提交订单</span>
                        </div>
                        <div class="wst-clear"></div>
                    </div>

                </div>
            </div>
            <div id="checkorderInfo">
                <div class="wst-chkod-subox">
                    <div class="wst-chkod-title">
                        	填写并核对订单信息
                    </div>
                    <div>                        
						<div id="consignee1" <?php if(count($addressList) == 0): ?>style='display:none'<?php endif; ?>>
							<div>
								<span class="wst-chkod-s1-title">收货人信息 </span>
								<input type="hidden" id="paddressId" value="<?php echo ($addressList[0]['addressId']); ?>"/>
								<span class="wst-chkod-s1-upd"><a href="javascript:toEditAddress(<?php echo ($addressList[0]['addressId']); ?>);">[修改]</a></span>
							</div>
							<?php if(is_array($addressList)): $k = 0; $__LIST__ = $addressList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($k % 2 );++$k; if($k == 1): ?><input type="hidden" id="consigneeId" name="consigneeId" value="<?php echo ($address['addressId']); ?>"/>
								<div id="showaddinfo">										
									<div>
										<span style="font-weight: bold;"><?php echo ($address["userName"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
										<?php if($address['userPhone'] != ''): echo ($address["userPhone"]); ?>
										<?php else: ?>
											<?php echo ($address["userTel"]); endif; ?>
									</div>
									<div>
										<?php echo ($address["areaName1"]); echo ($address["areaName2"]); echo ($address["areaName3"]); echo ($address["communityName"]); echo ($address["address"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
									</div>											
								</div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
							<?php if(count($addressList) == 0): ?><div id="showaddinfo"></div>
								<input type="hidden" id="consigneeId" name="consigneeId" /><?php endif; ?>
						</div>
						
                        <div id="consignee2" style="<?php if(count($addressList) > 0): ?>display:none;<?php endif; ?>">
                            <div>
                                <span class="wst-chkod-cg-title">收货人信息 </span>
                            </div>
                            <div>
                            	<div id="userAddressDiv">
                            	<div id="flagdiv" style="display: none;"></div>
                               	<?php if(is_array($addressList)): $key = 0; $__LIST__ = $addressList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$address): $mod = ($key % 2 );++$key;?><div id="caddress_<?php echo ($address['addressId']); ?>">												
									<label>
										<input id="seladdress_<?php echo ($address['addressId']); ?>" onclick="changeAddress(<?php echo ($address['addressId']); ?>);" name="seladdress" type="radio" <?php if($key == 1): ?>checked="checked"<?php endif; ?> value="<?php echo ($address['addressId']); ?>"/>
										<span style="font-weight: bold;" id="radusername_<?php echo ($address['addressId']); ?>"><?php echo ($address["userName"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;</span>
										<span id="radaddress_<?php echo ($address['addressId']); ?>">
										<?php echo ($address["areaName1"]); echo ($address["areaName2"]); echo ($address["areaName3"]); echo ($address["communityName"]); echo ($address["address"]); ?>&nbsp;&nbsp;&nbsp;&nbsp;
										<?php if($address['userPhone'] != ''): echo ($address["userPhone"]); ?>
										<?php else: ?>
											<?php echo ($address["userTel"]); endif; ?>
										</span>
									</label>
									<span class="optionspan wst-opt-upd">[<a onclick="javascript:editAddress(<?php echo ($address['addressId']); ?>);">修改</a>]</span>
									<span class="optionspan wst-opt-del">[<a onclick="javascript:delAddress(<?php echo ($address['addressId']); ?>);">删除</a>]</span>									
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div>					
									<label>
										<input id="seladdress_0" name="seladdress" type="radio" value="0" onclick="changeAddress(0);" <?php if(count($addressList) == 0): ?>checked="checked"<?php endif; ?>/>使用新地址
									</label>
								</div>
                            </div>
                            <div id="address_form" style="">
                                <input type='hidden' id='consignee_add_cityId' name='consignee_add_cityId' value="<?php echo ($currArea['areaId']); ?>"/>
                                <input type='hidden' id='consignee_add_cityName' name='consignee_add_cityName'/>
                                <div class="wst-chkod-line35">
                                    <div class="wst-chkod-cg-pp"><span style="color: red;">*</span>收货人：</div>
                                    <div style="float: left; width: 700px;">
                                        <input type="text" class="input adsipt" style="width: 200px;" maxlength="50" name="consignee_add_userName" id="consignee_add_userName" />&nbsp;
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="wst-chkod-line35">
                                    <div class="wst-chkod-cg-ads"><span style="color: red;">*</span>收货地址：</div>
                                    <div class="wst-chkod-area-box">
                                        <select name="consignee_add_countyId" id="consignee_add_countyId" class="adsipt" onchange="loadCommunitys(this);">
                                            <option value="0" selected="selected">请选择</option>
                                            <?php if(is_array($areaList2)): $key = 0; $__LIST__ = $areaList2;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$area): $mod = ($key % 2 );++$key;?><option value="<?php echo ($area['areaId']); ?>"><?php echo ($area["areaName"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                        </select>
                                        <select name="consignee_add_CommunityId" id="consignee_add_CommunityId" class="adsipt" onchange="checkArea();">
                                            <option value="0" selected="selected">请选择</option>                                            									
                                        </select>
                                        <input type="text" class="input adsipt" style="width: 350px;" maxlength="150" name="consignee_add_address" id="consignee_add_address" />&nbsp;
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="wst-chkod-line35">
                                    <div class="wst-chkod-cg-pno"><span style="color: red;">*</span>手机号码：</div>
                                    <div class="wst-chkod-cg-pno-box">
                                        <input type="text" class="input adsipt" style="width: 150px;" maxlength="11" name="consignee_add_userPhone" id="consignee_add_userPhone" onkeyup="javascript:WST.isChinese(this,1)" onkeypress="return WST.isNumberdoteKey(event)" />
                                        &nbsp;或&nbsp;&nbsp;&nbsp;&nbsp;
										 固定电话:<input type="text" class="input adsipt" style="width: 150px;" maxlength="15" name="consignee_add_userTel" id="consignee_add_userTel" />(例：020-88888888)&nbsp;
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                                <div class="wst-chkod-line35">
                                    <div class="wst-chkod-cg-pno"><span style="color: red;">*</span>是否默认地址：</div>
                                    <div class="wst-chkod-cg-pno-box">
                                        <label>
                                          <input type='radio' name='consignee_add_isDefault' id='consignee_add_isDefault_1' vallue='1'>是
                                        </label>
                                        <label>
                                          <input type='radio' name='consignee_add_isDefault' id='consignee_add_isDefault_0' vallue='0'>否
                                        </label>
                                    </div>
                                    <div style="clear: both;"></div>
                                </div>
                            </div>
                            
							<div class="wst-checkout wst-chkod-sbx" id="checkout">
								<li  onclick="saveAddress()">
									<span id="saveConsigneeTitleDiv"></span>
								</li>
								<div style="clear: both;"></div>
							</div>
                        </div>
                    </div>
                    <div class="wst-chkod-pay">
                        <div>
                            <span class="wst-chkod-pay-tt">支付方式 </span>
                        </div>
                        <div id="newaddress">
                        	<?php if(count($payments['unlines']) > 0): ?><div>
                                <div style="width:200px;float:left;">
                                	<label>
                                    	<input id="pay_hd" name="payway" checked="checked" type="radio" value="0" />货到付款
                                    </label>
                                </div>
                                <div style="width:800px;float:left;">
                                	<span class="wst-chkod-sh-tips">送货上门后再收款，支持现金</span>
                                </div>
                                <div style="clear:both;"></div>
                            </div><?php endif; ?>
                            <?php if(count($payments['onlines']) > 0): ?><div>
                                <div style="width:200px;float:left;">
                                	<label>
                                    	<input id="pay_ali" name="payway" type="radio" value="1" />在线支付
                                    </label>
                                </div>
                                <div style="width:800px;float:left;">
                                	
                                	<div><span class="wst-chkod-sh-tips">可在提交订单后选择，支持：</span></div>
                                	<?php if(is_array($payments['onlines'])): $key = 0; $__LIST__ = $payments['onlines'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$payment): $mod = ($key % 2 );++$key; if($payment['isOnline'] == 1): ?><div style="float:left;width:165px;"><img src="/wstmall_v1.4.4_160308/<?php echo ($payment['payIcon']); ?>" width="120" height="45"/></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
                                	<div style="clear:both;"></div>
                                </div>
                                <div style="clear:both;"></div>
                            </div><?php endif; ?>
                        </div>
                    </div>
                    <div class="wst-chkod-dp-box">
                        <div>
                            <span class="wst-chkod-dp-hds">发票信息 </span>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                                <input id="receipt_1" name="needreceipt" type="radio" value="1" />需要开发票
                            </label>
                            <div id="invoiceClientdiv" style="display: none;">
                                	抬头：<input id="invoiceClient" name="invoiceClient" style="width: 573px;height: 25px;" />
                            </div>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                                <input id="receipt_2" name="needreceipt" checked="checked" type="radio" value="0" />不需要开发票
                            </label>
                        </div>
                    </div>
                    <div class="wst-chkod-dp-box">
                        <div>
                            <span class="wst-chkod-dp-hds">送货方式</span>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                                <input id="isself_0" name="isself" checked="checked" type="radio" value="0" />送货上门
                            </label>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                                <input id="isself_1" name="isself" type="radio" value="1" />自提 
                            </label>
                        </div>
                    </div>
                    <div class="wst-chkod-dp-box">
                        <div>
                            <span class="wst-chkod-dp-hds">送达时间</span>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                               	 期望送达时间:
                            </label>
                            
                            <select id="requestdate" class="adsipt" onchange="changeRequestdate();">
                            </select>
                            <select id="requesttime" class="adsipt" >
                            </select> 
                        </div>
                    </div>
                    <div class="wst-chkod-dp-box">
                        <div>
                            <span class="wst-chkod-dp-hds">订单备注<span style="font-weight: normal;">&nbsp;&nbsp;&nbsp;&nbsp;</span></span>
                        </div>
                        <div style="padding-left: 40px;">
                            <label>
                               	<textarea id="remarks" name="remarks" rows="2" cols="100" maxlength="50"></textarea>
                            </label>                           
                        </div>
                    </div>
                    <div class="wst-chkod-dp-box">
                        
                        <?php if(is_array($catgoods)): $key = 0; $__LIST__ = $catgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopgoods): $mod = ($key % 2 );++$key;?><div>
                                <div class="wst-chkod-dp-pb1">
                                    <span class="wst-chkod-dp-hds">商品清单</span><span class="wst-chkod-shop-span">【<span id="sp_<?php echo ($shopgoods['shopgoods'][0]['shopId']); ?>"><?php echo ($shopgoods["shopgoods"][0]["shopName"]); ?></span><?php if($shopgoods["shopgoods"][0]["isInvoice"] == 1): ?>：本店可开具发票<?php else: ?>：不可开发票<?php endif; ?>】</span>
                                	<?php if($shopgoods['shopgoods'][0]['qqNo'] != ''): ?><a href="tencent://message/?uin=<?php echo ($shopgoods['shopgoods'][0]['qqNo']); ?>&Site=QQ交谈&Menu=yes">
											<img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo ($shopgoods['shopgoods'][0]['qqNo']); ?>:7" alt="QQ交谈" width="71" height="24" />
										</a><?php endif; ?>
                                </div>
                                <div class="wst-goods-tips">
                                   	 包邮起步价：¥<?php echo ($shopgoods["shopgoods"][0]["deliveryFreeMoney"]); ?>元
                                </div>
                                <div style="clear: both;"></div>
                            </div>
                            <?php if($shopgoods["shopgoods"][0]["deliveryStartMoney"] > $shopgoods["totalMoney"]): ?><div id="showwarnmsg_<?php echo ($key); ?>" class="wst-chkod-dp-pb2">
			                		抱歉，您的订单金额未达到该店铺的配送订单起步价¥<?php echo ($shopgoods["shopgoods"][0]["deliveryStartMoney"]); ?>元，不能提交订单。
			                	</div>
			                	<input type="hidden" id="tst_<?php echo ($key); ?>"  class="tst" value="-1"/><?php endif; ?>                            
                        <div>
                            <div class="wst-chkod-glist-tb">
                                <div class="wst-chkod-glist-tt1">&nbsp;&nbsp;商品</div>
                                <div class="wst-chkod-glist-tt2">商品单价</div>
                                <div class="wst-chkod-glist-tt3">数量</div>
                                <div class="wst-chkod-glist-tt4">总价</div>
                                <div class="wst-chkod-glist-tt5">库存状态</div>
                                <div class="wst-clear"></div>
                            </div>
                            <?php if(is_array($shopgoods['shopgoods'])): $key2 = 0; $__LIST__ = $shopgoods['shopgoods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($key2 % 2 );++$key2;?><div class="selgoods" class="wst-chkod-dp-pb3">
                                    <div class="wst-chkod-dp-pb4">
                                        <div>
                                            <div class="wst-cart-goods-img">
                                                <a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
                                                    <img src="/wstmall_v1.4.4_160308/<?php echo ($goods['goodsThums']); ?>" width="60" height="60" /></a>
                                            </div>
                                            <div class="wst-cart-goods-name">
                                                <a target="_blank" href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
                                                <?php echo ($goods["goodsName"]); if($goods['attrVal'] != ''): ?>【<?php echo ($goods['attrName']); ?>:<?php echo ($goods['attrVal']); ?>】<?php endif; ?>
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="wst-chkod-od-crt1">¥<?php echo ($goods["shopPrice"]); ?>元</div>
                                    <div class="wst-chkod-od-crt2"><?php echo ($goods['cnt']); ?></div>
                                    <div class="wst-chkod-od-crt3">¥<?php echo ($goods["shopPrice"]*$goods['cnt']); ?>元</div>
                                    <div class="wst-chkod-od-crt4">
	                                    <?php if($goods['goodsStock'] >= $goods['cnt']): ?>有货
	                                    <?php elseif($goods['goodsStock'] == 0): ?>
	                                    	<span style="color:red;">无货</span>
	                                    <else>
	                                    	<span style="color:red;">库存不足,仅剩<?php echo ($goods["goodsStock"]); ?>份</span><?php endif; ?>
                                    </div>
                                    <div class="wst-clear"></div>
                                </div><?php endforeach; endif; else: echo "" ;endif; ?>													
                        </div>
                        <div class="wst-chkod-dp-pb5">
                            <div style="width: 310px; float: right;">
                                <div>
                                    <div class="wst-chkod-my1"><span style="color: red;"><?php echo ($shopgoods["totalCnt"]); ?></span> 件商品，总商品金额：</div>
                                    <div class="wst-chkod-my2">¥<?php echo ($shopgoods["totalMoney"]); ?>&nbsp;&nbsp;</div>
                                    <div class="wst-clear"></div>
                                </div>
                                <div>
                                    <div class="wst-chkod-yy1">运费：</div>
                                    <div class="wst-chkod-yy2">
                                    	<input type="hidden" id="deliveryMoney_<?php echo ($key); ?>" value='<?php if($shopgoods["totalMoney"] < $shopgoods["shopgoods"][0]["deliveryFreeMoney"]): ?>¥<?php echo ($shopgoods["shopgoods"][0]["deliveryMoney"]); else: ?>免运费<?php endif; ?>'/>

                                    	<span id="deliveryMoney_span_<?php echo ($key); ?>">
                                    	<?php if($shopgoods["totalMoney"] < $shopgoods["shopgoods"][0]["deliveryFreeMoney"]): ?>¥<?php echo ($shopgoods["shopgoods"][0]["deliveryMoney"]); else: ?>免运费<?php endif; ?>
                                   	 	</span>
                                   	&nbsp;&nbsp;</div>
                                    <div class="wst-clear"></div>
                                </div>
                            </div>
                            <div class="wst-clear"></div>
                        </div><?php endforeach; endif; else: echo "" ;endif; ?>	
                    </div>
                    <div class="checkout-buttons group" id="checkout-floatbar">
                        <div class="sticky-placeholder hide" style="display: none;"></div>
                        <div class="wst-chkod-yf1">
                        	<span class="total">应付总额：<span style="color: red;">
	                                <strong id="payPriceId">￥
	                                	<input type="hidden" id="gtotalMoney" value="<?php echo ($gtotalMoney); ?>"/>
	                                	<input type="hidden" id="totalMoney" value="<?php echo ($totalMoney); ?>"/>
		                                <span id="totalMoney_span"><?php echo ($totalMoney); ?></span>
	                                </strong>元</span>
                                </span>
                        </div>
                        <div class="sticky-wrap">
                            <div class="wst-inner" style="padding:15px;">
                            <button onclick="javascript:backCart();" class="wst-prev-btn">
                                    	返回上一步                                   
                                    <b></b>
                                </button>
                                <button class="wst-next-btn" onclick="javascript:submitOrder();" id="order-submit" class="checkout-submit" type="submit" >
                                    	提交订单                                       
                                    <b></b>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
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
	<script type="text/javascript">
	
	function subCheckArea(){
	    var communityId = $("#consignee_add_CommunityId").val();
	    <?php if(is_array($shopColleges)): $key = 0; $__LIST__ = $shopColleges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopCollege): $mod = ($key % 2 );++$key;?>var shopCollege = ',<?php echo ($shopCollege); ?>,';
			var idx = shopCollege.indexOf(","+communityId+",");
			
			if(idx==-1){
				$("#areaOk").val("0");	
				WST.msg("店铺“"+$("#sp_<?php echo ($key-1); ?>").html()+"”中的商品不在配送区域内！");
				return false;
			}else{
				$("#areaOk").val("1");
			}<?php endforeach; endif; else: echo "" ;endif; ?>
	 	return true;
	}
	function checkArea(obj){
		var communityId = $("#consignee_add_CommunityId").val();
		<?php if(is_array($shopColleges)): $key = 0; $__LIST__ = $shopColleges;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopCollege): $mod = ($key % 2 );++$key;?>var shopCollege = ',<?php echo ($shopCollege); ?>,';					
			var idx = shopCollege.indexOf(","+communityId+",");
			if(idx==-1){
				$("#areaOk").val("0");
				WST.msg("店铺“"+$("#sp_<?php echo ($key-1); ?>").html()+"”中的商品不在配送区域内！");
				return false;
			}else{
				$("#areaOk").val("1");
			}<?php endforeach; endif; else: echo "" ;endif; ?>
	
		return true;
	}
	
	
	$(function(){
		var myDate = new Date();
	    var currHour = myDate.getHours();
	    var currMinutes = myDate.getMinutes();
	    var currdayFlag = true;           
	
	    var html = new Array();
	    $("#requesttime").empty();		
		var startNum = currHour*4+(Math.ceil(currMinutes/15))+4;
		
		if(startNum<<?php echo ($startTime); ?>){
			startNum = <?php echo ($startTime); ?>;
		}
		
		if(startNum<96){
			for(var i=startNum;i<=<?php echo ($endTime); ?>;i++){
				if(times[i]){
	                html.push('<option id="'+times[i]+'">'+times[i]+'</option>');   
				}
	        }
		}
		var daymark = 0;
		if(html.length==0){
			 daymark = 1;
					 
		}
		
	    $("#requesttime").html(html.join(""));
	    var html2 = new Array();
	    for(var i=daymark;i<3+daymark;i++){
	        var cdate = addDate(i);  
	       
	        html2.push('<option id="'+cdate+'">'+cdate+'</option>');
	    }
	    $("#requestdate").html(html2.join(""));    
	    
	    if(html.length==0){			
			 changeRequestdate();			 
		}else{
			$("#requesttime").html(html.join(""));
		}
	});
		 
	function changeRequestdate(){
		var html = new Array();
	 	$("#requesttime").empty();
	 	var requestdate = $("#requestdate").val();
	 	
	 	var d=new Date();   
	 	var currHour = d.getHours();
		var currMinutes = d.getMinutes();
	   	var m=d.getMonth()+1;
	   	var currDate = d.getFullYear()+'-'+(m>=10?m:'0'+m)+'-'+(d.getDate()>=10?d.getDate():"0"+d.getDate());
	   	var startNum = 0;

	   	if(currDate == requestdate){
	   		
	   		var startNum = currHour*4+(Math.ceil(currMinutes/15))+4;
			if(startNum<<?php echo ($startTime); ?>){
				startNum = <?php echo ($startTime); ?>;
			}
	 	}
	 
		for(var i=startNum;i<=96;i++){ 	
			if(times[i]){	
	      		html.push('<option id="'+times[i]+'">'+times[i]+'</option>');
	   		}       
	   	}
		$("#requesttime").html(html.join(""));
	}
		
	function backCart(){
		location.href="<?php echo U('Home/Cart/getCartInfo/',array('rnd'=>rand(100000000,999999999)));?>";
	}
	
	var times = ["00:00","00:15","00:30","00:45",
	             "01:00","01:15","01:30","01:45",
	             "02:00","02:15","02:30","02:45",
	             "03:00","03:15","03:30","03:45",
	             "04:00","04:15","04:30","04:45",
	             "05:00","05:15","05:30","05:45",
	             "06:00","06:15","06:30","06:45",
	             "07:00","07:15","07:30","07:45",
	             "08:00","08:15","08:30","08:45",
	             "09:00","09:15","09:30","09:45",
	             "10:00","10:15","10:30","10:45",
	             "11:00","11:15","11:30","11:45",
	             "12:00","12:15","12:30","12:45",
	             "13:00","13:15","13:30","13:45",
	             "14:00","14:15","14:30","14:45",
	             "15:00","15:15","15:30","15:45",
	             "16:00","16:15","16:30","16:45",
	             "17:00","17:15","17:30","17:45",
	             "18:00","18:15","18:30","18:45",
	             "19:00","19:15","19:30","19:45",
	             "20:00","20:15","20:30","20:45",
	             "21:00","21:15","21:30","21:45",
	             "22:00","22:15","22:30","22:45",
	             "23:00","23:15","23:30","23:45"];
function addDate(days){
    var d=new Date();
    d.setDate(d.getDate()+days);
    var m=d.getMonth()+1;
    return d.getFullYear()+'-'+(m>=10?m:'0'+m)+'-'+(d.getDate()>=10?d.getDate():"0"+d.getDate());
} 
$(document).ready(function(){
	//alert('#seladdress_<?php echo ($addressList[0]["addressId"]); ?>');
	$('#seladdress_<?php echo ($addressList[0]["addressId"]); ?>').click();
});
</script>
<script src="/wstmall_v1.4.4_160308/Public/js/common.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/index.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/common.js"></script>
<script src="/wstmall_v1.4.4_160308/Public/plugins/layer/layer.min.js"></script>
<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/orders.js"></script>
</html>