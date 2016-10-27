<?php if ($this->_var['promote']): ?>
<div class="blank"></div>
<div class="promote_list">
<div class="inc_top" style="font-size:14px; font-weight:bold; color:#f30;"><b>促销活动</b></div>
<?php $_from = $this->_var['promote']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'promote_item');if (count($_from)):
    foreach ($_from AS $this->_var['promote_item']):
?>
<div class="item" style="padding:5px 0px 0px 0px;"><?php echo $this->_var['promote_item']['description']; ?></div>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</div>
<?php endif; ?>