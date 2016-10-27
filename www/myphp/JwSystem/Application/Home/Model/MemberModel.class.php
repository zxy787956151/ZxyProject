<?php 
	namespace Home\Model;
	use Think\Model;
	include 'base.php';
	class MemberModel extends Model {
		//think 验证的用法
		protected $_validate = array(
	        // array('title','require','请填写分类标题！'), //默认情况下用正则进行验证
	        // array('name','require','请填写分类别名！'), //默认情况下用正则进行验证
	        // array('name','','分类别名已经存在！',0,'unique',self::MODEL_BOTH), // 在新增的时候验证name字段是否唯一
	        array('user','/^[\x{4e00}-\x{9fa5}]{2,4}+$/u','名字不能为空!,切必须为2到4个汉字!',0,'regex',self::MODEL_BOTH),
	        array('pwd','/^[\w]{6,12}$/u','密码必须为6~12位任意字母数字下划线组合!',0,'regex',self::MODEL_BOTH),
    		
    	);

    	function getTree($data, $pid=0){
		    $tree = array();
		    foreach($data as $k => $v){
		       if($v['pid'] == $pid){         
		            $v['child'] = self::getTree($data, $v['id']);
		            $tree[] = $v;
		       }
		    }
		    return $tree;
		}


  		function create_guid() {
		    $charid = strtoupper(md5(uniqid(mt_rand(), true)));
		    $hyphen = chr(45);// "-"
		    $uuid = chr(123)// "{"
		    .substr($charid, 0, 8).$hyphen
		    .substr($charid, 8, 4).$hyphen
		    .substr($charid,12, 4).$hyphen
		    .substr($charid,16, 4).$hyphen
		    .substr($charid,20,12)
		    .chr(125);// "}"
		    return $uuid;
		}
	}
 ?>

 