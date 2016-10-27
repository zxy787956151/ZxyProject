<?php
	Class BlogAction extends CommonAction {

		//博文列表
		Public function index () {

		}

		//添加博文
		Public function blog () {
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
			p($_POST);
		}

		//编辑器图片上传处理
		Public function upload () {
			echo 1111;
		}
	}	 
?>
<!-- Create table hd_blog(id int unsigned not null primary key auto_increment, title varchar(30) not null default '', content text, time int(10) unsigned not null default 0,cid int unsigned not null, del tinyint(1) unsigned not null default 0); -->
<!-- create table hd_blog_attr(bid int unsigned not null, aid int unsigned not null, index bid(bid), index aid(aid)); -->
<!-- alter table hd_blog add index cid(cid); -->
<!-- alter table hd_blog add click smallint(6) unsigned not null default 0 after time; -->