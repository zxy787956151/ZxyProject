<?php 
	namespace Home\Controller;
	use Think\Controller;

	Class SingleController extends Controller{
		Public function index(){
			$this->arr = D('category')->getTree(M('category')->select(),0);
			$where['id']=$_GET['pid'];

			$this->sin = M('product')->where($where)->select();
			
			$this->ptoc = D('ProCol')->MtoM('product','pid','color','cid','pro_col','name','color');
				//此处写ProSiz还得再创一个模型
			$this->ptos = D('ProCol')->MtoM('product','pid','size','sid','pro_siz','name','size');

			$this->ptor = D('ProRev')->PtoR('product','pid','reviews','rid','pro_rev','name','reviews');
			
			$this->display();
		}
	}
 ?>

<!-- create table color(id int unsigned not null primary key auto_increment,color char(20),cid int); -->
<!-- create table pro_col(id int unsigned not null primary key auto_increment,pid int,cid int);  -->
<!-- create table size(id int unsigned not null primary key auto_increment,size char(20),sid int); -->
<!-- create table pro_siz(id int unsigned not null primary key auto_increment,pid int,sid int); -->
<!-- create table reviews(id int unsigned not null primary key auto_increment,reviews char(100),rid int,authorid char(20),time date); -->
<!-- create table pro_rev(id int unsigned not null primary key auto_increment,pid int,rid int); -->										
<!-- insert into reviews(reviews,rid,authorid,time)values('reviews2reviews2reviews2','2','2',now()); -->
