<?php
/**
 * 处理无限级分类的拓展类
 */

/**
 * 有这个函数,分类就是无限级的,你可以一直往下填
 */

Class Category {
	/**
	 * 组合一位数组
	 */
	Static Public function unlimitedForLevel (
		$cate, $html = '--', $pid = 0, $level = 0) {
	//$html为自定义的标识符,用来标识子集	

		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid']==$pid) {
				$v['level'] = $level + 1;
				$v['html'] = str_repeat($html, $level);
				$arr[] = $v;
				$arr = array_merge($arr, self::unlimitedForLevel(
					$cate, $html, $v['id'], $level + 1));
			}
		}
		return $arr;

		// echo "1";
	} 

	/**
	 * 组合多维数组
	 */

	Static Public function unlimitedForLayer($cate, $name = 'child', $pid = 0) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$v[$name] = self::unlimitedForLayer($cate, $name, $v['id']);
				$arr[] = $v;
			}
		}

		return $arr;	
	}

	/**
	 * 传递一个子分类ID返回所有的父级分类
	 */
	/**
	 * 此函数传递一个子级的id就能递归得到父级
	 */
	Static Public function getParents ($cate, $id) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['id'] == $id) {
				$arr[] = $v;
		   /*①*/$arr = array_merge($arr, self::getParents($cate, $v['pid']));
				//递归: self
		   		//①: 把①的两参数换位,即可先循环父级再循环子级
			}
		} 
		return $arr;
	}

	//传递一个父级分类ID返回所有子分类ID
	Static Public function getChildsId($cate, $pid) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v['id'];
				$arr = array_merge($arr, self::getChildsId($cate, $v['id']));
			}
		}
		return $arr;
	}

	//传递一个父级分类ID范湖所有子级分类
	Static Public function getChilds ($cate, $pid) {
		$arr = array();
		foreach ($cate as $v) {
			if ($v['pid'] == $pid) {
				$arr[] = $v;
				$arr = array_merge($arr, self::getChilds($cate, $v['id']));
			}
			
		}
		return $arr;
	}

}
?>
