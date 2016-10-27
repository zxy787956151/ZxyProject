$(function(){ 
	// 好笨的方法。。
	$(".chagebtn a").eq(0).css("background","#F26F62");
	$(".chagebtn a").eq(0).click(function(){
        $(".dialoghold").removeClass("secondmove"); 
        $(".dialoghold").removeClass("thirdmove"); 
        $(".chagebtn a").eq(0).css("background","#F26F62").siblings().css("background","white");
	})
	$(".chagebtn a").eq(1).click(function(){
        $(".dialoghold").addClass("secondmove");
		$(".dialoghold").removeClass("thirdmove"); 
		$(".chagebtn a").eq(1).css("background","#F26F62"); 
		$(".chagebtn a").eq(1).css("background","#F26F62").siblings().css("background","white");
	})
    $(".chagebtn a").eq(2).click(function(){
		$(".dialoghold").addClass("thirdmove");
		$(".chagebtn a").eq(2).css("background","#F26F62");
		$(".chagebtn a").eq(2).css("background","#F26F62").siblings().css("background","white");
	})
	//响应式无法实现,获取浏览器宽度必须刷新后才可以执行后续,待深入学习后再深究。
})

