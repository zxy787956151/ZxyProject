<?php 
namespace Home\Controller;
use Think\Controller;
include 'base.php';	
// include 'ZipController.class.php';
	Class HomeworkController extends Controller{
		Public function publish(){
			$hw = M('homework');
			$gui = new \Home\Model\MemberModel();
            $rep = array("{","}");
            $phoname = str_replace($rep,'',$gui->create_guid());
            $where['username'] = $_SESSION['user'];
            $mem = M('member')->where($where)->select();
            
            foreach ($mem as $v) {
                //验证权限
               
               if ($v['hw']!='1') {
                    $this->error("您没有发布权限!");
               }
	           $data = array(
            	'mid' => $v['id'],
				'title' => $_POST['title'],
				'attention' => $_POST['attention'],
				'phoname' =>  $phoname.".png",
                'phourl' =>  __ROOT__.'/'.APP_PATH.'Home/View/Public/homework',
				);
            }

			$name = $_FILES["photo"]["name"]; 	
            $tmp_name = $_FILES["photo"]["tmp_name"];

            $move = move_uploaded_file($tmp_name, "e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/homework/$phoname.png");
           
            //将图片压缩成压缩包 
            // $zip = new PHPZip();
            // $zire = $zip -> createZip("e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/homework/$phoname.png", "$phoname.zip");
            // p($zire);
            // die();
            if ($add = $hw->data($data)->add()&&$move) {
                $this->success("作业发布成功!", U('Index/index'));
            }else{
            	$this->error("发布失败!");
            }                                                                                                                                                                                                                                                                                                                                                                             
		}

         Public function finish(){
             $where['username'] = $_SESSION['user'];
             $mid = M('member')->where($where)->field('id')->select();
             $hid = M('homework')->order('id desc')->limit(1)->field('id')->select();
             $gui = new \Home\Model\MemberModel();
             $rep = array("{","}");
             $filename = str_replace($rep,'',$gui->create_guid());
             $data = array(
                'mid' => $mid['0']['id'],
                'hid' => $hid['0']['id'],
                'time' => time(),
                'fileurl' => __ROOT__.'/'.APP_PATH.'Home/View/Public/finish',
                'filename' => $filename.".rar",
                );

             $where2['mid'] = $mid['0']['id'];
             $where2['hid'] = $hid['0']['id']; 
             $fin = M('finish')->where($where2)->select();
             if($fin!=null){
                 foreach ($fin as $finv) {
                    $file= 'E:/wamp/www/myphp/JwSystem/Application/Home/View/Public/finish/'.$finv['filename'];
                    $result = unlink("$file"); 

                    $tmp_name = $_FILES["file"]["tmp_name"];
                    $move = move_uploaded_file($tmp_name, "e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/finish/$filename.rar");
                    $where3['id'] = $finv['id']; 
                    if ($update = M('finish')->where($where3)->save($data)&&$move&&$result) {
                       $this->success("您成功提交修改!");
                    } 
                 }

             }else if($fin==null){
                 $tmp_name = $_FILES["file"]["tmp_name"];
                 $move = move_uploaded_file($tmp_name, "e:/wamp/www/myphp/JwSystem/Application/Home/View/Public/finish/$filename.rar");
                 if ($add = M('finish')->add($data)&&$move) {
                    $this->success("作业提交成功!");
                 }
             }
             // require THINK_PATH.'Library/Think/Cache/Driver/File.class.php'; 
         }

         Public function down(){
            // p($_GET);
            // die();
            $down = D('Homeuser')->download("E:/wamp/www/myphp".$_GET['url']."/".$_GET['name']);
         }
         
	}
 ?> 

 <!-- create table homework(id int unsigned not null primary key auto_increment,mid int,title char(100),attention varchar(500),phourl char(100),phoname varchar(300)); -->
 <!-- create table finish(id int unsigned not null primary key auto_increment,mid int,hid int,time date,phourl char(255),phoname varchar(350)); -->