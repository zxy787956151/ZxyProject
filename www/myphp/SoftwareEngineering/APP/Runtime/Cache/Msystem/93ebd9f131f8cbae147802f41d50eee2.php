<?php if (!defined('THINK_PATH')) exit();?><html>
<head>
 <meta charset="UTF-8">

   <link href="__PUBLIC__/bootstrap/css/bootstrap.min.css" rel="stylesheet">
   <link rel="stylesheet" type="text/css" href="__PUBLIC__/css/main_style.css">
   <script src="__PUBLIC__/js/jquery-1.10.2.min.js"></script>
   <script src="__PUBLIC__/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>
<div  id="results_delete">
      <h1>成绩学分更改</h1>
      <form role="form" class="form1" action="<?php echo U(GROUP_NAME .'/Grade/Gupdate');?>" method="post">
        <span>请输入学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学号" name="num">
         <input type="submit" class="btn btn-default" style="margin-top:10px;" value="查询该学生课表" name="submitS"/>   
         <div class="results-table">
        <table class="table table-striped">
       <thead>
      <tr>
         <th>序号</th>
         <th>课程名称</th>
      </tr>
      </thead>
      <tbody>
    
        <?php if(is_array($tab)): foreach($tab as $key=>$v): ?><tr>
             <td><?php echo ($v["classId"]); ?></td>
             <td><?php echo ($v["class"]); ?></td>
          </tr><?php endforeach; endif; ?>
      </tbody>
     </table>
      </div>
    </form>
    <form class="re-form2" action="<?php echo U(GROUP_NAME .'/Grade/Gupdate');?>" method="post">
     
   
      <span>请输入学生学号</span>
        <input type="text" class="form-control" id="input" 
        placeholder="请输入学号" name="num">
        <br/>
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
           <input type="text" class="table-input" name="c1">
         </td>
         <td>
           <input type="text" class="table-input" name="c2">
         </td>
         <td>
           <input type="text" class="table-input" name="c3">
         </td>
         <td>
           <input type="text" class="table-input" name="c4">
         </td>
         <td>
           <input type="text" class="table-input" name="c5">
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
           <input type="text" class="table-input" name="c6">
         </td>
         <td>
           <input type="text" class="table-input" name="c7">
         </td>
         <td>
           <input type="text" class="table-input" name="c8">
         </td>
         <td>
           <input type="text" class="table-input" name="c9">
         </td>
         <td>
           <input type="text" class="table-input" name="c10">
         </td>
      </tr> 
      </tbody>
      </table>
      <span>请活动加分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入活动加分" name="c11">
      <span>请输入体育分</span>
      <input type="text" class="form-control" id="input" 
      placeholder="请输入体育分" name="c12">
      <input type="submit" class="btn btn-default" style="margin-top:10px;" value="更改分数" name="submitU"/>
    </form>
   </div>
</body>
</html>