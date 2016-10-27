//滚动时菜单栏变化。
   window.onscroll=function (){
        var head=document.getElementById("head");
        var headlist=document.getElementById("headlist");
        var scrollTop=document.documentElement.scrollTop||window.pageYOffset||document.body.scrollTop;;//滑动了多少像素。
        var listcontrol=document.getElementById("listcontrol");
        var newshold=document.getElementById("newshold");
        var out=document.getElementById("out");
        if(scrollTop>0){
             head.className="onscroll";
             headlist.className="headlistturn";
             listcontrol.className="turncontrol";
             out.style.color="#614e3c";
          }
        else{
             head.className="noscroll";
             headlist.className="headlist";
             listcontrol.className="listcontrol";
             out.style.color="white";
             
         }

 //可视区域的加载。
         var seeHeight=document.documentElement.clientHeight; //可视区域的高度。
         var watchpla=document.getElementsByClassName("watchpla");
         var tenavlist=watchpla[12].getElementsByTagName("li");
         var article=watchpla[13].getElementsByTagName("div"); 
            //问答标题加载动画
            if(watchpla[0].offsetTop<scrollTop+seeHeight){
               watchpla[0].style.visibility="visible";
               watchpla[0].style.animation="shiftdown 1s";//可视区域加载动画。
               watchpla[0].style.WebkitAnimation="shiftdown 1s"}//兼容性

            //问答模块左侧加载动画
            if(watchpla[1].offsetTop<scrollTop+seeHeight-100){
               watchpla[1].style.visibility="visible";
               watchpla[1].style.animation="shiftright 2s";
               watchpla[1].style.WebkitAnimation="shiftright 2s";
              }

            //问答模块右侧上层加载动画
            if(watchpla[2].offsetTop<scrollTop+seeHeight-900){
               watchpla[2].style.visibility="visible";
               watchpla[2].style.animation="shiftdoudown 2s";
               watchpla[2].style.WebkitAnimation="shiftdoudown 2s"}   
            //问答模块右侧下层加载动画
            if(watchpla[3].offsetTop<scrollTop+seeHeight-900){
               watchpla[3].style.visibility="visible";
               watchpla[3].style.animation="shiftup 1s";
               watchpla[3].style.WebkitAnimation="shiftup 1s"}

            //作业标题加载动画
            if(watchpla[4].offsetTop<scrollTop+seeHeight){
               watchpla[4].style.visibility="visible";
               watchpla[4].style.animation="shiftdown 1s";
               watchpla[4].style.WebkitAnimation="shiftdown 1s"}  
            //作业模块左一加载动画
            if(watchpla[5].offsetTop<scrollTop+seeHeight){
               watchpla[5].style.visibility="visible";
               watchpla[5].style.animation="shiftright 1s";
               watchpla[5].style.WebkitAnimation="shiftright 1s"}  
            //作业模块中间加载动画
            if(watchpla[6].offsetTop<scrollTop+seeHeight){
               watchpla[6].style.visibility="visible";
               watchpla[6].style.animation="shiftleft 1s";
               watchpla[6].style.WebkitAnimation="shiftleft 1s"}  
            //作业模块右一加载动画
            if(watchpla[7].offsetTop<scrollTop+seeHeight){
               watchpla[7].style.visibility="visible";
               watchpla[7].style.animation="shiftdoubl 1s";
               watchpla[7].style.WebkitAnimation="shiftdoubl 1s"}  
            //作业模块优秀标题加载动画
            if(watchpla[8].offsetTop<scrollTop+seeHeight){
               watchpla[8].style.visibility="visible";
               watchpla[8].style.animation="shiftleft 1s";
               watchpla[8].style.WebkitAnimation="shiftleft 1s"}
             //作业模块优秀作一加载动画
            if(watchpla[9].offsetTop<scrollTop+seeHeight){
               watchpla[9].style.visibility="visible";
               watchpla[9].style.animation="arshiftr 1s";
               watchpla[9].style.WebkitAnimation="arshiftr 1s"}
            //作业模块优秀作二加载动画
            if(watchpla[10].offsetTop<scrollTop+seeHeight){
               watchpla[10].style.visibility="visible";
               watchpla[10].style.animation="arshiftr 1s";
               watchpla[10].style.WebkitAnimation="arshiftr 1s"}
            //技术标题加载动画
            if(watchpla[11].offsetTop<scrollTop+seeHeight){
               watchpla[11].style.visibility="visible";
               watchpla[11].style.animation="shiftdown 1s";
               watchpla[11].style.WebkitAnimation="shiftdown 1s"} 
                   
            //技术导航栏动画。
            if(watchpla[12].offsetTop<scrollTop+seeHeight){
               watchpla[12].style.visibility="visible";
               tenavlist[0].style.animation="shiftright 1s";
               tenavlist[1].style.animation="shiftleft 1s"; 
               tenavlist[2].style.animation="shiftdoubl 1s";
               tenavlist[3].style.animation="shiftthirl 1s";
               tenavlist[0].style.WebkitAnimation="shiftright 1s";
               tenavlist[1].style.WebkitAnimation="shiftleft 1s"; 
               tenavlist[2].style.WebkitAnimation="shiftdoubl 1s";
               tenavlist[3].style.WebkitAnimation="shiftthirl 1s";}
            //内容动画。
            if(watchpla[13].offsetTop<scrollTop+seeHeight){ 
               watchpla[13].style.visibility="visible";
               article[0].style.animation="arshiftr 1s";
               article[2].style.animation="douarshiftr 1s";
               article[4].style.animation="thiarshiftr 1s";
               article[0].style.WebkitAnimation="arshiftr 1s";
               article[2].style.WebkitAnimation="douarshiftr 1s";
               article[4].style.WebkitAnimation="thiarshiftr 1s";}
            //翻页按钮的加载动画
            if(watchpla[14].offsetTop<scrollTop+seeHeight){ 
                   watchpla[14].style.visibility="visible";
                   watchpla[14].style.animation="shiftdown 1s";
                   watchpla[14].style.WebkitAnimation="shiftdown 1s";
                                            }
          }

          
$(function(){  
           //刷新页面回到顶部。   
              // $(window).scrollTop(700);
           // 屏幕缩小,二级菜单的展开与收缩。
              $(".listul").hide();
              $("#adjust").click(function(){
              $(".listul").slideToggle(300);}
                                           );
           //弹出登录界面,并且禁用滚动条。遮罩层显示。
             $(".onland").click(function(){
             $(window).scrollTop(0);  //登陆时回到顶部。
             $("body").css("overflow-y","hidden");
             $("header").attr("class","onscroll");
             $("#headlist").attr("class","headlistturn");
             $("#listcontrol").attr("class","turncontrol");
             $(".landing").slideToggle(1000);
             $(".coverpage").show();
             $(".picfont").fadeOut(300);
             });
             
             $(".closeland").click(function(){
             $(".landing").slideToggle(800);
             $("body").css("overflow-y","scroll");//启用滚动条
             $(".coverpage").hide();
             $(".picfont").fadeIn(600);
              });
})
