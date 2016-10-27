<?php echo $this->fetch('inc/header.html'); ?> 
<script type="text/javascript">
	var order_id = <?php 
$k = array (
  'name' => 'intval',
  'value' => $this->_var['order_info']['id'],
);
echo $k['name']($k['value']);
?>;
</script>
<div class="blank"></div>

	<div class="inc cart">
		<div class="inc_top"><?php echo $this->_var['page_title']; ?></div>
		<div class="inc_main pd10" id="cart_check">
				<form name="cart_form" id="cart_form" action="<?php if ($this->_var['order_info']): ?><?php
echo parse_url_tag("u:shop|cart#order_done|"."".""); 
?><?php else: ?><?php
echo parse_url_tag("u:shop|cart#done|"."".""); 
?><?php endif; ?>" method="post" />			
				
							<div id="cart_list">
							<?php echo $this->fetch('inc/inc_cart_check_list.html'); ?> 	
							</div>
							<?php if ($this->_var['is_delivery']): ?>
									
							<script type="text/javascript" src="<?php echo $this->_var['APP_ROOT']; ?>/public/runtime/app/region.js"></script>					
							<script type="text/javascript">
								load_consignee(<?php echo $this->_var['consignee_id']; ?>);
							</script>
							<div class="blank"></div>
							<div id="cart_consignee"></div>
							
							<div class="blank"></div>
							<div id="cart_delivery"></div>
							<?php else: ?>							
							<script type="text/javascript">
								$(document).ready(function(){count_buy_total();});
							</script>
							<?php endif; ?>
							<div class="blank"></div>
							<div id="cart_message">
							<?php echo $this->fetch('inc/inc_cart_message.html'); ?>
							</div>
							<div class="blank"></div>
							<div id="cart_payment">
							<?php if ($this->_var['show_payment']): ?>
							<?php echo $this->fetch('inc/inc_cart_payment.html'); ?>
							<?php endif; ?>
							</div>
							<div id="cart_total">

							</div>
							
							<div id="cart_submit">
								<div class="order-check-form">
									<p class="check-act">
										<input type="hidden" value="<?php 
$k = array (
  'name' => 'intval',
  'value' => $this->_var['order_info']['id'],
);
echo $k['name']($k['value']);
?>" name="id" />
										<?php if ($this->_var['is_coupon']): ?>
										<?php echo $this->_var['LANG']['COUPON_MOBILE']; ?>：<input type="text" name="coupon_mobile" value="<?php echo $this->_var['user_info']['mobile']; ?>" class="f-input" />
										<?php endif; ?>
										<input type="button" class="formbutton" value="<?php echo $this->_var['LANG']['CONFIRM_ORDER_AND_PAY']; ?>" id="order_done">
										<?php if (! $this->_var['order_info']): ?>
										<a style="margin-left: 1em;" href="<?php
echo parse_url_tag("u:shop|cart|"."".""); 
?>"><?php echo $this->_var['LANG']['BACK_MODIFY_CART']; ?></a>
										<?php endif; ?>
										<?php if ($this->_var['is_coupon']): ?>
										<br />
										<span style="font-size:12px; color:#666;"><?php 
$k = array (
  'name' => 'sprintf',
  'value' => $this->_var['LANG']['COUPON_MOBILE_TIP'],
  'p' => $this->_var['coupon_name'],
);
echo $k['name']($k['value'],$k['p']);
?></span>										
										<?php endif; ?>
									</p>
									
								</div>
							</div><!--cart_submit-->							
						
				</form>

		</div><!--end inc_main-->		
		<div class="inc_foot"></div>
	</div>


<?php echo $this->fetch('inc/footer.html'); ?>