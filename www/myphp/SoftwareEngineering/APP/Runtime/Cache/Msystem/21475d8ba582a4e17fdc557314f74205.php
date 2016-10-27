<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
  <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div  id="information_query">
      <h1>查看明细信息</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Information/select');?>" method="post">
        <span>请根据学号查询信息</span>
         <br/><br/>
         <span>请输入学号</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">
         <span>该学生详细信息</span>
         <table class="table table-striped" style="width:700px;">
          <?php if(is_array($select)): foreach($select as $key=>$v): ?><thead>
           <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>出生日期</th> 
            <th>所在专业</th>
           </tr>
          </thead>

          <tbody>
           <tr>
            <td><?php echo ($v["name"]); ?></td>
            <td><?php echo ($v["sex"]); ?></td>
            <td><?php echo ($v["date"]); ?></td>
            <td><?php echo ($v["department"]); ?></td>
           </tr>  
          </tbody>
         </table>
         <table class="table table-striped" style="width:700px;">
          <thead>
           <tr>
            <th>学号</th>
            <th>班级</th>
            <th>入学日期</th>
            <th>所属籍贯</th>
           </tr>
          </thead>
          <tbody>
           <tr>
            <td><?php echo ($v["num"]); ?></td>
            <td><?php echo ($v["class"]); ?></td>
            <td><?php echo ($v["comeDate"]); ?></td>
            <td><?php echo ($v["place"]); ?></td>
           </tr>  
          </tbody><?php endforeach; endif; ?>
         </table>

         <input type="submit" class="btn btn-default" name="submit" value="查询">
      </form>
   </div>
</body>
</html>