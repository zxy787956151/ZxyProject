<?php 
	header("Content-Type:text/html;charset=utf-8");
 ?>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
</head>
<body>
	<form action="" method="post">

		<input type="text" size="30" name="str" 
							value="<?php echo html2Text(@$_POST['str'])?>">

		 <input type="submit" name="submit" value="提交"><br/><br/>

		 <img src="image.php"/>

	</form>
</body>
</html>

<?php
	//PHP5.3.1
	// header('Content-Type:image/png');
	// header('Content-Disposition:attachment;filename="c.png"');
	// header('Content-Length:3481.6');
	// phpinfo();							//pdo_mysql、sqllist开启
	print_r(pdo_drivers());
	echo "<br/>";	

	Class Person {

		static $str;						//别忘写$

		const ZXY = '牛逼!';				//常量	类中无define

		// define(CMS, 12343);				//error

		static $count;						//静态变量,此变量共享与所有此类的对象

		private $name,$sex,$age;

		protected $pro;

		function __construct($name="某某人",$sex="SheOrHe",$age="保密") {
			$this->name = $name;
			$this->sex = $sex;
			$this->age = $age;
			self::$count++;
			self::$str = "您正在输出对象的引用!";
		}

		static function getCount(){					//静态方法,所有此类对象共享此方法
			return self::$count;
		}

		function getConst(){
			return self::ZXY;
		}

		function __clone(){
			$this->name = "我是副本";
			$this->age = "100";
		}

		public function __toString(){					//没变色,但是好使
			return self::$str;
		}

		function __call($n,$arr){
			echo "你所调用的函数:".$n."(参数:";
			print_r($arr);
			echo ")不存在! <br/>\n";
		}

		function __destruct(){
			echo "<br/>再见".$this->name."<br/>";
		}

															//可加final 最终版
		function say() {									//默认是public,自己把自己的信息说出来
			echo "<br/>我叫".$this->name."<br/>性别".$this->sex."<br/>我今年".$this->age."道行!<br/><br/>";
		}


		public  function __set($n,$v){		//设置		//private???????
			
			// if($n=="name"){				//不必要写的不要写
			// 	if($v == "赵修宇"){
			// 		return $this->$n = "干吧得!";
			// 	}
			// }

			if($n=="sex"){
				if(!($v=="男"||$v=="女")){return;}
 				// echo "enter!<br/>";
			}

			if($n=="age"){
				if($v>150||$v<0){return;}
			}

			$this->$n = $v;
		}


		function __get($n){						//获取
			if($n=='sex'){
				return "你猜";
			}

			if($n=="age"){
				if($this->age>35){
					return '永远18!';
				}
			}

			return $this->$n;					//千万别忘了!!!
		}

	}
												//带有重载的继承
	Class Student extends Person{								
		function __construct($name="森森",$sex="女",$age="保密",$school="北大清华"){		//重载构造
			// $this->name = $name;
			// $this->sex = $sex;
			// $this->age = $age;
			parent::__construct($name,$sex,$age);
			$this->school = $school;
		}

		function say(){										//重载say
			// echo "我叫".$this->name."<br/>性别".$this->sex."<br/>我今年".$this->age."岁!<br/>在".$this->school."上学!";
			parent::say();
			echo "在".$this->school."学习!";							
		}

		function study(){									//定义新方法
			echo "<br/><br/>".$this->name."正在".$this->school."学习!<br/><br/>";
		}
	}	

	// $stu1 = new Student();		//如果传参,就涉及"设置",会执行__set
	// $stu1->age = "50";
	// $stu1->study();											//内部都涉及获取,都执行__get
	// $stu1->say();											//内部都涉及获取,都执行__get

	// $stu2 = new Student("小志志","女","55","北大清华");
	// $stu2->study();
	// $stu2->say(); 

	// $stu_c = clone $stu2;

	// $stu_c->say();

	// Person::$count = 0;

	// $per1 = new Person();
	// $per2 = new Person();

	// $per1->app('参数1','参数2');

	// echo $per1;

	function __autoload($className){
		include(strtolower($className).".class.php");
	}

	// $base = new Base("我是base.class.php文件","Base类");

	// $base->_print();


	// $format = "The %2\$s book contains %1\$d pages.
	// That's a nice %2\$s full of %1\$d pages.<br/>";

	// $str = "   wamp  ";
	// $number = 789;

	// printf($format,$str,$number); 

	// $wamp = array('os' => 'Linux','webserver'=>'Apache','db'=>'MySQL','language'=>'php');

	// echo strlen($str);
	// echo strlen(ltrim($str));	//左清空格
	// echo strlen(rtrim($str));
	// echo strlen(trim($str));	//两侧清空格

	// $str2 = "123 This is a test ...";

	// echo ltrim($str2);

	// $str = "<B>WebServer:</B>&'Linux'&'Apache'";

	// echo htmlspecialchars($str,ENT_COMPAT);
	// echo "<br/>\n";
	// echo htmlspecialchars($str,ENT_QUOTES);
	// echo "<br/>\n";
	// echo htmlspecialchars($str,ENT_NOQUOTES);
	
	// $str = "一个'quote'是<b>bold</b>";

	// echo htmlentities($str);
	// echo "<br/>";
	// echo htmlentities($str,ENT_QUOTES,"utf-8");

	if(isset($_POST['submit'])){
		echo "原型输出:".$_POST['str']."<br/>";
		echo "转换实例:".htmlspecialchars($_POST['str'])."<br/>";
		echo "删除斜线:".stripcslashes($_POST['str'])."<br/>";
		echo "删除斜线和转换实体".html2Text($_POST['str'])."<br/>";
		//删除html标签函数
		echo strip_tags($_POST['str'])."<br/>";
		echo strip_tags($_POST['str'],"<font>")."<br/>";
		echo strip_tags($_POST['str'],"<b><u><i>")."<br/>";

	}	

	function html2Text($input){
		return htmlspecialchars(stripcslashes($input));
	}

	$pattern = "/(a\sb)\.(c\d+d)\.(e\W?f)\.(gx{4}h)\.(ix{2,}j)\.(kx{2,4}l)/";
	$subject = "wwwwa b.c2d.e#f.gxxxxh.ixxxxxxxxxxxxj.kxxxlwwww";

	if(preg_match($pattern, $subject,$arr)){
		echo @$arr[0]."<br/>";
		echo @$arr[1]."<br/>";
		echo @$arr[2]."<br/>";
		echo @$arr[3]."<br/>";
		echo @$arr[4]."<br/>";
		echo @$arr[5]."<br/>";
		echo @$arr[6]."<br/>";
	}

	$p2 = "/(^this)|(test$)/";
	$s2 = "thisaabbtest";
	preg_match($p2,$s2,$a2);
	echo @$a2[0]."<br/>";
	echo @$a2[1]."<br/>";
	echo @$a2[2]."<br/>";

	$num ="11.1+22.2";
	$s2 = "/([\d]+[\.]?[\d]+)([\+])([\d]+[\.]?[\d]+)/";
	preg_match($s2,$num,$anum);
	echo @$anum[1]."<br/>";
	echo @$anum[2]."<br/>";
	echo @$anum[3]."<br/>";

	$p3 = '/(https?|ftps?):\/\/(www|bbs)\.([^\.\/]+)\.(com|net|org)(\/[\w-\.\/\?\%\&\=]*)?/i';

	$sub = "网址为http://bbs.lampborder.net/index.php的位置是LAMP兄弟连,
			网址为http://www.baidu.com/index.php的位置是百度,
			网址为http://www.gogle.com/index.php的位置是谷歌.";

	$i = 1;
	$j = 1;
	if(preg_match_all($p3,$sub,$m,PREG_SET_ORDER)){
		
		// var_dump($m);		
		foreach ($m as $v) {
			echo "搜索到第".$i."个URL为:".$v[0]."<br/>";
			echo "搜索到第".$i."个协议为:".$v[1]."<br/>";
			echo "搜索到第".$i."个主机为:".$v[2]."<br/>";
			echo "搜索到第".$i."个域名为:".$v[3]."<br/>";
			echo "搜索到第".$i."个顶域为:".$v[4]."<br/>";
			echo "搜索到第".$i."个文件为:".$v[5]."<br/><br/>";
			$i++;
		}
	}

	if(preg_match_all($p3,$sub,$m,PREG_PATTERN_ORDER)){
		// var_dump($m);	瞅一眼就知道了	
	}		

	$arr_3 = array('Linux RedHAT9.0','Apache2.2.9','MySQL5.0.51','PHP5.2.6','LAMP','100');

	$version = preg_grep('/^[a-zA-Z]+(\d|\.)+$/',$arr_3);		//对数组匹配正则
	var_dump($version);	

	var_dump(strstr("this is a test!", "test"));
	var_dump(strstr("this is a test!", 115));	//115 ASCII为's'

	/**
	 	用于获取URL中的文件名部分
		@param string $url    	任何一个URL格式的字符串
		@return string 			URL中的文件名称部分
	*/

	function getFileName($url){
		$location = strrpos($url, "/")+1;
		// var_dump($location);						//return int
		$fileName = substr($url, $location);

		return $fileName;
	}

	echo getFileName('http://bbs.lampborder.net/index.php')."<br/>";
	echo getFileName('http://bbs.lampborder.com/images/Sharp/logo.gif')."<br/>";
	echo getFileName('file:///C:/WINDOWS/php.ini')."<br/>";

	//preg_replace
		$p4 = "/<[\/\!]*?[^<>]*?>/is";
		$text = "这个文本中有<b>粗体</b>和<u>带有下画线</u>";
		echo preg_replace($p4, "", $text)."<br/>";
		echo preg_replace($p4, "", $text,2)."<br/>";
	//上述函数反向引用
		$p5 = "/(\d{2})\/(\d{2})\/(\d{4})/";
		$text = "几年国庆节放假日期为 10/01/2012到10/07/2012";
		echo preg_replace($p5, "\\3-\\1-\\2", $text)."<br/>";
		echo preg_replace($p5, "\${3}-\${1}-\${2}", $text)."<br/>"; 

	//数组型替换
		$text = "将文本[b]加粗[/b]
				本行文字大小为[size=7][color=red]7号字, 红色[/color][/size]
				连接到[url=http://bbs.lampborder.net]";

		function UBBCode2Html($text){
			$pattern = array(
					'/(\r\n)|(\n)/','/\[b\]/i','/\[\/b\]/i',
					'/\[color=([#\w]+?)\]/i',
					'/\[size=(\d+?)\]/i',
					'/\[size=(\d+(\.\d+)?(px|pt|in|cm|mm|pc|em|ex|%)+?)\]/i',
					'/\[url=www.(^\["\']+?)\](.+?)\[\/url\]/is',
					'/\[url=(https?|ftp|gopher){1}:\/\/([^\["\']+?)\](.+?)\[\/url\]/is',
					'/\[\/color\]/i','/\[\/size\]/i','/\[\/font\]/i','/\[\/align\]/i',
				);

			$replace = array(							//wrong!!
					'<br>','<b>','</b>',
					'<font color="\\1">',
					'<font size="\\1">',
					'<font style=\"font-size:\\1\">',
					'<a href="http://www.\\1" target="_blank">\\2</a>',
					'<a href="\\1://\\2" target="_blank">\\3</a>',
					'</font>','</font>','</font>','</p>',
				);
			
			return preg_replace($pattern, $replace, $text);
		}

		echo UBBCode2Html($text)."<br/>";

		echo str_ireplace("[b]", "<b>", $text,$count)."<br/>";
		echo "替换了".$count."次<br/>";

		//全用数组正则
		$search = array("http","www","jsp","com");
		$replace = array("ftp","bbs","php","net");

		$url = "http://www.jspborther.com/index.jsp";
		echo str_replace($search, $replace, $url)."<br/>";

//字符串分割	
		//正则
		$chars = preg_split('/\./', "l.a.m.p",-1,PREG_SPLIT_NO_EMPTY);

		print_r($chars);
		//非正则
		$l = explode(" ","WAMP LAMP PHPSTUDY");

		echo "<br/>".$l[2]."<br/>";

		//list
		list($one,$two,$three) = explode("%", "A%B%C");
		echo $one."<br/>".$two."<br/>".$three."<br/>";
//文件

		echo filetype('/wamp/www/myphp/xishuoPHP.php');//找得到!!

		function getFileSize($bytes){
			var_dump($bytes);
			if($bytes>=pow(2,40)){
				$ret = round($bytes/pow(1024,4),2);
				$suffix = "TB";
			}

			elseif($bytes>=pow(2,30)){
				$ret = round($bytes/pow(1024, 3),2);
				$suffix = "GB";
			}

			elseif($bytes>=pow(2,20)){
				$ret = round($bytes/pow(1024, 2),2);
				$suffix = "MB";
			}

			elseif($bytes>=pow(2,10)){
				$ret = round($bytes/pow(1024, 1),2);
				$suffix = "KB";
			}

			else{
				$ret = $bytes;
				$suffix = "Byte";
			}

			return $ret."".$suffix;
		}
		

		echo "文件大小:".getFileSize(filesize("/wamp/www/myphp/xishuoPHP.php"))."<br/>";

		
		$fileName = "javascript  \"".DIRECTORY_SEPARATOR."\"  common.js";

		var_dump($fileName);

		$path = "/wamp/www/myphp/xishuoPHP.php";

		echo basename($path,".php");

		$num = 0;
		$dirname = '/wamp/www/myphp';

		$dir_handle = opendir($dirname);

		echo '<table bgcolor="0" align="center" width="600" cellspacing="0" cellpadding="0"';
		echo '<caption><h2 style="text-align:center">目录'.$dirname.'下面的内容</h2></caption>';
		echo '<tr align="left" bgcolor="#cccccc">';
		echo '<th>文件名</th><th>文件大小</th><th>文件类型</th><th>修改时间</th></tr>';

		while ($file = readdir($dir_handle)) {
			$dirFile = $dirname."/".$file;

			$bgcolor = $num++%2==0 ? '#FFFFFF' : '#CCCCCC';

			echo '<tr bgcolor='.$bgcolor.'>';
			
			echo '<td>'.$file.'</td>';

			echo '<td>'.filesize($dirFile).'</td>';

			echo '<td>'.filetype($dirFile).'</td>';

			echo '<td>'.date("Y/n/t",fileatime($dirFile)).'</td>';
			
			echo '<tr/>';
		}

		echo '</table>';

		closedir($dir_handle);

		echo '在<b>'.$dirname.'</b>陌路下电子目录和文件共有<b>'.$num.'</b>个<br/>';

		exec("rd/s/q e:\wamp\www\myphp\hahhahahhah",$output,$status);
		//执行系统命令删除一个文件夹
		var_dump($output);
		var_dump($status);

		$fN = "file.txt";

		// $handle = fopen("xishuoPHP/$fN",'r') or die("打开$fN打开失败!");

		// // for ($row=0; $row <10 ; $row++) { 
		// // 	fwrite($handle,$row.":写入数据\r\n");	
		// // 	// @$data.= $row.":写入数据二\n";
		// // }
		// // fclose($handle);
		// echo fgets($handle,4096)."<br/><br/><br/>";

		// // file_put_contents("xishuoPHP/$fN",$data);

		// print_r(file("xishuoPHP/$fN"));

		// fclose($handle);

//有网再弄(还是不好使)
		// $fi = fopen("http://jw.xtyml.cn/forum.php","r")or die("打开老徐网站失败!");

		// while (!feof($fi)) {
		// 	$line = fgets($fi,1024);
		// 	if(preg_match("/<title>(.*)</title>/",$line,$out)){
		// 		$res = $out[1];
		// 		break;
		// 	}
		// }
		// fclose($fi);
		// echo $res;

		// $fp = fopen("xishuoPHP/$fN",'r')or die("文件打开失败!");

		// echo "<br/>移动文件指针".ftell($fp)."<br/>";
		// echo fread($fp,20)."<br/>";
		// echo ftell($fp)."<br/>";

		// fseek($fp,1000,SEEK_CUR);
		// echo ftell($fp)."<br/>";
		// echo fread($fp,10)."<br/>";

		// fseek($fp,-10,SEEK_END);
		// echo fread($fp,10)."<br/>";

		// fclose($fp);

//lock挂起
		$fp = fopen("xishuoPHP/$fN",'r')or die("文件打开失败!");
		// flock($fp,LOCK_EX);
		// flock($fp,LOCK_SH);

//留言板
		include 'lampborderLiuyan.php';

//文件基本操作
		$fil = "xishuoPHP/file.txt";
		if (copy($fil,'xiaowei/file.txt')) {
			echo "文件复制成功!";
		}

		if(file_exists($fil)){

			// if (unlink($fil)) {
			// 	echo "文件删除成功!";
			// }
		}else{ 
			echo "文件不存在!";
		}

		// if (rename($fil,'zxy.txt')) {
		// 	echo "改名成功!";
		// }

		$fp2 = fopen($fil,"r+")or die('打开文件失败!');

		if (ftruncate($fp2,102.4)) {
			echo "<br/>文件截取成功!<br/>";
		}

//上传文件 
		include 'upload.php';

//GD
		//测试能否用gd
		if (extension_loaded('gd')) {
			echo '<br/>你可以使用gd<br/>';
			foreach (gd_info() as $k => $v) {
				echo "$k:$v<br/>";
			}
		}else{
			echo '你没有安装gd扩展';
		}

		// $img = imagecreatetruecolor(300,200);
		// echo imagesx($img),imagesy($img);

		list($width,$height,$type,$attr) = getimagesize("c.png");

		echo '<img src="c.png"'.$attr.'>';

//图片水印
		function image($filename,$string){
			list($width,$height,$type) = getimagesize($filename);
			$types = array(1=>"gif",2=>"jpeg",3=>"png");
			@$createfrom = "imagecreatefrom".$types[$type];

			$image = $createfrom($filename);
			$x = ($width-imagefontwidth(5)*strlen($string))/2;

			$y = ($height-imagefontheight(5))/2;

			$textcolor = imagecolorallocate($image, 255, 0, 0);
			imagestring($image, 5, $x, $y, $string, $textcolor);
			$output = "image".$types[$type];	

			$output($image,$filename);

			imagedestroy($image);
		}

		image("c.png","ZXY");	//无限水印上去!!


//图片缩放(没写完)
		// function thumb($filename,$width=200.$height=200){
		// 	list($width_orig,$height_orig) = getimagesize($filename);

		// 	if ($width&&($width_orig<$height_orig)) {
		// 		$width = ($height/$height_orig)*$width_orig;
		// 	}else{
		// 		$height = ($width/$width_orig)*$height_orig;
		// 	}

		// 	$image_p = imagecreate(width, height)
		// }



//PDO连接MySQL
		$dsn = "mysql:dbname=xishuoPHP;host=127.0.0.1";

		$user = "root";

		$password = "";

		try{
			$dbh = new PDO($dsn,$user,$password);
			// $dbh = new PDO('xishuoPHP/dbcontent.txt',$user,$password);	q
			echo "<br/>连接成功!<br/>";
		}catch(PDOException $e){
			echo '数据库连接失败！：'.$e->getMessage();
		}


		// echo "数据库服务器版本号信息：".$dbh->getAttribute(PDO::ATTR_SERVER_INFO);

		// // $pdh->setAttrbute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		// $query = "insert into table1 values(1,".$dbh->quote($dbh->getAttribute(PDO::ATTR_SERVER_INFO)).");";

		// $affected = $dbh->exec($query);

		// if($affected){
		// 	echo '数据表xishuoPHP中受影响的行数为：'.$affected;
		// }else{
		// 	print_r($dbh->errorInfo());
		// }

		// $query = "select uid,name from table1;";

		// try{
		// 	$pdostatement = $dbh->query($query);
		// 	echo "一共从表中获取到".$pdostatement->rowCount()."条记录:<br/>";
		// 	foreach ($pdostatement as $row) {
		// 		echo $row['uid']."<br/>";
		// 		echo $row['name']."<br/>";
		// 	}
		// }catch (PDOException $e){
		// 	echo $e->getMessage();
		// } 


//PDO预处理sql命令
		
		//①
		$query = 'insert into table1(uid,name)values(:uid,:name);';

		$stmt = $dbh->prepare($query);
		
		$stmt->bindParam(':uid',$uid);
		$stmt->bindParam(':name',$name);  
		$uid = "33";
		$name = "社会修宇哥!";
		$stmt->execute();
		
		//②

		// $query = 'select ?,? from table1';
		// try{
		// 	$stmt = $dbh->prepare($query);
		// 	$stmt->bindParam(1,$uid,PDO::PARAM_STR);
		// 	$stmt->bindParam(2,$name,PDO::PARAM_STR);
		// 	$uid = "uid";
		// 	$name = "name";
		// 	// foreach ($stmt as $row) {
		// 	// 	echo "<br/>uid=".$row['uid']."<br/>";
		// 	// 	echo "name=".$row['name']."<br/>";
		// 	// }
		// }catch(PDOException $e){
		// 	echo $e->getMessage();
		// }

		

	// $result = sprintf("%0.3f",$number);

	// echo $result;

	// echo "A OS is {$wamp['os']}<br/>";			//解决['']粉色问题,没事别加{}效率低

	// echo "{\$base->name=$base->name}多余字符";

	// die("<br/>表示已经退出");
	// exit("<br/>exit表示已经退出");
	// echo "<br/>Count:".Person::getCount();
	// echo "<br/>".$per2->getCount();

	// echo "<br/>Const:".Person::getConst();

	// $person1->say();die();										//和下面继承不同

	// Class Student extends Person{
	// 	var $school;

	// 	function study(){
	// 		echo $this->name ."正在".$this->school."学习<br/><br/>";
	// 	}
	// }

	// Class Monitor extends Student{
	// 	var $wage;

	// 	function teaching(){
	// 		echo $this->name."在".$this->school."教书<br/>一个月挣".$this->wage;
	// 	}
	// }

	// $student1 = new Student("易志","女","500");
	// $monitor1 = new Monitor("程木森","女","1500");

	// $student1->say();
	// $student1->school = "北大清华大学";
	// $student1->study();

	// $monitor1->say();
	// $monitor1->school = "北大清华大学";
	// $monitor1->study();
	// $monitor1->wage = "0.0001k";
	// $monitor1->teaching();


	// die();

	// $person1 = new Person();					//设置
	// $person2 = new Person("妈妈","女","45");	//获取

	// $person1->name = "赵修宇";
	// $person1->sex = "女";
	// $person1->age = "210";

	// $person1->say();

	// echo "姓名：".$person2->name."<br/>";		//多态性???
	// echo "性别：".$person2->sex."<br/>";
	// echo "年龄：".$person2->age."<br/>";


	// die();

	// Class Person{

	// 	private $name,$sex,$age;

	// 	function __construct ($name,$sex="男",$age="20"){		// 构造函数 			
	// 		$this->name = $name;
	// 		$this->sex = $sex;
	// 		$this->age = $age;
	// 	} 

	// 	function __destruct(){
	// 		echo "<br/>再见".$this->name."<br/>";
	// 	}

	// 	public function getName(){					//获取私有属性	get不传参
	// 		return $this->name;
	// 	}

	// 	public function setSex($sex){					//设置性别,只有满足条件才能设置
	// 		if($sex=="男"||$sex=="女"){
	// 			$this->sex = $sex;
	// 		}
	// 	}

	// 	public function setAge($age){					//设置年龄,不合理则不往下执行
	// 		if($age>150||$age<0){
	// 			return;
	// 		}
	// 		$this->age = $age;
	// 	}

	// 	public function getAge(){							//获取年龄
	// 		if($this->age>30){
	// 			// return $this->age-10;					//输出一个假年龄,并没有多年龄进行修改!
	// 			return 18;
	// 		}
	// 		else{
	// 			return $this->age;
	// 		}
	// 	}

		

	// 	function say() {									//默认是public,自己把自己的信息说出来
	// 		echo "我叫".$this->name."<br/>性别".$this->sex."<br/>我今年".$this->age."岁!<br/><br/>";
	// 	}

	// }

	// $person1 = new Person("程木森","男","40"); 

	// echo $person1->getName()."<br/>";
	// $person1->setSex("女");
	// $person1->setAge(200);
	// echo $person1->getAge()."<br/>";
	// $person2 = new Person("易志","","22");
	// $person2 = null;
	// $person3 = new Person("程木森","女");

	// $person1->say();							//析构你不能引用对象,引用了 对象就不会注销了
	// @$person2->say();
	// $person3->say();

	// $aa = 'glo_aa';
	// $bb = 'glo_bb';

	// function zxy_globals(){
	// 	// global $aa;										//把一个常(变)量声明为全局变量
	// 	// var_dump($aa);

	// 	var_dump($GLOBALS['aa']);						//超全局代替global关键字
	// }

	// zxy_globals();

	// die();

	// define("AA", 1);									//※这叫常量
	// define("BB", 2);
	// define("CC", 3);

	// // var_dump(AA);

	// function zxy_cl(){
	// 	var_dump(AA);
	// }

	// zxy_global();

	// define("A",1);										//通常大写,决不能加'$'符号
	// var_dump(A);

	// foreach ($_SERVER as $key => $value) {			//SERVER
	// 	echo '$_SERVER['.$key.']='.$value.'<br/>';
	// }												//去学学Think B函数
					
	// echo "<pre>";									//超屌的用法 pre				
	// print_r($_SERVER);
	// echo "</pre>";

	// phpinfo();

	// $a = '2';										//以后别用单引号表示确定了,单引号也是字符串
	// var_dump($a);


	// $arr_2 = array( 
	// 		// "二维第一项" => array("一维第一项" => '1-1',"一维第二项" => '2-1'),
	// 		// "二维第二项" => array("一维第一项" => '2-1',"一维第二项" => '2-2'),
	// 			0 => array(0=>'1-1',1=>'1-2'),  吗                                 
	// 			1 => array(0=>'2-1',1=>'2-2'),
	// 	);

	// for($i = 0;$i<count($arr_2);$i++){			//一般不用for遍历,还得写长度

	// 	for ($j=0; $j<count($arr_2[$i]); $j++) { 
	// 		// var_dump(count($arr_2[$i]));
	// 		var_dump($arr_2[$i][$j]);
	// 	}
	// }

	// $arr_2[0][0] = '1-1';
	// $arr_2[0][1] = '1-2';
	// $arr_2[1][0] = '2-1';
	// $arr_2[1][1] = '2-2';

	// var_dump($arr_2);

	// function one($num){
	// 	return $num%3 == '0';
	// }

	// function two($num){
	// 	return $num == strrev($num);			//回文数,正反相等
	// } 

	// function huidiao($fun){						//使用
	// 	for ($i=0; $i <100 ; $i++) { 
	// 		if($fun($i)){						//$fun里要传参,因为one、two里有参数
	// 			continue;		
	// 		}
	// 		echo $i."<br/>";
	// 	}

	// }

	// huidiao('two');

	// die();	//后面该报错还是会报错	

	// function one($a,$b){					//变量函数
	// 	return $a + $b;
	// }

	// function two($a,$b){
	// 	return $a*$a + $b*$b;
	// }

	// function three($a,$b){
	// 	return $a*$a*$a + $b*$b*$b;
	// }

	// // $fun = "one";
	// // $fun = "two";
	// $fun = "three";

	// var_dump($fun(2,3));					//一个变量后面有圆括号,解析为函数,寻找并执行


	// function bianl(){
	// 	echo "enter bianl()!";
	// }

	// $fun = "bianl";

	// var_dump($fun());								//变量函数


	// function duoCan(){								//可变个数参数函数
	// 	// $args = func_get_args();

	// 	// for ($i=0; $i <count($args); $i++) { 		//count 返回数组元素个数
	// 	// 	echo "第".($i+1)."个参数是".$args[$i]."<br/>";
	// 	// 	var_dump(count($args));
	// 	// }

	// 	for ($i=0; $i <func_num_args(); $i++) { 
	// 		// var_dump(func_num_args());					//<=>count($func_get_args);
	// 		echo "第".($i+1)."个参数是".func_get_arg($i)."<br/>";
	// 	}
	// }

	// duoCan('asd','asds','2313');


	// function moRen($name,$age,$sex = "男"){	  //默认参数函数
	// 	echo "我叫".$name.",我今年".$age."了,我是个".$sex."的!";
	// }

	// moRen("蛋蛋",'11',"女");

	// function yinYong(&$arg){	//引用参数函数 	&之差
	// 	$arg = '200';
	// }

	// $num = '100';

	// yinYong($num);

	// var_dump($num);



	// mixed aa(mixed $args){	//伪类型参数函数怎么定义?
	// 		var_dump($args);
	// }

	// aa('111');

	// phpinfo();

	// for($j = 0;$j<10;$j++){
	// 	for ($i=0; $i <5 ; $i++) {
	// 		if($i==3){
	// 			continue 1;
	// 		} 
	// 		if($j==5){
	// 			continue 2;
	// 		}
	// 		echo "($j,$i)<br/>";
	// 	}
	// }


	//header("Content-Type:text/html;charset=utf-8");

	// if(isset($a)&&!empty($a)||(isset($b))&&(!empty($b))){
	// 	echo "至少要有一个!";
	// } 
	
	// $output = `dir/w e:`;	//执行系统命令
	// echo $output;

	// $a = 10;
	// $b = $a ++ + ++$a;
	// echo $a."<br/>";
	// echo $b."<br/>";
	// $b = $a-- - --$a;
	// echo $a."<br/>";
	// echo $b."<br/>";


	// echo 'this\n is \r a \t simple string\\';

	// $str = "123.45abc";
	// $sv = strval(123.4);
	// var_dump($sv);
 	
die();
 						//标准风格
	echo "1";
 	$a = '4';
 	$b = '6';
 ?>

 <script language="php">	//通用风格
 	echo "2";
 </script>

 <?				//3wrong
 	echo "3";
 ?>

 <?=$a?>		<!-- 4wrong -->

<!--  <%				5wrong原样输出,不解析变量
 	echo "5";
 %> -->

 <%=$b%>		<!-- 6wrong,同5 -->

