<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
	<div id="innovation_enter">
      <h1>创新分数录入</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Innovate/Iinsert');?>" method="post"> 
        <span>输入学生学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">
         <span>创新分数1项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数" name="grade1">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因" name="reason1">
         <span>创新分数2项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数" name="grade2">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因" name="reason2">
         <span>创新分数3项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数" name="grade3">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因" name="reason3">
         <input type="submit" class="btn btn-default" value="录入分数" name="submit"/>
      </form>
   </div><!-- 创新录入结束 -->
</body>
</html>