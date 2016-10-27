<?php 
	Class Base{
		function __construct($name,$class){
			$this->name = $name;
			$this->class = $class;
		}

		public function _print(){
			echo $this->name;
			echo $this->class;
		}
	}
 ?>