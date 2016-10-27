<?php if (!defined('THINK_PATH')) exit();?><div class="main">
    	<table>
        <th>ID</th>
        <th>名称</th>
        <th>级别</th>
        <th>排序</th>
        <?php if(is_array($forum)): foreach($forum as $key=>$v): ?><tr>
                <td><?php echo ($v["id"]); ?></td>
                <td><?php echo ($v["louzhu"]); ?></td>
                <td><?php echo ($v["content"]); ?></td>
                <td>
                    <?php echo ($v["time"]); ?>
                </td>
            </tr><?php endforeach; endif; ?>
        </table>
    </div>