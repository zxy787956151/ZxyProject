<div id="cart_list">
					<table class="cart-table">
								<tr>
									<th class="deal-buy-desc"><?php echo $this->_var['LANG']['DEAL_ITEM']; ?></th>
									<th class="deal-buy-quantity"><?php echo $this->_var['LANG']['NUMBER']; ?></th>									
									<th class="deal-buy-price"><?php echo $this->_var['LANG']['PRICE']; ?></th>															
									<th class="deal-buy-total"><?php echo $this->_var['LANG']['TOTAL_PRICE']; ?></th>
									<?PHP if(app_conf("CART_ON")==1){ ?>
									<th><?php echo $this->_var['LANG']['DELETE']; ?></th>
									<?PHP  }?>
								</tr>
								<?php $_from = $this->_var['cart_list']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'cart_item');if (count($_from)):
    foreach ($_from AS $this->_var['cart_item']):
?>
								<tr class="deal_<?php echo $this->_var['cart_item']['deal_id']; ?> deal_cart_row" rel="cart_<?php echo $this->_var['cart_item']['deal_id']; ?>_<?php echo $this->_var['cart_item']['attr_str']; ?>">
									<td class="deal-buy-desc">
										<div class="cart-icon f_l"><a href="<?php
echo parse_url_tag("u:shop|goods|"."id=".$this->_var['cart_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['cart_item']['name']; ?>"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['cart_item']['icon'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" alt="<?php echo $this->_var['cart_item']['name']; ?>" /></a></div>
										<div class="cart-title f_l">
										<a href="<?php
echo parse_url_tag("u:shop|goods|"."id=".$this->_var['cart_item']['deal_id']."".""); 
?>" target="_blank" title="<?php echo $this->_var['cart_item']['name']; ?>"><?php 
$k = array (
  'name' => 'msubstr',
  'v' => $this->_var['cart_item']['name'],
  'b' => '0',
  'e' => '50',
);
echo $k['name']($k['v'],$k['b'],$k['e']);
?></a>
										</div>
									</td>
									
									<td class="deal-buy-quantity">
									<input type="text" style="ime-mode: disabled;" onblur="modify_cart(<?php echo $this->_var['cart_item']['id']; ?>,this);" id="deal-buy-quantity-input" value="<?php echo $this->_var['cart_item']['number']; ?>" name="quantity" maxlength="4" class="input-text f-input">
									</td>
									
									<td class="deal-buy-price">
										<?php if ($this->_var['cart_item']['buy_type'] != 1): ?>
										<?php 
$k = array (
  'name' => 'format_price',
  'value' => $this->_var['cart_item']['unit_price'],
);
echo $k['name']($k['value']);
?>
										<?php else: ?>
										<?php echo format_score(abs($this->_var['cart_item']['return_score']));?>
										<?php endif; ?>
									</td>
									
									<td class="deal-buy-total">
										<?php if ($this->_var['cart_item']['buy_type'] != 1): ?>
										<?php 
$k = array (
  'name' => 'format_price',
  'value' => $this->_var['cart_item']['total_price'],
);
echo $k['name']($k['value']);
?>
										<?php else: ?>
										<?php echo format_score(abs($this->_var['cart_item']['return_total_score']));?>
										<?php endif; ?>
									</td>
									<?PHP if(app_conf("CART_ON")==1){ ?>
									<td class="deal-buy-del"><a onclick="del_cart(<?php echo $this->_var['cart_item']['id']; ?>)" href="javascript:void(0);"><?php echo $this->_var['LANG']['DELETE']; ?></a></td>
									<?PHP  }?>
								</tr>
								<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>														
								
							
							</table>
							<table class="cart-table">
								<tr class="order-total">
									<td class="tl">
										<input type="button" value="<?php echo $this->_var['LANG']['CLEAR_CART']; ?>" class="s_buy_btn" onclick="clear_cart();" />
									</td>
									<td class="deal-cart-total tr">									
										<strong class="total-cart-tip"><?php echo $this->_var['LANG']['PAY_TOTAL_PRICE_NO_DELIVERY']; ?></strong> <strong id="deal-buy-total-t"><?php 
$k = array (
  'name' => 'format_price',
  'value' => $this->_var['total_price'],
);
echo $k['name']($k['value']);
?></strong>
									</td>
									
								</tr>
							</table>
</div><!--end cart_list-->	