<?php
/**
 * 前端首页控制器
 */
	Class IndexAction extends Action {

		/**
		 *首页视图
		 */
		Public function index(){
			// echo C('APP_GROUP_MODE');
			// echo C('APP_GROUP_PATH');
			// die();
			$wish = M('wish')->select();
			$this->assign('wish', $wish)->display();
			//$this->display();
		}

		/**
		 * 异步发布处理
		 */

		Public function handle(){ 
			// p(I('post.'));
			// var_dump(IS_AJAX);//判断是否使用异步发送的
			if (!IS_AJAX) halt('页面不存在!');
			//halt <=> _404
			//echo C('DEEAULT_FILTER');
			$data = array(
				//要插入数据库的一个数组
				'username' => I('username'),
				'content' => I('content'),
				'time' => time()
				);


			//表情替换函数
			// replace_phiz($data['content']);

			//数据库插入
			if ($id = M('wish')->data($data)->add()) {
				$data['id'] = $id;
				$data['content'] = replace_phiz($data['content']);
				$data['time'] = date('y-m-d H:i', $data['time']);
				$data['status'] = 1;
				$this->ajaxReturn($data, 'json');//异步返回
			}
			else{
				// echo json_encode(array('status' => 0));//php写法
				$this->ajaxReturn(array('status' => 0), 'json');//think写法
			}


			//一个表情包的数组
			/*$phiz = array(
					'zhuakuang' => '抓狂',
					'baobao' => '抱抱',
					'haixiu' => '害羞',
					'ku' => '酷',
					'xixi' => '嘻嘻',
					'taikaixin' => '太开心',
					'touxiao' => '偷笑',
					'qian' => '钱',
					'huaxin' => '花心',
					'jiyan' => '挤眼'
				);*/
			//※think的读写文件方法
			// F('phiz', $phiz, './Data/');//异步后触发
			/*$phiz = F('phiz', '', './Data/');
			p($phiz);*/


			//php的读写文件方法
			/*$phiz = include './data/phiz.php';
			p($phiz);*/
			/*$str = "<php return " . var_export($phiz, true) . ';?>';
			file_put_contents('./data/phiz.php', $str);
			p($data);*/
		}
	}
?>