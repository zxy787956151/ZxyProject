<?php
// 38 10min
	header("Content-Type:text/html;charset=utf-8");
	Class BlogAction extends CommonAction {

		//博文列表
		Public function index () {
			// $fileld = array('id', 'title', 'content', 'time', 'click');
			//定义只读取这些,并且被放到下一句里

			//代码节省$fileld = array('del');

			//改成不想读取的,并且下一句多一个二参数为true,运行效果一样
			//※但是如果不读取cid的话cate里没东西,即关联不上,
			//所以想关联上必须读取关联键

			// echo 1111;

			//代码节省$where = array('del' => 0);

			$this->blog = D('BlogRelation')->getBlogs(); //由于填0,所以不传参也行
			// 原为field($fileld, true)->where($where)->relation(true)->select();
			//relation	
			//只想关联谁就填谁,多个表的数据都要就写true

			// p($blog);die;
			$this->display();
		}

		//删除到回收站
		Public function toTrach () {
			$id = (int) $_GET['id'];
			// echo $id;
			$update = array(
				'id' => (int) $_GET['id'],
				'del' => 1
				);

			// M('blog')->where(array('id' => (int) $_GET['id']))->save($update);
			//方法2: M('blog')->where(array('id' => (int) $_GET['id'])->setField('del', 1);
			//方法3:
			if(M('blog')->save($update)){
				$this->success('已删除到回收站', U(GROUP_NAME . '/Blog/index'));
			} else {
				$this->error('删除失败!');
			}
		}

		//回收站
		Public function trach() {		//用灵活的逻辑来节省代码
			// $fileld = array('del');
			// $where = array('del' => 1);
			// $blog = D('BlogRelation')->field($fileld, true)->where($where)->relation(true)->select();
			// 改为在模型里定义一个方法
			
			//D('BlogRelation');
			// 等价于:$db = new BlogRelationModel();将对象实例化
			//$db->relation(true);
			//返回的是当前对象的引用地址 "$db"
			//p($blog);

			$this->blog = D('BlogRelation')->getBlogs(1);
			//执行模型BlogRelation里的getBlogs函数,进行删除(1)
			
			$this->display('index');


			//p($blog);
		}

		//添加博文
		Public function  blog () {
			//所属分类  
			import('Class.Category', APP_PATH);
			$cate = M('cate')->order('sort')->select();
			$this->cate = Category::unlimitedForLevel($cate);
			// p($cate);

			//博文属性
			$this->attr = M('attr')->select();
			// p($attr);

			$this->display();
		}

		//添加博文表单处理
		Public function addBlog () {
			// p($_POST);
			// D('BlogRelation');//看看是否能载入数据

			$data =array(
				//原生php代码
				'title' => $_POST['title'],
				'content' => $_POST['content'],
				'time' => time(),
				'click' => (int) $_POST['click'],
				'cid' => (int) $_POST['cid']
				);

			// if (isset($_POST['aid'])) {
			// 	foreach ($_POST['aid'] as $v) {
			// 		$data['attr'][] = $v; 
			// 	}
			// }
			// // p($data);
			// D('BlogRelation')->relation(true)->add($data);
			/**
			 * think的插入有bug,自己写的一个
			 */
			if ($bid = M('blog')->add($data)) {
				if (isset($_POST['aid'])) {
					$sql = 'INSERT INTO `' . C('DB_PREFIX') . 
					'blog_attr`(bid,aid) VALUES';
				foreach ($_POST['aid'] as $v) {
					$sql .= '(' . $bid . ',' . $v . '),';
				}
				$sql  = rtrim($sql, ',');
				// echo $sql;
				M('blog_attr')->query($sql);//把这条sql发送出去
				}
				$this->success('添加成功', U(GROUP_NAME . '/Blog/index'));
			}else{
				$this->error('添加失败!');
			}
			// $this->display();
		}

		//编辑器图片上传处理
		Public function upload () {
			import('ORG.Net.UploadFile');
			/**
			 * 小型配置
			 */

			$upload = new UploadFile();
			$upload->autoSub = true;
			$upload->subType = 'date';
			$upload->dateFormat = 'Ym';;

			//由于上传路径不对就不执行了
				
				$info = $upload->getUploadFileInfo();
				import('ORG.Util.Image');
				Image::water('./Upload/' . $info[0]['savename'], './Data/svn.jpg');

				echo json_encode(array(
					'url' => $info[0]['savename'],
					'title' =>htmlspecialchars($_POST['pictitle'], ENT_QUOTES),
					'original' => $info[0]['name'],
					'state' => SUCCESS
					));
				// p($info);
			
			// p($info);

			/**
			 * 大型配置
			 */
			// $config =   array(
	  //       'maxSize'           =>  2000000,    // 上传文件的最大值
	  //       'supportMulti'      =>  false,    // 是否支持多文件上传
	  //       'allowExts'         =>  array('jpg','gif','png'),    // 允许上传的文件后缀 留空不作后缀检查
	  //       'allowTypes'        =>  array(),    // 允许上传的文件类型 留空不做检查
	  //       'thumb'             =>  false,    // 使用对上传图片进行缩略图处理
	  //       'imageClassPath'    =>  'ORG.Util.Image',    // 图库类包路径
	  //       'thumbMaxWidth'     =>  '',// 缩略图最大宽度
	  //       'thumbMaxHeight'    =>  '',// 缩略图最大高度
	  //       'thumbPrefix'       =>  'thumb_',// 缩略图前缀
	  //       'thumbSuffix'       =>  '',
	  //       'thumbPath'         =>  '',// 缩略图保存路径
	  //       'thumbFile'         =>  '',// 缩略图文件名
	  //       'thumbExt'          =>  '',// 缩略图扩展名        
	  //       'thumbRemoveOrigin' =>  false,// 是否移除原图
	  //       'thumbType'         =>  1, // 缩略图生成方式 1 按设置大小截取 0 按原图等比例缩略
	  //       'zipImages'         =>  false,// 压缩图片文件上传
	  //       'autoSub'           =>  false,// 启用子目录保存文件
	  //       'subType'           =>  'hash',// 子目录创建方式 可以使用hash date custom
	  //       'subDir'            =>  '', // 子目录名称 subType为custom方式后有效
	  //       'dateFormat'        =>  'Ymd',
	  //       'hashLevel'         =>  1, // hash的目录层次
	  //       'savePath'          =>  '',// 上传文件保存路径
	  //       'autoCheck'         =>  true, // 是否自动检查附件
	  //       'uploadReplace'     =>  false,// 存在同名是否覆盖
	  //       'saveRule'          =>  'uniqid',// 上传文件命名规则
	  //       'hashType'          =>  'md5_file',// 上传文件Hash规则函数名
   //      );
			// $upload = new UploadFile($config);


			
			$title = htmlspecialchars($_POST['pictitle'], ENT_QUOTES);
			// echo 1111;
		}
	}	 
?>
<!-- Create table hd_blog(id int unsigned not null primary key auto_increment, title varchar(30) not null default '', content text, time int(10) unsigned not null default 0,cid int unsigned not null, del tinyint(1) unsigned not null default 0); -->
<!-- create table hd_blog_attr(bid int unsigned not null, aid int unsigned not null, index bid(bid), index aid(aid)); -->
<!-- alter table hd_blog add index cid(cid); -->
<!-- alter table hd_blog add click smallint(6) unsigned not null default 0 after time; -->