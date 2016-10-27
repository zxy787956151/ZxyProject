<?php 
//操作绑定到类,命名空间就得		加,
//不好使	????
namespace Home\Controller\_empty;
use Think\Controller;

//类名index
	class index extends Controller{
		//原index方法改为run
		Public function run(){
			echo '执行'CONTROLLER_NAME.'控制器的'.ACTION_NAME.'操作';
		}
	}
 ?>