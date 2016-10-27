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
      <form role="form" class="form1">
         <span>输入查询学生学号</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入学生学号">
         <button type="submit" class="btn btn-default" style="margin-top:10px;">查询学生成绩</button>
      </form>
      <div class="detail-table">
        <table class="table table-striped">
   <thead>
      <tr>
         <td>学号</td>
         <td>姓名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>活动分数</td>
         <td>体育成绩</td>
         <td>综测成绩</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
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