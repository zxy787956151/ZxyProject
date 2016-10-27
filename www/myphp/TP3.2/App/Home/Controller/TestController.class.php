<?php 
	namespace Home\Controller;	//防止命名冲突,应用于大项目
	use Think\Controller;		//控制器 use,在命名空间下要书写 ,找到Think下的Controller类,去继承
header("Content-Type:text/html;charset=utf-8");

	Class TestController extends Controller{
		public function index(){
			// echo "这里是Test控制器下的index方法!";

			// phpinfo();

			//调用方法生成模板文件夹及其各种控制器
					// \Think\Build::buildController('Admin','Role');


			// //3秒后页面重定向
			// $this->redirect('Zxy/read', array('cate_id' => 2), 3, '页面跳转中...');

			// echo I('get.id'); // 相当于 $_GET['id']

			// // 采用htmlspecialchars方法对$_GET['name'] 进行过滤，如果不存在则返回空字符串
			// echo I('get.name','','htmlspecialchars');

			//固定实例化模型
			// $User = new \Home\Model\UserModel();

			//通用实例化模型
			//当前数据表的数据库连接信息 ,$connection如果没有则获取配置文件中的
			// $User = new \Home\Model\newModel('User','newtp',$connection);
		}
	}
 ?>