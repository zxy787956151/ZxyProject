<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
   <meta charset="UTF-8">
   <title>学生综合测评管理系统</title>
   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
   <base target="iframe"/>
</head>
<body>
<div class="title">
   <div class="title_img"></div>
   <h1>学生综合测评管理系统</h1>
   <small>Comprehensive assessment management system</small>
   <a href="#">退出</a>
   <a href="login.html">登录</a>
</div>
<div class="container_first">
 <div class="panel-group" id="accordion">
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      <h4 class="panel-title">
        <span data-toggle="collapse" data-parent="#accordion" 
          href="#collapseOne" style="cursor:pointer;">
          学生信息管理▾
        </span>
      </h4>
    </div>
    <div id="collapseOne" class="panel-collapse collapse in">
      <div class="panel-body">
       <ul id="myTab" class="nav pills-tabs"style="text-align: center;">
          <li>
            <a href="#information_entry" data-toggle="tab">学生信息录入</a>
          </li>
          <li>
            <a href="#information_delete" data-toggle="tab">学生信息删改</a>
          </li>
          <li>
            <a href="#information_query" data-toggle="tab">查看明细信息</a>
          </li>
          <li>
            <a href="#information_statistical" data-toggle="tab">信息统计查询</a>
          </li>
       </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      <h4 class="panel-title">
        <span data-toggle="collapse" data-parent="#accordion" 
          href="#collapseTwo" style="cursor:pointer;">
          学生成绩管理▾
        </span>
      </h4>
    </div>
    <div id="collapseTwo" class="panel-collapse collapse">
      <div class="panel-body" style="cursor:pointer;">
       <ul id="myTab" class="nav pills-tabs"style="text-align: center;">
          <li>
            <a href="#results_entry" data-toggle="tab">成绩学分录入</a>
          </li>
          <li>
            <a href="#results_delete" data-toggle="tab">成绩学分更改</a>
          </li>
          <li>
            <a href="#results_query" data-toggle="tab">综测分数管理</a>
          </li>
          <li>
            <a href="#results_ranking" data-toggle="tab">学生成绩排名</a>
          </li>
       </ul>
      </div>
    </div>
  </div>
  <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      <h4 class="panel-title">
        <span data-toggle="collapse" data-parent="#accordion" 
          href="#collapseThree" style="cursor:pointer;">
          创新分数管理▾
        </span>
      </h4>
    </div>
    <div id="collapseThree" class="panel-collapse collapse">
      <div class="panel-body">
        <ul id="myTab" class="nav pills-tabs"style="text-align: center;">
          <li>
            <a href="#innovation_enter" data-toggle="tab">创新分数录入</a>
          </li>
          <li>
            <a href="#innovation_query" data-toggle="tab">创新分数查询</a>
          </li>
       </ul>
      </div>
    </div>
  </div>
    <div class="panel panel-default">
    <div class="panel-heading" style="text-align: center;">
      <h4 class="panel-title">
        <span data-toggle="collapse" data-parent="#accordion" 
          href="#collapseFour" style="cursor:pointer;">
          活动奖惩管理▾
        </span>
      </h4>
    </div>
    <div id="collapseFour" class="panel-collapse collapse">
      <div class="panel-body" style="cursor:pointer;">
       <ul id="myTab" class="nav pills-tabs"style="text-align: center;">
          <li>
            <a href="#activity_enter" data-toggle="tab">活动奖惩录入</a>
          </li>
          <li>
            <a href="#activity_query" data-toggle="tab">活动奖惩查询</a>
          </li>
          <li>
       </ul>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container_second">
  <div id="myTabContent" class="tab-content">
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
        <button type="submit" name="submit" class="btn btn-default">提交</button>
      </span>
      </form>
   </div>
   <div class="tab-pane fade" id="information_delete">
      <h1>更改学生信息</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Information/update');?>" method="post">
        <div class="form-group">
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
   <div class="tab-pane fade" id="information_query">
      <h1>查看明细信息</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME . '/Information/select');?>" method="post">
        <span>请根据学号查询信息</span>
         <br/><br/>
         <span>请输入学号</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入学号" name="num">
         <span>该学生详细信息</span>
         <table class="table table-striped" style="width:700px;">
          <thead>
           <tr>
            <th>姓名</th>
            <th>性别</th>
            <th>出生日期</th> 
            <th>所在专业</th>
           </tr>
          </thead>

          <?php if(is_array($select)): foreach($select as $key=>$v): ?><tbody>
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
   <div class="tab-pane fade" id="information_statistical">
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
   <div class="tab-pane fade" id="results_entry">
      <h1>成绩学分录入</h1>
      <form role="form" class="form1">
        <span>请输入学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学号">
         <button type="submit" class="btn btn-default" style="margin-top:10px;">查询该学生课表</button>    
         <div class="results-table">
        <table class="table table-striped">
       <thead>
      <tr>
         <th>序号</th>
         <th>课程名称</th>
      </tr>
      </thead>
      <tbody>
      <tr>
         <td>1</td>
         <td>***</td>
      </tr> 
      <tr>
         <td>2</td>
         <td>***</td>
      </tr>
      <tr>
         <td>3</td>
         <td>***</td>
      </tr>
      <tr>
         <td>4</td>
         <td>***</td>
      </tr>
      <tr>
         <td>5</td>
         <td>***</td>
      </tr>
      <tr>
         <td>6</td>
         <td>***</td>
      </tr>
      <tr>
         <td>7</td>
         <td>***</td>
      </tr>
      <tr>
         <td>8</td>
         <td>***</td>
      </tr>
      <tr>
         <td>9</td>
         <td>***</td>
      </tr>
      </tbody>
     </table>
      </div>
    </form>
    <form class="re-form2">
      <table class="table table-striped" id="re-table">
      <thead>
      <tr>
         <th>课序号</th>
         <td>1</td>
         <td>2</td>
         <td>3</td>
         <td>4</td>
         <td>5</td>
      </tr>
      </thead>
      <tbody>
      <tr>
         <td>成绩</td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
      </tr> 
      <tr>
         <td>*</td>
         <td>6</td>
         <td>7</td>
         <td>8</td>
         <td>9</td>
         <td>10</td>
      </tr> 
      <tr>
         <td>成绩</td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
      </tr> 
      </tbody>
      </table>
      <span>请活动加分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入活动加分">
      <span>请输入体育分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入体育分">
      <button type="submit" class="btn btn-default" style="margin-top:10px;">录入分数</button>
    </form>
   </div>
   <div class="tab-pane fade" id="results_delete">
      <h1>成绩学分更改</h1>
      <form role="form" class="form1">
        <span>请输入学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学号">
         <button type="submit" class="btn btn-default" style="margin-top:10px;">查询该学生课表</button>    
         <div class="results-table">
        <table class="table table-striped">
       <thead>
      <tr>
         <th>序号</th>
         <th>课程名称</th>
      </tr>
      </thead>
      <tbody>
      <tr>
         <td>1</td>
         <td>***</td>
      </tr> 
      <tr>
         <td>2</td>
         <td>***</td>
      </tr>
      <tr>
         <td>3</td>
         <td>***</td>
      </tr>
      <tr>
         <td>4</td>
         <td>***</td>
      </tr>
      <tr>
         <td>5</td>
         <td>***</td>
      </tr>
      <tr>
         <td>6</td>
         <td>***</td>
      </tr>
      <tr>
         <td>7</td>
         <td>***</td>
      </tr>
      <tr>
         <td>8</td>
         <td>***</td>
      </tr>
      <tr>
         <td>9</td>
         <td>***</td>
      </tr>
      </tbody>
     </table>
      </div>
    </form>
    <form class="re-form2">
      <table class="table table-striped" id="re-table">
      <thead>
      <tr>
         <th>课序号</th>
         <td>1</td>
         <td>2</td>
         <td>3</td>
         <td>4</td>
         <td>5</td>
      </tr>
      </thead>
      <tbody>
      <tr>
         <td>成绩</td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
      </tr> 
      <tr>
         <td>*</td>
         <td>6</td>
         <td>7</td>
         <td>8</td>
         <td>9</td>
         <td>10</td>
      </tr> 
      <tr>
         <td>成绩</td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
         <td>
           <input type="text" class="table-input">
         </td>
      </tr> 
      </tbody>
      </table>
      <span>请输入活动加分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入活动加分">
      <span>请输入体育分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入体育分">
      <button type="submit" class="btn btn-default" style="margin-top:10px;">更改分数</button>
    </form>
   </div>
   <div class="tab-pane fade" id="results_query">
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
   <div class="tab-pane fade" id="results_ranking">
      <h1>学生成绩排名</h1>
      <form role="form" class="form1">
         <span>选择系别</span>
         <select class="form-control" id="input" >
               <option value ="1">计算机科学技术学院</option>
               <option value ="2">机械工程学院</option>
               <option value ="3">电气学院</option>
               <option value ="4">体育学院</option>
         </select>
         <button type="submit" class="btn btn-default" style="margin-top:10px;">查询专业排名</button>
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
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>课程名</td>
         <td>活动分数</td>
         <td>体育成绩</td>
         <td>综测成绩</td>
         <td>名次</td>
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
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
         <td>***</td>
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
   </div><!-- 排名结束 -->
   <div class="tab-pane fade" id="innovation_enter">
      <h1>创新分数录入</h1>
      <form role="form" class="form1">
        <span>输入学生学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号">
         <span>创新分数1项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因">
         <span>创新分数2项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因">
         <span>创新分数3项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入分数">
         <span>原因事项</span>
         <input type="text" class="form-control" id="input" 
         placeholder="请输入加分原因">
         <button type="submit" class="btn btn-default">录入分数</button>
      </form>
   </div><!-- 创新录入结束 -->
   <div class="tab-pane fade" id="innovation_query">
      <h1>创新分数查询</h1>
      <form role="form" class="form1">
        <span>输入学生学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号">
         <button type="submit" class="btn btn-default">查询</button>
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
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
   </tbody>
    </table>
       </div>
      </form>
   </div><!-- 创新查询结束 -->
   <div class="tab-pane fade" id="activity_enter">
      <h1>活动奖惩录入</h1>
     <!--  <form role="form" class="form1">
        <span>输入查询学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学生学号">
        <button type="submit" class="btn btn-default" style="margin-top:10px;">查询学生成绩</button>
     </form> -->
      <div class="detail-table">
        <table class="table table-striped">
   <thead>
      <tr>
         <td>竞赛级别</td>
         <td>一等奖</td>
         <td>二等奖</td>
         <td>三等奖</td>
         <td>优秀奖</td>
         <td>无名次</td>
         <td>组织者</td>
         <td>演员/主持人</td>
         <td>志愿者</td>
         <td>特殊贡献</td>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>全国级活动</td>
         <td>5学分</td>
         <td>4学分</td>
         <td>3学分</td>
         <td>2学分</td>
         <td>1学分</td>
         <td>---</td>
         <td>---</td>
         <td>---</td>
         <td>---</td>
      </tr>
      <tr>
         <td>省市级活动</td>
         <td>4学分</td>
         <td>3学分</td>
         <td>2学分</td>
         <td>1学分</td>
         <td>0.5学分</td>
         <td>---</td>
         <td>---</td>
         <td>---</td>
         <td>---</td>
      </tr>
      <tr>
         <td>学校级活动</td>
         <td>2学分</td>
         <td>1学分</td>
         <td>0.5学分</td>
         <td>0.5学分</td>
         <td>0.5学分</td>
         <td>2学分</td>
         <td>0.5学分</td>
         <td>1学分</td>
         <td>1学分</td>
      </tr>
      <tr>
         <td>学院级活动</td>
         <td>1学分</td>
         <td>1学分</td>
         <td>0.5学分</td>
         <td>0.2学分</td>
         <td>0.1学分</td>
         <td>1学分</td>
         <td>0.2学分</td>
         <td>0.5学分</td>
         <td>0.5学分</td>
      </tr>
   </tbody>
    </table>
    <span>请输入学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学号">
      </div>
      <span>请输入加分分数</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入分数">
        <input type="text" class="form-control" id="input" 
        placeholder="请输入原因">
        <span>请输入减分分数</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入分数">
        <input type="text" class="form-control" id="input" 
        placeholder="请输入原因">
        <button type="submit" class="btn btn-default" style="margin-top:10px;">录入</button>
   </div><!-- 活动奖惩录入结束 -->
   <div class="tab-pane fade" id="activity_query">
      <h1>活动奖惩查询</h1>
      <form role="form" class="form1" action="" method="post">
        <span>输入学生学号</span>
        <input type="text" class="form-control" id="input" 
         placeholder="请输入学号">
         <button type="submit" class="btn btn-default">查询</button>
         <div class="activity-table">
         <table class="table table-striped">
   <thead>
      <tr>
         <td>学号</td>
         <td>活动分数</td>
         <td>获分原因</td>
      </tr>
   </thead>
   <tbody>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
      <tr>
         <td>***</td>
         <td>***</td>
         <td>***</td>
      </tr>
   </tbody>
    </table> 
       </div>
       <span>反馈加分错误</span>
         <textarea type="text" class="form-control" id="text" 
         placeholder="请输入反馈">
         </textarea>
         <input type="submit" class="btn btn-default" value="提交反馈"/>
      </form>
   </div><!-- 活动奖惩查询结束 -->
  </div>
</div>
</body>
</html>