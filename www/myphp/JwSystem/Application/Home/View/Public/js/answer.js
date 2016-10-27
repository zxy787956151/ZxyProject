// 文本区域代码

     //显示隐藏文章,同时显示全部消失。
window.onload=function(){
     var showbtn=document.getElementsByClassName("showbtn");
     var hidebtn=document.getElementsByClassName("hidebtn");
     var behidden=document.getElementsByClassName("behidden");
     var answerbtn=document.getElementsByClassName("answerbtn");
     var answerwhole=document.getElementsByClassName("answerwhole");
     var hideanswer=document.getElementsByClassName("hideanswer");
    //很nice的寻找索引的方法。
          //选择显示哪一个behidden。
          //$(".title span").eq(1).css("background","red")//eq是同名元素。 index是同辈元素
          //即用jq很难处理。

     //显示隐藏
     for(i=0;i<showbtn.length;i++){
            showbtn.item(i).onclick=function(){
                var which=this.getAttribute("index");
                showbtn[which].style.visibility="hidden";
                hidebtn[which].style.visibility="visible";
                behidden[which].style.display="block";
                }
     }
     //隐藏显示
      for(i=0;i<hidebtn.length;i++){
            hidebtn.item(i).onclick=function(){
                var which=this.getAttribute("index");
                showbtn[which].style.visibility="visible";
                hidebtn[which].style.visibility="hidden";
                behidden[which].style.display="none";
                }
     }
     //回答显示
      for(i=0;i<answerbtn.length;i++){
                answerbtn.item(i).onclick=function(){
                var which=this.getAttribute("index");
                answerwhole[which].style.display="block";
            }
      }
     //回答隐藏
      for(i=0;i<hideanswer.length;i++){
                hideanswer.item(i).onclick=function(){
                var which=this.getAttribute("index");
                answerwhole[which].style.display="none";
            }
      }
  }
     
     
$(function(){
      //写问题模块显示与隐藏。
      $(".report ul li").eq(0).click(function(){
             $(".question").fadeIn(1000); 
      })
      $(".question input").eq(2).click(function(){
             $(".question").fadeOut(300);
      })
      
      //判定何时给文章加上滑动条。
             var hideht=$(".behidden").height();
             if(hideht>500)
                    {
                 $(".behidden").addClass("ifoverf");
             }


      
      // 侧边栏的代码
      $(".all-in-there").eq(0).slideDown();
      
      $(".ablock").eq(0).click(function(){
           $(".all-in-there").eq(0).slideToggle();
           $(".all-in-there").eq(1).slideUp();
           $(".all-in-there").eq(2).slideUp();
      })

      $(".ablock").eq(1).click(function(){
           $(".all-in-there").eq(1).slideToggle();
           $(".all-in-there").eq(0).slideUp();
           $(".all-in-there").eq(2).slideUp();
      })
      $(".ablock").eq(2).click(function(){
           $(".all-in-there").eq(2).slideToggle();
           $(".all-in-there").eq(0).slideUp();
           $(".all-in-there").eq(1).slideUp();
          
      })

})


