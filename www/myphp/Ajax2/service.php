<?php
 //接受请求参数并根据参数选择操作
 if(isset($_POST['action'])&&$_POST['action']!=""){
   switch($_POST['action']){
    case 'get_all_users': getAllUsers(); break;
    default:
    }
 }

 //处理请求：以JSON格式返回所有用户信息
 function getAllUsers(){
  $users = array(
   array("userId"=>1,"userName"=>"Raysmond"),
   array("userId"=>2,"userName"=>"雷建坤"),
   array("userId"=>3,"userName"=>"Rita")
   );
  echo json_encode($users);
 }
?>