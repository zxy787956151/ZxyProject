<?php 
	/**
	 * 生成随机数->创建图片->随机数写入图片->保存在SESSION中
	 *	easyEclipse for php
	 */
 session_start();


	for ($i=0; $i <4 ; $i++) { 
		@$rand.=dechex(rand(1,15));
	}
 @$_SESSION[check_pic]=$rand;
	// echo $rand;

	$im = imagecreatetruecolor(100, 30);//x,y坐标

	//设置颜色
	$bg = imagecolorallocate($im, 0, 0, 0);	//第一次调用调色板的时候,背景颜色
	$te = imagecolorallocate($im, 255, 255, 255);

	//画线条
	for ($i=0; $i <3 ; $i++) { 
		$te2 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));
		
		imageline($im, 0, rand(0,15), 100, rand(0,15), $te2);	//最高100*30
	}
	
	//画噪点
	for ($i=0; $i <200 ; $i++) { 
		$te3 = imagecolorallocate($im, rand(0,255), rand(0,255), rand(0,255));

		imagesetpixel($im, rand()%100, rand()%30, $te3);
	}

	//把字符串写在图像左上角
	imagestring($im, rand(1,6), rand(3,70), rand(0,16), $rand, $te);	//随机的有,字体样式,x,y坐标

	//输出图像
	header("Content-type: image/jpeg");
	imagejpeg($im);
 ?>