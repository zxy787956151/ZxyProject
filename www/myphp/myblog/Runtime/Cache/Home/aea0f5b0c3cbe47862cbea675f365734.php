<?php if (!defined('THINK_PATH')) exit();?><!--栏目分类-->
           <div class="lanmubox">
              <div class="hd">
               <ul><li>精心推荐</li><li>最新文章</li><li class="hd_3">随机文章</li></ul>
              </div>
              <div class="bd">
                <ul>
                    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><li><a href="<?php echo U('/'.$v['id']);?>" title="网站项目实战开发（-）"><?php echo ($v["title"]); ?>（<?php echo ($v["id"]); ?>）</a></li><?php endforeach; endif; ?>
				</ul>
                 <ul>
                    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><li><a href="<?php echo U('/'.$v['id']);?>" title="网站项目实战开发（-）"><?php echo ($v["title"]); ?>（<?php echo ($v["id"]); ?>）</a></li><?php endforeach; endif; ?>
				</ul>
                 <ul>
                    <?php if(is_array($blog)): foreach($blog as $key=>$v): ?><li><a href="<?php echo U('/'.$v['id']);?>" title="网站项目实战开发（-）"><?php echo ($v["title"]); ?>（<?php echo ($v["id"]); ?>）</a></li><?php endforeach; endif; ?>
				</ul>             
              </div>
           </div>
           <!--end-->