<?php 

	header("Content-Type:text/html;charset=utf-8");

	//抽象类
	Abstract class AbsClass{
		abstract public function absFun();	//连body根本都不允许有
	}

	Class Son extends AbsClass{
		public function absFun(){
			echo "Abs->abs()";
		}
	}

	$abs = new Son();
	$abs->absFun();

	//接口
	interface Nameable{
		public function getName();
		public function setName($name);
	}

	class Book implements Nameable{
		private $name;

		public function getName(){
			return $this->name;
		}

		public function setName($name){
			return $this->name = $name ;
		}
	}

	$interface = class_implements('Book');
	if (isset($interface['Nameable'])) {
		echo "<br/>实现了接口!";
	}
 ?>