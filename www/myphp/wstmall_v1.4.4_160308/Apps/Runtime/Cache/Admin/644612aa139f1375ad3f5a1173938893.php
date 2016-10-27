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
      <script src="/wstmall_v1.4.4_160308/Public/plugins/formValidator/formValidator-4.1.3.js"></script>
   </head>
   <script>
   $(function () {
	   $.formValidator.initConfig({
		   theme:'Default',mode:'AutoTip',formID:"myform",debug:true,submitOnce:true,onSuccess:function(){
				   edit();
			       return false;
			},onError:function(msg){
		}});

	   $("#payName").formValidator({onShow:"",onFocus:"至少要输入1个字符",onCorrect:"输入正确"}).inputValidator({min:1,max:200,onError:"你输入的长度不正确,请确认"});
	   $("#payDesc").formValidator({onShow:"",onFocus:"至少要输入1个字符",onCorrect:"输入正确"}).inputValidator({min:1,onError:"你输入的长度不正确,请确认"});
	   $("#payOrder").formValidator({onShow:"",onFocus:"至少要输入1个字符",onCorrect:"输入正确"}).inputValidator({min:1,max:5,onError:"你输入的长度不正确,请确认"});
	   
   });
   function edit(){
	   var params = {};
	   params.id = $('#id').val();
	   params.payName = $('#payName').val();
	   params.payDesc = $('#payDesc').val();
	   params.payOrder = $('#payOrder').val();

	   Plugins.waitTips({title:'信息提示',content:'正在提交数据，请稍后...'});
		$.post("<?php echo U('Admin/Payments/edit');?>",params,function(data,textStatus){
			var json = WST.toJson(data);
			if(json.status=='1'){
				Plugins.setWaitTipsMsg({ content:'操作成功',timeout:1000,callback:function(){
				   location.href="<?php echo U('Admin/Payments/index');?>";
				}});
			}else{
				Plugins.closeWindow();
				Plugins.Tips({title:'信息提示',icon:'error',content:'操作失败!',timeout:1000});
			}
		});
   }
   </script>
   <body class="wst-page">
       <form name="myform" method="post" id="myform">
        <input type='hidden' id='id' value='<?php echo ($object["id"]); ?>'/>
        <input type='hidden' id='payCode' value='<?php echo ($object["payCode"]); ?>'/>
        <table class="table table-hover table-striped table-bordered wst-form">
           <tr>
             <th width='200' align='right'>支付名称<font color='red'>*</font>：</th>
             <td><input type='text' id='payName' class="form-control wst-ipt" value='<?php echo ($object["payName"]); ?>' maxLength='50'/></td>
           </tr>
           <tr>
             <th width='200' align='right'>支付方式描述<font color='red'>*</font>：</th>
             <td><textarea id='payDesc' style="width:550px;height:100px;"><?php echo ($object["payDesc"]); ?></textarea></td>
           </tr>
           <tr>
             <th width='200' align='right'>排序号<font color='red'>*</font>：</th>
             <td><input type='text' id='payOrder' class="form-control wst-ipt" value='<?php echo ($object["payOrder"]); ?>' maxLength='50'/></td>
           </tr>
           <tr>
             <th width='200' align='right'>是否在线支付<font color='red'>*</font>：</th>
             <td>
				<?php if($vo['isOnline'] == 1): ?>是
              	<?php else: ?>
              		否<?php endif; ?>
			</td>
           </tr>
           <tr>
             <td colspan='2' style='padding-left:250px;'>
                 <button type="submit" class="btn btn-success">保&nbsp;存</button>
                 <button type="button" class="btn btn-primary" onclick='javascript:location.href="<?php echo U('Admin/Payments/index');?>"'>返&nbsp;回</button>
             </td>
           </tr>
        </table>
       </form>
   </body>
</html>