<?php if (!defined('THINK_PATH')) exit(); if(is_array($answer)): foreach($answer as $key=>$v): ?><div id="answer">
        <div class="main_left_bottom_left">
            <img src="__PUBLIC__/Images/<?php echo ($v["pic"]); ?>" />
            <span id="username"><a>第<?php echo ($v["id"]); ?>楼</a><?php echo ($v["answername"]); ?></span> 
        </div>
        <div class="main_left_bottom_right">
            <p><?php echo ($v["content"]); ?></p>
            <div class="lhand">
                <div class="myshow" id="wrap">
                    <span class="lhands" >举报</span>
                    <ul class="myhide" id="show" style="display:none;">
                        <li><a href="#">个人企业举报</a></li>
                        <li><a href="#">垃圾信息举报</a></li>
                    </ul>
                </div>
                <img src="__PUBLIC__/Images/tip.png" /> |
                来自
                <a href="#">Android客户端</a>
                &nbsp;&nbsp;&nbsp;
                <?php echo (date('y-m-d H:i',$v["time"])); ?>
                <a href="<?php echo U(GROUP_NAME.'/Forum/index/#qwe',array('flag'=>2,'id'=>1 ));?>">回复</a>
            </div>
        </div>
    </div><?php endforeach; endif; ?>