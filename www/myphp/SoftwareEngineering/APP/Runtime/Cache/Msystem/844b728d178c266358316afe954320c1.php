<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>综合测评管理/注册</title>
	<link rel="stylesheet" type="text/css" href="__PUBLIC__/css/registered.css">
     <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
     <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
     <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div class="container-fluid" id="container-main">
     <div class="row-fluid">
          <div class="span12">
               <h2>
                    用户注册
               </h2>
               <p>  
                 学生综合测评管理系统
               </p>
               <div class="alert">
                     <button type="button" class="close" data-dismiss="alert">×</button>
                    <h4>
                         提示!
                    </h4> <strong>注意!</strong>教师注册账户需持有教师号码
               </div>
                <ul id="myTab" class="nav nav-tabs">
                 <li class="active">
                    <a href="#teacher" data-toggle="tab">教师注册</a></li>
                 <li><a href="#student" data-toggle="tab">学生注册</a></li>
                </ul>
               <div id="myTabContent" class="tab-content">
                <div class="tab-pane fade in active" id="teacher">
                 <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Registered/teacher');?>" method="post">
                  <span>教师号</span>
                  <input type="text" class="form-control" id="input" placeholder="请输入教师号码" name="tid">
                   <span>用户名</span>
                  <input type="text" class="form-control" id="input" placeholder="请输入用户名（可使用教师号码）" name="username">
                  <span>密码</span>
                  <input type="password" class="form-control" id="input" placeholder="请输入密码" name="password">
                  <span>确认密码</span>
                  <input type="password" class="form-control" id="input" placeholder="请确认密码（两次密码需一致）" name="password2">
                  <input type="submit" class="btn btn-default" id="button" name="submit" value="提交">
                 </form>
                </div>
               <div class="tab-pane fade" id="student">
                <form action="<?php echo U(GROUP_NAME . '/Registered/student');?>" method="post" role="form" class="form1">
                   <span>用户名</span>
                  <input type="text" class="form-control" id="input" placeholder="请输入用户名（可使用学号注册" name="username">
                  <span>密码</span>
                  <input type="password" name="password" class="form-control" id="input" placeholder="请输入密码">
                  <span>确认密码</span>
                  <input type="password" name="password2" class="form-control" id="input" placeholder="请确认密码（两次密码需一致）">
                  <input type="submit" name="submit" class="btn btn-default" id="button" value="提交"/>
                 </form>
               </div>
              </div>
          </div>
     </div>
</div>
</body>
</html>