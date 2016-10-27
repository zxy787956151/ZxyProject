<div class="cart_item_row">
<div class="cart_img f_l"><img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['cart_item']['img'],
  'w' => '50',
  'h' => '50',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" /></div>
<div class="cart_title f_l">
	<?php echo $this->_var['LANG']['YOU_HAVE_ADD']; ?> <span class="cart_item_name"><?php echo $this->_var['cart_item']['name']; ?></span> <?php echo $this->_var['LANG']['ADDCART_SUCCESS']; ?>
	<div class="blank"></div>
	<?php echo $this->_var['LANG']['BUY_NUMBER']; ?>：<?php echo $this->_var['cart_item']['add_number']; ?> 
	<?php if ($this->_var['cart_item']['add_total_price'] > 0): ?><?php echo $this->_var['LANG']['PRICE']; ?>：<?php 
$k = array (
  'name' => 'format_price',
  'v' => $this->_var['cart_item']['add_total_price'],
);
echo $k['name']($k['v']);
?><?php endif; ?>
	<?php if ($this->_var['cart_item']['add_total_score'] < 0): ?><?php echo $this->_var['LANG']['SCORE']; ?>：<?PHP echo format_score(abs($this->_var['cart_item']['add_total_score']));?><?php endif; ?>
	<div class="blank"></div>
	<input type="button" class="input_keep" value="<?php echo $this->_var['LANG']['KEEP_BUYING']; ?>" onclick="close_pop();" />
	<input type="button" class="input_shopcart" value="<?php echo $this->_var['LANG']['TO_CART']; ?>" onclick="location.href=CART_URL;" />
</div>
</div>
<div class="blank"></div>