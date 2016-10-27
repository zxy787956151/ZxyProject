$(function(){
	$("#navhold").click(function(){
		 $(".beginpub").fadeIn(1000);
	})
	$(".beginpub input").eq(3).click(function(){
		 $(".beginpub").fadeOut(300);
	})

	$(".worknav").click(function(){
		$(".beginload").fadeIn(300);
	})

	$(".beginload input").eq(2).click(function(){
		$(".beginload").fadeOut(300);
	})
})