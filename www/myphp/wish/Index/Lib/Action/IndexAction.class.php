<?php
	Class IndexAction extends Action {
		Public function index() {
			//处理首页视图
			// p($_GET);die();
			// echo U('Index/index',array('uid' => 1), '', 0,true);
			//模板上用U函数不能这么用,应为<a href="{:U('里边一样')}"></a>
			// die();
			//PHP生成URL地址函数:参数1:'控制器名/方法名' PS:如果要跳转的是当前控制器可以不写Index
			// 参数2:URL GET传参; 参数3:尾静态后缀名; 参数4:是否跳转 1~ture\
			//参数5:在输出项URL前输出域名
			//并把index改成想跳转的方法(show)


			// $wish = M('wish')->select();
			// p($wish);

			// $this->assign('a',1111);//分配到模板上
			// $this->a = 111;//分配2

			// $this -> display('wish');//display函数默认找模板名为函数名的模板
			//->箭头叫链式调用,目的:缩短代码

			// say();
			// die;

			$this->assign('wish', M('wish')->select())->display('wish');//分配&调用模板&显示wish,链式一行搞定
		}

		// Public function show(){
		// 	// echo "跳到show";
		// 	// p($_GET);
		// 	// echo THINK_VERSION;//输出此think的版本
		// 	// echo I('uid');//thinkphp3.1.3新函数,自动判断是get还是post获取,然后获取;
		// 	// p(I('get.'));//利用I函数直接打印get或者post数组
		// }

		Public function handle(){
			//处理表单
			// p(I('post.'));

			// echo I('username','','htmlspecialchars');//解决3.1.3实体化bug

			if (!IS_POST) _404('页面不存在',U('index'));
			//IS_POST3.1.3新方法,判断是否是通过post传值进入该页面
			//404()是think的一个错误页面函数,此处以防直接通过地址栏访问
			//2参数:跳转页面地址,以防DEBUG关闭
			//或者用 halt错误页面函数

			// p($_POST);

			$data = array(
				//要插入数据库的一个数组
				'username' => I('username', '', 'htmlspecialchars'),
				'content' => I('content', '', 'htmlspecialchars'),
				'time' => time()
				);
			// p($data);

			//$a = M('wish')->where('id > 0')->delete();
			// //等价于M('wish')->where(array('id' => array('gt', 0)))->delete();
			// //必须加条件,think不会全部删除你的表
			//var_dump($a);


			if (M('wish')->data($data)->add()) {
				// $id = M('wish')->data($data)->add();
				//不好使就删除Runtime文件夹
				// p($data);
				// var_dump($id);
				// echo $id;
				//M():think连接数据库<=> new Model('wish')
				//data数据库对象函数,成功返回数据库id,add插入函数(select)
				$this->success('发布成功','index');
				//success操作成功方法:参数1成功提示;
				//参数2:跳转地址,当前控制器方法可以直接写
				//用U方法跳转U('List/show'),若在当前控制器中
				//则可直接敲这个名
			}
			else {
				$this->error('发布失败,请重试...');
				//error操作失败方法从哪来返回到哪,
				//显示提示后会后退,相当于Backspace
				
			}
			
		}
	}
?>