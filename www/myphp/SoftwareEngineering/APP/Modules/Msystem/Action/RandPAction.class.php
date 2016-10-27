<?php 
	include 'base.php';
	Class RandPAction extends Action{
		Public function insert(){
			

			if($_POST['submit']=="录入"){
				$rp = M('randp');
				$gra = M('grade');
				if($_POST['addGrade']!=""){
					if($_POST['addReason']==""){
						$this->error("加分原因不能为空!");
					}
					else{
						$data = array(
						'num' => $_POST['num'],
						'addGrade'=>$_POST['addGrade'],
						'addReason' =>$_POST['addReason'],
						);
						$where['num'] = $_POST['num'];
						$where['classId'] = '11';
						$sel = $gra->where($where)->select();
						foreach ($sel as $v) {}
						


						$upd1 = array(
								'grade' => ($v['grade']+$_POST['addGrade']),
							);

						$update = $gra ->data($upd1) ->where("classId=11")->save();
						$add = $rp->data($data)->add();
						if($add&&$update){
								$pd = '1';
						}
					}
				}
				
				if($_POST['subGrade']!=""){
					if($_POST['subReason']==""){
						$this->error("减分原因不能为空!");
					}
					else{
						$data = array(
						'num' => $_POST['num'],
						'subGrade'=>(0-$_POST['subGrade']),
						'subReason' =>$_POST['subReason'],
						);

						$where['num'] = $_POST['num'];
						$where['classId'] = '11';
						$sel = $gra->where($where)->select();
						foreach ($sel as $v2) {}

						$upd2 = array(
								'grade' => ($v2['grade']-$_POST['subGrade']),
							);

						$update2 = $gra ->data($upd2) ->where("classId=11")->save();
						$add2 = $rp->data($data)->add();
						if($add2&&$update2){
								$pd = '1';
						}
					}
				}

				if($pd=='1'){
					$this->success("录入成功!活动分数已计算");
				}
			
			}
			else{
				$this->display();
			}
			
		}

		Public function select(){
			$where['username'] = $_GET['username'];
			$this->qx = M('user')->where($where)->select();
		
			if($_POST['submitS']!=""){
				$rp = M('randp');
				$this->reason = $rp->where("num=$_POST[num]")->select();
				
			}
			if($_POST['submitI']!=""){
				$mis = M('mistake');

				$data = array(
						'num' => $_POST['num'],
						'content' => $_POST['text'],
					);
				$insert = $mis->data($data)->add();
				if($insert){
					$this->success("您的反馈已成功提交!");
				}

			}
			else{
				$this->display();
			}
			
		}
	}
 ?>