<?php if (!defined('THINK_PATH')) exit();?><div class="wst-goods-hotsale-box">
						<div class="hotsale-title">热销商品</div>
						<?php if(is_array($hotgoods)): $k = 0; $__LIST__ = $hotgoods;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="hotsale-goods-box">
							<div class="hotsale-goods-img">
								<img class='lazyImg' data-original="/wstmall_v1.4.4_160308/<?php echo ($vo['goodsThums']); ?>" width="65" height="65" />
							</div>
							<div class="hotsale-goods-title">
								<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo['goodsId']));?>"><?php echo ($vo['goodsName']); ?></a>
								<div><span class="span1">￥<?php echo ($vo['shopPrice']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">￥<?php echo ($vo['marketPrice']); ?></span></div>
							</div>
							<div class="wst-clear"></div>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
						
					</div>