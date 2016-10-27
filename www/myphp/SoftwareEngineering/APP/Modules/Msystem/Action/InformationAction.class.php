<?php 
	include ('base.php');
	Class InformationAction extends Action{
		Public function insert() {
			if($_POST['submit']=='提交'){
				$info = M('information');

				$data = array(
						'name' => $_POST['name'],
						'sex' => $_POST['sex'],
						'date' => $_POST['date'],
						'num' => $_POST['num'],
						'department' => $_POST['department'],
						'class' => $_POST['class'],
						'photo' => $_POST['photo'],
						'place' => $_POST['place'],
						'comeDate' => $_POST['comeDate']
					);
				if($_POST['name']==''||$_POST['sex']==''||$_POST['date']==''||$_POST['num']==''||$_POST['department']==''||$_POST['class']==''||$_POST['photo']==''||$_POST['place']==''||$_POST['comeDate']==''){
					$this->error('都是必填项!,请补全!');
					
				}
				else{
					if($add = $info->data($data)->add()) {
						$this->success("信息录入成功!");
					}
				}
			
			}
			else{
				$this->display();
			}
			
		}


		Public function update() {
			if($_POST['submit']=='提交'){
				if($_POST['name']==''||$_POST['sex']==''||$_POST['date']==''||$_POST['num']==''||$_POST['department']==''||$_POST['class']==''||$_POST['photo']==''||$_POST['place']==''||$_POST['comeDate']==''){
				$this->error('都是必填项!,请补全!');
				}

				$info = M('information');
				$data = array(
						'name' =>$_POST['name'],
						'sex' =>$_POST['sex'],
						'date' =>$_POST['date'],
						'department' =>$_POST['department'],
						'class' => $_POST['class'],
						'photo' =>$_POST['photo'],
						'place' =>$_POST['place'],
						'comeDate' =>$_POST['comeDate'],
					);
				if($update = $info ->data($data) ->where("num=$_POST[num]")->save()){
					$this->success('信息修改成功!',"__GROUP__/Information/update");
				}
				else{
					$this->error('wrong');
				}
			}
			else{
				$this->display();
			}
			
		}


		Public function delete() {
			$info = M('information');
			if($delete = $info->where("num=$_POST[num]")->delete()){
				$this->success('信息删除成功!');
			}

			else{
				$this->success('wrong');
			}
		}


		Public function select() {
			if($_POST['submit']=='查询'){
				if($_POST['num']==""){
					$this->error('wrong');
				}
				else{
					$info = M('information');
					$this->select = $info->where("num=$_POST[num]")->select();
					echo "<script type='text/javascript'>alert('查询成功!');</script>";
				}
			}	
			
				$this->display();
			
			
		}

		Public function selClass() {
			$where['department']=$_POST['department'];
			$where['class']=$_POST['class'];
			$info = M('information');
			$this->selClass = $info->where($where)->select();
			$this->display();
		}	
	}
 ?>



