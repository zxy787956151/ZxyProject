<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE>
<html lang="zh-cn">
	<head>
  		<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<link rel="shortcut icon" href="favicon.ico"/>
      	<meta name="viewport" content="width=device-width, initial-scale=1">
      	<title>我的购物车 - <?php echo ($CONF['mallTitle']); ?></title>
      	<meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>,我的购物车" />
      	<meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,我的购物车" />
      	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/common.css" />
     	<link rel="stylesheet" href="/wstmall_v1.4.4_160308/Apps/Home/View/default/css/cartpaylist.css" />
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
		<!----加载商品楼层start----->
		<div class="wst-container">
			 <div>
                <div id="succeed">
                    <div class="success2">
                        <div class="wst-cart-left-blank"></div>
                        <div class="wst-cart-step">
                            <img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/step1.png" /><br />
                            <span class="wst-cart-step1">1.我的购物车</span>
                            <span class="wst-cart-step2">2.填写核对订单信息</span>
                            <span class="wst-cart-step3">3.成功提交订单</span>
                        </div>
                        <div class="wst-clear"></div>
                    </div>
                </div>
            </div>

            <div class="wst-cart-container">
                <div class="wst-cart-title">
               		我的购物车
                </div>
                <div id="showwarnmsg">
                	抱歉，您购物车中的部分商品缺货，或库存不足，请删除被标记的商品或修改购买数量再进行结算。
                </div>
                <div class="wst-cartlist-box">
                    <div class="wst-cartlist-head">
                        <div class="wst-head-title1">
		                	<input type="checkbox" id="chk_all"/>&nbsp;全选
						</div>
                        <div class="wst-head-title2">商品</div> 
                        <div class="wst-head-title3">店铺名称</div>                      
                        <div class="wst-head-title4">商品单价</div>
                        <div class="wst-head-title5">库存状态</div>
                        <div class="wst-head-title6">数量</div>
                        <div class="wst-head-title7">总价</div>
                        <div class="wst-head-title8">操作</div>
                        <div class="wst-clear"></div>
                    </div><br/>
                <div id="wst_cartlist_pbox">
                <?php if(empty($cartInfo['cartgoods'])): ?><div style="text-align:center;font-size:20px;line-height:80px;">
               	您的购物车空空如也，赶快开始购物吧！
                </div>
                <br/><?php endif; ?>
                <?php if(is_array($cartInfo['cartgoods'])): $i = 0; $__LIST__ = $cartInfo['cartgoods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$shopgoods): $mod = ($i % 2 );++$i;?><div id="wst_cart_shop_<?php echo ($key); ?>" data="<?php echo ($key); ?>">
                <div>
                	<div class="wst-head-check">
                		<input type="checkbox" id="chk_shop_<?php echo ($key); ?>" value="<?php echo ($key); ?>" name="chk_shop"/>
                	</div>
             		<div class="wst-cart-dp-pb1">
                 		<span class="wst-cart-shop-span"><span id="sp_<?php echo ($shopgoods['shopgoods'][0]['shopId']); ?>"><?php echo ($shopgoods["shopgoods"][0]["shopName"]); ?></span></span>&nbsp;&nbsp;&nbsp;&nbsp;
             			<?php if($shopgoods['shopgoods'][0]['qqNo'] != ''): ?><a href="tencent://message/?uin=<?php echo ($shopgoods['shopgoods'][0]['qqNo']); ?>&Site=QQ交谈&Menu=yes">
								<img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo ($shopgoods['shopgoods'][0]['qqNo']); ?>:7" alt="QQ交谈" width="71" height="24" />
							</a><?php endif; ?>
             		</div>
             		<div class="wst-goods-tips">
                 		 包邮起步价：¥<?php echo ($shopgoods["shopgoods"][0]["deliveryFreeMoney"]); ?>元
                	</div>
            		<div style="clear: both;"></div>
          		</div>
                <div class="wst-cartlist-box">
                    
                    <div id="catgoodsList">
                        <?php if(is_array($shopgoods['shopgoods'])): $key2 = 0; $__LIST__ = $shopgoods['shopgoods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($key2 % 2 );++$key2;?><div class="wst-cartlist-item" id="selgoods_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" class="selgoods" <?php if($goods['goodsStock'] < $goods['cnt'] OR $goods['goodsStock'] == 0): ?>style="border:2px solid red;"<?php endif; ?>>
		                        <input type="hidden" value="<?php if($goods['goodsStock'] < $goods['cnt']): ?>-1<?php endif; ?>" class="goodsStockFlag"/>
		                        <div class="wst-cartlist-vb">
		                            <input type="checkbox" id="chk_goods_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" name="chk_goods_<?php echo ($goods['shopId']); ?>" value="<?php echo ($goods['goodsId']); ?>" parent="<?php echo ($goods['shopId']); ?>" dataId="<?php echo ($goods['goodsAttrId']); ?>" isBook="<?php echo ($goods['isBook']); ?>" <?php if($goods['ischk'] == 1): ?>checked<?php endif; ?>/>
									<input type="hidden" class="cgoodsId" dataId="<?php echo ($goods['goodsAttrId']); ?>" value="<?php echo ($goods['goodsId']); ?>" />
		                            <input type="hidden" id="price_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" value="<?php echo ($goods['shopPrice']); ?>" />
		                        </div>
		                        <div class="wst-cartlist-item-col1">
		                            <div>
		                                <div class="wst-cartlist-bximg">
		                                 	<a target="_blank" href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
		                                        <img src="/wstmall_v1.4.4_160308/<?php echo ($goods['goodsThums']); ?>" width="60" height="60" />
		                                    </a>
		                                </div>
		                                <div class="wst-cartlist-gsname">
		                                    <a target="_blank" href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>" target="_blank">
		                                    <?php echo ($goods["goodsName"]); if($goods['attrVal'] != ''): ?>【<?php echo ($goods['attrName']); ?>:<?php echo ($goods['attrVal']); ?>】<?php endif; ?>
		                                    </a>
		                                </div>
		                            </div>
		                        </div>
		                        <div class="wst-cartlist-item-col2">
		                        	<a target="_blank" href="<?php echo U('Home/Shops/toShopHome/',array('shopId'=>$goods['shopId']));?>" title="<?php echo ($goods['shopName']); ?>"><?php echo ($goods['shopName']); ?></a>
		                        </div>
		                        <div class="wst-cartlist-item-col3">¥<?php echo ($goods["shopPrice"]); ?>元</div>
		                        <div class="wst-cartlist-item-col4" id="stock_<?php echo ($goods['goodsId']); ?>">			                       
			                		<?php if($goods['goodsStock'] >= $goods['cnt'] AND $goods['cnt'] > 0 ): ?>有货
	                        		<?php elseif($goods['goodsStock'] == 0): ?>
	                                   	<span style="color:red;">无货</span>
	                           		<?php else: ?>
	                                    <span style="color:red;">库存不足,仅剩<?php echo ($goods["goodsStock"]); ?>份</span><?php endif; ?>
		                        </div>
		                        <div class="wst-cartlist-item-col5">
		                            <div class="wrap-input" style="">
		                                <button id="numl_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" class="wst-cartlist-plus" onclick="changeCatGoodsnum(1,<?php echo ($goods['shopId']); ?>,<?php echo ($goods['goodsId']); ?>,<?php echo ($goods['goodsAttrId']); ?>,<?php echo ($goods['isBook']); ?>)">-</button>
		                                <input id="buy-num_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" dataId="<?php echo ($goods['goodsAttrId']); ?>" class="text" style="width: 30px; text-align: center;" maxlength="3" value="<?php echo ($goods['cnt']); ?>" onkeypress="return WST.isNumberKey(event);" onkeyup="changeCatGoodsnum(0,<?php echo ($goods['shopId']); ?>,<?php echo ($goods['goodsId']); ?>,<?php echo ($goods['goodsAttrId']); ?>,<?php echo ($goods['isBook']); ?>);" />
		                                <button id="numr_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>" class="wst-cartlist-add" onclick="changeCatGoodsnum(2,<?php echo ($goods['shopId']); ?>,<?php echo ($goods['goodsId']); ?>,<?php echo ($goods['goodsAttrId']); ?>,<?php echo ($goods['isBook']); ?>)">+</button>
		                            </div>
		                        </div>
		                        <div class="wst-cartlist-item-col7">¥<span id="prc_<?php echo ($goods['goodsId']); ?>_<?php echo ($goods['goodsAttrId']); ?>"><?php echo ($goods["shopPrice"] * $goods["cnt"]); ?></span>元</div>
		                        <div class="wst-cartlist-item-col8"><a href="javascript:delCatGoods(<?php echo ($goods['shopId']); ?>,<?php echo ($goods['goodsId']); ?>,<?php echo ($goods['goodsAttrId']); ?>);">删除</a></div>
		                        <div class="wst-clear"></div>
		                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                        
						<?php if(count($cartInfo['cartgoods']) < 1): ?><div class='wst-cart-empty'>购物车中没有商品</div><?php endif; ?>
                    </div>
                    <div class="wst-cart-total-money">
                       	 总计（不含运费）:<span class="wst-cart-unin">¥<span id="shop_totalMoney_<?php echo ($goods['shopId']); ?>"><?php echo ($shopgoods["totalMoney"]); ?></span>元&nbsp;&nbsp;</span>
                    </div>
                </div>
                <br/>
                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                </div>
                <div class="checkout-buttons group" id="checkout-floatbar">
                        <div class="wst-chkod-yf1">
                        	<span class="total">应付总额(不含运费)：<span style="color: red;">
	                                <strong id="payPriceId">￥
		                                <span id="wst_cart_totalmoney" class="wst-cart-totalmoney"><?php echo ($cartInfo['totalMoney']); ?></span>
	                                </strong>元</span>
                                </span>
                        </div>
                        
                    </div>
                <div>&nbsp;</div>
                <div class="cart-button clearfix">

                    <li class="wst-btn-continue" onclick="javascript:toContinue();"></li>
                    <li class="wst-btn-checkout" onclick="javascript:goToPay();" style="<?php if(count($cartInfo['cartgoods']) < 1): ?>display: none;<?php endif; ?>"></li>
                   	<div class="wst-clear"></div>
                </div>
            </div>
        
			<div class="wst-clear"></div>
		</div>
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
	<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/head.js" type="text/javascript"></script>
	<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/common.js" type="text/javascript"></script>
	<script src="/wstmall_v1.4.4_160308/Public/plugins/layer/layer.min.js"></script>
	<script src="/wstmall_v1.4.4_160308/Apps/Home/View/default/js/cartpaylist.js"></script>
   	
</html>