<?php 
	//包含文件
	include('base.php');
	//注意include和require的区别

	if($_SERVER["REQUEST_METHOD"] == 'POST'){
		if(empty($_POST['text'])){
			$nameError = "账号不能为空!";
		}

		if(empty($_POST['pwd'])){
			$pwdError = "密码不能为空!";
		}

		if(empty($_POST['sex'])){
			$sexError = "性别必须选一个!";
		}
	}

	// var_dump($_SERVER["REQUEST_METHOD"]);
	// SERVER参数http://my.oschina.net/miaowang/blog/299553
 ?>
<html>
<head>
	<title></title>
</head>
<body>

	<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']) ?>" method="post">		<!-- get,post -->
		<!--防止被黑客利用 ?php echo htmlspecialchars($_SERVER["PHP_SELF"]) ?> -->
		<input  name="text" type="text" value="<?php echo @$_POST['text']; ?>" />
		<span style="color:red">*<?php echo $nameError; ?></span>
			<br/><br/>
		<input name="pwd" type="password" value="<?php echo @$_POST['pwd']; ?>"/>
		<span style="color:red">*<?php echo $pwdError; ?></span>
			<br/><br/>
		<input name="hidden" value="1" type="hidden" />

		<select name="select">
			<option>我</option>
			<option>选的</option>
			<option>哪个?</option>
		</select>
			<br/><br/>
		<input type="radio" name="sex" value="man" 
		<?php if(@$_POST['sex']=="man"){echo 'checked';} ?> />男
		<input type="radio" name="sex" value="woman"
		<?php if(@$_POST['sex']=="woman"){echo 'checked';} ?> />女
		<span style="color:red">*<?php echo $sexError; ?></span>
			<br/><br/>
		<input type="submit" value="点我(*^__^*)">
	</form>

</body>
</html>

<?php

	

//php空值
	//var_dump(@$_POST['text']);	
	//input输入框的空都是字符型'';


	

//变量
	// $a = '1';

	// // echo "$a","<br/>",'$a';
	// echo "<br/>".$a."a";

//3输出 echo var_dunp print_r

//数组

	// $arr = array("普通","数组");

	// echo $arr;

	// var_dump($arr);

	//此函数显示关于一个或多个表达式的结构信息，包括表达式的类型与值。数组将递归展开值，通过缩进显示其结构。

	// print_r($arr);

	// $a = '111';

	// print_r($a);

	//print_r() 显示关于一个变量的易于理解的信息。如果给出的是 string、integer 或 float，将打印变量值本身。如果给出的是 array，将会按照一定格式显示键和元素

//多维数组

	// $arr2 = array('0' =>'a' ,'1'=>'b' );

	// var_dump($arr2,$arr2[1]);


//数组的遍历foreach

	//$DD = array('first' =>"玩爪机" , 'second' => "聊qq" , 'third' => "打手游", 'fourth' => "偶尔学习" );
	// foreach ($DD as $v) {
	// 	echo $v."<br/>";
	// }

//关联数组=>
	//遍历
	// foreach ($DD as $k => $v) {	//$k:键值
	// 	echo $k."=>".$v."<br/>";	//叫关联数组
	// }


//跳转
	if(@$_POST['hidden'] == '1'){
		// header('Location:test.php?num=get传值的参数&num2=get传来的第二个参数');
		header('Location:location.php');	//只有跳转方式
	}


//超全局变量POST GET SESSION REQUEST COOKIE

	// GET 和 POST 都创建数组（例如，array( key => value, key2 => value2, key3 => value3, ...)）。
	// 此数组包含键/值对，其中的键是表单控件的名称，而值是来自用户的输入数据。

	// GET 方法从表单发送的信息对任何人都是可见的,绝不能使用 GET 来发送密码或其他敏感信息！
	// POST 方法从表单发送的信息对其他人是不可见的

	// var_dump($_POST);	//POST是一个数组
	// foreach ($_POST as $k => $v){
	// 	echo $k,"=>",$v,"<br/>";
	// }

	// var_dump($_GET);
	// var_dump($_POST);

	// session_start();

	// $_SESSION['first'] = "第一个session参数";
	// $_SESSION['second'] = "第二个session参数";
	// $_SESSION['third'] = array("DD"=>"PHP","李金博"=>".NET","鸣人"=>"螺旋连丸");
	
	// $session = array();
	// $session['1'] = "自定义session数组的参数";	

	// var_dump($session);
	// var_dump($_SESSION);

	// 网页连接原理：客户端发请求 --> 服务器端响应请求 
	// --> 客户端获取服务器响应客户端服务器端网络连接断客户端再发起请求候客户端cookie块
	// 请求服务器cookie包含(session)sessionid服务器端通sessionid
	// 判断源程清除cookie请求sessionid块清除请求候客户端发起请求
	// 再包含sessionid所服务器端默认新请求自没session存在

	// 怎么会没有区别了，cookie保存在客户端，而且保存的数据很少，
	// 而session保存在客户端，可以保存很多数据，而且，cookie和session中保存的数据可以是完全不一样的。
	// 只是说cookie和session有联系而已


	// if(isset($_SESSION['views']))
	//   $_SESSION['views']=$_SESSION['views']+1;

	// else
	//   $_SESSION['views']=1;
	// echo "Views=". $_SESSION['views'];

	//var_dump($_SESSION['views']);

	// $_SESSION = array()

//cookie

	// setcookie("user", "Alex Porter", time()-3600);
	// //删除的时候把过期的时间设成负的

	// var_dump($_COOKIE['user']);

//REQUEST

	// $username = @$_REQUEST['text'];
	// var_dump($username);



// echo htmlspecialchars($_SERVER["PHP_SELF"]);


//多维数组略

//时间
	// date_default_timezone_set("Asia/Shanghai");//设置时区
	// echo date("Y-m-d/H:i:s");

?>


<!-- js没有加号了,加号在js里 -->

<!--
<script type="text/javascript">
var c = '111';
	alert("a" + "b" + c);
</script>
-->

