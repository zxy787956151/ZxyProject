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

		 <input type="submit" name="submit" value="�ύ"><br/><br/>

		 <img src="image.php"/>

	</form>
</body>
</html>

<?php
	//PHP5.3.1
	// header('Content-Type:image/png');
	// header('Content-Disposition:attachment;filename="c.png"');
	// header('Content-Length:3481.6');
	// phpinfo();							//pdo_mysql��sqllist����
	print_r(pdo_drivers());
	echo "<br/>";	

	Class Person {

		static $str;						//����д$

		const ZXY = 'ţ��!';				//����	������define

		// define(CMS, 12343);				//error

		static $count;						//��̬����,�˱������������д���Ķ���

		private $name,$sex,$age;

		protected $pro;

		function __construct($name="ĳĳ��",$sex="SheOrHe",$age="����") {
			$this->name = $name;
			$this->sex = $sex;
			$this->age = $age;
			self::$count++;
			self::$str = "������������������!";
		}

		static function getCount(){					//��̬����,���д��������˷���
			return self::$count;
		}

		function getConst(){
			return self::ZXY;
		}

		function __clone(){
			$this->name = "���Ǹ���";
			$this->age = "100";
		}

		public function __toString(){					//û��ɫ,���Ǻ�ʹ
			return self::$str;
		}

		function __call($n,$arr){
			echo "�������õĺ���:".$n."(����:";
			print_r($arr);
			echo ")������! <br/>\n";
		}

		function __destruct(){
			echo "<br/>�ټ�".$this->name."<br/>";
		}

															//�ɼ�final ���հ�
		function say() {									//Ĭ����public,�Լ����Լ�����Ϣ˵����
			echo "<br/>�ҽ�".$this->name."<br/>�Ա�".$this->sex."<br/>�ҽ���".$this->age."����!<br/><br/>";
		}


		public  function __set($n,$v){		//����		//private???????
			
			// if($n=="name"){				//����Ҫд�Ĳ�Ҫд
			// 	if($v == "������"){
			// 		return $this->$n = "�ɰɵ�!";
			// 	}
			// }

			if($n=="sex"){
				if(!($v=="��"||$v=="Ů")){return;}
 				// echo "enter!<br/>";
			}

			if($n=="age"){
				if($v>150||$v<0){return;}
			}

			$this->$n = $v;
		}


		function __get($n){						//��ȡ
			if($n=='sex'){
				return "���";
			}

			if($n=="age"){
				if($this->age>35){
					return '��Զ18!';
				}
			}

			return $this->$n;					//ǧ�������!!!
		}

	}
												//�������صļ̳�
	Class Student extends Person{								
		function __construct($name="ɭɭ",$sex="Ů",$age="����",$school="�����廪"){		//���ع���
			// $this->name = $name;
			// $this->sex = $sex;
			// $this->age = $age;
			parent::__construct($name,$sex,$age);
			$this->school = $school;
		}

		function say(){										//����say
			// echo "�ҽ�".$this->name."<br/>�Ա�".$this->sex."<br/>�ҽ���".$this->age."��!<br/>��".$this->school."��ѧ!";
			parent::say();
			echo "��".$this->school."ѧϰ!";							
		}

		function study(){									//�����·���
			echo "<br/><br/>".$this->name."����".$this->school."ѧϰ!<br/><br/>";
		}
	}	

	// $stu1 = new Student();		//�������,���漰"����",��ִ��__set
	// $stu1->age = "50";
	// $stu1->study();											//�ڲ����漰��ȡ,��ִ��__get
	// $stu1->say();											//�ڲ����漰��ȡ,��ִ��__get

	// $stu2 = new Student("С־־","Ů","55","�����廪");
	// $stu2->study();
	// $stu2->say(); 

	// $stu_c = clone $stu2;

	// $stu_c->say();

	// Person::$count = 0;

	// $per1 = new Person();
	// $per2 = new Person();

	// $per1->app('����1','����2');

	// echo $per1;

	function __autoload($className){
		include(strtolower($className).".class.php");
	}

	// $base = new Base("����base.class.php�ļ�","Base��");

	// $base->_print();


	// $format = "The %2\$s book contains %1\$d pages.
	// That's a nice %2\$s full of %1\$d pages.<br/>";

	// $str = "   wamp  ";
	// $number = 789;

	// printf($format,$str,$number); 

	// $wamp = array('os' => 'Linux','webserver'=>'Apache','db'=>'MySQL','language'=>'php');

	// echo strlen($str);
	// echo strlen(ltrim($str));	//����ո�
	// echo strlen(rtrim($str));
	// echo strlen(trim($str));	//������ո�

	// $str2 = "123 This is a test ...";

	// echo ltrim($str2);

	// $str = "<B>WebServer:</B>&'Linux'&'Apache'";

	// echo htmlspecialchars($str,ENT_COMPAT);
	// echo "<br/>\n";
	// echo htmlspecialchars($str,ENT_QUOTES);
	// echo "<br/>\n";
	// echo htmlspecialchars($str,ENT_NOQUOTES);
	
	// $str = "һ��'quote'��<b>bold</b>";

	// echo htmlentities($str);
	// echo "<br/>";
	// echo htmlentities($str,ENT_QUOTES,"utf-8");

	if(isset($_POST['submit'])){
		echo "ԭ�����:".$_POST['str']."<br/>";
		echo "ת��ʵ��:".htmlspecialchars($_POST['str'])."<br/>";
		echo "ɾ��б��:".stripcslashes($_POST['str'])."<br/>";
		echo "ɾ��б�ߺ�ת��ʵ��".html2Text($_POST['str'])."<br/>";
		//ɾ��html��ǩ����
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

	$sub = "��ַΪhttp://bbs.lampborder.net/index.php��λ����LAMP�ֵ���,
			��ַΪhttp://www.baidu.com/index.php��λ���ǰٶ�,
			��ַΪhttp://www.gogle.com/index.php��λ���ǹȸ�.";

	$i = 1;
	$j = 1;
	if(preg_match_all($p3,$sub,$m,PREG_SET_ORDER)){
		
		// var_dump($m);		
		foreach ($m as $v) {
			echo "��������".$i."��URLΪ:".$v[0]."<br/>";
			echo "��������".$i."��Э��Ϊ:".$v[1]."<br/>";
			echo "��������".$i."������Ϊ:".$v[2]."<br/>";
			echo "��������".$i."������Ϊ:".$v[3]."<br/>";
			echo "��������".$i."������Ϊ:".$v[4]."<br/>";
			echo "��������".$i."���ļ�Ϊ:".$v[5]."<br/><br/>";
			$i++;
		}
	}

	if(preg_match_all($p3,$sub,$m,PREG_PATTERN_ORDER)){
		// var_dump($m);	��һ�۾�֪����	
	}		

	$arr_3 = array('Linux RedHAT9.0','Apache2.2.9','MySQL5.0.51','PHP5.2.6','LAMP','100');

	$version = preg_grep('/^[a-zA-Z]+(\d|\.)+$/',$arr_3);		//������ƥ������
	var_dump($version);	

	var_dump(strstr("this is a test!", "test"));
	var_dump(strstr("this is a test!", 115));	//115 ASCIIΪ's'

	/**
	 	���ڻ�ȡURL�е��ļ�������
		@param string $url    	�κ�һ��URL��ʽ���ַ���
		@return string 			URL�е��ļ����Ʋ���
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
		$text = "����ı�����<b>����</b>��<u>�����»���</u>";
		echo preg_replace($p4, "", $text)."<br/>";
		echo preg_replace($p4, "", $text,2)."<br/>";
	//����������������
		$p5 = "/(\d{2})\/(\d{2})\/(\d{4})/";
		$text = "�������ڷż�����Ϊ 10/01/2012��10/07/2012";
		echo preg_replace($p5, "\\3-\\1-\\2", $text)."<br/>";
		echo preg_replace($p5, "\${3}-\${1}-\${2}", $text)."<br/>"; 

	//�������滻
		$text = "���ı�[b]�Ӵ�[/b]
				�������ִ�СΪ[size=7][color=red]7����, ��ɫ[/color][/size]
				���ӵ�[url=http://bbs.lampborder.net]";

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
		echo "�滻��".$count."��<br/>";

		//ȫ����������
		$search = array("http","www","jsp","com");
		$replace = array("ftp","bbs","php","net");

		$url = "http://www.jspborther.com/index.jsp";
		echo str_replace($search, $replace, $url)."<br/>";

//�ַ����ָ�	
		//����
		$chars = preg_split('/\./', "l.a.m.p",-1,PREG_SPLIT_NO_EMPTY);

		print_r($chars);
		//������
		$l = explode(" ","WAMP LAMP PHPSTUDY");

		echo "<br/>".$l[2]."<br/>";

		//list
		list($one,$two,$three) = explode("%", "A%B%C");
		echo $one."<br/>".$two."<br/>".$three."<br/>";
//�ļ�

		echo filetype('/wamp/www/myphp/xishuoPHP.php');//�ҵõ�!!

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
		

		echo "�ļ���С:".getFileSize(filesize("/wamp/www/myphp/xishuoPHP.php"))."<br/>";

		
		$fileName = "javascript  \"".DIRECTORY_SEPARATOR."\"  common.js";

		var_dump($fileName);

		$path = "/wamp/www/myphp/xishuoPHP.php";

		echo basename($path,".php");

		$num = 0;
		$dirname = '/wamp/www/myphp';

		$dir_handle = opendir($dirname);

		echo '<table bgcolor="0" align="center" width="600" cellspacing="0" cellpadding="0"';
		echo '<caption><h2 style="text-align:center">Ŀ¼'.$dirname.'���������</h2></caption>';
		echo '<tr align="left" bgcolor="#cccccc">';
		echo '<th>�ļ���</th><th>�ļ���С</th><th>�ļ�����</th><th>�޸�ʱ��</th></tr>';

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

		echo '��<b>'.$dirname.'</b>İ·�µ���Ŀ¼���ļ�����<b>'.$num.'</b>��<br/>';

		exec("rd/s/q e:\wamp\www\myphp\hahhahahhah",$output,$status);
		//ִ��ϵͳ����ɾ��һ���ļ���
		var_dump($output);
		var_dump($status);

		$fN = "file.txt";

		// $handle = fopen("xishuoPHP/$fN",'r') or die("��$fN��ʧ��!");

		// // for ($row=0; $row <10 ; $row++) { 
		// // 	fwrite($handle,$row.":д������\r\n");	
		// // 	// @$data.= $row.":д�����ݶ�\n";
		// // }
		// // fclose($handle);
		// echo fgets($handle,4096)."<br/><br/><br/>";

		// // file_put_contents("xishuoPHP/$fN",$data);

		// print_r(file("xishuoPHP/$fN"));

		// fclose($handle);

//������Ū(���ǲ���ʹ)
		// $fi = fopen("http://jw.xtyml.cn/forum.php","r")or die("��������վʧ��!");

		// while (!feof($fi)) {
		// 	$line = fgets($fi,1024);
		// 	if(preg_match("/<title>(.*)</title>/",$line,$out)){
		// 		$res = $out[1];
		// 		break;
		// 	}
		// }
		// fclose($fi);
		// echo $res;

		// $fp = fopen("xishuoPHP/$fN",'r')or die("�ļ���ʧ��!");

		// echo "<br/>�ƶ��ļ�ָ��".ftell($fp)."<br/>";
		// echo fread($fp,20)."<br/>";
		// echo ftell($fp)."<br/>";

		// fseek($fp,1000,SEEK_CUR);
		// echo ftell($fp)."<br/>";
		// echo fread($fp,10)."<br/>";

		// fseek($fp,-10,SEEK_END);
		// echo fread($fp,10)."<br/>";

		// fclose($fp);

//lock����
		$fp = fopen("xishuoPHP/$fN",'r')or die("�ļ���ʧ��!");
		// flock($fp,LOCK_EX);
		// flock($fp,LOCK_SH);

//���԰�
		include 'lampborderLiuyan.php';

//�ļ���������
		$fil = "xishuoPHP/file.txt";
		if (copy($fil,'xiaowei/file.txt')) {
			echo "�ļ����Ƴɹ�!";
		}

		if(file_exists($fil)){

			// if (unlink($fil)) {
			// 	echo "�ļ�ɾ���ɹ�!";
			// }
		}else{ 
			echo "�ļ�������!";
		}

		// if (rename($fil,'zxy.txt')) {
		// 	echo "�����ɹ�!";
		// }

		$fp2 = fopen($fil,"r+")or die('���ļ�ʧ��!');

		if (ftruncate($fp2,102.4)) {
			echo "<br/>�ļ���ȡ�ɹ�!<br/>";
		}

//�ϴ��ļ� 
		include 'upload.php';

//GD
		//�����ܷ���gd
		if (extension_loaded('gd')) {
			echo '<br/>�����ʹ��gd<br/>';
			foreach (gd_info() as $k => $v) {
				echo "$k:$v<br/>";
			}
		}else{
			echo '��û�а�װgd��չ';
		}

		// $img = imagecreatetruecolor(300,200);
		// echo imagesx($img),imagesy($img);

		list($width,$height,$type,$attr) = getimagesize("c.png");

		echo '<img src="c.png"'.$attr.'>';

//ͼƬˮӡ
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

		image("c.png","ZXY");	//����ˮӡ��ȥ!!


//ͼƬ����(ûд��)
		// function thumb($filename,$width=200.$height=200){
		// 	list($width_orig,$height_orig) = getimagesize($filename);

		// 	if ($width&&($width_orig<$height_orig)) {
		// 		$width = ($height/$height_orig)*$width_orig;
		// 	}else{
		// 		$height = ($width/$width_orig)*$height_orig;
		// 	}

		// 	$image_p = imagecreate(width, height)
		// }



//PDO����MySQL
		$dsn = "mysql:dbname=xishuoPHP;host=127.0.0.1";

		$user = "root";

		$password = "";

		try{
			$dbh = new PDO($dsn,$user,$password);
			// $dbh = new PDO('xishuoPHP/dbcontent.txt',$user,$password);	q
			echo "<br/>���ӳɹ�!<br/>";
		}catch(PDOException $e){
			echo '���ݿ�����ʧ�ܣ���'.$e->getMessage();
		}


		// echo "���ݿ�������汾����Ϣ��".$dbh->getAttribute(PDO::ATTR_SERVER_INFO);

		// // $pdh->setAttrbute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

		// $query = "insert into table1 values(1,".$dbh->quote($dbh->getAttribute(PDO::ATTR_SERVER_INFO)).");";

		// $affected = $dbh->exec($query);

		// if($affected){
		// 	echo '���ݱ�xishuoPHP����Ӱ�������Ϊ��'.$affected;
		// }else{
		// 	print_r($dbh->errorInfo());
		// }

		// $query = "select uid,name from table1;";

		// try{
		// 	$pdostatement = $dbh->query($query);
		// 	echo "һ���ӱ��л�ȡ��".$pdostatement->rowCount()."����¼:<br/>";
		// 	foreach ($pdostatement as $row) {
		// 		echo $row['uid']."<br/>";
		// 		echo $row['name']."<br/>";
		// 	}
		// }catch (PDOException $e){
		// 	echo $e->getMessage();
		// } 


//PDOԤ����sql����
		
		//��
		$query = 'insert into table1(uid,name)values(:uid,:name);';

		$stmt = $dbh->prepare($query);
		
		$stmt->bindParam(':uid',$uid);
		$stmt->bindParam(':name',$name);  
		$uid = "33";
		$name = "��������!";
		$stmt->execute();
		
		//��

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

	// echo "A OS is {$wamp['os']}<br/>";			//���['']��ɫ����,û�±��{}Ч�ʵ�

	// echo "{\$base->name=$base->name}�����ַ�";

	// die("<br/>��ʾ�Ѿ��˳�");
	// exit("<br/>exit��ʾ�Ѿ��˳�");
	// echo "<br/>Count:".Person::getCount();
	// echo "<br/>".$per2->getCount();

	// echo "<br/>Const:".Person::getConst();

	// $person1->say();die();										//������̳в�ͬ

	// Class Student extends Person{
	// 	var $school;

	// 	function study(){
	// 		echo $this->name ."����".$this->school."ѧϰ<br/><br/>";
	// 	}
	// }

	// Class Monitor extends Student{
	// 	var $wage;

	// 	function teaching(){
	// 		echo $this->name."��".$this->school."����<br/>һ������".$this->wage;
	// 	}
	// }

	// $student1 = new Student("��־","Ů","500");
	// $monitor1 = new Monitor("��ľɭ","Ů","1500");

	// $student1->say();
	// $student1->school = "�����廪��ѧ";
	// $student1->study();

	// $monitor1->say();
	// $monitor1->school = "�����廪��ѧ";
	// $monitor1->study();
	// $monitor1->wage = "0.0001k";
	// $monitor1->teaching();


	// die();

	// $person1 = new Person();					//����
	// $person2 = new Person("����","Ů","45");	//��ȡ

	// $person1->name = "������";
	// $person1->sex = "Ů";
	// $person1->age = "210";

	// $person1->say();

	// echo "������".$person2->name."<br/>";		//��̬��???
	// echo "�Ա�".$person2->sex."<br/>";
	// echo "���䣺".$person2->age."<br/>";


	// die();

	// Class Person{

	// 	private $name,$sex,$age;

	// 	function __construct ($name,$sex="��",$age="20"){		// ���캯�� 			
	// 		$this->name = $name;
	// 		$this->sex = $sex;
	// 		$this->age = $age;
	// 	} 

	// 	function __destruct(){
	// 		echo "<br/>�ټ�".$this->name."<br/>";
	// 	}

	// 	public function getName(){					//��ȡ˽������	get������
	// 		return $this->name;
	// 	}

	// 	public function setSex($sex){					//�����Ա�,ֻ������������������
	// 		if($sex=="��"||$sex=="Ů"){
	// 			$this->sex = $sex;
	// 		}
	// 	}

	// 	public function setAge($age){					//��������,������������ִ��
	// 		if($age>150||$age<0){
	// 			return;
	// 		}
	// 		$this->age = $age;
	// 	}

	// 	public function getAge(){							//��ȡ����
	// 		if($this->age>30){
	// 			// return $this->age-10;					//���һ��������,��û�ж���������޸�!
	// 			return 18;
	// 		}
	// 		else{
	// 			return $this->age;
	// 		}
	// 	}

		

	// 	function say() {									//Ĭ����public,�Լ����Լ�����Ϣ˵����
	// 		echo "�ҽ�".$this->name."<br/>�Ա�".$this->sex."<br/>�ҽ���".$this->age."��!<br/><br/>";
	// 	}

	// }

	// $person1 = new Person("��ľɭ","��","40"); 

	// echo $person1->getName()."<br/>";
	// $person1->setSex("Ů");
	// $person1->setAge(200);
	// echo $person1->getAge()."<br/>";
	// $person2 = new Person("��־","","22");
	// $person2 = null;
	// $person3 = new Person("��ľɭ","Ů");

	// $person1->say();							//�����㲻�����ö���,������ ����Ͳ���ע����
	// @$person2->say();
	// $person3->say();

	// $aa = 'glo_aa';
	// $bb = 'glo_bb';

	// function zxy_globals(){
	// 	// global $aa;										//��һ����(��)������Ϊȫ�ֱ���
	// 	// var_dump($aa);

	// 	var_dump($GLOBALS['aa']);						//��ȫ�ִ���global�ؼ���
	// }

	// zxy_globals();

	// die();

	// define("AA", 1);									//����г���
	// define("BB", 2);
	// define("CC", 3);

	// // var_dump(AA);

	// function zxy_cl(){
	// 	var_dump(AA);
	// }

	// zxy_global();

	// define("A",1);										//ͨ����д,�����ܼ�'$'����
	// var_dump(A);

	// foreach ($_SERVER as $key => $value) {			//SERVER
	// 	echo '$_SERVER['.$key.']='.$value.'<br/>';
	// }												//ȥѧѧThink B����
					
	// echo "<pre>";									//���ŵ��÷� pre				
	// print_r($_SERVER);
	// echo "</pre>";

	// phpinfo();

	// $a = '2';										//�Ժ���õ����ű�ʾȷ����,������Ҳ���ַ���
	// var_dump($a);


	// $arr_2 = array( 
	// 		// "��ά��һ��" => array("һά��һ��" => '1-1',"һά�ڶ���" => '2-1'),
	// 		// "��ά�ڶ���" => array("һά��һ��" => '2-1',"һά�ڶ���" => '2-2'),
	// 			0 => array(0=>'1-1',1=>'1-2'),  ��                                 
	// 			1 => array(0=>'2-1',1=>'2-2'),
	// 	);

	// for($i = 0;$i<count($arr_2);$i++){			//һ�㲻��for����,����д����

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
	// 	return $num == strrev($num);			//������,�������
	// } 

	// function huidiao($fun){						//ʹ��
	// 	for ($i=0; $i <100 ; $i++) { 
	// 		if($fun($i)){						//$fun��Ҫ����,��Ϊone��two���в���
	// 			continue;		
	// 		}
	// 		echo $i."<br/>";
	// 	}

	// }

	// huidiao('two');

	// die();	//����ñ����ǻᱨ��	

	// function one($a,$b){					//��������
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

	// var_dump($fun(2,3));					//һ������������Բ����,����Ϊ����,Ѱ�Ҳ�ִ��


	// function bianl(){
	// 	echo "enter bianl()!";
	// }

	// $fun = "bianl";

	// var_dump($fun());								//��������


	// function duoCan(){								//�ɱ������������
	// 	// $args = func_get_args();

	// 	// for ($i=0; $i <count($args); $i++) { 		//count ��������Ԫ�ظ���
	// 	// 	echo "��".($i+1)."��������".$args[$i]."<br/>";
	// 	// 	var_dump(count($args));
	// 	// }

	// 	for ($i=0; $i <func_num_args(); $i++) { 
	// 		// var_dump(func_num_args());					//<=>count($func_get_args);
	// 		echo "��".($i+1)."��������".func_get_arg($i)."<br/>";
	// 	}
	// }

	// duoCan('asd','asds','2313');


	// function moRen($name,$age,$sex = "��"){	  //Ĭ�ϲ�������
	// 	echo "�ҽ�".$name.",�ҽ���".$age."��,���Ǹ�".$sex."��!";
	// }

	// moRen("����",'11',"Ů");

	// function yinYong(&$arg){	//���ò������� 	&֮��
	// 	$arg = '200';
	// }

	// $num = '100';

	// yinYong($num);

	// var_dump($num);



	// mixed aa(mixed $args){	//α���Ͳ���������ô����?
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
	// 	echo "����Ҫ��һ��!";
	// } 
	
	// $output = `dir/w e:`;	//ִ��ϵͳ����
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
 						//��׼���
	echo "1";
 	$a = '4';
 	$b = '6';
 ?>

 <script language="php">	//ͨ�÷��
 	echo "2";
 </script>

 <?				//3wrong
 	echo "3";
 ?>

 <?=$a?>		<!-- 4wrong -->

<!--  <%				5wrongԭ�����,����������
 	echo "5";
 %> -->

 <%=$b%>		<!-- 6wrong,ͬ5 -->

