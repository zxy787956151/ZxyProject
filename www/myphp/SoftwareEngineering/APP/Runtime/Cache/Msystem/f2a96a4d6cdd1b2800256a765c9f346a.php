<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
 <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
  <div  id="innovation_query">
      <h1>创新分数查询</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Innovate/Iselect');?>" method="post">
        <span>输入学生学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">
         <input type="submit" class="btn btn-default" value="查询" name="submit"/>
         <div class="detail-table">
         <table class="table table-striped">
   <thead>
      <tr>
         <td>学号</td>
         <td>创新分数</td>
         <td>获分原因</td>
      </tr>
   </thead>
   <tbody>
    <?php if(is_array($foreach)): foreach($foreach as $key=>$v): ?><tr>
         <td><?php echo ($v["num"]); ?></td>
         <td><?php echo ($v["grade"]); ?></td>
         <td><?php echo ($v["reason"]); ?></td>
      </tr><?php endforeach; endif; ?>
      
   </tbody>
    </table>
       </div>
      </form>
   </div><!-- 创新查询结束 -->
</body>
</html>