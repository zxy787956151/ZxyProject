<?php if (!defined('THINK_PATH')) exit();?>       <?php if(is_array($forum)): foreach($forum as $key=>$v): ?><div class="main_left_top">
                <div class="main_left_top_left">      
                    <span>楼主：<?php echo ($v["louzhu"]); ?></span> 
                </div>
                <div class="main_left_top_right">
                    <input type="button" value="只看楼主" class="btn"/>
                    <input type="button" value="收藏" class="btn" />
                    <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>1,'fid'=>$v['id']));?>"><input type="button" value="回复" class="btn" /></a>
                </div>
            </div>
            <div class="main_left_bottom">
                <div class="main_left_bottom_left house">
                    <img src="__PUBLIC__/Images/" />
                </div>
                <div class="main_left_bottom_right">
                    <p><?php echo ($v["content"]); ?></p>
                    <div class="lhand">
                        <div class="myshow" id="wrap">
                            <span class="lhands" >举报</span>
                        </div>
                        <img src="__PUBLIC__/Images/tip.png" /> |
                        来自
                        <a href="#">Android客户端</a>
                        &nbsp;&nbsp;&nbsp;
                        <?php echo (date('y-m-d H:i',$v["time"])); ?>
                        <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>1,'fid'=>$v['id']));?>">回复</a>
                    </div>
                </div>
            </div><!--main_left_bottom结束--><?php endforeach; endif; ?>