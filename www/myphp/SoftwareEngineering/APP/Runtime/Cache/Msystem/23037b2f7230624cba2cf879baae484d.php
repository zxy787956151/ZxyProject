<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
   <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div id="results_query">
      <h1>综测分数管理</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Grade/Gcalculate');?>" method="post">
         <span>输入查询学生学号</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入学生学号" name="num">
         <input type="submit" class="btn btn-default" style="margin-top:10px;" value="查询学生成绩" name="submit" />
      </form>
      <div class="detail-table">
        <table class="table table-striped">
   <thead>
      <tr>
         <td>学号</td>
         <td>姓名</td>
         <td><?php echo ($_SESSION['a']); ?></td>
         <td><?php echo ($_SESSION['b']); ?></td>
         <td><?php echo ($_SESSION['c']); ?></td>
         <td><?php echo ($_SESSION['d']); ?></td>
         <td><?php echo ($_SESSION['e']); ?></td>
      </tr>
   </thead>
   <tbody>
      
      <tr>
         <td><?php echo ($_SESSION['num']); ?></td>
         <td><?php echo ($_SESSION['name']); ?></td>
         <td><?php echo ($_SESSION['A']); ?></td>
         <td><?php echo ($_SESSION['B']); ?></td>
         <td><?php echo ($_SESSION['C']); ?></td>
         <td><?php echo ($_SESSION['D']); ?></td>
         <td><?php echo ($_SESSION['E']); ?></td>
      </tr>
      <tr>
         <td><?php echo ($_SESSION['f']); ?></td>
         <td><?php echo ($_SESSION['g']); ?></td>
         <td><?php echo ($_SESSION['h']); ?></td>
         <td><?php echo ($_SESSION['i']); ?></td>
         <td>体育</td>
         <td>活动加分</td>
         <td>综测成绩</td>
      </tr>
      <tr>
         <td><?php echo ($_SESSION['F']); ?></td>
         <td><?php echo ($_SESSION['G']); ?></td>
         <td><?php echo ($_SESSION['H']); ?></td>
         <td><?php echo ($_SESSION['I']); ?></td>
         <td><?php echo ($_SESSION['sports']); ?></td>
         <td><?php echo ($_SESSION['active']); ?></td>
         <td><?php echo ($_SESSION['all']); ?></td>
      </tr>
   </tbody>
    </table>
      </div>
      <div class="alert" style="width:60%;margin-top:-10%;">
          <button type="button" class="close" data-dismiss="alert">×</button>
          <h4>
          提示!
          </h4>活动加分乘20%、学习乘75%、体育5%所得分即为该学生的综测成绩
      </div>
   </div><!-- 综测结束 -->
</body>
</html>