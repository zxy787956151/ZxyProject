$(document).ready(function(){
	var ul=$('#wrap ul');//获取ul
	var ulHtml=ul.html();
	ul.append(ulHtml); //图片加倍
	var speed=-2; //初始化速度值
	var time=null;//初始化定时器
	//定时器执行函数
	function slider(){
		if(ul.css('left')=='-800px'){
			ul.css('left','0px'); 
		}
	ul.css('left','+='+speed+'px');
	}
	//定时器
	time=setInterval(slider,50);
	ul.hover(function(){
			clearInterval(time);   //鼠标悬停，清除定时器
		}, 
		function(){
			time=setInterval(slider,40);
		 }                         //鼠标移出，开始滚动
	);
	
});






























