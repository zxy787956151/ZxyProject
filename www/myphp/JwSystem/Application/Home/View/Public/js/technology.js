$(function() { 

    //模块切换代码。
        $(".frontnum li").eq(0).addClass("numchange").siblings().removeClass("numchange");
        $(".technologynav li").eq(0).addClass("techange");    
        $(".technologychild").eq(0).show();                //使4个模块第一个模块导航凸显。
        $(".technologynav li").click(function(){           //模块切换,自定义函数。
           frontmark=0;          
           phpmark=0;
           netmark=0;
           futuremark=0;     //很必要,防止bug。
           number=$(this).index(); 
           autoplay();
      })
      function autoplay()
       {
         $(".technologynav li").removeClass("techange");
         $(".technologynav li").eq(number).addClass("techange"); //切换模块,以及导航的变化。    
         $(".technologychild").eq(number).show().siblings(".technologychild").hide();
         if(number==0){                                    //保证换页之后,切换模块,仍旧显示第一页。
          $(".frontendnew").eq(0).show().siblings(".frontendnew").hide();
          $(".frontnum li").eq(0).addClass("numchange").siblings().removeClass("numchange");
             }
         if(number==1){                        
          $(".phpnew").eq(0).show().siblings(".phpnew").hide();
          $(".phpnum li").eq(0).addClass("numchange").siblings().removeClass("numchange");
             }
         if(number==2){                        
          $(".netnew").eq(0).show().siblings(".netnew").hide();
          $(".netnum li").eq(0).addClass("numchange").siblings().removeClass("numchange");
             }
         if(number==3){                        
          $(".futurenew").eq(0).show().siblings(".futurenew").hide();
          $(".futurenum li").eq(0).addClass("numchange").siblings().removeClass("numchange");
             }
         }

   //翻页代码。
          //JS掌握过于蠢笨,只能一个一个来定义。待JS入门后再来简化。
        $(".frontendnew").eq(0).siblings(".frontendnew").hide();
          //前端模块翻页。
        var frontmark=0;
        var length=$(".technologychild").children(".frontendnew").length-1 //前端页数。
        $(".next").eq(0).click(function(){
          $(".frontendnew").eq(frontmark).hide();
          frontmark++;
          if(frontmark>length){
          	frontmark=length;
          	$(".frontendnew").eq(frontmark).show();  //确保翻页在页数达到最大停在最后一页。
          }
          //页码注记样式。
          $(".frontnum li").eq(frontmark).addClass("numchange").siblings().removeClass("numchange");
          $(".frontendnew").eq(frontmark).fadeIn();
        })
        
        $(".prev").eq(0).click(function(){
          $(".frontendnew").eq(frontmark).hide();
          frontmark--;
          if(frontmark<0){
          	frontmark=0;
          	$(".frontendnew").eq(frontmark).show();  //确保前翻最后停在第一页。
          }
          //页码注记样式。
          $(".frontnum li").eq(frontmark).addClass("numchange").siblings().removeClass("numchange");
          $(".frontendnew").eq(frontmark).fadeIn();

        })
              //php翻页。
        var phpmark=0; 
        var phplength=$(".technologychild").children(".phpnew").length-1 //php页数。
        $(".next").eq(1).click(function(){
          $(".phpnew").eq(phpmark).hide();
          phpmark++;
          if(phpmark>phplength){
          	phpmark=length;
          	$(".phpnew").eq(phpmark).show();
          }
          $(".phpnum li").eq(phpmark).addClass("numchange").siblings().removeClass("numchange");
          $(".phpnew").eq(phpmark).fadeIn();
        })

        $(".prev").eq(1).click(function(){
          $(".phpnew").eq(phpmark).hide();
          phpmark--;
          if(phpmark<0){
          	phpmark=0;
          	$(".phpnew").eq(phpmark).show();
          }
          $(".phpnum li").eq(phpmark).addClass("numchange").siblings().removeClass("numchange");
          $(".phpnew").eq(phpmark).fadeIn();

        })
    
             //.net翻页。
        var netmark=0; 
        var netlength=$(".technologychild").children(".netnew").length-1 //.net页数。
        $(".next").eq(2).click(function(){
          $(".netnew").eq(netmark).hide();
          netmark++;
          if(netmark>netlength){
          	netmark=length;
          	$(".netnew").eq(netmark).show();
          }
          $(".netnum li").eq(netmark).addClass("numchange").siblings().removeClass("numchange");
          $(".netnew").eq(netmark).fadeIn();
        })

        $(".prev").eq(2).click(function(){
          $(".netnew").eq(netmark).hide();
          netmark--;
          if(netmark<0){
          	netmark=0;
          	$(".netnew").eq(netmark).show();
          }
          $(".netnum li").eq(netmark).addClass("numchange").siblings().removeClass("numchange");
          $(".netnew").eq(netmark).fadeIn();

        })

         //future翻页。
       
        var futuremark=0; 
        var futurelength=$(".technologychild").children(".futurenew").length-1 //future页数。
        $(".next").eq(3).click(function(){

          $(".futurenew").eq(futuremark).hide();
          futuremark++;
          if(futuremark>futurelength){
          	futuremark=length;
          	$(".futurenew").eq(futuremark).show();
          }
          $(".futurenum li").eq(futuremark).addClass("numchange").siblings().removeClass("numchange");
          $(".futurenew").eq(futuremark).fadeIn();
        })

        $(".prev").eq(3).click(function(){
          $(".futurenew").eq(futuremark).hide();
          futuremark--;
          if(futuremark<0){
          	futuremark=0;
          	$(".futurenew").eq(futuremark).show();
          }
          $(".futurenum li").eq(futuremark).addClass("numchange").siblings().removeClass("numchange");
          $(".futurenew").eq(futuremark).fadeIn();

        })

        // 第一模块翻页按钮动画是预加载,无法避免,故给其他模块按钮也加上此动画。无法在css中添加,因为会产生叠加效果。
        var turnpage=document.getElementsByClassName("turnpage");
        for(i=2;i<turnpage.length;i++){
           turnpage[i].style.animation="shiftdown 1s";
        }
       

});
    
