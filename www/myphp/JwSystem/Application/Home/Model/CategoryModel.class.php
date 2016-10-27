<?php
/**
 	再乱码就是.php文件编码格式的问题
 */
	namespace Home\Model;
	use Think\Model;
	include 'base.php';	

	Class CategoryModel extends Model {

	 	Public function getTree($data, $pid=0){
		    $tree = array();
		    foreach($data as $k => $v){
		       if($v['pid'] == $pid){         
		            $v['child'] = $this->getTree($data, $v['id']);
		            $tree[] = $v;
		       }
		    }
		    return $tree;
		}			
		
		

	}
 ?>
