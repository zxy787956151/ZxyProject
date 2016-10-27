<ul class="filter_sub_nav">
<?php $_from = $this->_var['sub_nav']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'nav_0_74296200_1460009797');if (count($_from)):
    foreach ($_from AS $this->_var['nav_0_74296200_1460009797']):
?>
<li <?php if ($this->_var['nav_0_74296200_1460009797']['current'] == 1): ?>class="current"<?php endif; ?>><a href="<?php echo $this->_var['nav_0_74296200_1460009797']['url']; ?>" title="<?php echo $this->_var['nav_0_74296200_1460009797']['name']; ?>"><?php echo $this->_var['nav_0_74296200_1460009797']['name']; ?></a></li>
<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
</ul>