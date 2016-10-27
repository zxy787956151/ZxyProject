;(function($){
	
	$.fn.shuffling=function(options){
		
		return this.each(function(){

			var _shuffling=jQuery('.shuffling');

			var _box=jQuery('.shuffling_box');

			var _this=jQuery(this); // 

			var shufflingHei=_box.height();

			var Over='mouseover';

			var Out='mouseout';

			var Click='click';

			var Li="li";

			var _cirBox='.cir_box';

			var cirOn='cir_on';

			var _cirOn='.cir_on';

			var cirlen=_box.children(Li).length; //圆点的数量  图片的数量

			var shufflingTime=3000; //轮播时间

			var switchTime=2200;//图片切换时间

			cir();

			Btn();

		//根据图片的数量来生成圆点

			function cir(){

				_shuffling.append('<ul class="cir_box"></ul>');

				var cir_box=jQuery('.cir_box');

				for(var i=0; i<cirlen;i++){

					cir_box.append('<li style="" value="'+i+'"></li>');
				}

				var cir_dss=cir_box.width();


				cir_box.children(Li).eq(0).addClass(cirOn);

			}

		//生成左右按钮

			function Btn(){

				_shuffling.append('<div class="shuffling_btn"></div>');

				var _btn=jQuery('.shuffling_btn');

				_btn.append('<div class="left_btn"></div><div class="right_btn"></div>');

				var leftBtn=jQuery('.left_btn');

				var rightBtn=jQuery('.right_btn');

			//点击左面按钮

				leftBtn.bind(Click,function(){

				var cir_box=jQuery(_cirBox);

			 	var onLen=jQuery(_cirOn).val();	

				_box.children(Li).eq(onLen).stop(false,false).animate({

					opacity:0

				},switchTime);

				if(onLen==0){

			 		onLen=cirlen;

			 	}

				_box.children(Li).eq(onLen-1).stop(false,false).animate({

					opacity:1

				 },switchTime);
				
				cir_box.children(Li).eq(onLen-1).addClass(cirOn).siblings().removeClass(cirOn);

				})

			//点击右面按钮

				rightBtn.bind(Click,function(){

				var cir_box=jQuery(_cirBox);

			 	var onLen=jQuery(_cirOn).val();	

				_box.children(Li).eq(onLen).stop(false,false).animate({

					opacity:0

				},switchTime);

				if(onLen==cirlen-1){

				 		onLen=-1;

				 	}

				_box.children(Li).eq(onLen+1).stop(false,false).animate({

					opacity:1

				 },switchTime);
				
				cir_box.children(Li).eq(onLen+1).addClass(cirOn).siblings().removeClass(cirOn);

				})
			}

		//定时器

			 int=setInterval(clock,shufflingTime);

			 function clock(){

			 	var cir_box=jQuery(_cirBox);

			 	var onLen=jQuery(_cirOn).val();	

				_box.children(Li).eq(onLen).stop(false,false).animate({

					opacity:0

				},switchTime);

				if(onLen==cirlen-1){

				 		onLen=-1;

				 	}

				_box.children(Li).eq(onLen+1).stop(false,false).animate({

					opacity:1

				 },switchTime);
				
				cir_box.children(Li).eq(onLen+1).addClass(cirOn).siblings().removeClass(cirOn);
			 	
			 }



		});

	}
	
})(jQuery);
$(function(){

    $(".shuffling").shuffling({

    });

})

