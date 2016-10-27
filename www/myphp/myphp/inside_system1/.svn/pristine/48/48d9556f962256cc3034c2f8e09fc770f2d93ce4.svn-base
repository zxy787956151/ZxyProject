<?php
header('Content-type:text/html;charset=utf-8');
Class IndexAction extends Action {
	/*前台首页控制器*/
	Public function index(){
    $_SESSION['username']=$_POST['username'];
		$this->display();
	}
  Public function logout(){
    session_unset();
    session_destroy();
    $this->redirect(GROUP_NAME.'/Login');
  }
  Public function show(){
    echo "当前用户名为：".$_SESSION['username'];
    echo "<br>";
    echo '个人中心';
  }
}

?>