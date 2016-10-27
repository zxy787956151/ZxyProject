<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
 <div id="information_statistical">
      <h1>信息统计查询</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Information/selClass');?>" method="post">
         <span>选择系别</span>
         <select class="form-control" id="input" name="department">
               <option value ="软件工程">软件工程</option>
               <option value ="网络工程">网络工程</option>
               <option value ="计算机科学与技术">计算机科学与技术</option>
         </select>
         <span>选择班级</span>
         <select class="form-control" id="input" name="class">
               <option value ="1班">1班</option>
               <option value ="2班">2班</option>
               <option value ="3班">3班</option>
               <option value ="4班">4班</option>
         </select>
         <input type="submit" name="submit" class="btn btn-default" style="margin-top:10px;" value="查询该班级">
      </form>
      <div class="detail-table">
        <table class="table table-striped">
  
   <?php
 $where['department']=$_POST['department']; $where['class']=$_POST['class']; $info = M('information'); $selClass = $info->where($where)->select(); ?>
   <?php if(is_array($selClass)): foreach($selClass as $key=>$v): ?><thead>
      <tr>
         <th>学号</th>
         <th>姓名</th>
         <th>性别</th>
         <th>系别</th>
         <th>班级</th>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td><?php echo ($v["num"]); ?></td>
         <td><?php echo ($v["name"]); ?></td>
         <td><?php echo ($v["sex"]); ?></td>
         <td><?php echo ($v["department"]); ?></td>
         <td><?php echo ($v["class"]); ?></td>
      </tr>
   </tbody><?php endforeach; endif; ?>
    </table>
      </div>
   </div>
</body>
</html>