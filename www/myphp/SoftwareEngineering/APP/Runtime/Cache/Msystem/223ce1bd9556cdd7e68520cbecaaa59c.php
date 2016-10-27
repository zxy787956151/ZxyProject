<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
  <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div >
      <h1>更改学生信息</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Information/update');?>" method="post">
        <div class="form-group" id="information_query">
          <span>请根据学号更改信息</span>
          <br/>
          <span style="color:red">不需修改的项请一并填好!</span>
         <br/>
         <span>学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">

         <span>姓名</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入名称" name="name">
         <span>性别</span>
         <select class="form-control" id="input" name="sex">
               <option value ="1">男</option>
               <option value ="2">女</option>
         </select>
         <span>出生日期</span>
        <input type="date" class="form-control" id="input" 
         placeholder="请输入出生日期" name="date">
         
         <span>系别</span>
         <select class="form-control" id="input" name="department">
               <option value ="1">软件工程</option>
               <option value ="2">网络工程</option>
               <option value ="3">计算机科学与技术</option>
         </select>
         <span>班级</span>
         <select class="form-control" id="input" name="class">
               <option value ="1">1班</option>
               <option value ="2">2班</option>
               <option value ="3">3班</option>
               <option value ="4">4班</option>
               <option value ="5">5班</option>
         </select>
      <span role="form" class="form2">
        <div class="form-group">
         <div class="student_img"></div>
         <label for="inputfile">选择照片</label>
         <input type="file" id="inputfile" name="photo">
        </div>
         <span>籍贯</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入籍贯" name="place">
         <span>入学日期</span>
        <input type="date" class="form-control" id="input" 
         placeholder="请输入入学日期" name="comeDate">
        </div>
        <input type="submit" class="btn btn-default" name="submit" value="提交"/>
      </span>
      </form>
      <form role="form" class="form3" action="<?php echo U(GROUP_NAME . '/Information/delete');?>" method="post">
         <h2>删除学生信息</h2>
         <span>请根据学号删除信息</span>
         <br/><br/>
         <span>输入需删除学生的学号</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">
         <input type="submit" class="btn btn-default" name="submit" value="删除">
      </form>
         
   </div>
</body>
</html>