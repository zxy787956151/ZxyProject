<?php 
	namespace Home\Model;
	use Think\Model;
	include 'base.php';
	class HomeuserModel extends Model {
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

		function download($file_url,$new_name=''){

		if(!isset($file_url)||trim($file_url)==''){

		        return '500';

		    }

		    if(!file_exists($file_url)){ //检查文件是否存在

		        return '404';

		    }

		    $file_name=basename($file_url);

		    $file_type=explode('.',$file_url);

		    $file_type=$file_type[count($file_type)-1];

		    $file_name=trim($new_name=='')?$file_name:urlencode($new_name).'.'.$file_type;

		    $file_type=fopen($file_url,'r'); //打开文件

		    //输入文件标签

		    header("Content-type: application/octet-stream");

		    header("Accept-Ranges: bytes");

		    header("Accept-Length: ".filesize($file_url));

		    header("Content-Disposition: attachment; filename=".$file_name);

		    //输出文件内容

		    echo fread($file_type,filesize($file_url));

		    fclose($file_type);

		}

  
	}
 ?>

 <!-- 
 自动验证
自动验证是ThinkPHP模型层提供的一种数据验证方法，可以在使用create创建数据对象的时候自动进行数
据验证。
验证规则
数据验证可以进行数据类型、业务规则、安全判断等方面的验证操作。
数据验证有两种方式：
1. 静态方式：在模型类里面通过$_validate属性定义验证规则。
2. 动态方式：使用模型类的validate方法动态创建自动验证规则。
无论是什么方式，验证规则的定义是统一的规则，定义格式为：
ThinkPHP3.2.3完全开发手册
本文档使用 看云 构建 - 156 -
array(
array(验证字段1,验证规则,错误提示,[验证条件,附加规则,验证时间]),
array(验证字段2,验证规则,错误提示,[验证条件,附加规则,验证时间]),
......
);
说明
验证字段 （必须）
需要验证的表单字段名称，这个字段不一定是数据库字段，也可以是表单的一些辅助字段，例如确认密码
和验证码等等。有个别验证规则和字段无关的情况下，验证字段是可以随意设置的，例如expire有效期规
则是和表单字段无关的。如果定义了字段映射的话，这里的验证字段名称应该是实际的数据表字段而不是
表单字段。
验证规则 （必须）
要进行验证的规则，需要结合附加规则，如果在使用正则验证的附加规则情况下，系统还内置了一些常用
正则验证的规则，可以直接作为验证规则使用，包括：require 字段必须、email 邮箱、url URL地址、
currency 货币、number 数字。
提示信息 （必须）
用于验证失败后的提示信息定义
验证条件 （可选）
包含下面几种情况：
self::EXISTS_VALIDATE 或者0 存在字段就验证（默认）
self::MUST_VALIDATE 或者1 必须验证
self::VALUE_VALIDATE或者2 值不为空的时候验证
附加规则 （可选）
配合验证规则使用，包括下面一些规则：
规则 说明
regex 正则验证，定义的验证规则是一个正则表达式（默认）
function 函数验证，定义的验证规则是一个函数名
callback 方法验证，定义的验证规则是当前模型类的一个方法
confirm 验证表单中的两个字段是否相同，定义的验证规则是一个字段名
equal 验证是否等于某个值，该值由前面的验证规则定义
notequal 验证是否不等于某个值，该值由前面的验证规则定义（3.1.2版本新增）
ThinkPHP3.2.3完全开发手册
本文档使用 看云 构建 - 157 -
in 验证是否在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串
notin
验证是否不在某个范围内，定义的验证规则可以是一个数组或者逗号分割的字符串
（3.1.2版本新增）
length
验证长度，定义的验证规则可以是一个数字（表示固定长度）或者数字范围（例如
3,12 表示长度从3到12的范围）
between
验证范围，定义的验证规则表示范围，可以使用字符串或者数组，例如1,31或者
array(1,31)
notbetween
验证不在某个范围，定义的验证规则表示范围，可以使用字符串或者数组（3.1.2版本
新增）
expire
验证是否在有效期，定义的验证规则表示时间范围，可以到时间，例如可以使用
2012-1-15,2013-1-15 表示当前提交有效期在2012-1-15到2013-1-15之间，也可以
使用时间戳定义
ip_allow
验证IP是否允许，定义的验证规则表示允许的IP地址列表，用逗号分隔，例如
201.12.2.5,201.12.2.6
ip_deny
验证IP是否禁止，定义的验证规则表示禁止的ip地址列表，用逗号分隔，例如
201.12.2.5,201.12.2.6
unique
验证是否唯一，系统会根据字段目前的值查询数据库来判断是否存在相同的值，当表
单数据中包含主键字段时unique不可用于判断主键字段本身
规则 说明
self::MODEL_INSERT或者1新增数据时候验证
self::MODEL_UPDATE或者2编辑数据时候验证
self::MODEL_BOTH或者3全部情况下验证（默认）
这里的验证时间需要注意，并非只有这三种情况，你可以根据业务需要增加其他的验证时间 
-->