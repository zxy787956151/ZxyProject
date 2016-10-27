<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title><?php echo ($CONF['mallTitle']); ?>后台管理中心</title>
      <link href="/wstmall_v1.4.4_160308/Public/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <link href="/wstmall_v1.4.4_160308/Apps/Admin/View/css/AdminLTE.css" rel="stylesheet" type="text/css" />
      <!--[if lt IE 9]>
      <script src="/wstmall_v1.4.4_160308/Public/js/html5shiv.min.js"></script>
      <script src="/wstmall_v1.4.4_160308/Public/js/respond.min.js"></script>
      <![endif]-->
      <script src="/wstmall_v1.4.4_160308/Public/js/jquery.min.js"></script>
      <script src="/wstmall_v1.4.4_160308/Public/plugins/bootstrap/js/bootstrap.min.js"></script>
      <script src="/wstmall_v1.4.4_160308/Public/js/common.js"></script>
      <script src="/wstmall_v1.4.4_160308/Public/plugins/plugins/plugins.js"></script>
   </head>
   <script>
   function del(id){
	   Plugins.confirm({title:'信息提示',content:'您确定要删除该商品评价吗?',okText:'确定',cancelText:'取消',okFun:function(){
		   Plugins.closeWindow();
		   Plugins.waitTips({title:'信息提示',content:'正在操作，请稍后...'});
		   $.post("<?php echo U('Admin/GoodsAppraises/del');?>",{id:id},function(data,textStatus){
					var json = WST.toJson(data);
					if(json.status=='1'){
						Plugins.setWaitTipsMsg({content:'操作成功',timeout:1000,callback:function(){
						location.reload();
						}});
					}else{
						Plugins.closeWindow();
						Plugins.Tips({title:'信息提示',icon:'error',content:'操作失败!',timeout:1000});
					}
				});
	   }});
   }
   function getAreaList(objId,parentId,t,id){
	   var params = {};
	   params.parentId = parentId;
	   $('#'+objId).empty();
	   if(t<1){
		   $('#areaId3').empty();
		   $('#areaId3').html('<option value="">请选择</option>');
	   }
	   var html = [];
	   $.post("<?php echo U('Admin/Areas/queryByList');?>",params,function(data,textStatus){
		    html.push('<option value="">请选择</option>');
			var json = WST.toJson(data);
			if(json.status=='1' && json.list.length>0){
				var opts = null;
				for(var i=0;i<json.list.length;i++){
					opts = json.list[i];
					html.push('<option value="'+opts.areaId+'" '+((id==opts.areaId)?'selected':'')+'>'+opts.areaName+'</option>');
				}
			}
			$('#'+objId).html(html.join(''));
	   });
   }
   $(function(){
	   <?php if(!empty($areaId1)): ?>getAreaList("areaId2",'<?php echo ($areaId1); ?>',0,'<?php echo ($areaId2); ?>');<?php endif; ?>
   })
   </script>
   <body class='wst-page'>
     <form method='post' action="<?php echo U('Admin/GoodsAppraises/index');?>">
       <div class='wst-tbar' style='height:25px;'>
   地区：<select id='areaId1' name='areaId1' onchange='javascript:getAreaList("areaId2",this.value,0)'>
               <option value=''>请选择</option>
               <?php if(is_array($areaList)): $i = 0; $__LIST__ = $areaList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value='<?php echo ($vo['areaId']); ?>' <?php if($areaId1 == $vo['areaId'] ): ?>selected<?php endif; ?>><?php echo ($vo['areaName']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
             </select>
             <select id='areaId2' name='areaId2'>
               <option value=''>请选择</option>
             </select>
        所属店铺：<input type='text' name='shopName' id='shopName' value='<?php echo ($shopName); ?>'/>
        商品：<input type='text' name='goodsName' id='goodsName' value='<?php echo ($goodsName); ?>'/>
      <button type='submit' class='btn btn-primary glyphicon glyphicon-search'>查询</button>
       </div>
       </form>
       <div class="wst-body"> 
        <table class="table table-hover table-striped table-bordered wst-list">
           <thead>
             <tr>
               <th width='40'>序号</th>
               <th colspan='2'>商品</th>
               <th width='60'>状态</th>
               <th>商品评分</th>
               <th>时效评分</th>
               <th>服务评分</th>
               <th width='150'>操作</th>
             </tr>
           </thead>
           <tbody>
            <?php if(is_array($Page['root'])): $i = 0; $__LIST__ = $Page['root'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
               <td rowspan='2'><?php echo ($i); ?></td>
               <td rowspan='2' width='50' style='border-right:0px;'>
               <img src='/wstmall_v1.4.4_160308/<?php echo ($vo['goodsThums']); ?>' width='50'/>
               </td>
               <td rowspan='2' width='140' style='border-left:0px;'>
               <span style='font-weight:bold;'><?php echo ($vo['goodsName']); ?></span><br/>订单：<?php echo ($vo['orderNo']); ?></td>
               <td >
               <?php if($vo['isShow'] == 1 ): ?><span class='label label-success'>显示</span>
               <?php else: ?>
               <span class='label label-warning'>隐藏</span><?php endif; ?>
               </td>
               <td>
               <div>
               	<?php $__FOR_START_32427__=0;$__FOR_END_32427__=$vo['goodsScore'];for($i=$__FOR_START_32427__;$i < $__FOR_END_32427__;$i+=1){ ?><img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/icon_score_yes.png"/><?php } ?>&nbsp;<?php echo ($vo['goodsScore']); ?> 分
				</div>
				</td>
				<td>
				<div>
               	<?php $__FOR_START_14600__=0;$__FOR_END_14600__=$vo['timeScore'];for($i=$__FOR_START_14600__;$i < $__FOR_END_14600__;$i+=1){ ?><img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/icon_score_yes.png"/><?php } ?>&nbsp;<?php echo ($vo['timeScore']); ?> 分
				</div>
                </td>
                <td>
              	<div>
               	<?php $__FOR_START_26785__=0;$__FOR_END_26785__=$vo['serviceScore'];for($i=$__FOR_START_26785__;$i < $__FOR_END_26785__;$i+=1){ ?><img src="/wstmall_v1.4.4_160308/Apps/Home/View/default/images/icon_score_yes.png"/><?php } ?>&nbsp;<?php echo ($vo['serviceScore']); ?> 分
				</div>
               </td>
               <td rowspan='2'>
               <?php if(in_array('sppl_04',$WST_STAFF['grant'])){ ?>
               <a class="btn btn-default glyphicon glyphicon-pencil" href="<?php echo U('Admin/GoodsAppraises/toEdit',array('id'=>$vo['id']));?>"">修改</a>&nbsp;
               <?php } ?>
               <?php if(in_array('sppl_03',$WST_STAFF['grant'])){ ?>
               <button type="button" class="btn btn-default glyphicon glyphicon-trash" onclick="javascript:del(<?php echo ($vo['id']); ?>)"">刪除</button>
               <?php } ?>
               </td>
             </tr>
             <tr>
               <td colspan='4' style='word-break:break-all;'>评价[<?php echo ($vo['loginName']); ?>]：<?php echo ($vo['content']); ?></td>
             </tr><?php endforeach; endif; else: echo "" ;endif; ?>
             <tr>
                <td colspan='8' align='center'><?php echo ($Page['pager']); ?></td>
             </tr>
           </tbody>
        </table>
       </div>
   </body>
</html>