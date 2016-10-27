// JavaScript Document
$(function(){

$(".btn").click(function(){		
	$(".btn").live('click',function(){		//live 发生某个事件（ click事件） 
		var user = $("#user").val();
		var pass = $("#pass").val();

		$.ajax({	
			type: "POST",//要求为String类型的参数，请求方式（post或get）默认为get。注意其他http请求方法，例如put和delete也可以使用，但仅部分浏览器支持。
			url: "Php.php?action=demo",//要求为String类型的参数，（默认为当前页地址）发送请求的地址。
			dataType: "json",	/* 要求为String类型的参数，预期服务器返回的数据类型。如果不指定，JQuery将自动根据http包mime信息返回responseXML或responseText，并作为回调函数参数传递。可用的类型如下：
									xml：返回XML文档，可用JQuery处理。
									html：返回纯文本HTML信息；包含的script标签会在插入DOM时执行。
									script：返回纯文本JavaScript代码。不会自动缓存结果。除非设置了cache参数。注意在远程请求时（不在同一个域下），所有post请求都将转为get请求。
									json：返回JSON数据。
									jsonp：JSONP格式。使用SONP形式调用函数时，例如myurl?callback=?，JQuery将自动替换后一个“?”为正确的函数名，以执行回调函数。
									text：返回纯文本字符串。
								*/
			data: {"user":user,"pass":pass},/* 要求为Object或String类型的参数，
												发送到服务器的数据。如果已经不是字符串，将自动转换为字符串格式。
												get请求中将附加在url后。防止这种自动转换，可以查看　　processData选项。
												对象必须为key/value格式，例如{foo1:"bar1",foo2:"bar2"}转换为&foo1=bar1&foo2=bar2。
												如果是数组，JQuery将自动为不同值对应同一个名称。例如{foo:["bar1","bar2"]}转换为&foo=bar1&foo=bar2。
												*/
			
			beforeSend: function(){				//beforeSend用于在向服务器发送请求前执行一些动作。
				$('<div id="msg" />').addClass("loading").html("正在登录...").css("color","#999").appendTo('.sub');
			},
			success: function(json){
				if(json.success==1){
					$("#login_form").remove();
					var div = " <div id='result'><p><strong>"+json.userResult+"</strong></p></div><div id='result'><p><strong>"+json.passResult+"</strong></p></div><div id='logout'><p><strong><p><a href='#' id='logout'>【退出】</a></p>";
					$("#login").append(div);
				}else{
					alert("AjaxWrong!!");
				}
			}
		});
	});
	
$("#logout").live('click',function(){
			   
			    $("#login_form").remove();
			    
			    $("#logout").remove();
			    $("#result").remove();
			    var div = "<div id='login_form'><p><label>用户名：</label> <input type='text' class='input' name='user' id='user' /></p><p><label>密 码：</label> <input type='password' class='input' name='pass' id='pass' /></p><div class='sub'><input type='submit' class='btn' value='登 录' /></div></div>";
			    $("#login").append(div);
			
	
	});
});
});