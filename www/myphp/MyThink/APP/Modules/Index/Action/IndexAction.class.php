<?php 
	Class IndexAction extends Action{
		Public function index() {
			$move = M('move')->select();
			
			$_SESSION['moveimg1'] = $move['0']['name'];
			$_SESSION['moveimg2'] = $move['1']['name'];
			$_SESSION['moveimg3'] = $move['2']['name'];
			$_SESSION['moveimg4'] = $move['3']['name'];

			$this->display();
		}
	}
 ?>