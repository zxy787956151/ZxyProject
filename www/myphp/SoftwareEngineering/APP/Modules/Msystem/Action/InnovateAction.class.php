<?php 
	include 'base.php';
	
	Class InnovateAction extends Action{
		Public function Iinsert(){
			if($_POST['submit']=="录入分数"){
				$inn = M('Innovate');
				for ($i=1; $i<=3; $i++) { 

					if($_POST["grade".$i]!=""){

						if($_POST["reason".$i]==""){
							$this->error("原因事项不能为空!");
						}
						else{
							$data = array(
							'num'=>$_POST['num'],
							'grade'=>$_POST["grade".$i],
							'reason'=>$_POST["reason".$i],
							);

							if($add = $inn->data($data)->add()){
								$pd = '1';
							}
						}
					}
				}
				
				if($pd=='1'){
					$this->success("录入成功!");
				}
				
			}
			else{
				$this->display();
			}
		}

		Public function Iselect(){
			if($_POST['submit']=="查询"){
				$inn = 	M('Innovate');
				$where['num'] = $_POST['num'];
				$this->foreach = $inn->where($where)->select();
				$this->display();
			}
			else{
				$this->display();
			}
		}
	}
 ?>