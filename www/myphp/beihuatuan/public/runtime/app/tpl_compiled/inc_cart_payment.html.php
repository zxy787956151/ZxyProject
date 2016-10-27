<div class="paytype">

		<div class="order-pay-credit">
			<h3><?php echo $this->_var['LANG']['PAYMENT_INFO']; ?></h3>																
		</div>
		<div style="padding:10px;">																				
			<?php $_from = $this->_var['payment_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'payment_item');if (count($_from)):
    foreach ($_from AS $this->_var['payment_item']):
?>	
				<div class="blank"></div>
				<?php echo $this->_var['payment_item']['display_code']; ?>											
			<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>											
		</div>
	
	<div class="blank"></div>
</div>

<script type="text/javascript">
$(document).ready(function(){
	$("input[name='account_money'],input[name='ecvsn'],input[name='ecvpassword']").bind("blur",function(){
		count_buy_total();
	});
	$("input[name='payment']").bind("click",function(){
		count_buy_total();
	});
	$("#check-all-money").bind("click",function(){
		if($(this).attr("checked"))
		{
			count_buy_total();
		}
		else
		{
			$("#account_money").val("0");
			count_buy_total();
		}
	});
});	
</script>
