// JavaScript Document

//是否存在指定变量 


$(function(){
	$(".ajax").click(function(){	
		var start = $(this).val();	
		$.ajax({	
			type: "POST",//要求为String类型的参数，请求方式（post或get）默认为get。注意其他http请求方法，例如put和delete也可以使用，但仅部分浏览器支持。
			// url: "Php.php?action=demo",//要求为String类型的参数，（默认为当前页地址）发送请求的地址。
			url: "Index/ajax?ajax=1&start="+start+"&t="+Math.random(),
			dataType: "json",	/* 要求为String类型的参数，预期服务器返回的数据类型。如果不指定，JQuery将自动根据http包mime信息返回responseXML或responseText，并作为回调函数参数传递。可用的类型如下：
									xml：返回XML文档，可用JQuery处理。
									html：返回纯文本HTML信息；包含的script标签会在插入DOM时执行。
									script：返回纯文本JavaScript代码。不会自动缓存结果。除非设置了cache参数。注意在远程请求时（不在同一个域下），所有post请求都将转为get请求。
									json：返回JSON数据。
									jsonp：JSONP格式。使用S	ONP形式调用函数时，例如myurl?callback=?，JQuery将自动替换后一个“?”为正确的函数名，以执行回调函数。
									text：返回纯文本字符串。
								*/
			data: {"start":start},/* 要求为Object或String类型的参数，
												发送到服务器的数据。如果已经不是字符串，将自动转换为字符串格式。
												get请求中将附加在url后。防止这种自动转换，可以查看　　processData选项。
												对象必须为key/value格式，例如{foo1:"bar1",foo2:"bar2"}转换为&foo1=bar1&foo2=bar2。
												如果是数组，JQuery将自动为不同值对应同一个名称。例如{foo:["bar1","bar2"]}转换为&foo=bar1&foo=bar2。
												*/
			// ContentType: "text/javascript;	charset=UTF-8",
			// beforeSend: function(){				//beforeSend用于在向服务器发送请求前执行一些动作。
			// },
			success: function(json){
			
			if(json.success==1){

	              var ansstr = "<div class='everyper'><img src=''><h5></h5><p></p><p class='agree'><a href=''><span class='glyphicon glyphicon-thumbs-up'>()</span></a></p></div>";

	          if (json.start==json.pageNum) {

	              for (var i = 0; i < json.nowNum; i++) {
	                  $(".about-text").eq(i).children("h5").html(json[i].title);
	                  $("#png"+i).css("background","url("+json[i].phourl+"/"+json[i].phoname+")");
	                  $(".title").eq(i).children("p").children('span').eq(0).html(json[i].qSmallPart);
	                  $(".behidden").eq(i).children("p").html(json[i].qLargePart);
					  $(".qid").eq(i).val(json[i].id);	

	                  if(typeof(json[i][0])!="undefined"){
		              	 	$(".everyper").remove();
							$(".answerhold").eq(i).html(ansstr);
		              	 	$(".everyper").eq(i).children("h5").html("change");
						}else{
		              	 	$(".everyper").remove();
	                  		
						}
	              };

	              for (var j = 0; j< (3-json.nowNum); j++) {
	                  $(".about-icon").eq(json.nowNum+j).css("display","none");
	                  $(".about-text").eq(json.nowNum+j).css("display","none");
	              };	



	          }else{

	              $(".about-icon").css("display","block");
	              $(".about-text").css("display","block");
	              

	              for (var i = 0; i < 1; i++) {

	                  $(".about-text").eq(i).children("h5").html(json[i].title);
	                  $("#png"+i).css("background","url("+json[i].phourl+"/"+json[i].phoname+")");
	                  $(".title").eq(i).children("p").children('span').eq(0).html(json[i].qSmallPart);
	                  $(".behidden").eq(i).children("p").html(json[i].qLargePart); 	
	                  $("#qid").val(json[i].id);
	                  //回答内容

						if(typeof(json[i][0])!="undefined"){
		              	 	$(".everyper").remove();
							for (var w = 0; w >json[i].length; w++) {
								$(".answerhold").eq(i).html(ansstr);
			              	 	$(".everyper").eq(i).children("h5").html(json[i][w].ansuser);
							};
						}else{
		              	 	$(".everyper").remove();
						}
	              };
	          }
          
				}else{
					alert("AjaxWrong!!");
				}

			}

		});
	});
});