<?php 
	include 'base.php';
	Class GradeAction extends Action{
	

			Public function Ginsert(){
				if($_POST['submitS']=="查询该学生课表"){
					if($_POST['num']==""){
						$this->error('wrong');
					}	
					else{
						$info = M('information')->where("num=$_POST[num]")->select();

						foreach ($info as $v) {

						}
							
						$where['department']=$v['department'];
						$this->tab = M('table')->where($where)->select();
						
					}
					
				}


				if($_POST['submitI']=="录入分数"){

					$grade = M('grade');
					$gra = $grade->select();
					foreach ($gra as $v) {
						if($v['num']==$_POST['num']) {
							$this->error("此学生已录入!");
						}
					}

					if($_POST['num']==""){
						$this->error('wrong');
					}

					else{
						
						$pd = '0';
						for($i=1;$i<=12;$i++){

							if($i<=10){
								$part1+=$_POST[c."$i"];
							}
							

							switch ($i) {
								case '11':$part2=$_POST[c."$i"];break;
								case '12':$part3=$_POST[c."$i"];break;								
							}

							if($_POST[c."$i"]==''){
								
							}	
							else{
								$pd = '1';
								$data = array(
									'classId' => "$i",
									'grade' => $_POST[c."$i"],
									'num' => $_POST['num'],
								);

								$grade->data($data)->add();
							}

						}						
						$all = array(
								'grade'=>(0.2*$part2)+(0.05*$part3)+(0.75*part1),
								'classId'=>'0',
								'num' => $_POST['num'],
							);
						$grade->data($all)->where("num=$_POST[num]")->add();

						if($pd) {
							$this->success("录入成功！");
						}
						else{
							$this->error("不能一科都不录入!");
						}	

					}
				}

				else{
					$this->display();
				}

			}

			Public function Gupdate() {
				if($_POST['submitS']=="查询该学生课表"){
					if($_POST['num']==""){
						$this->error('wrong');
					}	
					else{
						$info = M('information')->where("num=$_POST[num]")->select();

						foreach ($info as $v) {

						}
							
						$where['department']=$v['department'];
						$this->tab = M('table')->where($where)->select();
						
					}
					
				}

				if($_POST['submitU']=="更改分数"){

					$grade = M('grade');

					if($_POST['num']==""){
						$this->error('wrong');
					}


					else{
						
						$pd = '0';
						for($i=1;$i<=12;$i++){

							if($_POST[c."$i"]==''){
								
							}	
							else{
								$pd = '1';
								$data = array(
									'classId' => "$i",
									'grade' => $_POST[c."$i"],
									'num' => $_POST['num'],
								);
								$where['num'] = $_POST['num'];
								$where['classId'] = $i;
								$grade->data($data)->where($where)->save();
							}

						}
						
						if($pd) {
							$this->success("更改成功！");
						}
						else{
							$this->error("为更改任何数据!");
						}	

					}
				}
				else{
					$this->display();
				}
			}

			Public function Gcalculate() {

				$info = M('information');
				$table = M('table');
				$grade = M('grade');
				session_destroy();
				session_start();
				$cla = array();
				$i = 'a';
				$j = 'A';
				if($_POST['submit']=="查询学生成绩"){
					$_SESSION['num'] = $_POST['num'];
					$stu = $info->where("num=$_POST[num]")->select();
					foreach ($stu as $v) {}
					$_SESSION['name'] = $v['name'];
					$where1['department'] = $v['department'];
					
					$tab = $table->where($where1)->select();
					foreach ($tab as $v2) {
						if($v2['classId']=='11'){
							$where2['classId'] = $v2['classId'];
							$where2['num'] = $_POST['num'];
							$gra = $grade->where($where2)->select();
							foreach ($gra as $v3) {
								$_SESSION['active'] = $v3['grade'];
							}
						}
						else if($v2['classId']=='12'){
							$where2['classId'] = $v2['classId'];
							$where2['num'] = $_POST['num'];
							$gra = $grade->where($where2)->select();
							foreach ($gra as $v3) {
								$_SESSION['sports'] = $v3['grade'];
							}
						}

						else{
							$_SESSION["$i"] = $v2['class'];
							$where2['classId'] = $v2['classId'];
							$where2['num'] = $_POST['num'];
							$gra = $grade->where($where2)->select();
							foreach ($gra as $v3) {
								$_SESSION["$j"] = $v3['grade'];
							}
							$i++;
							$j++;
						}
						
					
					}
						$jia = $_SESSION["A"];
						for($i=0;$i<9;$i++){
							$all+=$jia;
							$jia++;
						}
						$_SESSION['all'] = (0.2*$_SESSION['active'])+(0.05*$_SESSION['sports'])+(0.75*$all);
						
						
						$this->display();
						
				}
				else{

					$this->display();
				}
			}

			Public function Grank(){
				if($_POST['submit']=="查询专业排名"){
					switch($_POST['department']){
						case '软件工程':$dpt="软件工程";break;
						case '网络工程':$dpt="网络工程";break;
						case '计算机科学与技术':$dpt="计算机科学与技术";break;
					}
					
		
		            $this->i = '0';
		            $this->k = '0';
		            $this->pm = '1';
		            $this->Garray = array();
 
					$info = M('information');
					$grade = M('grade');
					$where['department'] = $dpt;
					$_SESSION['department'] = $dpt;
					$num = $info->where($where)->order('num asc')->select();
					$this->tab = M('table')->where($where)->select();
					$e=0;
					foreach ($num as $v) {
						
						if($e==0){
							$v1 = $v['num'];
						}
						$vn = $v['num'];
						$e++;
					}


 					$this->gra = $grade->where("classId=0 and num between $v1 and $vn")->order('grade desc')->select();
	

					$this->display();
				}
				else{
					$this->display();
				}
			}
	}
 ?>