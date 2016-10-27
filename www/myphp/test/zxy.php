<?php
	
	// setcookie("mycoo",1111,time()+120,"/zxy/","http://127.0.0.1/myphp/zxy.php",1);
	date_default_timezone_set('Asia/Shanghai');

	if(!isset($_COOKIE['mycoo'])){
		echo "不存在!"."<br />";
		setcookie("mycoo",date("H:i:s"));
		echo "欢迎首次访问!<br />";
	}

	else {
		echo "成功!<br />";
		echo "您上次访问时间为:".$_COOKIE['mycoo']."<br />";		
		setcookie("mycoo","",time()-1);//删除cookie
		echo "您本次访问的时间为:".date("H:i:s")."<br />";
		setcookie("mycoo",date("H:i:s"));
	}	

	header("Content-Type:text/html;charset=utf-8");

	echo urlencode("我爱你");

	echo "<br />";

	// echo urldecode("%E6%88%91%E7%88%B1%E4%BD%A0");

	//date_default_timezone_set('Asia/Shanghai'); 

	$arr=getdate();

	echo $arr[@year]."-".$arr[@mon]."-".$arr[@mday];

	echo "<br />";

	echo $arr[@hours].":".$arr[@minutes].":".$arr[@seconds];

	echo "<br >";

	echo mktime();

	echo "<br >";

	echo date("Y-m-d,H:i:s",mktime());

	echo "<br >";

	// echo strtotime('2015-7-29 10:28');

	// $a=1438136880;

	// echo "<br >";

	echo date("Y-m-d,H:i",strtotime('2025-05-08 10:28'));

	$b=strtotime('2015-8-24,00:00:00');//开学那天时间戳

	$c=strtotime(date("Y-m-d H:i:s"));//获取当前时间并改为时间戳

	// echo "<br />".date("Y-m-d H:i:s");

	//?倒计时? echo "<br />"."距离开学还有:".ceil(($b-$c)/86400)."天".-ceil(ceil(($b-$c)/3600)-ceil(($b-$c)/86400)*24)."小时".-ceil(ceil(($b-$c)/60)-ceil(($b-$c)/86400)*24*60)."分".ceil($b-$c)."秒";

	function runTime(){
		list($e,$f)=explode(" ", microtime());
		return ($e+$f);
	}

	$g=runTime();

	echo "<br />"."吧啦啦啦";

	$h=runTime();

	$i=$h-$g;

	// echo "< 'br />".$i."<br />".number_format($i);
?>