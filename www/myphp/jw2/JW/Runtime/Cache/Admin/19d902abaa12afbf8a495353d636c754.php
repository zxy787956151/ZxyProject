<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<title>document</title>
<link rel="stylesheet" type="text/css" href="__PUBLIC__/Css/public.css" />
</head>
<body>
	<table id="table" border='1'>
        <tr>
           <th width='5%'>ID</th>
           <th>标题</th>
           <th>所属分类</th>
           <th>点击次数</th>
           <th>发布时间</th>
           <th>发布人</th>
           <th>操作</th>
        </tr>
        <?php if(is_array($advice)): foreach($advice as $key=>$v): ?><tr>
          <td><?php echo ($v["id"]); ?></td>
          <td><?php echo ($v["title"]); if(is_array($v["attr"])): foreach($v["attr"] as $key=>$value): ?><strong style="color:<?php echo ($value["color"]); ?>;padding:0 5px;">[<?php echo ($value["name"]); ?>]</strong><?php endforeach; endif; ?>
          </td>
          <td width='10%'><?php echo ($v["direction"]); ?></td>
          <td width='10%'><?php echo ($v["click"]); ?></td>
          <td width='15%'><?php echo (date('y-m-d H:i',$v["time"])); ?></td>
          <td width='10%'><?php echo ($v["xzname"]); ?></td>
          <td width='20%'>    
            <?php if(ACTION_NAME == "index"): ?><a href="">[修改]</a>
               <a href="<?php echo U(GROUP_NAME.'/Advice/toTrach',array('id'=>$v['id'],'type'=>1));?>">[删除]</a>
            <?php else: ?>
               <a href="<?php echo U(GROUP_NAME.'/Advice/toTrach',array('id'=>$v['id'],'type'=>0));?>">[还原]</a>
               <a href="<?php echo U(GROUP_NAME.'/Advice/delete',array('id'=>$v['id']));?>">[彻底删除]</a><?php endif; ?>
          </td>
        </tr><?php endforeach; endif; ?>
        <?php if(ACTION_NAME == "index"): ?><tr></tr>
        <?php else: ?>
            <tr><td colspan='6' align="center"><a href="<?php echo U(GROUP_NAME.'/Advice/clear',array('type'=>1));?>"><input type="button" value="清空回收站"/></a></td>
            </tr><?php endif; ?>
	</table>
</body>
</html>