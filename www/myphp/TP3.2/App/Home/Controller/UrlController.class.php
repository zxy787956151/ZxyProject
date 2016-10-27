<?php 
	namespace Home\Controller;
	use Think\Controller;
	Class UrlController extends Controller{
		Public function index(){

			//U方法的第二个参数支持数组和字符串两种定义方式，如果只是字符串方式的参数可以在第一个参数中定义
			
			// U('Blog/cate',array('cate_id'=>1,'status'=>1));
			// U('Blog/read@blog.thinkphp.cn','id=1');
		}
	}
 ?>