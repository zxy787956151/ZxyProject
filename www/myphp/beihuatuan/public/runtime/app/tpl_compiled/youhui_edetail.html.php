<?php echo $this->fetch('inc/header.html'); ?> 
<div class="blank"></div>
<div class="long f_l">
	<div class="youhui_info_box clearfix">
		<div class="youhui_image f_l">
			<img src="<?php 
$k = array (
  'name' => 'get_spec_image',
  'v' => $this->_var['event']['icon'],
  'w' => '330',
  'h' => '230',
  'g' => '1',
);
echo $k['name']($k['v'],$k['w'],$k['h'],$k['g']);
?>" />
		</div>
		<div class="f_r" style="width:390px;">
			<div class="event_title"><?php echo $this->_var['event']['name']; ?></div>
			<div class="blank"></div>
			时间：
			<?php if ($this->_var['event']['submit_begin_time'] == 0): ?>
				<?php else: ?>
				<b class="color_blue"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['event']['submit_begin_time'],
  'f' => 'Y-m-d',
);
echo $k['name']($k['v'],$k['f']);
?> <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['event']['submit_begin_time'],
  'f' => 'H:i',
);
echo $k['name']($k['v'],$k['f']);
?></b>
			<?php endif; ?>						
			<?php if ($this->_var['event']['submit_end_time'] == 0): ?>
				<span class="color_blue"><?php echo $this->_var['LANG']['NO_END_TIME']; ?></span>
				<?php else: ?>
				<span class="color_blue"><?php echo $this->_var['LANG']['TO']; ?> </span><b class="color_blue"><?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['event']['submit_end_time'],
  'f' => 'Y-m-d',
);
echo $k['name']($k['v'],$k['f']);
?> <?php 
$k = array (
  'name' => 'to_date',
  'v' => $this->_var['event']['submit_end_time'],
  'f' => 'H:i',
);
echo $k['name']($k['v'],$k['f']);
?></b>
			<?php endif; ?>
			<div class="blank"></div>
			地址：<span class="color_blue"><?php echo $this->_var['event']['address']; ?></span>
			<div class="blank"></div>
			<?php if ($this->_var['event']['brief']): ?>
			<div class="brief"><?php 
$k = array (
  'name' => 'nl2br',
  'v' => $this->_var['event']['brief'],
);
echo $k['name']($k['v']);
?></div>
			<div class="blank"></div>
			<?php endif; ?>
			报名：<b class="color_blue"><?php echo $this->_var['event']['submit_count']; ?></b><span class="color_blue">人</span>
			<div class="blank"></div>
			
			<?php if ($this->_var['event']['submit_begin_time'] > get_gmtime ( )): ?>
			<input type="button" value="" name="submit_btn" class="input_baomin_nostart" />
			<?php elseif ($this->_var['event']['submit_end_time'] < get_gmtime ( ) && $this->_var['event']['submit_end_time'] != 0): ?>
			<input type="button" value="" name="submit_btn" class="input_baomin_end" />
			<?php else: ?>
			<input type="button" value="" name="submit_btn" class="input_baomin" onclick="event_submit(<?php echo $this->_var['event']['id']; ?>);" />
			<?php endif; ?>
			<div class="blank"></div>
			<div class="f_l"><b class="color_blue"><?php echo $this->_var['event']['reply_count']; ?></b>&nbsp;评论&nbsp;&nbsp;|&nbsp;&nbsp;</div>
			<!-- JiaThis Button BEGIN -->
			<div id="ckepop" class="f_l">
				<span class="jiathis_txt">分享到：</span>
				<a class="jiathis_button_qzone"></a>
				<a class="jiathis_button_tsina"></a>
				<a class="jiathis_button_tqq"></a>
				<a class="jiathis_button_renren"></a>
				<a class="jiathis_button_kaixin001"></a>
			</div>
			<script type="text/javascript" src="http://v2.jiathis.com/code/jia.js" charset="utf-8"></script>
			<!-- JiaThis Button END -->
		</div>
		<div class="blank"></div>		
	<div class="youhui_detail_row_title">活动详情</div>
	<div class="blank"></div>
	<div class="lazy"><?php echo $this->_var['event']['content']; ?></div>
	<div class="blank"></div>
	<div class="youhui_detail_row_title" id="detail_box">参加者（<?php echo $this->_var['event']['submit_count']; ?>人）</div>
	<div class="blank"></div>
	<?php $_from = $this->_var['submit_result']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }; $this->push_vars('', 'submit_item');if (count($_from)):
    foreach ($_from AS $this->_var['submit_item']):
?>
	<div class="f_l tc" style="width:80px; overflow:hidden;">
	<?php 
$k = array (
  'name' => 'show_avatar',
  'uid' => $this->_var['submit_item']['user_id'],
  'type' => 'small',
);
echo $k['name']($k['uid'],$k['type']);
?>
	<div class="blank5"></div>
	<?php 
$k = array (
  'name' => 'get_user_name',
  'value' => $this->_var['submit_item']['user_id'],
);
echo $k['name']($k['value']);
?> 
	</div>
	
	
	<?php endforeach; endif; unset($_from); ?><?php $this->pop_vars();; ?>
	
	<div class="blank"></div>
	<?php if ($this->_var['event']['is_effect'] == 1): ?>
	<div class="youhui_detail_row_title" id="detail_box">评论</div>
	<div class="blank"></div>
	<?php 
$k = array (
  'name' => 'load_comment',
  'rel_table' => 'event',
  'is_effect' => '1',
  'is_image' => '1',
  'width' => '700px',
  'height' => '80px',
);
echo $this->_hash . $k['name'] . '|' . base64_encode(serialize($k)) . $this->_hash;
?> 
	<?php endif; ?>
	</div><!--end youhui_info_box-->
	
</div>
<div class="short f_r">
	
	<style type="text/css">
		#container{height:193px; width: 193px; border:#ccc solid 1px;}  
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script> 
	<script type="text/javascript">
		function draw_map(xpoint,ypoint)
		{
			var map = new BMap.Map("container"); 
	        var opts = {type: BMAP_NAVIGATION_CONTROL_ZOOM}  
	        map.addControl(new BMap.NavigationControl());  
	        // map.centerAndZoom(new BMap.Point(116.404, 39.915), 11);  
	        // 创建地理编码服务实例  
	        var point = new BMap.Point(xpoint,ypoint);
	        
	        // 将结果显示在地图上，并调整地图视野  
	        map.centerAndZoom(point, 16);  
	        map.addOverlay(new BMap.Marker(point));
		}
		
		$(document).ready(function(){
			draw_map('<?php echo $this->_var['event']['xpoint']; ?>','<?php echo $this->_var['event']['ypoint']; ?>');
		});
	</script>
	<div id="container"></div>
	
	
</div>
<div class="blank"></div>
<?php echo $this->fetch('inc/footer.html'); ?>