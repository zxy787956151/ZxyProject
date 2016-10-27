<?php
namespace Home\Controller;
use Think\Controller;
class IndexController extends Controller {
    public function index(){
       $this->cate=M('cate')->order('sort')->select();
       if(!$blog=S('index_blog')){
       $blog=M('blog')->select();
       }
       S('index_blog',$blog,5);
       $this->blog=$blog;
       $this->display(); 
    }
    public function show(){
       $this->cate=M('cate')->order('sort')->select();
       $id=I('id','','intval');
       $this->blog=M('blog')->select($id);
       $this->display();
    }
    //登录地址
  public function login($type = null){
    empty($type) && $this->error('参数错误');

    //加载ThinkOauth类并实例化一个对象
    import("Org.ThinkSDK.ThinkOauth");
    $sns  = \ThinkOauth::getInstance($type);

    //跳转到授权页面
    redirect($sns->getRequestCodeURL());
  }

  //授权回调地址
  public function callback($type = null, $code = null){
    (empty($type) || empty($code)) && $this->error('参数错误');
    
    //加载ThinkOauth类并实例化一个对象
    import("Org.ThinkSDK.ThinkOauth");
    $sns  = \ThinkOauth::getInstance($type);

    //腾讯微博需传递的额外参数
    $extend = null;
    if($type == 'tencent'){
      $extend = array('openid' => $this->_get('openid'), 'openkey' => $this->_get('openkey'));
    }

    //请妥善保管这里获取到的Token信息，方便以后API调用
    //调用方法，实例化SDK对象的时候直接作为构造函数的第二个参数传入
    //如： $qq = ThinkOauth::getInstance('qq', $token);
    $token = $sns->getAccessToken($code , $extend);

    //获取当前登录用户信息
    if(is_array($token)){
      $user_info = A('Type', 'Event')->$type($token);
      header("content-type:text/html;charset=utf-8");
      echo("<h1>恭喜！使用 {$type} 用户登录成功</h1><br>");
      echo("授权信息为：<br>");
      dump($token);
      echo("当前登录用户信息为：<br>");
      dump($user_info);
    }
  }
}