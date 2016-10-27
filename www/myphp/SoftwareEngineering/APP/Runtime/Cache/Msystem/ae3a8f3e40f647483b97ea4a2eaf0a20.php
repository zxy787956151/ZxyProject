<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>

<?php  foreach ($qx as $v) { $username = $_GET['username']; $pd = $v['identity']; } ?>
<html>
<head>
   <meta charset="UTF-8">
   <title>学生综合测评管理系统</title>
   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/normalize.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
   <base target="iframe"/>
</head>

<script type="text/javascript">
    function out(){
        location.href = "/SoftwareEngineering/index.php/Msystem/Index/index";
    }
</script>
<body>

<div class="title">
   <div class="title_img"></div>
   <h1>学生综合测评管理系统</h1>  
   <small>Comprehensive assessment management system</small>


   <a href="#">欢迎您&nbsp;&nbsp; <?php echo $_GET['username']; ?>&nbsp;&nbsp;
    <?php if($pd=='1'){echo "老师";} else{echo "同学";} ?> </a>

    <br/>
   <a href="#" onclick="out()">注销</a>
   <!-- 确定和取消小窗体 -->
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

          <?php  if($pd=='1'){ echo "
                        <li>
                        <a href='/SoftwareEngineering/index.php/Msystem/Information/select'>学生信息录入</a>
                        </li>
                        <li>
                        <a href='/SoftwareEngineering/index.php/Msystem/Information/update' >学生信息删改</a>
                  "; } ?>

          
          </li>                              
          <li>
            <a href="<?php echo U(GROUP_NAME . '/Information/select');?>">查看明细信息</a>
          </li>
          <li>
            <a href="<?php echo U(GROUP_NAME . '/Information/selClass');?>">信息统计查询</a>
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
       <ul id="myTab" class="nav pills-tabs" style="text-align: center;">

          <?php  if($pd=='1'){ echo "
                           <li>
                            <a href='/SoftwareEngineering/index.php/Msystem/Grade/Ginsert'>成绩学分录入</a>
                          </li>
                          <li>
                            <a href='/SoftwareEngineering/index.php/Msystem/Grade/Gupdate' >成绩学分更改</a>
                          </li>
                      "; } ?>

         
          <li>
            <a href="<?php echo U(GROUP_NAME . '/Grade/Gcalculate');?>" >综测分数管理</a>
          </li>
          <li>
            <a href="<?php echo U(GROUP_NAME . '/Grade/Grank');?>">学生成绩排名</a>
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
          <?php  if($pd=='1'){ echo "
                      <li>
                      <a href='/SoftwareEngineering/index.php/Msystem/Innovate/Iinsert'>创新分数录入</a>
                    </li>
                  "; } ?>
          
          <li>
            <a href="<?php echo U(GROUP_NAME . '/Innovate/Iselect');?>" >创新分数查询</a>
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
          <?php  if($pd=='1'){ echo "
                          <li>
                          <a href='/SoftwareEngineering/index.php/Msystem/RandP/insert' >活动奖惩录入</a>
                        </li>
                    "; } ?>
          
          <li>
            <a href=" <?php echo "/SoftwareEngineering/index.php/Msystem/RandP/select?username=".$username.""; ?> " >活动奖惩查询</a>
          </li>
          <li>
       </ul>
      </div>
    </div>
  </div>
</div>
</div>

<div class="container_second" class="main">
 
    <iframe style="width:100%;height:100%;" name="iframe" src="#"></iframe>
  
</div>
</body>
</html>