<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
	<meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="tab-pane fade in active" id="information_entry">
      <h1>录入学生信息</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME .'/Information/insert');?>" method="post">
        <div class="form-group">
         <span>姓名</span>
        <input type="text" class="form-control" id="input" name="name" 
         placeholder="请输入名称">
         <span>性别</span>
         <select class="form-control" id="input" name="sex">
               <option value ="男">男</option>
               <option value ="女">女</option>
         </select>
         <span>出生日期</span>
        <input type="date" class="form-control" id="input" name="date"
         placeholder="请输入出生日期">
         <span>学号</span>
        <input type="text" class="form-control" id="input" name="num"
         placeholder="请输入学号">
         <span>系别</span>
         <select class="form-control" id="input" name="department">
               <option value ="软件工程">软件工程</option>
               <option value ="网络工程">网络工程</option>
               <option value ="计算机科学与技术">计算机科学与技术</option>
         </select>
         <span>班级</span>
         <select class="form-control" id="input" name="class" >
               <option value ="1班">1班</option>
               <option value ="2班">2班</option>
               <option value ="3班">3班</option>
               <option value ="4班">4班</option>
               <option value ="5班">5班</option>
         </select>
      <span role="form" class="form2">
        <div class="form-group">
         <div class="student_img"></div>
         <label for="inputfile">选择照片</label>
         <input type="file" id="inputfile" name="photo">
        </div>
         <span>籍贯</span>
        <input type="text" class="form-control" id="input" name="place" 
         placeholder="请输入籍贯">
         <span>入学日期</span>
        <input type="date" class="form-control" id="input" name="comeDate"
         placeholder="请输入入学日期">
        </div>
        <input type="submit" name="submit" class="btn btn-default" value="提交"/>
      </span>
      </form>
   </div>
</body>
</html>