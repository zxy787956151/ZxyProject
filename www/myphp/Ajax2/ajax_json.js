function getJson(RequestData,URL){
 var reJson;
 $.ajax({
  type:'POST',
  url:URL,
  data:RequestData,
  async:false, //为了简便，设置为同步操作
  cache: false,
  success:function(responseData){
   reJson=responseData;
  }
 });
 return reJson;
}


function getAllUsers(){
 var url = "./service.php";
 var request = 'action=get_all_users';
 //从后台获取并解析，由于上面封装ajax采用的是同步返回，
 //所以这样操作能成功获取返回数据
 var json = getJson(request,url);
 var users =  eval_r('('+ json +')');
 
 var usersHtml = '<br/><span style="color:red;">Ajax返回的JSON字符串：</span><br/>'
    + json + '<br/><br/><span style="color:red;">解析出来的结果为：</span><br/>';
 for(var i=0;i<users.length;++i){
  usersHtml += 'userId = ' + users[i].userId + '<br/>'
       + 'userName = ' + users[i].userName + '<br/>';
  }
 //把构造的HTML利用jQuery动态显示到页面
 $('#users').empty().html(usersHtml);
 }