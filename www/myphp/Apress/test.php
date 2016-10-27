<?php 
	header('WWW-Authenticate: Basic Realm="Book Projects"');
	header("HTTP/1.0 401 Unauthorized");
	// echo "用户名或密码错误！";
	var_dump($_SERVER['PHP_AUTH_USER']);
	var_dump($_SERVER['PHP_AUTH_PW']);

	exit;

	echo date("F j, Y");
                 
	$randomString = substr(md5(microtime()), 0, 5);

	var_dump($randomString);

	$number = "5";
	$num = 15 +$number;
	$sum = "twenty"; 

	//list函数
	$str = "Nine Sanzi | professional golfer | green";
	list($variable1, $variable2, $variable3) = explode("|", $str);
	var_dump($variable1, $variable2, $variable3);

	Class Book{

		private $title;
		private $isbn;
		private $copies;

		//构造函数为创建对象时执行的操作 ,并不只是为变量赋值
		function __construct($isbn) {
			$this->isbn = $isbn;
			$this->getTitle();
			$this->getNummberCopies();
		}
             
		public function __get($variable){
			return $this->$variable;  
		}                  
 
		public function setIsbn($isbn){
			$this->isbn=$isbn;
		}

		public function getTitle(){
			$this->title = "*getTitleContent(*^__^*) ";
			print "Title: {$this->title}<br/>";
		}

		public function getNummberCopies(){
			$this->copies = "5";
			print "Copies: {$this->copies}";
		}
	}

	$book = new Book("isbnContent"); 

	echo "<br/>".$book->isbn."</br>";


	abstract class AbBook{
		//同,不抽象的Book类

		private $title;
		private $isbn;
		private $copies;

		function __construct($isbn) {
			$this->isbn = $isbn;
			$this->getTitle();
			$this->getNummberCopies();
		}

		public function __get($variable){
			return $this->$variable;  
		}                  
 
		abstract public function setIsbn($isbn);

		abstract public function getTitle();

		abstract public function getNummberCopies();


		// public public say(){
		// 	echo "I'm abstract class extends function say!";
		// }
	}


	//接口
	interface Izxy1{
		// public PubNum1 = 'P1'; 
		const ConNum1 = 'C1';
		function mustFun1();
		function mustFun2();
	}

	interface Izxy2{
		const ConNum2 = 'C2';
		function mustFun3(); 
	}

	Class PhpBook extends AbBook implements Izxy1,Izxy2{

		public function mustFun1(){
			echo "This is mustFun1";
		}

		public function mustFun2(){
			echo "This is mustFun2";
		}

		public function mustFun3(){
			echo "This is mustFun3";
		}

		public function setIsbn($isbn){
			$this->isbn = $isbn;
		}

		public function getTitle(){
			$this->title = "*getPhpTitleContent(*^__^*) ";
			print "Title: {$this->title}<br/>";
		}

		public function getNummberCopies(){
			$this->copies = "P5";
			print "Copies: {$this->copies}";
		}
	}

	$pbook = new PhpBook("pbookIsbnContent");

	echo "<br/>".$pbook->isbn."</br>";
	echo "<br/>".PhpBook::ConNum1."</br>";
	echo "<br/>".PhpBook::ConNum2."</br>";


 ?>